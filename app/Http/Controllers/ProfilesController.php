<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\user;
use App\Profile;
use Session;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.profile')->with('user',Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        // $this->validate($request, [
        //     'username' => 'required',
        //     'email' => 'required|email',
        //     'about' => 'required',
        //     'facebook' => 'required|url',
        //     'youtube' => 'required|url'
        // ]);
        //$user = Auth::user();

         if($id <> Auth::id())
        {
            //echo "You cant edit other user profile";
            Session::flash('info','You cant edit other user profile');
            return redirect()->back();
        } else{
            $user = User::Find($id);
            $oldavatar="";
            if($request->hasFile('avatar'))
            {
                $oldavatar = $user->profile->avatar;

                $avatar = $request->avatar;
                $avater_new_name = time() . $avatar->getClientOriginalName();
                $avatar->move('uploads/avatar', $avater_new_name);

                $user->profile->avatar = "uploads/avatar/" . $avater_new_name;

            }
                

            
           
            $user->name = $request->username;
            $user->email = $request->email;
            if($request->has('pasword'))
            {
                $user->password = bcrypt($request->password);
            }
           
            $user->profile->facebook = $request->facebook;
            $user->profile->youtube = $request->youtube;
            $user->profile->about = $request->about;
 
               
            $user->save();
            $user->profile->save();
            if(File::exists($oldavatar)) {
                File::delete($oldavatar);
            }
           // unlink($oldavatar);
            Session::flash('success','User profile updated successfully');
            return redirect()->back();
        }



        
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
    }
}
