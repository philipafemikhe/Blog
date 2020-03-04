<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Post;
use App\Tag;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */

    public function index()
    {
        $usersCount = User::all()->count();
        $posts = Post::all()->count();
        $categories = Category::all()->count();
        $tags = Tag::all()->count();

        $data = [
            'userCount' => $usersCount,
            'postCount' => $posts,
            'categoryCount' => $categories,
            'tagCount' => $tags
        ];


        return view('home')->with('data',$data);
    }

     public function welcome()
    {
        $usersCount = User::all()->count();
        $posts = Post::all()->count();
        $categories = Category::all()->count();
        $tags = Tag::all()->count();

        $data = [
            'userCount' => $usersCount,
            'postCount' => $posts,
            'categoryCount' => $categories,
            'tagCount' => $tags
        ];


        return view('welcome')->with('data',$data)
                              ->with('posts', $posts)
                              ->with('categories', $categories)
                              ->with('tags', $tags);
    }


    public function index2()
    {
        return view('adminlte::home');
    }
}
