<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Session;
use Auth;

class UsersController extends Controller
{
    //
   // public function getAvatarAttribute($avatar)
    //{
    //    return asset($avatar);
   // }

   public function __construct()
   {
       $this->middleware('admin');
   }

    public function index()
    {
        return view('admin.users.index')->with('users', User::all());
    }

    public function create()
    {
        if(Auth::admin())
            {
                return view('admin.users.create');
            } else {
                Session::flash('info', 'You do not have Permissions to create a user');
                return redirect()->back();
            }
    	
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        
        $profile = Profile::create([
            'user_id'=>$user->id,
            'avatar'=>'uploads\avatar\koala.jpg'
        ]);

        Session::flash('success','User added successfully');
        return redirect()->route('users');
    }

    public function admin($id)
    {
        $user = User::find($id);
        $user->admin=1;
        $user->save();
        Session::flash('success','Permissions granted successfully');
        return redirect()->back();
    }

    public function not_admin($id)
    {
        $user = User::find($id);
        $user->admin=0;
        $user->save();
        Session::flash('success','Permissions revoked successfully');
        return redirect()->back();
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit')->with('user',$user);
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }

    // public function update($id)
    // {
    //     if($id <> Auth::id())
    //     {
    //         //echo "You cant edit other user profile";
    //         Session::flash('info','You cant edit other user profile');
    //         return redirect()->back();
    //     } else{
    //         $user = User::find($id);
    //         $user->name = $request->username;
    //         $user->email = $request->email;

    //         $user->profile->about = $request->about;
    //         $user->profile->facebook = $request->facebook;
    //         $user->profile->youtube = $request->youtube;
    //          $user->profile->avatar = $request->avatar;
    //         $user->save();
    //     }


    // }
}
