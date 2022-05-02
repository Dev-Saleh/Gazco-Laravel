<?php

define('PAGINATION_COUNT', 3);


function uploadImage($folder,$image){
    $image->store('/', $folder);
   // $imageResize=Image::make($image->getRealPath());
   // $imageResize->resize(300,300);
    $filename = $image->hashName();
    return  $filename;
 }
 function saveImage($photo,$folder){
    //save photo in folder
    $file_extension = $photo -> getClientOriginalExtension();
    $file_name = time().'.'.$file_extension;
    $path = $folder;
    $photo -> move($path,$file_name);
    return $file_name;
}
