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
//use Illuminate\Support\Facades\URL;


// Route::get('/', function () {
//     return view('welcome');
// });

//  Auth::routes();

//  Route::get('/home', 'HomeController@index')->name('home');

// //Create
// Route::get('insert', function () {
//     DB::insert('insert into categories (name, description) values (?, ?)', ['PHP', 'Personal Home Page']);
// });

// //Read
// Route::get('select',function(){
// 	$results = DB::table('categories')->distinct()->get();
// 	return $results;
// });

// //Update
// Route::get('update',function(){
// 	$results = DB::update('update categories set description="Hypertext Preprossor" where id = ?', [1]);

// });

// //Delete
// Route::get('delete',function(){
// 	DB::delete('delete from categories where id=1');
// });
use App\Post;
use App\Cat;

//Category
Auth::routes();
Route::get('category', 'CategoryController@index')->name('category');
Route::get('category/create', 'CategoryController@create');
Route::post('category', 'CategoryController@store');
Route::get('category/{id}/edit', 'CategoryController@edit');
Route::post('category/{id}/update', 'CategoryController@update');
Route::get('category/{id}/destory', 'CategoryController@destory');


//Stuent
Route::get('student','StudentController@index');
Route::get('student/create',"StudentController@create");
Route::post('student','StudentController@store');
Route::get('student/{id}/edit','StudentController@edit');
Route::post('student/{id}/update','StudentController@update');
Route::get('student/{id}/destory','StudentController@destory');

Route::get('student/{id}/download','StudentController@download');


//aritcle
Route::get('article','ArticleController@index');
Route::get('article/create',"ArticleController@create");
Route::post('article','ArticleController@store');
Route::get('article/{id}/edit','ArticleController@edit');
Route::post('article/{id}/update','ArticleController@update');
Route::get('article/{id}/destory','ArticleController@destory');

//Multiple image
Route::get('form','FormController@create');
Route::post('form','FormController@store');


//eloquent
Route::get('eloquent','CatController@index');
Route::get('eloquent/cat','CatController@cat_create');
Route::post('eloquent','CatController@store');

//admin
Route::get('eloquent/admin',function(){
	return view('eloquent/admin');
}
);
Route::get('eloquent/admin/category','CatController@index');
Route::get('eloquent/admin/add_category','CatController@cat_create');
Route::post('eloquent/admin/category','CatController@store');
Route::get('eloquent/admin/{id}/edit','CatController@edit');
Route::post('eloquent/admin/{id}/update','CatController@update');
Route::get('eloquent/admin/{id}/destory','CatController@destory');

Route::get('eloquent/admin/post','PostController@index');
Route::get('eloquent/admin/add_post','PostController@post_create');
Route::post('eloquent/admin/post','PostController@store');
Route::get('eloquent/admin/{id}/p_edit','PostController@edit');
Route::post('eloquent/admin/{id}/p_update','PostController@update');


//hasMany
// Route::get('eloquent/{id}/post',function($id){
// 	$cat = Cat::find($id);
// 	//echo $cat->name;
// 	foreach ($cat->posts as $cat) {
// 		echo $cat->name;
// 	}
// 	// return $data;
	
// });

//hasMany Inverse
// Route::get('eloquent/{id}',function($id){
// 	$cat = Cat::find($id);
// 	//$post = Post::all();
// 	echo $cat->name;
// 	foreach ($cat->posts as $post) {
// 		echo $post->name;
// 	}
// });



use App\Book;
use App\Author;
use App\City;
use App\Stuff;
use App\Role;
//one to many
Route::get('author/{id}/book',function($id){
	$author = Author::find($id);
	//echo $author->name;
	foreach ($author->books as $book) {
		echo $book->name;
		echo "<br>";
	}
});
//one to one
Route::get('author/{id}/city',function($id){
	$author = Author::find($id);
	echo $author->name."<br>";
	echo $author->city->name;

});

//many to many
Route::get('stuff/{id}/role',function($id){
	$stuff = Stuff::find($id);
	foreach ($stuff->role as $role) {
		echo $role->rank."<br>";
	}
});

Route::get('role/{id}/stuff',function($id){
	$role = Role::find($id);
	foreach ($role->stuffs as $stuff) {
		echo $stuff->name."<br>";
	}
		
});

//has many through
use App\Town;
Route::get('town/{id}/post',function($id){
	$town = Town::find($id);
	//echo $town->name;
	foreach($town->blogs as $blog){
		echo $blog->title."<br>";
	}
});