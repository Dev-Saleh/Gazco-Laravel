<?php
use Intervention\Image\Facades\Image;
define('PAGINATION_COUNT', 3);


function uploadImage($folder,$image)
 {
    $image->store('/', $folder);
    $filename = $image->hashName();
   
    return  $filename;
 }
function uploadImageAndResize($folder,$image,$width='300',$height='300')
 {
    $image->store('/', $folder);
    $filename = $image->hashName();
    Image::make(public_Path('assets/images/citizens/'.$filename))->resize($width, $height)->save();
    return  $filename;
 }
 function saveImage($photo,$folder)
 {
    //save photo in folder
    $fileExtension = $photo -> getClientOriginalExtension();
    $fileName = time().'.'.$fileExtension;
    $path = $folder;
    $photo -> move($path,$fileName);
    Image::make(public_Path('assets/images/citizens/'.$fileName))->resize(220, 190)->save();
                   
    return $fileName;
 }
