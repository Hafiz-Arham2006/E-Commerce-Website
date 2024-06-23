<?php
  require_once("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="style.css">
<title>DASHBOARD</title>
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
        <a href="#" class="nav-link active">
      
          Users
        </a>
      </li>
    </ul>
  
   
  </div>
    </div>


        <div class="right">
                    <div class="container">
                    <table class="table display-5 text-center">
                      <tr>
                        <th>Users</th>
                      </tr>
                    </table>
                      <table class="table table-bordered table-hover text-center">
                        <thead>
                          <tr>
                          
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Password</th>
                          </tr>
                        </thead>
                           <tbody>
                            <?php
                              $ans=$obj->Fetch_Users();
                              if(mysqli_num_rows($ans)>0){
                                while($data=mysqli_fetch_assoc($ans)){
                                  
                            ?>
                            <tr>
                          
                              <td><?php  echo $data['username']?></td>
                              <td><?php  echo $data['email']?></td>
                              <td><?php  echo $data['password']?></td>
                            </tr>
                            <?php
          
        }
      }
                            ?>
                           </tbody>
                      </table>
                    </div>
        </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>