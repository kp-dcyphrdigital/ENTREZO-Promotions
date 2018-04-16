<?php

Route::get('/', 'EntriesController@create');
Route::post('/', 'EntriesController@store');
