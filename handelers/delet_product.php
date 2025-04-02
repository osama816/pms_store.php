<?php
include "../core/function.php";
if ($_SERVER["REQUEST_METHOD"] !== "POST" || empty($_POST["id"]) || !isset($_POST["id"])) {
    setmessage("danger", " invalid product ");
    header('Location:../cart.php ');
    exit;
}
$id = $_POST["id"];

if (delet_product($id)) {
    setmessage("success", "delet product success");
    header('Location:../control.php ');
    exit;
} else {
    setmessage("danger", "delet product fail");
    header('Location:../control.php ');
    exit;
}