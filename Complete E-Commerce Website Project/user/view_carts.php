<?php
session_start();

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
    <title>CARTS</title>
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
                        <a class="nav-link active text-white" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item mx-4">
                        <a class="nav-link active text-white" aria-current="page" href="about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="contact.php">Contact Us</a>
                    </li>
                </ul>
                <a class="nav-link text-white" href="view_carts.php">
                    <i class="fas fa-shopping-cart fa-lg"></i>
                    <sup><?php echo $_SESSION['cart_count']; ?></sup>
                    <a href="login.php"><input type="submit" class="btn btn-outline-dark text-white" value="<?php if (isset($_SESSION['username'])) {
                                                                                                                echo $_SESSION['username'];
                                                                                                            } else {
                                                                                                                echo "Login";
                                                                                                            }
                                                                                                            ?>"></a>

            </div>
        </div>
    </nav>

    <!-- Navbar ends -->
    <div class="container-fluid">
        <div class="container">
            <h1 align="center" class="mt-2">CART PRODUCTS</h1>
            <table class="table  table-bordered table-hover text-center mt-4">
                <thead>
                    <tr>
                        <th>PRODUCT NAME</th>
                        <th>PRODUCT PRICE</th>
                        <th>PRODUCT QUANTITY</th>
                        <th>PRODUCT IMAGE</th>
                        <th>TOTAL PRICE</th>
                        <th colspan="2" style="text-align: center;">EDIT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    echo "<form action='edit_cart.php' method='post'>";
                    foreach ($_SESSION as $detail) {

                        if (is_array($detail)) {

                            $productName = $detail[0];
                            $productPrice = $detail[1];
                            $productQuantity = $detail[2];
                            $productImg = $detail[3];
                            $q = (int)$productQuantity;
                            $p = (float)$productPrice;
                            $totalPrice = $q * $p;
                           
                            echo "<tr>";
                            echo "<form action='edit_cart.php' method='post'>";
                            echo "<td>$productName<input type='hidden' name='name' value='$productName'></td>";
                            echo "<td>$$productPrice<input type='hidden' name='price' value='$productPrice'></td>";
                            echo "<td><input type='number' name='quantity' value='$productQuantity' class='form-control'></td>";
                            echo "<td><img src='../admin/images/$productImg' alt='No Image' style='width: 100%;height:40px;object-fit:contain;'><input type='hidden' name='img' value='$productImg'></td>";
                            echo "<td>$ $totalPrice </td>";
                            echo "<td style='text-align:center;'>";
                            echo "<input type='submit' value='Update' name='update_btn' class='btn btn-warning rounded-pill'></td>";
                            echo "<td><input type='submit' value='Remove' name='delete_btn' class='btn btn-danger rounded-pill'>";
                            echo "</td>";
                            echo "</form>";
                            echo "</tr>";
                            
                        }
                    }
                    ?>
                </tbody>
            </table>
            <a href="index.php" class="btn btn-primary btn-lg">Continue Shopping</a>
            <!-- Check Out -->
            <button type="button" class="btn-lg btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-left: 950px;">Check Out</button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Shimmer Shop</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post">
    <table class="table">
        <tr>
            <th>First Name :</th>
            <th>Last Name :</th>
        </tr>
        <tr>
            <td><input type="text" placeholder="First Name" class="form-control" required></td>
            <td><input type="text" placeholder="Last Name" class="form-control" required></td>
        </tr>
        <tr>
            <th>Contact No :</th>
            <th>Email :</th>
        </tr>
        <tr>
            <td><input type="number" maxlength="11" placeholder="Contact" class="form-control" required></td>
            <td><input type="email" placeholder="Email" class="form-control" required></td>
        </tr>
        <tr>
            <th>City :</th>
            <th>Address :</th>
        </tr>
        <tr>
            <td><input type="text" placeholder="City" class="form-control" required></td>
            <td><input type="text" class="form-control" placeholder="Address" required></td>
        </tr>
    </table>
                          
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button id="submit_btn" name="submit_btn" type="submit" class="btn btn-primary">Order</button>
                            </form>
                            <?php
                            if(isset($_POST['submit_btn'])){
                                echo "<script>alert('You will Receive your Order in 7 Days.')</script>";
                                session_unset();
                                echo "<script>window.location.href='index.php'</script>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Check Out Ends -->
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
    <script>
        const exampleModal = document.getElementById('exampleModal')
        if (exampleModal) {
            exampleModal.addEventListener('show.bs.modal', event => {
                // Button that triggered the modal
                const button = event.relatedTarget
                // Extract info from data-bs-* attributes
                const recipient = button.getAttribute('data-bs-whatever')
                // If necessary, you could initiate an Ajax request here
                // and then do the updating in a callback.

                // Update the modal's content.
                const modalTitle = exampleModal.querySelector('.modal-title')
                const modalBodyInput = exampleModal.querySelector('.modal-body input')

                modalTitle.textContent = `Shimmer Shop`
                modalBodyInput.value = recipient
            })
        }
           
            
    </script>
</body>

</html>