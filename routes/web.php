<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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



Route::get('quiz', function () {
    return view('quiz.quiz');
});

Route::get('start', function () {
    return view('quiz.start');
});

// Route::get('ansDesk', function () {
//     return view('quiz.answer');
// });

Route::get('finish', function () {
    return view('quiz.end');
});


Route::get('list','TodoController@index');
Route::post('add-todo','TodoController@create');
Route::post('delete','TodoController@delete');
Route::post('update','TodoController@update');


Route::get("addmore","AddMoreController@addMore");
Route::post("addmore","AddMoreController@addMorePost");

// Route::get("form","FormController@viewForm");
Route::get('form', function () {
    return view('form.form');
});
Route::post("form","FormController@storeForm")->name('store');
Route::get("index","FormController@index");
Route::get("status","FormController@changeStatus")->name("change-status");
Route::get("download/{file}","FormController@download")->name("file-download");

Route::get("like-unlike","FormController@likeUnlike")->name("hit-like");


Route::post('add','QuestionController@addQuestion');
Route::get('question','QuestionController@show');
Route::post('update-ques','QuestionController@update');
Route::post('delete-ques','QuestionController@delete');
Route::any('startquiz','QuestionController@startQuiz');
Route::any('submitans','QuestionController@submitAns');







Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


