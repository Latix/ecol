<?php
require_once('../../core/fetch.php');
require_once('../libs/adminOpt.php');
require_once('../../core/property.php');
require_once('../../core/upload-image.php');

$property 	 = new Property();
$uploadImage = new UploadImage();

if (isset($_POST['title'])){
  if (isset($_SESSION['admin_id'])){
        $price 	  = (float) str_replace(',', '', $_POST['price']);
        // $features = (isset($_POST['features'])) ? implode(", ", $_POST['features']) : '';

        $values = [
            'title' 			=> $_POST['title'],
            'price' 			=> $price,
            'description' 		=> $_POST['description'],
            'location' 		    => $_POST['location'],
            'address' 		    => $_POST['address'],
            'propertyType' 		=> $_POST['property_type'],
            'status' 		    => $_POST['status'],
            'beds' 		    	=> $_POST['beds'] ?? 0,
            'baths' 		    => $_POST['baths'] ?? 0,
            'area' 		   	    => $_POST['area'],
            'garages' 		   	=> $_POST['garages'],
            'features'			=> $_POST['features']
        ];

        for ($a=0;$a< count($_FILES['img']['name']);$a++){
            if ($_FILES['img']['error'][$a] == 0){ $values["picture".($a+1).""] = $uploadImage->upload([
                'name'=>$_FILES['img']['name'][$a],
                'type'=>$_FILES['img']['type'][$a],
                'tmp_name'=>$_FILES['img']['tmp_name'][$a],
                'error'=>$_FILES['img']['error'][$a],
                'size'=>$_FILES['img']['size'][$a]
            ]); }
        }

        if ($property->newData('property', $values)){
            $msg       = "Property Added";
            $type_stat = 'success';
            echo "success";
        }else{ 
          $msg       = "Property failed to add";
          $type_stat = 'error';
          echo "error";
         }
  }else{
    $msg = "Error";
    $type_stat = 'error';
    echo "error";
  }
}
?>