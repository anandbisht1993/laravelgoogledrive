<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('put', function() {
  //  dd(\Storage::cloud('main_google')->allFiles());
    $filename = md5(microtime()); // to make unique filename
$content = 'Lorem ipsum dolor sit amet...';
Storage::cloud('google')->put($filename.'.txt', $content);
//   Storage::cloud('main_google')->put('test.txt', 'Hello World');
    return 'File was saved to Google Drive';
});

Route::get('list', function() {
    $dir = '/';
    $recursive = false; // Get subdirectories also?
    $contents = collect(Storage::cloud('main_google')->listContents($dir, $recursive));
    //return $contents->where('type', '=', 'dir'); // directories
    return $contents->where('type', '=', 'file'); // files
});

