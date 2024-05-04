<?php
session_start();
$customer_first = "";
$customer_last = "";
$customer_email = "";
$customer_phone = "";
if (isset($_SESSION['first']) && !empty($_SESSION['first']) && isset($_SESSION['last']) && isset($_SESSION['email']) && isset($_SESSION['phone'])) {
    // Session variable has a value
    $customer_first = $_SESSION['first'];
    $customer_last = $_SESSION['last'];
    $customer_email = $_SESSION['email'];
    $customer_phone = $_SESSION['phone'];
} 


$servername = "localhost";
$username = "root";
$password = "firaol@1995";
$db_name = "fira_shoping";
$conn = new mysqli($servername,$username,$password,$db_name);
$sql_cart = "SELECT * FROM cart";
$all_cart = $conn->query($sql_cart);



$cloth_amount = "SELECT * FROM cart WHERE group_id = 1";
$all_cloth_amount = $conn->query($cloth_amount);
$art_amount = "SELECT * FROM cart WHERE group_id = 2";
$all_art_amount = $conn->query($art_amount);
$electronics_amount = "SELECT * FROM cart WHERE group_id = 3";
$all_electronics_amount = $conn->query($electronics_amount);
$home_garden_amount = "SELECT * FROM cart WHERE group_id = 4";
$all_home_garden_amount = $conn->query($home_garden_amount);
$home_improvement_amount = "SELECT * FROM cart WHERE group_id = 5";
$all_home_improvement_amount = $conn->query($home_improvement_amount);
$automotive_amount = "SELECT * FROM cart WHERE group_id = 6";
$all_automotive_amount = $conn->query($automotive_amount);
$shoes_amount = "SELECT * FROM cart WHERE group_id = 7";
$all_shoes_amount = $conn->query($shoes_amount);

$price = "SELECT product_price FROM cart";
$all_price = $conn->query($price);

if($all_price){
    $total_price = array();
    while($prow = $all_price->fetch_assoc()){
        $total_price[] = $prow['product_price'];
    }
}
$total = 0;
foreach ($total_price as $number){
    $total += $number;
}

/*########################## random number generation ##########*/
function generateRandomString($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}

$randomString = generateRandomString(7);





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/e194234370.js" crossorigin="anonymous"></script>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.2.0/uicons-regular-straight/css/uicons-regular-straight.css'>
    <title>my Shop</title>
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
                <i class="fi fi-rs-shopping-cart"></i>
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
                <li class="hiden-list"><a href="index.php" >Home</a></li>
                <li  class="hiden-list"><a href="cart.php" class="active">My Shop</a></li>
                <li  class="hiden-list"><a href="clothes.php">Clothing</a></li>
                <li  class="hiden-list"><a href="art.php">Act & Crafts</a></li>
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
        <h1> <?php echo mysqli_num_rows($all_cart);?> Items</h1>
        
        <section class="product-section">
        <?php
        while($row_cart = mysqli_fetch_assoc($all_cart)){
            $product_id = $row_cart["product_id"];
            $group_id = $row_cart["group_id"];
            $category_id = $row_cart["category_id"];
            $sql = "SELECT * FROM all_products WHERE product_id = $product_id AND group_id = $group_id AND category_id = $category_id";
            $all_product = $conn->query($sql);
            while($row = mysqli_fetch_assoc($all_product)){
        ?>
            <div class="card">
                <div class="image">
                    <img src="<?php echo $row["product_image"]?>" alt="">
                </div>
                <div class="contents">
                    <p class="product-name"><?php echo $row["product_name"]?></p>
                    <div class="rating">
                        <i class="fi fi-rs-star"></i>
                        <i class="fi fi-rs-star"></i>
                        <i class="fi fi-rs-star"></i>
                        <i class="fi fi-rs-star"></i>
                        <i class="fi fi-rs-star"></i>
                    </div>
                    <div>
                        <span class="new_price">$<?php echo $row["product_new_price"]?></span>
                    <span class="old_price">$<?php echo $row["product_old_price"]?></span>
                    </div>
                    <button class="remove-btn" category-id="<?php echo $row["category_id"]?>" group-id="<?php echo $row["group_id"]?>" data-id = "<?php echo $row["product_id"]?>">Remove from cart</button>
                </div>
            </div>

            <?php
        }
    }
        ?>
        </section>

        <section class="total_amount">
            <div class="category_list">
                <table border="1">
                    <tr>
                        <th>NO:</th>
                        <th>Category</th>
                        <th>Quantity</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Clothing</td>
                        <td><?php echo mysqli_num_rows($all_cloth_amount);?></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Art & craft</td>
                        <td><?php echo mysqli_num_rows($all_art_amount);?></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Electronics</td>
                        <td><?php echo mysqli_num_rows($all_electronics_amount);?></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Home and Garden</td>
                        <td><?php echo mysqli_num_rows($all_home_garden_amount);?></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Home Improvement</td>
                        <td><?php echo mysqli_num_rows($all_home_improvement_amount);?></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Automotive</td>
                        <td><?php echo mysqli_num_rows($all_automotive_amount);?></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Shoes</td>
                        <td><?php echo mysqli_num_rows($all_shoes_amount);?></td>
                    </tr>
                    <tfoot>
                        <tr>
                            <th  colspan="2">Total Item</th>
                            <td class="total-no"><?php echo mysqli_num_rows($all_cart);?></td>
                        </tr>
                        <tr>
                            <th  colspan="2">Total Price</th>
                            <td class="total-no"><?php echo $total;?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <form method="POST" action="https://api.chapa.co/v1/hosted/pay" >
        <input type="hidden" name="public_key" value="CHAPUBK_TEST-6vxmis0gUxJ7Q5LrkocCZdLD87kjV6JN" />
        <input type="hidden" name="tx_ref" value="firashoping-<?php echo $randomString;?>" />
        <input type="hidden" name="amount" value="<?php echo $total;?>" />
        <input type="hidden" name="currency" value="ETB" />
        <input type="hidden" name="email" value="<?php echo $customer_email;?>" />
        <input type="hidden" name="first_name" value="<?php echo $customer_first;?>" />
        <input type="hidden" name="last_name" value="<?php echo $customer_last;?>" />
        <input type="hidden" name="title" value="Firashoping Payment" />
        <input type="hidden" name="description" value="Paying with Confidence with chapa for Firashoping" />
        <input type="hidden" name="logo" value="https://chapa.link/asset/images/chapa_swirl.svg" />
        <input type="hidden" name="callback_url" value="https://api.chapa.co/v1/transaction/verify/firashoping-<?php echo $randomString;?>" />
        <input type="hidden" name="return_url" value="http://localhost//fira_shoping/cart.php" />
        <input type="hidden" name="meta[title]" value="test" />
        <button type="submit" class="pay_btn">Pay Now</button> </br>
        <a href="https://yenepay.com/checkout/Home/Process/?ItemName=items&ItemId=&UnitPrice=<?php echo $total;?>&Quantity=1&Process=Express&ExpiresAfter=&DeliveryFee=&HandlingFee=&Tax1=&Tax2=&Discount=&SuccessUrl=&IPNUrl=&MerchantId=17053"  class="pay_btn"><img style="width:100px" src=" https://yenepayprod.blob.core.windows.net/images/logo.png"><span>Pay with Yenepay</span></a>
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

    <script src="cart.js"></script>
    
</body>
</html>