<?php

Route::get('/', 'EntriesController@index');
Route::post('/', 'EntriesController@store');

Route::get('/enter', 'EntriesController@create');

Route::get('/faqs', function () {
	return view('faqs');
});

Route::get('/terms', function () {
	return view('terms');
});