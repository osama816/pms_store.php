
<?php
require_once "../core/function.php";
require_once "../core/validete.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $notes = $_POST['notes'];
    $total_price = $_POST['total_price'];

}

$error = validate_order( $name, $email,$address,$phone,$notes);
if (!empty($error)) {
    setmessage("danger", $error);
    header('Location:../checkout.php ');
    exit;
}

if (addorder( $name, $email,$address,$phone,$notes,$total_price)) {
    setmessage("success", "add order success");
    delet_all_product();
    header('Location:../checkout.php ');
    exit;
} else {
    setmessage("danger", "add oeder fail");
    header('Location:../checkout.php ');
    exit;
}