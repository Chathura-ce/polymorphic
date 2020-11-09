<?php

use App\Models\Staff;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function () {
    $staff = Staff::find(1);
    $staff->photos()->create(['path' => 'example.jpg']);
});

Route::get('/read', function () {
    $staff = Staff::find(1);
    foreach ($staff->photos as $photo)
        echo $photo->path;
});

Route::get('/update', function () {
    $staff = Staff::find(1);
    $photo = $staff->photos()->whereId(1)->first();
    $photo->path = 'changed.jpg';
    $photo->save();
});
