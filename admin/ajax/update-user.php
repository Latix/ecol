<?php
require_once('../../core/fetch.php');
require_once('../libs/adminOpt.php');
require_once('../../core/property.php');

$property 	 = new Property();

if (isset($_SESSION['admin_id'])){
	if (isset($_POST['old-password']) && isset($_POST['new-password'])) {
		if ($_POST['old-password'] != '' && $_POST['new-password'] != '' && $_POST['retype-password'] != '') {
			if ($conn->query("SELECT * FROM users WHERE id='$id' AND password='".$_POST['old-password']."'")->num_rows == 0) {
				echo "invalid"; 
			} else {
				if ($_POST['new-password'] == '') {
					echo "empty"; 
				} else {
					if (($_POST['new-password'] !== $_POST['retype-password'])) {
						echo "mismatch"; 
					} else {
						$values = [
				            'password' 		=> $_POST['new-password'],
				            'lastUpdated' 	=> date('Y-m-d H:i:s'),
				        ];

				        $cond = ['id' => $id];
				        
				        if ($property->updateData('users', $values, $cond)){
				            echo "success"; 
				        }else{
				          echo "error";
				        }
					}
				}
			} 
		} else {
			echo "empty";
		}
	} 

	if (isset($_POST['firstName']) && isset($_POST['lastName'])) {
		$values = [
            'firstName' 		=> $_POST['firstName'],
            'lastName' 		    => $_POST['lastName'],
            'lastUpdated' 		=> date('Y-m-d H:i:s'),
        ];

        $cond = ['id' => $id];
        
        if ($property->updateData('users', $values, $cond)){
            echo "success";
        }else{
          echo "error";
         }
	}

}else{
	echo "error";
}


?>