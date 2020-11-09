<?php

use App\Models\Photo;
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

Route::get('/delete', function () {
    $staff = Staff::find(1);
     $staff->photos()->whereId(1)->delete();
});

Route::get('/assign',function (){
    $staff = Staff::findOrFail(1);
    $photo = Photo::findOrFail(6);

    $staff->photos()->save($photo);
});

Route::get('/un-assign',function (){
    $staff = Staff::findOrFail(1);

    $staff->photos()->whereId(6)->update(['imageable_id'=> 0,'imageable_type'=>'']);

});
