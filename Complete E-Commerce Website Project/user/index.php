<?php
session_start();
// session_destroy();
if (!isset($_SESSION['cart_count'])) {
  $_SESSION['cart_count'] = null;
}
require_once('../admin/db.php');




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
  <title>HOME</title>
</head>

<body>

  <!-- Navbar St -->
  <nav class="navbar navbar-expand-lg bg-secondary">
    <div class="container-fluid">
    <a class="navbar-brand text-white" href="#">Shimmer Shop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
  
          <li class="nav-item" style="margin-left: 400px;">
            <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item mx-4">
            <a class="nav-link active text-white" aria-current="page" href="#">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="#">Contact Us</a>
          </li>
          <li class="nav-item mt-1" style="margin-left: 90px;">
            <form action="search.php" method="post">
          <input type="search" name="search_text" class="form-control" placeholder="Search Product" required> 
          </li>
          <li class="nav-item mt-1" style="margin-left: 14px;display:inline-block">
            <input type="submit" value="Search" name="search_btn" class="btn  btn-primary">
          </form>
          </li>
        </ul>
            
       
     
        <a class="nav-link text-white" href="view_carts.php">
              <i class="fas fa-shopping-cart fa-lg"></i>
              <sup><?php echo $_SESSION['cart_count']; ?></sup>
        <a href="login.php"><input type="submit" class="btn btn-outline-dark text-white" value="<?php if(isset($_SESSION['username'])){
          echo $_SESSION['username'] ;
        } else{
        echo "Login";

        }
        ?>"></a>

      </div>
    </div>
  </nav>

  <!-- Navbar ends -->

  <!-- Carousel St -->
  <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner" style="height: 500px;">
      <div class="carousel-item active">
        <img src="../admin/images/carousel/HTB1AVBhbA9E3KVjSZFGq6A19XXaG.webp" class="d-block w-100" alt="No Image" style="height: 500px;">
      </div>
      <div class="carousel-item">
        <img src="../admin/images/carousel/H212fb861d0444dc7bb45896bb492da10k.webp" class="d-block w-100" alt="No Image" style="height: 500px;">
      </div>
      <div class="carousel-item">
        <img src="../admin/images/carousel/S3d61b0a78814437eb569a017d9deef7dA.webp" class="d-block w-100" alt="No Image" style="height: 500px;">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


  <!-- Carousel ends -->
  <div class="container-fluid">
    <div class="container">

      <div class="row">
        <?php
        $ans = $obj->Show();
        if (mysqli_num_rows($ans) > 0) {
          while ($data = mysqli_fetch_assoc($ans)) {


        ?>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mt-5">
              <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="../admin/images/<?php echo $data['p_img'] ?>" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $data['p_name'] ?></h5>
                  <h5 class="card-title">$<?php echo $data['p_price'] ?></h5>
                  <p class="card-text"><?php echo $data['p_description'] ?></p>
                  <form action="add_cart.php" method="post">
                    <input type="hidden" name="name" value="<?php echo $data['p_name'] ?>">
                    <input type="hidden" name="price" value="<?php echo $data['p_price'] ?>">
                    <input type="hidden" name="img" value="<?php echo $data['p_img'] ?>">
                    <input type="hidden" name="quantity" value="1">
                    <input type="submit" value="Add to Cart" class="btn btn-info text-white" name="add_cart_btn">
                  </form>


                </div>
              </div>

            </div>

        <?php
          }
        }
        ?>




      </div>
    </div>

    <h1 align="center" class="mt-4" style="background-color: rgba(0, 0, 0, 0.05);">Our Most Recommended Products</h1>

            <div class="container">
            <div class="row">
      <?php
      $ans = $obj->Fetch_Recommend_Products();
      if (mysqli_num_rows($ans) > 0) {
        while ($data = mysqli_fetch_assoc($ans)) {

      ?>
          <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mt-5">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="../admin/images/<?php echo $data['p_img'] ?>" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title"><?php echo $data['p_name'] ?></h5>
                <h5 class="card-title">$<?php echo $data['p_price'] ?></h5>
                <p class="card-text"><?php echo $data['p_description'] ?></p>
                <form action="add_cart.php" method="post">
                  <input type="hidden" name="name" value="<?php echo $data['p_name'] ?>">
                  <input type="hidden" name="price" value="<?php echo $data['p_price'] ?>">
                  <input type="hidden" name="img" value="<?php echo $data['p_img'] ?>">
                  <input type="hidden" name="quantity" value="1">
                  <input type="submit" value="Add to Cart" class="btn btn-info text-white" name="add_cart_btn">
                </form>


              </div>
            </div>

          </div>
      <?php
        }
      }
      ?>




    </div>
            </div>
            </div>
      <!-- Footer st -->
     <!-- Footer -->
<footer class="text-center text-lg-start bg-body-tertiary text-muted">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
   
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>Shimmer Shop
          </h6>
          <p>
          Your ultimate destination for exquisite jewelry. At Shimmer Shop, we believe that every piece of jewelry tells a story and adds a touch of sparkle to your life. Our collection features a diverse range of beautifully crafted pieces, from timeless classics to contemporary designs, each made to bring out your inner brilliance. Discover the perfect accessory to complement your style and let your elegance shine with Shimmer Shop.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Products
          </h6>
          <p>
            <a href="#!" class="text-reset">Rings</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Earrings</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Necklaces</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Bracelets</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="#!" class="text-reset">Pricing</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Settings</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Orders</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Help</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            info@example.com
          </p>
          <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
          <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
      <!-- Footer end -->




  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>