@extends('layouts.app3')
 
 @section('content')
 	<a href="{{ route('home') }}">Home</a>
  	<a href="{{ route('users') }}">View users</a>
   	<a href="{{ route('posts')}}">View Posts</a>
	<a href="{{ route('social.auth', ['provider'=>'github']) }}" class="btn btn-block btn-social btn-github btn-flat"><i class="fa fa-github"></i></a>


 @stop
