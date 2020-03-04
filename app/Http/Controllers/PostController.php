<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;
use App\User;
use App\Profile;
use App\Reply;
use App\Like;
use Notification;
use Auth;
use PDF;

use Session;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getFeaturedAttribute($featured)
    {
        return asset($featured);
    }

    public function index()
    {
        //
        return view('admin.posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        if($categories->count()==0){
            Session::flash('info','You must have some categories before creating a post');
            return redirect()->back();
        }
        return view('admin.posts.create')->with('categories', $categories)->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
      // dd($request->all());
        $this->validate($request, [
            'title'=>'required|max:255',
            'content'=>'required',
            'featured'=>'required',
            'category_id'=>'required',
            'tags'=>'required'
        ]);

        $featured = $request->featured;
        $castImage = time().$featured->getClientOriginalName();
        $featured->move('uploads\posts', $castImage);

        $mypost = new Post;
        $mypost->user_id = Auth::id();
        $mypost->title = $request->title;
        $mypost->content = $request->content;
        //$mypost->content = Input::get('content');
        $mypost->category_id = $request->category_id;
        $mypost->featured = 'uploads/posts/' . $castImage;
        $mypost->slug = str_slug($request->title);
        $mypost->save();
        $mypost->tags()->attach($request->tags);

        $allusers = array();
        $users = User::all();

        foreach ($users as $user) 
        {
            array_push($allusers, $user);
        }

        //dd($allusers);

        Notification::send($allusers, new \App\Notifications\NewPostAdded($mypost));


        Session::flash('success','Your post has been created successfully');
        //return Redirect::to('posts.index');
        return redirect()->back();
        //return redirect()->route('categories');

        //dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);
        if(is_null($post)) return redirect()->back();
        return view('admin.posts.edit')->with('post',$post)
                                        ->with('tags',Tag::all())
                                        ->with('categories',Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //$featured = $request->featured;
        //$castImage = time().$featured->getClientOriginalName();
        //$featured->move('uploads\posts', $castImage);
        
        $post = Post::find($id);
        $post->title = $request->title;
        $post->content=$request->content;
       // $post->featured = 'uploads/posts/' . $castImage;
        $post->category_id = $request->category_id;

        $post->save();

        $post->tags()->sync($request->tags);
        Session::flash('info','post updated successfully');

        return redirect()->route('admin.posts.index');
        //dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy($id)
    {
        //
        $post = Post::find($id);
        $post->delete();
        Session::flash('success','Your post has been successfully trashed');
        return redirect()->back();
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->get(); 
        //Post::onlyTrashed() returns a query builder. use the get method to return the result
        //dd($posts);
        return view('admin.posts.trashed')->with('posts',$posts);
    }


    public function kill($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        Session::flash('success','Post deleted parmanently');
        return redirect()->back();

    }

    public function restore($id)
    {
        $post=Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        Session::flash('success','Your post has been restored successfully');
        return redirect()->route('posts');

    }

    public function singlepost($id)
    {
        $post = Post::find($id);
        $next_id = Post::where('id', '>', $post->id)->min('id');
        $previous_id = Post::where('id', '<', $post->id)->max('id');

        $user = User::where('id',$post->user_id);
        //dd($previous_id);
        $category = Category::where('id','=',$post->category_id)->first();
        $profile = Profile::where('user_id','=',$post->user_id)->first();
        $responses = Reply::where('post_id',$id)->get();
       // dd($responses);
        return view('admin.posts.single')->with('post', $post)
                                        ->with('category',$category)
                                        ->with('next',Post::find($next_id))
                                        ->with('previous',Post::find($previous_id))
                                        ->with('user',User::find($post->user_id))
                                        ->with('profile',$profile)
                                        ->with('replies',$responses);

    }


    public function reply($id)
    {
        $reply = Reply::create([
            'user_id' => Auth::id(),
            'post_id' => $id,
            'content'=>request()->content
        ]);
       
        Session::flash('success','Comment saved successfully');
        return redirect()->back();
    }

    public function downloadPDF(){
        set_time_limit(300);
        // $pdf = PDF::loadView('admin.posts.pdf');
        // return $pdf->download('posts.pdf');
        $html = view('admin.posts.pdf');
        $pdfUPN = PDF::loadHTML($html)->stream();
        $randomTime = time();
        if (!is_dir("upn/")) {
        mkdir("upn/");
        }
        $CaseID = '123';
        file_put_contents('./upn/'.$CaseID.'-'.$randomTime.'.pdf',$pdfUPN);
        $pdf = './upn/'.$CaseID.'-'.$randomTime.'.pdf';
         return view('admin.posts.pdf');
  
      }

      public function viewPDF(){               
        return view('admin.posts.pdf');
  
      }
}
