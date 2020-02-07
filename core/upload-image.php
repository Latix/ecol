<?php
$includeInForm = 'enctype="multipart/form-data"';

class UploadImage extends Fetch{

    function upload($file, $location=''){
        $hostName           = $_SERVER['HTTP_HOST'];
        $protocol           = (stripos($_SERVER['SERVER_PROTOCOL'], 'https') === 0) ? "https://" : "http://";
        $targetDir          = 'images/property/'.$location;
        $word               = str_shuffle("abcmdefnsqwqwewrtypinasmxzhfdldzxbbn");
        $fileName           = $file['name'];
        $newName            = time().$word.$fileName;
        $file_tmp           = $file['tmp_name']; 
        $targetFile         = $targetDir. basename($newName);
        $imageFileType      = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        if(self::isImage($file) && self::validSize($file) && self::imageType($imageFileType)){
            if(self::fileExist($targetFile)){
                move_uploaded_file($file['tmp_name'], "../../assets/".$targetFile); 
            }
            return $protocol.$hostName."/assets/".$targetFile;
        }else{
            return false;
        }
    }

    function isImage($file){
        $check = getimagesize($file['tmp_name']);
        if($check !== false){
            return true;
        }else{ return false; }
    }

    function validSize($file){
        if($file['size'] > 10000000){
            return false;
        }else{ return true; }
    }

    function fileExist($targetFile){
        if(file_exists($targetFile)){
            return false;
        }else{ return true; }
    }

    function imageType($imageFileType){
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ){
            return false;
        }else{ return true; }
    }
    
    function imageResize($imageResourceId,$width,$height) {
        $targetWidth =200;
        $targetHeight =200;
    
        $targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
        imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);
    
        return $targetLayer;
    }
}
?>
