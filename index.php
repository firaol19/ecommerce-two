<?php
session_start();
$customer_name = "";
if (isset($_SESSION['first']) && !empty($_SESSION['name'])) {
    // Session variable has a value
    $customer_name = strtoupper($_SESSION['first'][0]);
} 


$servername = "localhost";
$username = "root";
$password = "firaol@1995";
$db_name = "fira_shoping";
$conn = new mysqli($servername,$username,$password,$db_name);
$fashion_product = "SELECT * FROM fashion_product";
$all_fashion_product = $conn->query($fashion_product);
$accessories_product = "SELECT * FROM accessories_product";
$all_accessories_product = $conn->query($accessories_product);
$home_product = "SELECT * FROM home_product";
$all_home_product = $conn->query($home_product);
$sql_cart = "SELECT * FROM cart";
$all_cart = $conn->query($sql_cart);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fira_Shoping</title>

    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <script src="https://kit.fontawesome.com/e194234370.js" crossorigin="anonymous"></script>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.2.0/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel="stylesheet" href="styles.css">
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
            <span class="customer_name"><?php echo $customer_name?></span>
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
        <section class="banner_animation">
            <div class="animation_container swiper ">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="images/animation-banner-6.jpeg" alt=""></div>
                    <div class="swiper-slide"><img src="images/animation-banner-5.jpeg" alt=""></div>
                    <div class="swiper-slide"><img src="images/animation-banner-6.jpeg" alt=""></div>
                    <div class="swiper-slide"><img src="images/animation-banner-3.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="images/animation-banner-5.jpeg" alt=""></div>
                </div>
                <div class="swiper-button-next animo"></i></div>
                <div class="swiper-button-prev animo"></div>
            </div>
        </section>
        
        <section class="fashion_product container">
            
            <h2 class="section_title">Fashion Products</h2>
            <div class="fashion_container swiper">
            
                <div class="swiper-wrapper">
                <?php
                while($row_fashion = mysqli_fetch_assoc($all_fashion_product)){
            
                ?>
                    <a href="#" class="fashion swiper-slide">
                        <img src="<?php echo $row_fashion["product_image"]?>" alt="">
                        <div class="fashion_content">
                            <h4 class="category_name"><?php echo $row_fashion["product_category"]?></h4>
                            <h4 class="product_name"><?php echo $row_fashion["product_name"]?></h4>
                            <span class="new_price">$<?php echo $row_fashion["product_new_price"]?></span>
                            <span>-</span>
                            <span class="old_price">$<?php echo $row_fashion["product_old_price"]?></span>
                            <div class="rating">
                                <i class="fi fi-rs-star"></i>
                                <i class="fi fi-rs-star"></i>
                                <i class="fi fi-rs-star"></i>
                                <i class="fi fi-rs-star"></i>
                                <i class="fi fi-rs-star"></i>
                            </div>
                            <button class="cart_btn" data-id="<?php echo $row_fashion["product_id"]?></button>">Add To Cart</button>
                        </div>
                    </a>
                    <?php
                    }
                    ?>
                </div>
                
                <div class="swiper-button-next"><i class="fa-solid fa-angle-right"></i></div>
                <div class="swiper-button-prev"><i class="fa-solid fa-angle-left"></i></div>
            </div>
        </section>

        <section class="accessories_product container">
            
            <h2 class="section_title">Accessories </h2>
            <div class="accessories_container swiper">
            
                <div class="swiper-wrapper">
                <?php
                while($row_accessories = mysqli_fetch_assoc($all_accessories_product)){
            
                ?>
                    <a href="#" class="accessories swiper-slide">
                        <img src="<?php echo $row_accessories["product_image"]?>" alt="">
                        <div class="accessories_content">
                            <h4 class="category_name"><?php echo $row_accessories["product_category"]?></h4>
                            <h4 class="product_name"><?php echo $row_accessories["product_name"]?></h4>
                            <span class="new_price">$<?php echo $row_accessories["product_new_price"]?></span>
                            <span>-</span>
                            <span class="old_price">$<?php echo $row_accessories["product_old_price"]?></span>
                            <div class="rating">
                                <i class="fi fi-rs-star"></i>
                                <i class="fi fi-rs-star"></i>
                                <i class="fi fi-rs-star"></i>
                                <i class="fi fi-rs-star"></i>
                                <i class="fi fi-rs-star"></i>
                            </div>
                            <button class="cart_btn" data-id="<?php echo $row_accessories["product_id"]?></button>">Add To Cart</button>
                        </div>
                    </a>
                    <?php
                    }
                    ?>
                </div>
                
                <div class="swiper-button-next"><i class="fa-solid fa-angle-right"></i></div>
                <div class="swiper-button-prev"><i class="fa-solid fa-angle-left"></i></div>
            </div>
        </section>

        <section class="ad_section">
            <img src="images/banner-img-2.jpg" class="banner_image" alt="" class="banner_image">
            <div class="banner_shadow"></div>
            <h1 class="section_title-banner">Be confident for production quality <br> to purchase protection</h1>
            <div class="banner_content1">
                <div class="quality_content">
                    <p class="title_content">Be Sure on production quality with </p>
                    <img src="images/trust-img.png" alt="">
                    <p class="detail_content">Connect with a variety of suppliers which are 
                        trusted and have verified credentials and capabilities. 
                        Look for the "Trusted" logo to begin sourcing with 
                        experienced suppliers your business could rely on.
                    </p>
                    <p class="learn_more">Learn More</p>
                </div>
                <div class="protect_content">
                    <p class="title_content">Protect your purchase with</p>
                    <img src="images/secure.png" alt="">
                    <p class="detail_content">Source confidently with access to secure 
                        payment options, protection against product or shipping issues, 
                        and mediation support for any purchase-related concerns when you 
                        order and pay on Fira-shoping.com.
                    </p>
                    <p class="learn_more">Learn More</p>
                </div>
            </div>
        </section>

        <section class="home_product container">
            
            <h2 class="section_title">Home and Garden Products</h2>
            <div class="home-garden_container swiper">
            
                <div class="swiper-wrapper">
                <?php
                while($row_home = mysqli_fetch_assoc($all_home_product)){
            
                ?>
                    <a href="#" class="home-garden swiper-slide">
                        <img src="<?php echo $row_home["product_image"]?>" alt="">
                        <div class="home_content">
                            <h4 class="category_name"><?php echo $row_home["product_category"]?></h4>
                            <h4 class="product_name"><?php echo $row_home["product_name"]?></h4>
                            <span class="new_price">$<?php echo $row_home["product_new_price"]?></span>
                            <span>-</span>
                            <span class="old_price">$<?php echo $row_home["product_old_price"]?></span>
                            <div class="rating">
                                <i class="fi fi-rs-star"></i>
                                <i class="fi fi-rs-star"></i>
                                <i class="fi fi-rs-star"></i>
                                <i class="fi fi-rs-star"></i>
                                <i class="fi fi-rs-star"></i>
                            </div>
                            <button class="cart_btn" data-id="<?php echo $row_home["product_id"]?></button>">Add To Cart</button>
                        </div>
                    </a>
                    <?php
                    }
                    ?>
                </div>
                
                <div class="swiper-button-next"><i class="fa-solid fa-angle-right"></i></div>
                <div class="swiper-button-prev"><i class="fa-solid fa-angle-left"></i></div>
            </div>
        </section>

        <section class="signup_section">
            <div class="signup_container">
                <h2 class="signup_title">Ready to get started?</h2>
                <p class="signup_detail">Explore millions of products from trusted suppliers by signing up today!</p>
                <a href="register.html" class="signup_btn">Sign up now!</a>
            </div>
        </section>

        
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


    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> 
    <script src="home.js"></script> 
</body>
</html>