<?php
require_once "../core/function.php";
require_once "../core/validete.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $price = $_POST['price'];
    $product_name = $_POST['product_name'];
    $product_id = $_POST['product_id'];
    $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 1;
}

if (addcart($price, $product_name, $quantity, $product_id)) {
    setmessage("success", "Product added to cart successfully");
    header('Location:../index.php');
    exit;
} else {
    setmessage("danger", "Failed to add product to cart");
    header('Location:../index.php');
    exit;
}