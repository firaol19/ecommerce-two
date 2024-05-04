<?php
$servername = "localhost";
$username = "root";
$password = "firaol@1995";
$db_name = "fira_shoping";

$conn = new mysqli($servername,$username,$password,$db_name);


if(isset($_GET["id"])){
    $product_id = $_GET["id"];
    $group_id = $_GET["group"]; 
    $category_id = $_GET["category"];
    $product_price = $_GET["price"];
    $sql = "SELECT * FROM cart WHERE product_id = $product_id AND group_id = $group_id AND category_id = $category_id";
    $result = $conn->query($sql);
    $total_cart = "SELECT * FROM cart";
    $total_cart_result = $conn->query($total_cart);
    $cart_num = mysqli_num_rows($total_cart_result);

    if(mysqli_num_rows($result) > 0){
        $in_cart = "already In cart";

        echo json_encode(["num_cart"=>$cart_num,"in_cart"=>$in_cart]);
    }else{
        $insert = "INSERT INTO cart(product_id, group_id, category_id, product_price) VALUES($product_id, $group_id, $category_id, $product_price)";
        if($conn->query($insert) === TRUE){
            $in_cart = "added to cart";
            echo json_encode(["num_cart"=>$cart_num,"in_cart"=>$in_cart]);
        }else{
            echo "<script>alert('it does not added')</script>";
        }
    }

}

if(isset($_GET["cart_id"])){
    $product_id = $_GET["cart_id"];
    $group_id = $_GET["group"]; 
    $category_id = $_GET["category"];
    $sql = "DELETE FROM cart WHERE product_id = $product_id AND group_id = $group_id AND category_id = $category_id" ;

    if($conn->query($sql) === TRUE){
        echo "Removed from cart";
    }
}

