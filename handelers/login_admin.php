<?php
require_once "../core/function.php";
require_once "../core/validete.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_POST as $key => $value) {
        $$key = htmlspecialchars(trim($value));
    }
}



if (Loginadmin($email, $password)) {
    setmessage("success", "Login success");
    header('Location:../control.php ');
    exit;
} else {
    setmessage("danger", "Login fail");
    header('Location:../form_Login_admin.php ');
    exit;
}