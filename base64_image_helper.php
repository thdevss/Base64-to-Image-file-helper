<?php
//base64 to image helper
//original : http://j-query.blogspot.in/2011/02/save-base64-encoded-canvas-image-to-png.html
//support multi ext
//thdevss, 2017/09/24

function saveFile($base64, $filename)
{
    //check ext
    $ext = explode("image/", $base64);
    $ext = explode(";", $ext[1]);
    $extension = $ext[0];
    $filename = $filename.'.'.$extension;
    
    $base64 = str_replace('base64,', '', $ext[1]);
	$base64 = str_replace(' ', '+', $base64);
    
    //save
    $decoded = base64_decode($base64);
    file_put_contents($filename, $decoded);

    return basename($filename);
}

function getExtension($base64) {
    $ext = explode("image/", $base64);
    $ext = explode(";", $ext[1]);
    return $ext[0];
}
