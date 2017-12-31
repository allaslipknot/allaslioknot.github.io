<?php


function processImage($post , $file , $dir , $size_limit)
{
    if(isset($post["submit"])) {

        if( isFile($file) &&
            isFileAlreadyExiste($file , $dir) &&
            checkSize($file , $size_limit) &&
            checkType($file , $dir))
        {
            return true;
        }
        return false;
    }
    return false;
}

function isFile($file)
{
    $check = getimagesize($file["img"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        return true;
    } else {
        //echo "File is not an image.";
        return false;
    }
}

function isFileAlreadyExiste($file , $dir)
{
    if (file_exists($dir . basename($file["img"]["name"]))) {
        //echo "Sorry, file already exists.";
        return false;
    }
    return true;
}

function checkSize($file , $limit)
{
    if ($file["img"]["size"] > $limit) {
        //echo "Sorry, your file is too large.";
        return false;
    }
    return true;
}

function checkType($file , $dir)
{
    $type = strtolower(pathinfo($dir . basename($file["img"]["name"]),PATHINFO_EXTENSION));
    if($type != "jpg" && $type != "png" && $type != "jpeg" && $type != "gif" ) {
        //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        return false;
    }
    return true;
}

function getFileName($file , $dir)
{
    return $dir . basename($file["img"]["name"]);
}

function moveFile($file , $target){
    if (move_uploaded_file($file["img"]["tmp_name"], $target)) {
        //echo "upload OK! url : http://site.com/". $target ;
        return "http://site.com/". $target;
    } else {
        //echo "Sorry, there was an error uploading your file.";
        return '';
    }
}
