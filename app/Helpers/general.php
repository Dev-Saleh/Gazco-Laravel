<?php
use Intervention\Image\Facades\Image;
define('PAGINATION_COUNT', 3);


function uploadImage($folder,$image)
 {
    $image->store('/', $folder);
    $filename = $image->hashName();
    return  $filename;
 }
 function saveImage($photo,$folder)
 {
    //save photo in folder
    $fileExtension = $photo -> getClientOriginalExtension();
    $fileName = time().'.'.$fileExtension;
    $path = $folder;
    $photo -> move($path,$fileName);
    Image::make(public_Path('assets/images/citizens/'.$fileName))->fit(100, 100)->save();
                   
    return $fileName;
 }
