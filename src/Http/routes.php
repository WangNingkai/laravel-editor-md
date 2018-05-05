<?php

if(config('editor.example')){
    Route::get('laravel-editor-md/example', function () {
        return view('editor::example');
    });
}
Route::post('laravel-editor-md/upload/picture', 'WangNingkai\Editor\Http\Controllers\MarkdownEditorController@postUploadMarkdownEditorPicture');