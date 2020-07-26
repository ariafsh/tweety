<?php

use Illuminate\Support\Facades\Route;

Auth::routes();


Route::get('register', 'PagesController@register')->name('register');

Route::get('login', 'PagesController@login')->name('login');

Route::get('profile', 'PagesController@profile')->name('profile');

Route::get('tweet', 'TweetController@create')->name('create.tweet');

Route::post('tweet/save', 'TweetController@save')->name('save.tweet');

Route::get('/', 'TweetController@show')->name('show.tweet');

Route::get('{slug}', 'CommentController@show')->name('show.comment');

Route::post('save', 'CommentController@save')->name('save.comment');

Route::post('delete', 'TweetController@delete')->name('delete.tweet');
