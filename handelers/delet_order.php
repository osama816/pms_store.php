<?php
include "../core/function.php";
if ($_SERVER["REQUEST_METHOD"] !== "POST" || empty($_POST["id"]) || !isset($_POST["id"])) {
    setmessage("danger", " invalid order ");
    header('Location:../order.php ');
    exit;
}
$id = $_POST["id"];

if (delet_order($id)) {
    setmessage("success", "delet order success");
    header('Location:../order.php ');
    exit;
} else {
    setmessage("danger", "delet order fail");
    header('Location:../order.php ');
    exit;
}