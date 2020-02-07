<?php
require_once('./assets/libs/mail/mail.php');
// SignUp ------------------------------------------//
if (isset($_POST['register'])) {
$hostName       = $_SERVER['HTTP_HOST'];
$fName          = $_POST["firstName"];
$lName          = $_POST["lastName"];
$username       = $_POST["username"];
$email          = $_POST["email"];
$phone          = $_POST["phone"];
$password       = md5($_POST["password"]);
$retypePassword = md5($_POST["retypePassword"]);
$gender         = $_POST["gender"];
$position       = $_POST["position"];
$accName		= $_POST["accName"] ?? "";
$accBank		= $_POST["accBank"] ?? "";
$accNo			= $_POST["accNo"] ?? "";
$str 		    = "0123456789qwertzuioplkjhgfdsayxcvbnm";
$str 		    = str_shuffle($str);
$unique_ref     = md5(substr($str, 0, 10));

if (isset($_GET['code'])) {
    $old_ref_count  = $conn->query("SELECT * FROM users WHERE ref_code='".$_GET['code']."'");
    foreach ($old_ref_count as $ref) {
        $count          =  $ref['ref_count'];
        $newRefCount    = $count + 1;
        $conn->query("UPDATE `users` SET `ref_count`='$newRefCount' WHERE ref_code='".$_GET['code']."'");
    }
} else {
    $refCount       = 0;
}
if ($password === $retypePassword){
    $link    = "INSERT INTO `users`(`firstName`, `lastName`, `shopName`, `email`, `phoneNumber`, `password`, `accName`, `accBank`, `accNo`, `gender`,`position`, `ref_code`, `ref_count`) VALUES ('$fName','$lName','$username','$email','$phone','$password','$accName','$accBank','$accNo','$gender','$position', '$unique_ref', '0')";
    $link2   = "SELECT `email` FROM `users` WHERE email='$email'";

$query2  = mysqli_query($conn,$link2);

if (mysqli_num_rows($query2) != 0) {
		$msg 			 = 'User Already Exists';
		$type_stat = 'error';
 }
else {
        $messageObj             = (object) [];
        $messageObj->url 		= "https://".$hostName."/my-account?code=$unique_ref";
        $messageObj->subject    = "New Registration";
        $messageObj->name       = ucfirst($fName).' '.ucfirst($lName);
        $messageObj->email      = $email;
        
        if ((new Mail)->welcome($messageObj) && $conn->query($link) ) {
    		$msg 		= 'Registration Successful!';
    		$type_stat  = 'success';
        } else {
    		$msg 		= 'Registration Unsuccessful!';
    		$type_stat  = 'error';
        }

   }
}
else {
			$msg 			 = 'Passwords do not match';
			$type_stat = 'error';
 }
}

?>
