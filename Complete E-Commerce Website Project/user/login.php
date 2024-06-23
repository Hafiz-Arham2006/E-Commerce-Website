<?php
session_start();
// session_destroy();
if (!isset($_SESSION['cart_count'])) {
  $_SESSION['cart_count'] = null;
}
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
  <title>LOGIN</title>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
    }

    .login-container {
      background-color: #fff;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      width: 320px;
    }

    .login-form {
      display: flex;
      flex-direction: column;
    }

    .login-form h2 {
      margin-bottom: 20px;
      text-align: center;
    }

    .login-form label {
      margin-bottom: 5px;
    }

    h2 {
      font-family: serif;
    }

    .login-form input {
      margin-bottom: 15px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .login-form button {
      padding: 10px;
      border: none;
      border-radius: 4px;
      background-color: #007BFF;
      color: white;
      cursor: pointer;
      font-size: 16px;
    }

    .login-form button:hover {
      background-color: #0056b3;
    }

    .navbar {
      position: absolute;
      top: 0;
      width: 100%;
    }
  </style>
</head>

<body>

  <!-- Navbar Start -->
  <nav class="navbar navbar-expand-lg bg-secondary">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="#">Shimmer Shop</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item" style="margin-left: 400px;">
            <a class="nav-link active text-white" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item mx-4">
            <a class="nav-link active text-white" aria-current="page" href="aboutus.php">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="contactus.php">Contact Us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar End -->

  <div class="login-container">
    <form method="post" class="login-form">
      <h2>Login</h2>

      <h5>User Name : </h5> <input type="text" name="username" required class="form-control">
      <span id="e1" style="color: red;"></span><br>

      <h5>Password : </h5> <input type="password" name="password" required class="form-control">
      <span id="e2" style="color: red;"></span><br>
      <button type="submit" name="login_btn">Login</button>
  

      <br>
      <p>Don't have an account <a href="register.php">Register here</a></p>
    </form>
    <?php
    if (isset($_POST['login_btn'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $conn = mysqli_connect("localhost", "root", "", "ecommerce_db");
      $sql = "SELECT `username` AND `password` from `users` WHERE `username`='$username' AND `password`='$password'";
      $ans = mysqli_query($conn, $sql);
      $admin_query="SELECT * FROM admin";
      $admin_ans=mysqli_query($conn,$admin_query);
      if($admin_ans){
        header('location:../admin/products.php');
      }else{
        echo "Incorrect User Name or Password";
      }
      if (mysqli_num_rows($ans)==0) {
        echo "<script>
        document.getElementById('e1').innerHTML='Incorrect UserName !';
     document.getElementById('e2').innerHTML='Incorrect Password !';
           </script>";
     
      } else {
        header("location:index.php");
        $_SESSION['username'] = $username;
      }
    }
    ?>
  </div>
  <script>
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>