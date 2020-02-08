<?php
require_once('../../core/fetch.php');
require_once('../libs/adminOpt.php');
require_once('../../core/property.php');

$property 	 = new Property();

if (isset($_SESSION['admin_id'])){
	if (isset($_POST['firstName'])) {
			if ($conn->query("SELECT * FROM users WHERE email='".$_POST['email']."'")->num_rows > 0) {
				echo "exist";
			} else {
						$values = [
		            'firstName' 		=> $_POST['firstName'],
		            'lastName' 			=> $_POST['lastName'],
		            'email' 			=> $_POST['email'],
		            'accountType' 		=> 'AD',
		            'password' 		    => md5($_POST['password']),
		        ];

		        if ($_POST['password'] !== $_POST['retype-password']) {
		        	echo "mismatch"; exit;
		        }
		        
		        if ($property->newData('users', $values)){
		            echo "success";
		        }else{
		          echo "error";
		        }
			}
		
		} 
	} else{
	echo "error";
}
?>
