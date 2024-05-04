<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "firaol@1995";
$db_name = "fira_shoping";

$conn = new mysqli($servername,$username,$password,$db_name);

$sql_cart = "SELECT * FROM cart";
$all_cart = $conn->query($sql_cart);


$first_name = $last_name = $user_name = $phone_number = $email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = test_input($_POST["first"]);
    $last_name = test_input($_POST["last"]);
    $user_name = test_input($_POST["username"]);
    $phone_number = test_input($_POST["phone"]);
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["npassword"]);
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$_SESSION["first"] = "$first_name";
$_SESSION["last"] = "$last_name";
$_SESSION["email"] = "$email";
$_SESSION["phone"] = "$phone_number";


$insert = "INSERT INTO customer(first_name, last_name, user_name, phone_number, email_adrress, password_n) VALUES('$first_name', '$last_name', '$user_name', '$phone_number', '$email', '$password')";
if($conn->query($insert) === TRUE){
    $success = "welcome  $first_name  $last_name";
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration</title>
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <script src="https://kit.fontawesome.com/e194234370.js" crossorigin="anonymous"></script>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.2.0/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel="stylesheet" href="styles.css">

    <style>
        main{
            display: grid;
            justify-content: center;
        }
        .welcome{
            padding: 50px;
            margin-top: 50px;
            margin-bottom: 60px;
            text-align: center;
            line-height: 2;
            color: #0c4a60;
        }
        .welcome p{
            font-size: 1.5rem;
            margin-bottom: 10px;
        }
        .welcome a{
            padding: 10px;
            background-color: #ef6c33;
            color: #0c4a60;
            border-radius: 3px;
            font-size: 1.5rem;
        }



    </style>
</head>
<body>
    <header class="header">
        <section class="top_header container">
        <div >
            <h2 class="logo">Fira Shoping</h2>
        </div>
        <div class="top_content">
            <div class="search">
                <input type="text" placeholder="search from fira shoping">
                <i class="fi fi-rs-search"></i>
            </div>
            <div class="cart_content">
                <div class="wish">
                <i class="fi fi-rs-heart"></i>
                <span class="count">3</span>
                </div>
                <div class="cart1">
                <a href="cart.php"><i class="fi fi-rs-shopping-cart"></i></a>
                <span class="count"><?php echo mysqli_num_rows($all_cart);?></span>
                </div>
            </div>
            <div class="social">
            <i class="fa-brands fa-square-facebook"></i>
            <i class="fa-brands fa-square-twitter"></i>
            <i class="fa-brands fa-linkedin"></i>
            <i class="fa-brands fa-youtube"></i>
            </div>
        </div>
        </section>
        <section class="bottom_header">
            <ul>
            <div class="search">
                <input type="text" placeholder="search from fira shoping">
                <i class="fi fi-rs-search"></i>
            </div>
                <li class="hiden-list"><a href="index.php" class="active">Home</a></li>
                <li  class="hiden-list"><a href="cart.php">My Shop</a></li>
                <li  class="hiden-list"><a href="clothes.php">Clothing</a></li>
                <li  class="hiden-list"><a href="art.php">Art & Crafts</a></li>
                <li  class="hiden-list"><a href="shoes.php">Shoes</a></li>
                <div class="second-half-nav">
                    <li><a href="electronics.php">Electronics</a></li>
                    <li><a href="home_garden.php">Home & Garden</a></li>
                    <li><a href="Home_improvement.php">Home Improvement</a></li>
                    <li><a href="automotive.php">Automotive</a></li>
                </div>
                <div class="drop_down">
                <span class="more">More...</span>
                <span class="categories">Categories</span>
                <span class="drop_down-btn"><i class="fa-solid fa-angles-down"></i></span>
                </div>
            </ul>
            
        </section>
    </header>

    <main>
        <div class="welcome">
            <h1><?php echo $success?></h1>
            <p>This is FiraShoping Best ecommerce website purchase what you went Confidently</p>
            <a href="index.php">Start</a>
        </div>
    </main>

    <footer class="footer">
        <div class="footer__container container grid">
            <div class="footer__contact">
                <h2 class="logo">Fira Shoping</h2>

                <div class="contact">
                    <h4 class="section__title">Contact</h4>
                    <p><b>Address</b>: Bole, Adiss Abeba, Ethiopia</p>
                    <p><b>Phone</b>: +251 904846321</p>
                    <p><b>Hours</b>: 8:00 - 4:00 pm mon - sat</p>
                </div>

                <div class="follow__me">
                    <h4 class="section__title">Follow Me</h4>
                    <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                    <a href=""><i class="fa-brands fa-twitter"></i></a>
                    <a href=""><i class="fa-brands fa-youtube"></i></a>
                    <a href=""><i class="fa-brands fa-linkedin"></i></a>
                </div>
            </div>
            <div class="footer__address">
                <h3 class="section__title">Address</h3>

                <div>
                    <p><a href="#">About Us</a></p>
                    <p><a href="#">Delivery information</a></p>
                    <p><a href="#">Privacy Ploicy</a></p>
                    <p><a href="#">Term and condition</a></p>
                    <p><a href="#">Contact Us</a></p>
                    <p><a href="#">Support Center</a></p>
                </div>
            </div>
            <div class="footer__account">
                <h3 class="section__title">My Account</h3>

                <div><p><a href="#">Sign In</a></p></div>
                <div><p><a href="#">view Cart</a></p></div>
                <div><p><a href="#">My Wishlist</a></p></div>
                <div><p><a href="#">Track My Order</a></p></div>
                <div><p><a href="#">Help</a></p></div>
                <div><p><a href="#">Order</a></p></div>
            </div>
            <div class="footer__payment">
                <h3 class="section__title">Secured Payment Getway</h3>
                <img src="images/payment-logo-1.png" alt="">
                <img src="images/payment-logo-2.jpeg" alt="">
                <img src="images/payment-logo-3.jpeg" alt="">
                <img src="images/payment-logo-4.png" alt="">
                <img src="images/payment-logo-5.jpeg" alt="">

            </div>
        </div>
        <div class="footer__copyright container">
            <p><i class="fi fi-rs-copyright"></i>2024 firaol all rights reserved</p>
            <p>Deliverd by Firacode</p>
        </div>
    </footer>

    
</body>
</html>