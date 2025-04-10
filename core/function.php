<?php
$file = realpath(__DIR__ . "/../data/user.json");


function setmessage($type, $message)
{
    session_start();
    $_SESSION['message'] = [
        "type" => $type,
        "text" => $message
    ];
}

function getmessage()
{
    if (isset($_SESSION['message'])) {
        $type = $_SESSION['message']["type"];
        $text = $_SESSION['message']["text"];
        echo "<div class='alert alert-$type'>$text</div>";
        unset($_SESSION['message']);
    }
}

function get_jsonfile($file)
{
    return file_exists($file) ? json_decode(file_get_contents($file), true) : [];

}
function user_register($name, $email, $password)
{
    $file = realpath(__DIR__ . "/../data/user.json");
    $user = get_jsonfile($file);
    if (!is_array($user)) {
        $user = [];
    }
    $id = empty($user) ? 1 : max(array_column($user, 'id')) + 1;
    $data = [
        "id" => $id,
        "name" => $name,
        "email" => $email,
        "password" => password_hash($password, PASSWORD_DEFAULT)

    ];
    $user[] = $data;
    file_put_contents($file, json_encode($user, JSON_PRETTY_PRINT));
    session_start();
    $_SESSION["user"] = [
        "name" => $name,
        "email" => $email
    ];
    return true;
}


function LoginUser($email, $password)
{
    $file = realpath(__DIR__ . "/../data/user.json");
    $user = get_jsonfile($file);
    if (!is_array($user)) {
        $user = [];
    }
    foreach ($user as $value) {
        if ($email == $value["email"] && password_verify($password, $value["password"])) {
            session_start();
            $_SESSION["user"] = [
                "name" => $value["name"],
                "email" => $value["email"]
            ];
            return true;
        }

    }
    return false;
}


function addcart($price, $product_name, $quantity)
{
    $file = realpath(__DIR__ . "/../data/cart.json");
    $cart = get_jsonfile($file);
    if (!is_array($cart)) {
        $cart = [];
    }
    $id = empty($cart) ? 1 : max(array_column($cart, 'id')) + 1;
    $data = [
        "id" => $id,
        "price" => $price,
        "product_name" => $product_name,
        "quantity" => $quantity
    ];
    $cart[] = $data;
    file_put_contents($file, json_encode($cart, JSON_PRETTY_PRINT));
    return true;
}


function deletproduct_cart($id)
{
    $file = realpath(__DIR__ . "/../data/cart.json");

    $cart = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
    $found = false;
    foreach ($cart as $key => $value) {
        if ($id == $value["id"]) {
            unset($cart[$key]);
            $found = true;
            break;
        }
    }
    if (!$found) {
        return false;
    }
    file_put_contents($file, json_encode(array_values($cart), JSON_PRETTY_PRINT));
    return true;
}


function addorder($name, $email, $address, $phone, $notes, $total_price, $products)
{
    $file = realpath(__DIR__ . "/../data/order.json");
    $order = get_jsonfile($file);
    if (!is_array($order)) {
        $order = [];
    }
    $id = empty($order) ? 1 : max(array_column($order, 'id')) + 1;
    $data = [
        "id" => $id,
        "name" => $name,
        "email" => $email,
        "address" => $address,
        "phone" => $phone,
        "notes" => $notes,
        "total_price" => $total_price,
        "products" => $products,
        "status" => "pending",
        "created_at" => date("Y-m-d H:i:s")
    ];
    $order[] = $data;
    file_put_contents($file, json_encode($order, JSON_PRETTY_PRINT));
    return true;
}


function delet_all_product()
{
    $file = realpath(__DIR__ . "/../data/cart.json");

    $cart = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
    $found = false;
    foreach ($cart as $key => $value) {

        unset($cart[$key]);
        $found = true;
    }

    if (!$found) {
        return false;
    }
    isset($_COOKIE["cart_count"]) ? setcookie("cart_count", 0, time() + 90000, "/") : "0";
    file_put_contents($file, json_encode(array_values($cart), JSON_PRETTY_PRINT));
    return true;
}

function Loginadmin($email, $password)
{
    if ($email == "elgendyo240@gmail.com" && $password == "123456") {
        session_start();
        $_SESSION["user"] = [
            "name" => "admin"   
        ];
        return true;
    }


    return false;
}
function addproduct($product_name, $price, $img_path, $price_befor_discount, $details, $type)
{
    $file = realpath(__DIR__ . "/../data/product.json");
    $product = get_jsonfile($file);
    if (!is_array($product)) {
        $product = [];
    }
    $id = empty($product) ? 1 : max(array_column($product, 'id')) + 1;
    $data = [
        "id" => $id,
        "product_name" => $product_name,
        "price" => $price,
        "price_befor_discount" => $price_befor_discount,
        "type" => $type,
        "details" => $details,
        "img_path" => $img_path
    ];
    $product[] = $data;
    file_put_contents($file, json_encode($product, JSON_PRETTY_PRINT));
    return true;
}
function delet_product($id)
{
    $file = realpath(__DIR__ . "/../data/product.json");

    $product = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
    $found = false;
    foreach ($product as $key => $value) {
        if ($id == $value["id"]) {
            unset($product[$key]);
            $found = true;
            break;
        }
    }
    if (!$found) {
        return false;
    }
    file_put_contents($file, json_encode(array_values($product), JSON_PRETTY_PRINT));
    return true;
}


function delet_order($id)
{
    $file = realpath(__DIR__ . "/../data/order.json");
    if (!file_exists($file)) {
        return false;
    }

    $order = json_decode(file_get_contents($file), true);
    if (!is_array($order)) {
        $order = [];
    }

    $found = false;
    foreach ($order as $key => $value) {
        if ($id == $value["id"]) {
            unset($order[$key]);
            $found = true;
            break;
        }
    }

    if (!$found) {
        return false;
    }
    file_put_contents($file, json_encode(array_values($order), JSON_PRETTY_PRINT));
    return true;
}


