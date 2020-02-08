<?php
require_once('../../core/fetch.php');
require_once('../libs/adminOpt.php');
require_once('../../core/property.php');

$property 	 = new Property();

if (isset($_SESSION['admin_id'])){

		if (isset($_POST['type'])) {
			if ($_POST['type'] == 'block') {
					$values = [
		            'status' 		=> 0,
		            'lastUpdated' 	=> date('Y-m-d H:i:s')
		        ];

		        $cond = ['id' => $_POST['userID']];
		        
		        if ($property->updateData('users', $values, $cond)){
		            echo "success";
		        }else{
		          echo "error";
		        }
			} else {
					$values = [
		            'status' 		=> 1,
		            'lastUpdated' 	=> date('Y-m-d H:i:s')
		        ];

		        $cond = ['id' => $_POST['userID']];
		        
		        if ($property->updateData('users', $values, $cond)){
		            echo "success";
		        }else{
		          echo "error";
		        }
			}
			
		}

	}else{
		echo "error";
	}
?>
