<?php

namespace App;
use App\Like;
use Auth;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    // 
    protected $fillable = ['content','user_id','post_id'];
    public function post()
    {
    	return $this->belongsTo('App\Post');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function likes()
    {
    	return $this->hasMany('App\like');
    }
   
   public function is_liked_by_auth_user()
    {
    	//$likes = Like::all();
    	$id = Auth::id();
    	$theLikes= array();
    	foreach ($this->likes as $like) {
    		array_push($theLikes, $like->user_id);
    	}
    	if (in_array($id, $theLikes)) {
    		return true;
    	} else {
    		return false;
    	}
    }
}
