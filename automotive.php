<?php
$servername = "localhost";
$username = "root";
$password = "firaol@1995";
$db_name = "fira_shoping";
$conn = new mysqli($servername,$username,$password,$db_name);
$clothes_product = "SELECT * FROM all_products WHERE group_id = 6";
$all_clothes = $conn->query($clothes_product);
$sql_cart = "SELECT * FROM cart";
$all_cart = $conn->query($sql_cart);


$men_clothes = "SELECT * FROM all_products WHERE group_id = 6 AND category_id = 1";
$all_men_clothes = $conn->query($men_clothes);
$women_clothes = "SELECT * FROM all_products WHERE group_id = 6 AND category_id = 2";
$all_women_clothes = $conn->query($women_clothes);
$women_shirt = "SELECT * FROM all_products WHERE group_id = 6 AND category_id = 3";
$all_women_shirt = $conn->query($women_shirt);
$men_shirt = "SELECT * FROM all_products WHERE group_id = 6 AND category_id = 4";
$all_men_shirt = $conn->query($men_shirt);
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
    <link rel="stylesheet" href="clothes.css">
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
                <span class="count" id="count"><?php echo mysqli_num_rows($all_cart);?></span>
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
                <li class="hiden-list"><a href="index.php" >Home</a></li>
                <li  class="hiden-list"><a href="cart.php" >My Shop</a></li>
                <li  class="hiden-list cloth-drop"><a href="clothes.php" >Clothing</a></li>
                <li  class="hiden-list"><a href="art.php">Art & Crafts</a></li>
                <li  class="hiden-list"><a href="shoes.php">Shoes</a></li>
                <div class="second-half-nav">
                    <li><a href="electronics.php">Electronics</a></li>
                    <li><a href="home_garden.php">Home & Garden</a></li>
                    <li><a href="Home_improvement.php">Home Improvement</a></li>
                    <li><a href="automotive.php" class="active">Automotive</a></li>
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
        <div class="category_nav" id="mover">
            <ul>
                    <li><a href="clothes.php" >Main</a></li>
                    <li><a href="#" id="tab1" class="tab_btn" onclick="moveLeft()">Car Care</a></li>
                    <li><a href="#" id="tab2" class="tab_btn" onclick="moveLeft()">Replacement Part</a></li>
                    <li><a href="#" id="tab3" class="tab_btn" onclick="moveLeft()">Oil and Fluid</a></li>
                    <li><a href="#" id="tab4" class="tab_btn" onclick="moveLeft()">Motorcycle supply</a></li>
            </ul>
            <i class="fa-solid fa-angles-right right-btn" id="display-btn" onclick="moveRight()"></i>
            <i class="fa-solid fa-angles-left left-btn" onclick="moveLeft()"></i>
        </div>
        <section> 
            <div class="clothes_content container tab-item active-tabs" content >
                <div class="clothes_container">
                <?php
                while($row_cloth = mysqli_fetch_assoc($all_clothes)){
            
                ?>
                    <div class="cloths">
                        <img src="<?php echo $row_cloth["product_image"]?>" alt="">
                        <div class="cloth">
                            <h4 class="product_name"><?php echo $row_cloth["product_name"]?></h4>
                            <span class="new-price">$<?php echo $row_cloth["product_new_price"]?></span>
                            <span class="old-price">$<?php echo $row_cloth["product_old_price"]?></span>
                            <div class="rating1">
                                <i class="fi fi-rs-star"></i>
                                <i class="fi fi-rs-star"></i>
                                <i class="fi fi-rs-star"></i>
                                <i class="fi fi-rs-star"></i>
                                <i class="fi fi-rs-star"></i>
                            </div>
                            <button class="cart_btn1" price="<?php echo $row_cloth["product_new_price"]?>" category-id="<?php echo $row_cloth["category_id"]?>" data-id="<?php echo $row_cloth["product_id"]?>" group-id="<?php echo $row_cloth["group_id"]?>">Add To Cart</button>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <div class="clothes_content container tab-item " content id="men-cloth">
                <div class="clothes_container">
                <?php
                while($row_cloth1 = mysqli_fetch_assoc($all_men_clothes)){
            
                ?>
                    <div class="cloths">
                        <img src="<?php echo $row_cloth1["product_image"]?>" alt="">
                        <div class="cloth">
                            <h4 class="product_name"><?php echo $row_cloth1["product_name"]?></h4>
                            <span class="new-price">$<?php echo $row_cloth1["product_new_price"]?></span>
                            <span class="old-price">$<?php echo $row_cloth1["product_old_price"]?></span>
                            <div class="rating1">
                                <i class="fi fi-rs-star"></i>
                                <i class="fi fi-rs-star"></i>
                                <i class="fi fi-rs-star"></i>
                                <i class="fi fi-rs-star"></i>
                                <i class="fi fi-rs-star"></i>
                            </div>
                            <button class="cart_btn1" price="<?php echo $row_cloth1["product_new_price"]?>" category-id="<?php echo $row_cloth1["category_id"]?>" data-id="<?php echo $row_cloth1["product_id"]?>" group-id="<?php echo $row_cloth1["group_id"]?>">Add To Cart</button>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <div class="clothes_content container tab-item " content id="women-cloth" >
                <div class="clothes_container">
                <?php
                while($row_cloth2 = mysqli_fetch_assoc($all_women_clothes)){
            
                ?>
                    <div class="cloths">
                        <img src="<?php echo $row_cloth2["product_image"]?>" alt="">
                        <div class="cloth">
                            <h4 class="product_name"><?php echo $row_cloth2["product_name"]?></h4>
                            <span class="new-price">$<?php echo $row_cloth2["product_new_price"]?></span>
                            <span class="old-price">$<?php echo $row_cloth2["product_old_price"]?></span>
                            <div class="rating1">
                                <i class="fi fi-rs-star"></i>
                                <i class="fi fi-rs-star"></i>
                                <i class="fi fi-rs-star"></i>
                                <i class="fi fi-rs-star"></i>
                                <i class="fi fi-rs-star"></i>
                            </div>
                            <button class="cart_btn1" price="<?php echo $row_cloth2["product_new_price"]?>" category-id="<?php echo $row_cloth2["category_id"]?>" data-id="<?php echo $row_cloth2["product_id"]?>" group-id="<?php echo $row_cloth2["group_id"]?>">Add To Cart</button>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <div class="clothes_content container tab-item " content id="women-t-shirt" >
                <div class="clothes_container">
                <?php
                while($row_cloth3 = mysqli_fetch_assoc($all_women_shirt)){
            
                ?>
                    <div class="cloths">
                        <img src="<?php echo $row_cloth3["product_image"]?>" alt="">
                        <div class="cloth">
                            <h4 class="product_name"><?php echo $row_cloth3["product_name"]?></h4>
                            <span class="new-price">$<?php echo $row_cloth3["product_new_price"]?></span>
                            <span class="old-price">$<?php echo $row_cloth3["product_old_price"]?></span>
                            <div class="rating1">
                                <i class="fi fi-rs-star"></i>
                                <i class="fi fi-rs-star"></i>
                                <i class="fi fi-rs-star"></i>
                                <i class="fi fi-rs-star"></i>
                                <i class="fi fi-rs-star"></i>
                            </div>
                            <button class="cart_btn1" price="<?php echo $row_cloth3["product_new_price"]?>" category-id="<?php echo $row_cloth3["category_id"]?>" data-id="<?php echo $row_cloth3["product_id"]?>" group-id="<?php echo $row_cloth3["group_id"]?>">Add To Cart</button>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <div class="clothes_content container tab-item " content id="men-t-shirt" >
                <div class="clothes_container">
                <?php
                while($row_cloth4 = mysqli_fetch_assoc($all_men_shirt)){
            
                ?>
                    <div class="cloths">
                        <img src="<?php echo $row_cloth4["product_image"]?>" alt="">
                        <div class="cloth">
                            <h4 class="product_name"><?php echo $row_cloth4["product_name"]?></h4>
                            <span class="new-price">$<?php echo $row_cloth4["product_new_price"]?></span>
                            <span class="old-price">$<?php echo $row_cloth4["product_old_price"]?></span>
                            <div class="rating1">
                                <i class="fi fi-rs-star"></i>
                                <i class="fi fi-rs-star"></i>
                                <i class="fi fi-rs-star"></i>
                                <i class="fi fi-rs-star"></i>
                                <i class="fi fi-rs-star"></i>
                            </div>
                            <button class="cart_btn1" price="<?php echo $row_cloth4["product_new_price"]?>" category-id="<?php echo $row_cloth4["category_id"]?>" data-id="<?php echo $row_cloth4["product_id"]?>" group-id="<?php echo $row_cloth4["group_id"]?>">Add To Cart</button>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>

            
        </section>

        <section class="signup_section">
            <div class="signup_container">
                <h2 class="signup_title">Ready to get started?</h2>
                <p class="signup_detail">Explore millions of products from trusted suppliers by signing up today!</p>
                <button class="signup_btn">Sign up now!</button>
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


    <script src="clothes.js"></script>
    <script src="cart.js"></script>
</body>
</html>