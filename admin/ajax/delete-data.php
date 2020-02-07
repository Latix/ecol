<?php
require_once('../../core/fetch.php');
require_once('../libs/adminOpt.php');
require_once('../../core/property.php');

$property 	 = new Property();

if(isset($_POST['propertyID'])) {
	$values = ['id' => $_POST['propertyID']];
	$images = $conn->query('SELECT * FROM property WHERE id='.$_POST['propertyID'])->fetch_assoc();

	for ($i = 1; $i <= 3; $i++) {
		if (isset($images['picture'.$i]) || $images['picture'.$i] != '' || $images['picture'.$i] != NULL) {
            $img_arr = explode("assets/",$images['picture'.($i)]);
            $new_img = "../../assets/".$img_arr[1];
            deletFile($new_img);
        }
	}

	if($property->deleteData('property', $values)) {
		echo "success";
	} else {
		echo "error";
	}
}

?>