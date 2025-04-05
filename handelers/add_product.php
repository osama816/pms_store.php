<?php
require_once "../core/function.php";
require_once "../core/validete.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_POST as $key => $value) {
        $$key = htmlspecialchars(trim($value));
    }
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
