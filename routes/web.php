<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
   // return view('welcome');
//});

//Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
//});




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [
	'uses'=>'HomeController@welcome',
	'as'=>'welcome'
]);

Route::get('/new', function(){
	return view('new');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', [
	'uses'=>'HomeController@index',
	'as'=>'home'
]);

Route::get('/results', function(){
		$posts = \App\Post::where('title', 'Like' , '%' . request('query') . '%' )->get();
		return view('admin.posts.results')->with('posts', $posts)
							  ->with('title', 'Search results for: ' . request('query'));

	});

Route::get('/test', [
	'uses'=>'homeController@posttags',
	'as'=>'test'
	]);


Route::get('{provider}/redirect', [
	'uses'=>'SocialsController@auth_callback',
	'as'=>'social.callback'
]);


Route::get('{provider}/auth', [
	'uses'=>'SocialsController@auth',
	'as'=>'social.auth'
]);


Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function(){

	Route::get('/post/index', [
		'uses'=>'PostController@index',
		'as'=>'posts'
	]);


	Route::get('/post/create', [
		'uses'=>'PostController@create',
		'as'=>'post.create'
	]);

	Route::get('/post/edit/{id}', [
		'uses'=>'PostController@edit',
		'as'=>'admin.post.edit'
	]);

	Route::post('/post/update/{id}', [
		'uses'=>'PostController@update',
		'as'=>'admin.post.update'
	]);

	Route::post('/post/store', [
		'uses'=>'PostController@store',
		'as'=>'post.store'
	]);

	Route::get('/post/delete{id}', [
		'uses'=>'PostController@destroy',
		'as'=>'post.delete'
	]);

	Route::get('/post/trashed', [
		'uses'=>'PostController@trashed',
		'as'=>'post.trashed'
	]);

	Route::get('/post/kill/{id}', [
		'uses'=>'PostController@kill',
		'as'=>'post.kill'
	]);

	Route::get('/post/restore/{id}', [
		'uses'=>'PostController@restore',
		'as'=>'post.restore'
	]);

	Route::get('/post/single/{id}', [
		'uses'=>'PostController@singlepost',
		'as'=>'post.single'
	]);

	Route::post('/post/reply/{id}', [
		'uses' =>'PostController@reply',
		'as'=>'post.reply'
	]);






	Route::get('/category/create', [
		'uses'=>'CategoriesController@create',
		'as'=>'category.create'
	]);


	Route::get('/categories', [
		'uses'=>'CategoriesController@index',
		'as'=>'categories'
	]);

	Route::get('/categories/edit/{id}', [
		'uses'=>'CategoriesController@edit',
		'as'=>'category.edit'
	]);


	Route::get('/categories/delete/{id}', [
		'uses'=>'CategoriesController@Destroy',
		'as'=>'category.delete'
	]);


	Route::post('/category/store', [
		'uses'=>'CategoriesController@store',
		'as'=>'category.store'
	]);

	Route::post('/category/update/{id}', [
		'uses'=>'CategoriesController@update',
		'as'=>'category.update'
	]);


	Route::get('/tags', [
		'uses'=>'TagsController@index',
		'as'=>'tags'
	]);

	Route::get('/tag/create', [
		'uses'=>'TagsController@create',
		'as'=>'tag.create'
	]);

	Route::get('/tag/edit/{id}', [
		'uses'=>'TagsController@edit',
		'as'=>'tag.edit'
	]);


	Route::get('/tag/delete/{id}', [
		'uses'=>'TagsController@Destroy',
		'as'=>'tag.delete'
	]);


	Route::post('/tag/store', [
		'uses'=>'TagsController@store',
		'as'=>'tag.store'
	]);

	Route::post('/tag/update/{id}', [
		'uses'=>'TagsController@update',
		'as'=>'tag.update'
	]);

	Route::get('/users', [
		'uses'=>'UsersController@index',
		'as'=>'users'
	]);

	Route::get('/users/create', [
		'uses'=>'UsersController@create',
		'as'=>'user.create'
	]);

	Route::post('/users/store', [
		'uses'=>'UsersController@store',
		'as'=>'user.store'
	]);

	Route::get('user/admin/{id}', [
		'uses'=>'UsersController@admin',
		'as'=>'user.admin'
	]);


	Route::get('user/not-admin/{id}', [
		'uses'=>'UsersController@not_admin',
		'as'=>'user.not.admin'
	]);

	Route::get('user/profile', [
		'uses' => 'ProfilesController@index',
		'as' => 'user.profile'
	]);

	// Route::post('user/update/{id}', [
	// 	'uses' => 'ProfilesController@update',
	// 	'as' => 'user.profile.update'
	// ]);


	Route::get('user/edit/{id}', [
		'uses' => 'UsersController@edit',
		'as' => 'user.edit'
	]);

	Route::get('user/delete/{id}', [
		'uses' => 'UsersController@delete',
		'as' => 'user.delete'
	]);


	Route::post('user/update/{id}', [
		'uses' => 'ProfilesController@update',
		'as' => 'user.update'
	]);

	Route::get('reply/like{id}', [
		'uses'=> 'LikesController@like',
		'as'=>'reply.like'
	]);

	Route::get('reply/unlike/{id}', [
		'uses'=> 'LikesController@unlike',
		'as'=>'reply.unlike'
	]);

	Route::get('post/downloadPDF', [
		'uses'=> 'PostController@downloadPDF',
		'as'=>'post.downloadPDF'
	]);

	Route::get('post/viewPDF', [
		'uses'=> 'PostController@viewPDF',
		'as'=>'post.viewPDF'
	]);
});



