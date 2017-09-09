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

Route::get('/', ['uses' => 'MainPageController@show', 'as' => 'main']);

//Post's show
Route::get('/post/{id}', ['uses' => 'PostsController@show', 'as' => 'post']);
Route::post('/post', ['uses' => 'PostsController@comments', 'as' => 'comment_p']);

//Search show
Route::post('/search', ['uses' => 'SearchController@show', 'as' => 'search_p']);

//Post's tag show
Route::get('/posts/tag/{id}', ['uses' => 'PostsTagController@show', 'as' => 'tag']);

//All categories show
Route::get('/categories', ['uses' => 'CategoriesController@show', 'as' => 'categories']);

//All posts of category show
Route::get('/category/{id}', ['uses' => 'CategoryPostsController@show', 'as' => 'category_posts']);

//Static pages
Route::get('/about', ['uses'=>'AboutController@show', 'as' => 'about']);
Route::get('/contacts', ['uses'=>'ContactsController@show', 'as' => 'contacts']);
Route::post ('/contacts', ['uses'=>'ContactsController@store']);

//autorization and amin panel
Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['prefix'=>'admin','middleware'=>['web','auth']],function() {
	// admin/
	Route::get('/',['uses'=>'Admin\AdminController@show','as'=>'admin_index']);
	
	Route::get('/add/post',['uses'=>'Admin\AdminPostController@show','as'=>'admin_add_post']);
	Route::post('/add/post',['uses'=>'Admin\AdminPostController@create','as'=>'admin_add_post_p']);
        
        Route::post('/add/tag',['uses'=>'Admin\AdminTagController@create','as'=>'admin_add_tag_p']);
        Route::post('/add/category',['uses'=>'Admin\AdminCategoryController@create','as'=>'admin_add_category_p']);
	
        Route::get('/update/post',['uses'=>'Admin\AdminUpdateController@show','as'=>'admin_update']);
        
	Route::get('/update/post/{id}', ['uses'=>'Admin\AdminUpdatePostController@show','as'=>'admin_add_post']);
	Route::post('/update/post',['uses'=>'Admin\AdminUpdatePostController@create','as'=>'admin_update_post_p']);
        
        //Work with comments
        Route::get('/edit/comments',['uses'=>'Admin\AdminCommentsController@show','as'=>'admin_comments']);
        
	Route::get('/edit/comment/{id}', ['uses'=>'Admin\AdminEditCommentController@show','as'=>'admin_edit_comment']);
	Route::post('/edit/comment',['uses'=>'Admin\AdminEditCommentController@create','as'=>'admin_edit_comment_p']);
        
        
        Route::get('/user/{id}', ['uses'=>'Admin\AdminEditUser@show','as'=>'admin_edit_user_show']);
	Route::post('/user',['uses'=>'Admin\AdminEditUser@create','as'=>'admin_edit_user']);
});

// Profile edit
Route::get('/profile/{id}', ['middleware'=>['web','auth'], 'uses' => 'Profile\ProfileController@show', 'as' => 'profile']);
Route::post('/profile', ['middleware'=>['web','auth'], 'uses' => 'Profile\ProfileController@create', 'as' => 'profile_p']);

