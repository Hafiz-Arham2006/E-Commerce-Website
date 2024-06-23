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
  <title>DASHBOARD</title>
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
            <a href="#" class="nav-link active">
           
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
            <th>Admin Profile</th>
          </tr>
        </table>
        <?php
        $ans = $obj->Admin_Fetch();
        $data = mysqli_fetch_assoc($ans);
        ?>
        <form method="post">
          <table class="table">
            <tr>
              <td>
                <h4>Admin Name : </h4>
              </td>
            </tr>
            <tr>
              <td><input type="text" name="admin_name" class="form-control" value="<?php echo $data['name'] ?>" required></td>
            </tr>
            <tr>
              <td>
                <h4>Admin Password : </h4>
              </td>
            </tr>
            <tr>
              <td><input type="text" name="admin_password" class="form-control" value="<?php echo $data['password'] ?>" required></td>
            </tr>
            <tr>
              <td><input type="submit" value="Update Admin" name="update_btn" class="btn btn-secondary col-lg-12 col-md-12 col-sm-12 p-2"></td>
            </tr>
          </table>
        </form>
        <?php

        if (isset($_POST['update_btn'])) {
          $admin_name = $_POST['admin_name'];
          $admin_password = $_POST['admin_password'];
          $obj->Admin_Update($admin_name,$admin_password);
          if ($obj) {
            echo "<script>alert('Admin Profile Updated Successfully ! ')</script>";
            echo "<script>window.location.href='admin_profile.php'</script>";
          } else {
            echo "ERROR";
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