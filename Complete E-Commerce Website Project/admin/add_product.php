<?php
  require_once("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="Description" content="Enter your description here" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="style.css">
  <title>Add Product</title>
</head>

<body>
  <div class="container-fluid">
    <div class="left">
      <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px; height:100vh">
        <a href="../user/index.php" target="_blank"  class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
         
          <span class="fs-4">Shimmer Shop</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
        
          <li>
            <a href="products.php" class="nav-link link-dark">
           
              Products
            </a>
          </li>
          <li>
            <a href="#" class="nav-link active">
           
              Add Product
            </a>
          </li>
          <li>
            <a href="recommend_products.php" class="nav-link link-dark">
           
              Recommend Products
            </a>
          </li>
          <li>
            <a href="add_recommend_product.php" class="nav-link link-dark">
           
              Add Recommend Product
            </a>
          </li>
      
          <li>
            <a href="admin_profile.php" class="nav-link link-dark">
          
              Admin Profile
            </a>
          </li>
          <li>
            <a href="customers.php" class="nav-link link-dark">
          
              Users
            </a>
          </li>
        </ul>
      
      
      </div>
    </div>


    <div class="right">
      <div class="container">
        <table class="table text-center display-5">
          <tr>
            <th>Add Product</th>
          </tr>
        </table>
        <form method="post" enctype="multipart/form-data">
          <h4>Product Name : </h4><input type="text" class="form-control" placeholder="Product Name" name="p_name" required><br>
          <h4>Product Price : </h4><input type="number" class="form-control" placeholder="Product Price" name="p_price" maxlength="3" required><br>
          <h4>Product Description : </h4><input type="text" class="form-control" placeholder="Product Description" name="p_description" required><br>
          <h4>Product Image : </h4><input type="file" class="form-control" name="p_img" required accept="./images*"><br>
                <input type="submit" value="Add Product" name="add_btn" class="col-lg-12 col-md-12 col-sm-12 col-xl-12 p-2 btn-success">
        </form>
<?php
if(isset($_POST['add_btn'])){
  $p_name=$_POST['p_name'];
  $p_price=$_POST['p_price'];
  $p_description=$_POST['p_description'];
  $p_img=$_FILES['p_img']['name'];
  $p_img_tmp=$_FILES['p_img']['tmp_name'];
  move_uploaded_file($p_img_tmp , './images/' . $p_img);


$obj->Add_Product($p_name,$p_price,$p_description,$p_img);
if($obj){
  echo "<script>alert('Product Added to your Website Successfully ! ')</script>";
     echo "<script>window.location.href='products.php'</script>";
}
else{
  echo "ERROR TRY AGAIN ! ";

}

}
?>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>