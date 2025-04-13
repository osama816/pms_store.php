<?php
require_once "../core/function.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST" || empty($_POST["id"]) || !isset($_POST["quantity"])) {
    setmessage("danger", "Invalid request");
    header('Location:../cart.php');
    exit;
}

$id = $_POST["id"];
$quantity = $_POST["quantity"];

// Validate quantity
if ($quantity < 1 || $quantity > 10) {
    setmessage("danger", "Quantity must be between 1 and 10");
    header('Location:../cart.php');
    exit;
}

$file = realpath(__DIR__ . "/../data/cart.json");
$cart = get_jsonfile($file);

// Update quantity for the specified product
foreach ($cart as &$product) {
    if ($product["id"] == $id) {
        $product["quantity"] = $quantity;
        break;
    }
}

// Save updated cart
file_put_contents($file, json_encode($cart, JSON_PRETTY_PRINT));

setmessage("success", "Quantity updated successfully");
header('Location:../cart.php');
exit; 