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
  <title>PRODUCTS</title>
</head>

<body>
  <div class="container-fluid">
    <div class="left">
      <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;height:100vh">
        <a href="../user/index.php" target="_blank" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        
          <span class="fs-4">Shimmer Shop</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
        
          <li>
            <a href="#" class="nav-link active">
        
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
        <?php
         $ans = $obj->Show();
         $total_products=mysqli_num_rows($ans);
        ?>
                            <h3 align="right">Total Products : <?php echo $total_products ?></h3>
        <table class="table text-center display-5">
          <tr>
            <th>View/Edit Products</th>
          </tr>
        </table>
        <?php
       
          if (mysqli_num_rows($ans) > 0) {
        ?>  
        <table class="table text-center table-hover table-bordered">
          <thead>
            <tr>
             
              <th>PRODUCT NAME</th>
              <th>PRODUCT PRICE</th>
              <th>PRODUCT DESCRIPTION</th>
              <th>PRODUCT IMAGE</th>
              <th colspan="2" style="text-align: center;">EDIT</th>
            </tr>
          </thead>
          <tbody>
            <?php
           
          
              while ($data = mysqli_fetch_assoc($ans)) {

            ?>
                <tr>
                 
                  <td><?php echo $data['p_name'] ?></td>
                  <td>$<?php echo $data['p_price'] ?></td>
                  <td><?php echo $data['p_description'] ?></td>
                  <td><img src="./images/<?php echo $data['p_img'] ?>" alt="No Image ! " style="width:100%;height:55px;object-fit:contain"></td>
                  <td><a href="delete.php?id=<?php echo $data['id'] ?>" class="btn btn-danger" onclick="return Delete()">Delete</a></td>
                  <td><a href="update.php?id=<?php echo $data['id'] ?>" class="btn btn-success text-white">Edit</a></td>
                </tr>
            <?php

              }
            }else{
              echo "<h1 class='text-center'>NO PRODUCTS !</h1>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
<script>
  function Delete(){
    return confirm("Do You Want to Delete this Product ? ");
  }
</script>

</body>

</html>