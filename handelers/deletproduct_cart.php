<?php
include "../core/function.php";
if ($_SERVER["REQUEST_METHOD"] !== "POST" || empty($_POST["id"]) || !isset($_POST["id"])) {
    foreach ($_POST as $key => $value) {
        $$key = htmlspecialchars(trim($value));
    }
    setmessage("danger", " invalid product ");
    header('Location:../cart.php ');
    exit;
}


if (deletproduct_cart($id)) {
    setmessage("success", "delet product success");
    header('Location:../cart.php ');
    exit;
} else {
    setmessage("danger", "delet product fail");
    header('Location:../cart.php ');
    exit;
}