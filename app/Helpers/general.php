<?php

define('PAGINATION_COUNT', 10);


function uploadImage($folder,$image){
    $image->store('/', $folder);
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
