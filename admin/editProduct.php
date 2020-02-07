<?php
require_once('../core/fetch.php');
require_once('libs/adminOpt.php');
require_once('../core/products.php');
require_once('../core/upload-image.php');

$product = new Product();
$uploadImage = new UploadImage();

function deletFile ($file) {
    if (file_exists($file)) {
        unlink($file);
        return true;
      } else {
        return false;
   }
}
if (isset($_GET['prodId'])) {
    if (isset($_SESSION['seller_id'])) {
        $product = mysqli_query($conn, "SELECT * FROM products WHERE shopId='".$_SESSION['seller_id']."' AND prodId=".$_GET['prodId']);
    } else{
        $product = mysqli_query($conn, "SELECT * FROM products WHERE prodId=".$_GET['prodId']);
    }
    if (isset($_POST['upload'])){
      if (isset($_SESSION['seller_id']) || isset($_SESSION['admin_id'])){
          $_POST['oldPrice'] = (float) str_replace(',', '', $_POST['oldPrice']);
          $_POST['newPrice'] = (float) str_replace(',', '', $_POST['newPrice']);
          $cat = str_shuffle($_POST['name']);
          $sku = substr(rand(1000,9999).$cat, 0, 8);
            $values = [
                'prodName'=>$_POST['name'],
                'categoryId'=>$_POST['category'],
                'subCategory'=>$_POST['sub_category'],
                'brandID'=>$_POST['brand'],
                'prodQuantity'=>$_POST['quantity'],
                'description'=>$_POST['description'],
                'specification'=>$_POST['specification'],
                'prodOldPrice'=>$_POST['oldPrice'],
                'prodNewPrice'=>$_POST['newPrice']
            ];
            
            if (isset($_SESSION['admin_id'])){ $values['adminPost'] = $id; }else{ $values['shopId'] = $id; }
    
            for ($a=0;$a<6;$a++){
                if ($_FILES['img']['error'][$a] == 0){ $values["prodPicture".($a+1).""] = $uploadImage->upload([
                    'name'=>$_FILES['img']['name'][$a],
                    'type'=>$_FILES['img']['type'][$a],
                    'tmp_name'=>$_FILES['img']['tmp_name'][$a],
                    'error'=>$_FILES['img']['error'][$a],
                    'size'=>$_FILES['img']['size'][$a]
                ]); }
                if (isset($_FILES['img']['name'][$a]) || $_FILES['img']['name'][$a] != '') {
                    $img_arr = explode(".com.ng",$_POST['img_file'.($a+1)]);
                    $new_img = "..".$img_arr[1];
                    deletFile($new_img);
                }
            }
                if ($values["prodPicture1"] != '') {
                    $updateProduct = $conn->query("UPDATE `products` SET `prodName`='".$_POST['name']."',`prodPicture1`='".$values['prodPicture1']."',`prodPicture2`='".$values['prodPicture2']."',`prodPicture3`='".$values['prodPicture3']."',`prodPicture4`='".$values['prodPicture4']."',`prodPicture5`='".$values['prodPicture5']."',`prodPicture6`='".$values['prodPicture6']."', `prodQuantity`='".$_POST['quantity']."',`prodOldPrice`='".$_POST['oldPrice']."',`prodNewPrice`='".$_POST['newPrice']."',`description`='".$_POST['description']."',`categoryId`='".$_POST['category']."',`subCategory`='".$_POST['sub_category']."',`specification`='".$_POST['specification']."' WHERE prodId=".$_GET['prodId']);
                } else{
                    $updateProduct = $conn->query("UPDATE `products` SET `prodName`='".$_POST['name']."', `prodQuantity`='".$_POST['quantity']."',`prodOldPrice`='".$_POST['oldPrice']."',`prodNewPrice`='".$_POST['newPrice']."',`description`='".$_POST['description']."',`categoryId`='".$_POST['category']."',`subCategory`='".$_POST['sub_category']."',`brandID`='".$_POST['brand']."',`specification`='".$_POST['specification']."' WHERE prodId=".$_GET['prodId']);
                }
                
            if ($updateProduct){
                header("Refresh:0");
                $msg       = "Product Updated";
                $type_stat = 'success';
            }else{
              $msg       = "Product failed to update";
              $type_stat = 'error';
             }
      }else{
        $msg = "Error";
        $type_stat = 'error';
      }
    }
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
    <!-- partial:partials/_navbar.html -->
    <?php
          include('libs/navTopBar.php');
    ?>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <?php include('libs/navTopBarRight.php') ?>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <?php include('libs/sideBar.php'); ?>
      <!-- partial -->
      <!-- partial -->

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
           <!-- Begin -->
            <div id="prodForm" class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Product </h4>
                  <p><b>Note: Product Images should not be more than 10mb and should have a recommended size of 220 by 220.</b></p>
                  <?php
                      foreach($product as $product) {
                  ?>
                  <form class="forms-sample" action="" method="post" enctype="multipart/form-data" >
                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text" class="form-control" name="name" placeholder="Name" value="<?= $product['prodName'] ?? ''; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Old Price</label>
                      <input type="text" class="form-control" name="oldPrice" placeholder="Old Price" value="<?= $product['prodOldPrice'] ?? ''; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">New Price</label>
                      <input type="text" class="form-control" name="newPrice" placeholder="New Price" value="<?= $product['prodNewPrice'] ?? ''; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <select class="form-control" name="category" id="category" required>
                            <?php foreach($conn->query("SELECT * FROM category") as $category) : ?>
                                <option value="<?= $category['id']; ?>" <?= ($category['id'] == $product['categoryId']) ? 'selected' : ''; ?>><?= $category['catName']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group" id="toggle_sub">
                        <label for="exampleInputName1">Sub Category</label>
                        <input type="hidden" value="<?= $product['subCategory'] ?? ''; ?>" id="subId" />
                        <select class="form-control" name="sub_category" id="sub-category" required>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputName1">Brand [Optional]</label>
                        <select class="form-control" name="brand" id="brand">
                            <option value="0">Select Brand</option>
                            <?php 
                                foreach ($conn->query("SELECT * FROM brands WHERE status=1") as $brand): 
                            ?>
                                <option value="<?= $brand['brandID']; ?>" <?= ($brand['brandID'] == $product['brandID']) ? 'selected' : ''; ?>><?= $brand['brandName']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                      <label for="quantity">Quantity</label>
                      <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity"  value="<?= $product['prodQuantity'] ?? ''; ?>" required>
                    </div>
                    <div class="form-group">
                      <label>File upload(1)</label>
                      <input type="file" name="img[]" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image" required>
                        <input type="hidden" name="img_file1" value="<?= $product['prodPicture1'] ?? ''; ?>" >
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>File upload(2)</label>
                      <input type="file" name="img[]" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <input type="hidden" name="img_file2" value="<?= $product['prodPicture2'] ?? ''; ?>" >
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>File upload(3)</label>
                      <input type="file" name="img[]" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <input type="hidden" name="img_file3" value="<?= $product['prodPicture3'] ?? ''; ?>" >
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>File upload(4)</label>
                      <input type="file" name="img[]" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <input type="hidden" name="img_file4" value="<?= $product['prodPicture4'] ?? ''; ?>" >
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>File upload(5)</label>
                      <input type="file" name="img[]" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <input type="hidden" name="img5" value="<?= $product['prodPicture5'] ?? ''; ?>" >
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>File upload(6)</label>
                      <input type="file" name="img[]" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <input type="hidden" name="img_file6" value="<?= $product['prodPicture6'] ?? ''; ?>" >
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="specification">Specification</label>
                      <textarea class="form-control" id="specification" name="specification" rows="5" value="<?= $product['specification'] ?? ''; ?>" required><?= $product['specification'] ?? ''; ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="description">Full Product Description</label>
                      <textarea id='tinyMceExample'  name="description" value="<?= $product['description'] ?? ''; ?>" required>
                      <?= html_entity_decode($product['description']) ?? ''; ?>
                      </textarea>
                      <!-- <textarea class="form-control" id="description" name="description" rows="8" required></textarea> -->
                    </div>
                    <button type="submit" name="upload" class="btn btn-success mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                  <?php } ?>
                </div>
              </div>
            </div>
            <!-- End -->
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
  <script src="node_modules/icheck/icheck.min.js"></script>
  <script src="node_modules/typeahead.js/dist/typeahead.bundle.min.js"></script>
  <script src="node_modules/select2/dist/js/select2.min.js"></script>

  <!-- Plugin js for this page-->
 <script src="node_modules/sweetalert/dist/sweetalert.min.js"></script>
 <script src="node_modules/jquery.avgrund/jquery.avgrund.min.js"></script>
 <!-- End plugin js for this page-->

  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/misc.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/file-upload.js"></script>
  <script src="js/iCheck.js"></script>
  <script src="js/typeahead.js"></script>
  <script src="js/select2.js"></script>

  <!-- Custom js for this page-->
 <script src="js/alerts.js"></script>
 <script src="js/avgrund.js"></script>
 <!-- End custom js for this page-->

 <script src="node_modules/summernote/dist/summernote-bs4.min.js"></script>
 <script src="node_modules/tinymce/tinymce.min.js"></script>
 <script src="node_modules/quill/dist/quill.min.js"></script>
 <script src="node_modules/simplemde/dist/simplemde.min.js"></script>
 <script src="js/editorDemo.js"></script>
<!-- End custom js for this page-->

<script>
$(document).ready(function () {
    var current_cat_id = $('#category').val();
    var sub_id = $('#subId').val();
       $.ajax({ method: "POST", url: "get_category.php", data: {cat_id: current_cat_id }})
        .done(function(data) { 
        var result = $.parseJSON(data);
        $.each(result, function(key,value){
            var select = (value.id == sub_id) ? 'selected' : '';
            $("#sub-category").append("<option value='"+value.id+"' "+select+" >"+value.subName+"</option>");
        });
    });
    $('#category').change(function(){
        var cat_id = $('#category').val();
        $('#sub-category').empty();
              $.ajax({ method: "POST", url: "get_category.php", data: {cat_id: cat_id }})
                .done(function(data) { 
                var result = $.parseJSON(data);
                $.each(result, function(key,value){
                    $("#sub-category").append("<option value='"+value.id+"'>"+value.subName+"</option>");
                });
        });
    });
});
</script>
</body>
</html>
