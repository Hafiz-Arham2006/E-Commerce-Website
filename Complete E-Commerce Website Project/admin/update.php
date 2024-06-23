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
  <title>EDIT PRODUCT</title>
</head>

<body>
  <div class="container-fluid">
    <div class="left">
      <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;height:100vh">
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
            <a href="add_product.php" class="nav-link link-dark">
           
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
            <th>Update Product</th>
          </tr>
        </table>
        <?php
        $id = $_GET['id'];
        $ans = $obj->Fetch_Id($id);
        $data = mysqli_fetch_assoc($ans);

        ?>
        <form method="post" enctype="multipart/form-data">
          <table class="table">
            <tr>
              <td>
                <h4>Product Name : </h4>
              </td>
            </tr>
            <tr>
              <td><input type="text" name="p_name" value="<?php echo $data['p_name'] ?>" class="form-control" placeholder="Product Name" required></td>
              <td rowspan="8">
                <img src="./images/<?php echo $data['p_img'] ?>" alt="No Image" style="height:400px;object-fit:contain">
              </td>
            </tr>
            <tr>
              <td>
                <h4>Product Price : </h4>
              </td>
            </tr>
            <tr>
              <td><input type="number" name="p_price" value="<?php echo $data['p_price'] ?>" class="form-control" placeholder="Product Price" required></td>
            </tr>
            <tr>
              <td>
                <h4>Product Description : </h4>
              </td>
            </tr>
            <tr>
              <td><input type="text" name="p_description" value="<?php echo $data['p_description'] ?>" class="form-control" placeholder="Product Description" required></td>
            </tr>
            <tr>
              <td>
                <h4>Update Image : </h4>
              </td>
            </tr>
            <tr>
              <td><input type="file" name="p_img" value="<?php echo $data['p_img'] ?>" class="form-control"  accept="./images*"></td>
            </tr>
            <tr>
              <td><input type="hidden" name="old_img" value="<?php echo $data['p_img'] ?>"></td>
            </tr>
            <tr>
              <td><input type="submit" value="Update Product" class="btn btn-secondary col-lg-12 col-md-12 col-sm-12" name="update_btn"></td>
            </tr>
          </table>
        </form>

        <?php
        if (isset($_POST['update_btn'])) {
          $p_name = $_POST['p_name'];
          $p_price = $_POST['p_price'];
          $p_description = $_POST['p_description'];
          if ($_FILES['p_img']['size'] > 0) {
            $p_img = $_FILES['p_img']['name'];
            $p_img_tmp = $_FILES['p_img']['tmp_name'];
            move_uploaded_file($p_img_tmp, './images/' . $p_img);
          } else {
            $p_img = $_POST['old_img'];
          }
          $obj->Update($id, $p_name, $p_price, $p_description, $p_img);
          if ($obj) {
            echo "<script>alert('Product Updated to your Website Successfully ! ')</script>";
            echo "<script>window.location.href='products.php'</script>";
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