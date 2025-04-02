<?php
require_once "../core/function.php";
require_once "../core/validete.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $price = $_POST['price'];
    $product_name = $_POST['product_name'];
    $quantity = $_POST['quantity'];
}

if (addcart($price, $product_name, $quantity)) {
    setmessage("success", "add cart success");
    header('Location:../index.php ');
    exit;
} else {
    setmessage("danger", "add cart fail");
    header('Location:../index.php ');
    exit;
}