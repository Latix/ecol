<?php
require_once('../core/fetch.php');
require_once('libs/adminOpt.php');

if(isset($_SESSION['admin_id'])){
    if(isset($_POST['delete'])){
        $id = $_POST['id'];
        if($conn->query("DELETE FROM products WHERE prodId=$id")){
            $msg       = "Product Deleted";
            $type_stat = 'success';
        }else{
            $msg       = "Error Deleting Product";
            $type_stat = 'error';
         }
    }
    $list = $conn->query("SELECT * FROM products WHERE prodDelete != 1");
}elseif(isset($_SESSION['seller_id'])){
    $list = $conn->query("SELECT * FROM products WHERE shopId=$id AND prodDelete != 1");
}else{
    header("Locaion: ../");
    exit();
}

if(isset($_POST['updateQty'])){
  $qty = $_POST['qty'];
  $updateProduct = mysqli_query($conn,"UPDATE `products` SET `prodQuantity`='$qty' WHERE prodId='".$_POST['id']."'");
  header("Location: viewProducts");
}
if(isset($_POST['deleteProd'])){
  $deleteProduct = mysqli_query($conn,"UPDATE `products` SET `prodDelete`='1' WHERE prodId='".$_POST['id']."'");
  //header("Location: viewProducts");
}

?>
<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <?php include 'libs/head.php'; ?>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.php -->
    <?php
         include('libs/navTopBar.php');
    ?>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.php -->
      <?php include('libs/navTopBarRight.php') ?>
      <!-- partial -->
      <!-- partial:partials/_sidebar.php -->
      <?php include('libs/sideBar.php'); ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Data table</h4>
              <div class="row">
                <div class="col-12">
                  <table id="order-listing" class="table table-responsive" cellspacing="0">
                    <thead>
                      <tr>
                          <th>Product Id</th>
                          <th>Product Name</th>
                          <th>Shop type</th>
                          <th>Category</th>
                          <th>Sub Category</th>
                          <th>Price</th>
                          <th>Availability</th>
                          <th>Product Quantity</th>
                          <th>Update Quantity</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach ($list as $product):
                                if(! is_null($product['subCategory'])){
                                    $subCategory = $conn->query("SELECT * FROM subcategory WHERE id=".$product['subCategory'])->fetch_assoc();
                                    $category = $conn->query("SELECT * FROM category WHERE id=".$subCategory['parentId'])->fetch_assoc();
                                }
                                if(is_null($product['prodNewPrice'])){
                                    $price = $product['prodOldPrice'];
                                }else{ $price = $product['prodNewPrice']; }
                        ?>
                        <tr>
                            <td><?= $product['prodId'] ?></td>
                            <td><?= $product['prodName'] ?></td>
                            <td><?php if(is_null($product['shopId'])){ echo 'admin'; }else{ echo $conn->query("SELECT position FROM users WHERE userId=".$product['shopId'])->fetch_assoc()['position']; } ?></td>
                            <?php if (is_null($product['subCategory'])): ?>
                                <td>Null</td>
                                <td>Null</td>
                            <?php else: ?>
                                <td><?= $category['catName'] ?></td>
                                <td><?= $subCategory['subName'] ?></td>
                            <?php endif; ?>
                            <td>₦<?= number_format($price); ?></td>
                            <?php

                            if($product['prodQuantity'] <= 0){
                              $stock  = "Out Of Stock";
                            }
                            if($product['prodQuantity'] > 0){
                              $stock  = "InStock";
                            } ?>
                            <td class="text text-<?= ($product['prodQuantity'] <= 0) ? 'danger' : 'success'; ?>"><i><b><?= $stock ?></b></i></td>
                            <form action="viewProducts" class="" method="post">
                              <input type="hidden" readonly name="id" value="<?= $product['prodId'] ?>">
                              <td><input type="number" name="qty" type="text" class="form-control" value="<?= $product['prodQuantity'] ?>"></td>
                              <td><button type="submit" name="updateQty" class="p-2 btn btn-outline-primary btn-sm">Update Qty</button></td>
                              <td><a href="editProduct?prodId=<?= $product['prodId']; ?>"><button type="button" class="p-2 btn btn-outline-dark btn-sm">Edit</button></a></td>
                              <td><button type="submit" name="deleteProd" class="p-2 btn btn-outline-primary btn-sm">Delete</button> </td>
                            </form>
                        </tr>
                        <?php $i++; endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.php -->
        <?php include('libs/footer.php'); ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="node_modules/datatables.net/js/jquery.dataTables.js"></script>
  <script src="node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/misc.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/data-table.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
