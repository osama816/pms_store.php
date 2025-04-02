<?php
require_once "../core/function.php";
require_once "../core/validete.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $price = $_POST['price'];
    $price_befor_discount = $_POST['price_befor_discount'];
    $product_name = $_POST['product_name'];
    $img_path = $_POST['img_path'];
    $details = $_POST['details'];
    $type = $_POST['type'];
}

if (addproduct($product_name, $price, $img_path, $price_befor_discount, $details, $type)) {
    setmessage("success", "add product success");
    header('Location:../control.php ');
    exit;
} else {
    setmessage("danger", "add product fail");
    header('Location:../control.php ');
    exit;
}