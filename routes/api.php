<?php

use Illuminate\Http\Request;

Route::get('notes/index', 'Api\V1\NotesController@index')->name('api.notes.index');
Route::post('notes/add', 'Api\V1\NotesController@add')->name('api.notes.add');
Route::post('notes/delete/{id}', 'Api\V1\NotesController@delete')->name('api.notes.delete');;
