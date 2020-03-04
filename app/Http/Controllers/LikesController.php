<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use App\Reply;
use Auth;
use Session;

class LikesController extends Controller
{
    //

    public function like($id)
    {
    	$reply = Reply::find($id);
    	Like::create([
    		'user_id'=> Auth::id(),
    		'reply_id' => $id
    	]);
    	Session::flash('success','You Like the reply');
    	return redirect()->back();
    }

    public function unlike($id)
    {
    	$like = Like::where('reply_id',$id)->where('user_id', Auth::id());
    	$like->delete();
    	Session::flash('success','You Unliked the reply');
    	return redirect()->back();

    }
}
