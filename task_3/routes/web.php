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

Route::get('/', function () {
    return view('welcome');
    });

Route::get('/about','ArticlesController@show');

Route::get('/articles', function () {
        $query = App\Article::all();
        return $query;
    });
Route::get('/articles/ubah', function () {
    $post = App\Article::find(1);
    $post->title = "Ciri Keluarga Sakinah";
    $post->save();
    return $post;
    });
Route::get('/articles/hapus', function () {
        $post = App\Article::find(1);
        $post->delete();
        return $post;
        });
Route::get('/articles/tambah', function () {
    $post = new App\Article;
    $post->title = "7 Amalan Pembuka Jodoh";
    $post->content = "shalat malam, sedekah, puasa sunah, silaturahmi, senyum, doa, tobat";
    $post->writer = "erwan";
    $post->save();
    return $post;   
    });
Route::group(['prefix'=>'admin', 'middleware'=>['auth']], function () {
        // Route diisi disini...
        Route::resource('authors', 'AuthorsController');
        });


Auth::routes();

Route::get('/home', 'HomeController@index');
