
<?php
require_once "../core/function.php";
require_once "../core/validete.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_POST as $key => $value) {
        $$key = htmlspecialchars(trim($value));
    }
}

$error = validate_order($name, $email, $address, $phone, $notes);
if (!empty($error)) {
    setmessage("danger", $error);
    header('Location:../checkout.php ');
    exit;
}

$cart_file = realpath(__DIR__ . "/../data/cart.json");
$products = get_jsonfile($cart_file);

if (addorder($name, $email, $address, $phone, $notes, $total_price, $products)) {
    setmessage("success", "add order success");
    delet_all_product();
    header('Location:../checkout.php ');
    exit;
} else {
    setmessage("danger", "add order fail");
    header('Location:../checkout.php ');
    exit;
}
