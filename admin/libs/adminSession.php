<?php
require '../connect.php';
if(isset($_SESSION['admin_name'])){
  $name = $_SESSION['admin_name'];
  $position = $_SESSION['type'];
}
elseif (isset($_SESSION['student_name'])) {
  # code...
  $name = $_SESSION['student_name'];
   $position = $_SESSION['type'];

}
elseif (isset($_SESSION['lecturer_name'])) {
  $name = $_SESSION['lecturer_name'];
  $position = $_SESSION['type'];
}
elseif (isset($_SESSION['retailer_name'])) {
  $name = $_SESSION['retailer_name'];
  $position = $_SESSION['type'];
}
elseif (isset($_SESSION['wholeseller_name'])) {
  $name = $_SESSION['wholeseller_name'];
  $position = $_SESSION['type'];
}
else {
# code...
header("Location: ../index.php");
}
if ($position == "super" || $position == "sub") {
  # code...
  $link2 = "SELECT * FROM `admin` WHERE adminUsername = '$name' AND adminStatus = '$position'";
  $query2 = mysqli_query($db,$link2);
  while ($rows = mysqli_fetch_assoc($query2)) {
    # code...
    $_SESSION['admin_id'] = $rows['adminId'];
  }
}
else{
$link2 = "SELECT * FROM `users` WHERE email = '$name' AND position = '$position'";
$query2 = mysqli_query($db,$link2);
while ($rows = mysqli_fetch_assoc($query2)) {
  # code...
  $_SESSION['student_id'] = $rows['userId'];
  $_SESSION['lecturer_id'] = $rows['userId'];
  $_SESSION['retailer_id'] = $rows['userId'];
  $_SESSION['wholesaler_id'] = $rows['userId'];
 }
}

if(isset($_SESSION['admin_id'])){
  $uid = 43;
}
elseif (isset($_SESSION['student_id'])) {
  $uid = $_SESSION['student_id'];
}
elseif (isset($_SESSION['lecturer_id'])) {
  $uid = $_SESSION['lecturer_id'];
}
elseif (isset($_SESSION['retailer_id'])) {
  $uid = $_SESSION['retailer_id'];
}
elseif (isset($_SESSION['wholesaler_id'])) {
  $uid = $_SESSION['wholesaler_id'];
}
else {
# code...
$uid = "";
}
?>
