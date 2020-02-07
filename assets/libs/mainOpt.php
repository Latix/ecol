<?php
include './core/config/initialize.php';
$sesEmail   = "";
$uid        = "";
$school     = "";

function datetimeToText (string $datetime, string $format="fulldate") : string
	{
		$unixdatetime   = strtotime($datetime);
		$dateFormat     = "";
		switch (strtolower($format))
		{
			case 'fulldate':
				$dateFormat = "%d %B, %Y at %I:%M %p";
				break;
			case 'date':
				$dateFormat = "%m/%d/%Y";
				break;
			case 'mysql-date':
				$dateFormat = "%m-%d-%Y";
				break;
			case 'customd':
				$dateFormat = "%d %B. %Y";
				break;
			case 'customdate':
				$dateFormat = "%d %b. %Y";
				break;
			case 'customdated':
				$dateFormat = "%d %b %Y";
				break;
			case 'monthyear':
				$dateFormat = "%b. %Y";
				break;
			case 'time':
				$dateFormat = "%I:%M %p";
				break;
			case 'datetime':
				$dateFormat = "%m/%d/%Y %H:%M:%S %p";
				break;
			case 'datefm':
				$dateFormat = "%d/%m/%Y";
				break;
			case 'datefms':
				$dateFormat = "%d-%m-%Y";
				break;
			case 'datef':
				$dateFormat = "%d/%m/%Y %H:%M:%S %p";
				break;
			case 'mysql-datetime':
				$dateFormat = "%m-%d-%Y %H:%M:%S";
				break;
			case 'word-datetime':
				$dateFormat = "%a %d %b %I:%M %p";
				break;
			case 'word-date':
				$dateFormat = "%d %b %Y";
				break;
			case 'fullday':
				$dateFormat = "%A";
				break;
			case 'day':
				$dateFormat = "%a";
				break;
			default:
				$dateFormat = "%B %d, %Y at %I:%M %p";
				break;
		}
		return strftime($dateFormat, $unixdatetime);
	}
 
 function GenerateSerial() {
    $chars = array(0,1,2,3,4,5,6,7,8,9,'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
    $sn = '';
    $max = count($chars)-1;
    for($i=0;$i<5;$i++){
     $sn .= (!($i % 5) && $i ? '-' : '').$chars[rand(0, $max)];
      }
    return $sn;
}
 
function custom_echo($x, $length)
{
  if(strlen($x)<=$length)
  {
    echo $x;
  }
  else
  {
    $y=substr($x,0,$length) . '...';
    echo $y;
  }
}

if (isset($_SESSION["user_id"])) {
    $uid      = $_SESSION['user_id'];
    $sesEmail = $_SESSION['user_email'];
}


if (isset($_GET["action"])) {
	if ($_GET["action"] == "addWish") {
    $prodId = $_GET['Id'];

    $wish  = $conn->query("SELECT * FROM wishlist WHERE prodId='$prodId' AND userId='$uid'")->num_rows;
   if($wish > 0) {
     $msg 				= 'Product already added to wishlist!';
     $type_stat  = 'info';
   }else{
     $query = mysqli_query($conn,"INSERT INTO `wishlist`(`prodId`, `userId`) VALUES ('$prodId','$uid')");
     if ($query) {
       # code...
        $msg 				= 'Added To Wishlist!';
     		$type_stat  = 'success';
     }
   }
	}
}

if (isset($_GET["action"])) {
	if ($_GET["action"] == "deleteWish") {
    $wishId = $_GET['Id'];
    $query = mysqli_query($conn,"DELETE FROM `wishlist` WHERE wishId='$wishId'");
    if ($query) {
      $msg 				= 'Product removed Successfully!';
      $type_stat  = 'success';
    }
	}
}

$qty = "";
if(isset($_POST['update_cart'])){
  if(isset($_POST['qty']) || isset($_POST['cartId'])) {
    $qty = $_POST['qty'];
    $id  = $_POST['cartId'];
    $cart_sel = $conn->query("SELECT * FROM cart WHERE cartId='$id'")->fetch_assoc();
    $prevQuantity = $conn->query("SELECT * FROM products WHERE prodId=".$cart_sel['prodId'])->fetch_assoc();

    if ($qty <= $prevQuantity['prodQuantity']) {
      $updateCart = mysqli_query($conn,"UPDATE `cart` SET `cartQuantity`='$qty' WHERE cartId='".$_POST['cartId']."'");
      if ($updateCart) {
        $msg 			 = 'Cart Updated Successfully!';
        $type_stat = 'info';
      }
    } else {
        $msg 			 = 'Quantity Exceeded!';
        $type_stat = 'error';
    }
  } else {
        $msg 			 = 'Cart is empty!';
        $type_stat = 'error';
  }
}

if (isset($_GET["action"])) {
	if ($_GET["action"] == "addCart") {
      $rowsProduct = $conn->query("SELECT * FROM `products` WHERE prodId=".$_GET['Id'])->fetch_assoc();

      $name         = $rowsProduct['prodName'];
      $pic          = $rowsProduct['prodPicture1'];
      $price        = $rowsProduct['prodNewPrice'];
      $prodId       = $rowsProduct['prodId'];
      $prodQuantity = $rowsProduct['prodQuantity'];

    if ($prodQuantity > 0) {
      $selectCart  = $conn->query("SELECT * from cart WHERE prodId=".$_GET['Id'])->fetch_assoc();
      $oldQuantity = $selectCart['cartQuantity'];
    } else {
      $oldQuantity = 0;
      $msg 		 	 = 'Out Of Stock!';
      $type_stat = 'error';
    }

    $newQuantity = $_GET['qty'] ?? 1;

    if ($oldQuantity > 0) {
        $newQuantity += $oldQuantity;
        if ($newQuantity <= $prodQuantity) {
            $query       = mysqli_query($conn,"UPDATE `cart` SET cartQuantity='$newQuantity' WHERE prodId=".$_GET['Id']);
        if ($query) {
          $msg 			 = 'Cart updated!';
          $type_stat = 'info';
        }
        }else{
          $msg 			 = 'Quantity Exceeded!';
          $type_stat = 'error';
        }
    } else {
        $newQuantity += $oldQuantity;
        if ($newQuantity <= $prodQuantity) {
          $query       = mysqli_query($conn,"INSERT INTO `cart`(`cartItem`, `cartPic`, `cartPrice`, `cartQuantity`, `userId`, `prodId`) VALUES ('$name','$pic','$price','$newQuantity','$uid','$prodId')");
          if ($query) {
            $msg 			 = 'Product added to cart!';
            $type_stat = 'success';
          }
        } else {
            $msg 			 = 'Quantity Exceeded!';
            $type_stat = 'error';
        }
      }
   }
 }

if (isset($_GET["action"])) {
	if ($_GET["action"] == "deleteCart") {
    $cartId = $_GET['cartId'];
    $query = mysqli_query($conn,"DELETE FROM `cart` WHERE cartId='$cartId'");
    if ($query) {
      $msg 			 = 'Product removed from cart!';
      $type_stat = 'error';
    }
	}
}

if(isset($_GET['action'])) { // if id is set then get the file with the id from database
if ($_GET['action'] == "download") {
  // code...

  $id = $_GET['Id'];

  $query = "SELECT bookName, bookFileType, size, book_content FROM products WHERE prodId = '$id'";

  $result = mysqli_query($conn,$query) or die('Error, query failed');

  list($name, $type, $size, $content) = mysqli_fetch_array($result);

  header("Content-length: $size");

  header("Content-type: $type");

  header("Content-Disposition: attachment; filename=$name");
  ob_clean();
  flush();
  echo $content;
   exit;

}

}

if(isset($_POST['submitComment'])){
  $comment = $_POST['comment'];
  $prodId = $_GET['Id'];
  $star = $_GET['star'];
  $check_review = $conn->query("SELECT * FROM reviews WHERE userId='".$_SESSION["user_id"]."'");
  if (mysqli_num_rows($check_review) <= 0) :
  $query = mysqli_query($conn,"INSERT INTO `reviews`(`comment`, `star`, `prodId`, `userId`) VALUES ('$comment','$star','$prodId','$uid')");
  else:
    $msg 			 = 'Already reviewed!';
    $type_stat = 'info';
    $query = FALSE;
  endif;
  if($query){
    $msg 			 = 'Comment Added!';
    $type_stat = 'success';
  }else{
    $msg 			 = 'Comment Not Added!';
    $type_stat = 'error';
  }
}

if (isset($_POST['updateInfo'])) {
  // code...
  $updateInfo = mysqli_query($conn,"UPDATE `users` SET `firstName`='".$_POST['fName']."', `lastName`='".$_POST['lName']."',`phoneNumber`='".$_POST['phone']."' WHERE userId=".$_SESSION['user_id']);
  if ($updateInfo) {
    // code...
    $msg 			 = 'Update Success!';
    $type_stat = 'success';
  }else {
    // code...
    $msg 			 = 'Update Not Successful!';
    $type_stat = 'success';
  }
}

if(isset($_GET['action']) && $_GET['action'] == 'cartSess') {
    $product = $conn->query("SELECT * FROM products WHERE prodId=".$_GET["pId"])->fetch_assoc();
    $quantity = (isset($_GET['qty'])) ? $_GET['qty'] : 1 ;
    if (isset($_SESSION["cart"])) {
    		$item_array_id = array_column($_SESSION["cart"], "prodId");
    		if (!in_array($_GET["pId"], $item_array_id)) {
    			$count = count($_SESSION["cart"]);
    			$item_array = array(
    				'prodId' => $_GET["pId"],
    				'shopId' => $product["shopId"],
    				'prodName' => $product["prodName"],
    				'prodPrice' => $product["prodNewPrice"],
    				'prodImage' => $product["prodPicture1"],
    				'prodQuantity' =>$quantity
    				);
    			$_SESSION["cart"][$count] = $item_array;
    			$msg 	   = 'Product added to cart';
                $type_stat = 'success';
    		}
    		else{
    			$msg 	   = 'Product already added to cart';
                $type_stat = 'error';
    		}
    	}
    	else{
    		$item_array = array(
    				'prodId' => $_GET["pId"],
    				'shopId' => $product["shopId"],
    				'prodName' => $product["prodName"],
    				'prodPrice' => $product["prodNewPrice"],
    				'prodImage' => $product["prodPicture1"],
    				'prodQuantity' =>$quantity
    				);
    		$_SESSION["cart"][0] = $item_array;
    		$msg 			 = 'Product added to cart';
            $type_stat = 'success';
	}
}

if (isset($_GET["action"])) {
	if ($_GET["action"] == "deleteCart") {
		foreach ($_SESSION["cart"] as $keys => $values) {
			if($values["prodId"] == $_GET["prodId"]){
				unset($_SESSION["cart"][$keys]);
				$msg       = 'Product has been removed';
                $type_stat = 'error';
			}
		}
	}
}

// if (isset($_GET["action"])) {
// 	if ($_GET["action"] == "deleteAll") {

// 				unset($_SESSION["cart"]);
// 				$dropSide = "dropSide";
// 				$dropColor = "#D8000C";
//                 $dropBack = "#FFBABA";
// 			    $cartStat = "Cart is Empty";

// 	}
// }
?>
