<?php
require_once "../core/function.php";
require_once "../core/validete.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = trim($_POST['password']);
}

    $error = validate_Login( $email, $password);
    if (!empty($error)) {
        setmessage("danger", $error);
        header('Location:../login.php ');
        exit;
    }


if (LoginUser( $email, $password)) {
    setmessage("success", "Login success");
    header('Location:../index.php ');
    exit;
} else {
    setmessage("danger", "your email or password are error");
    header('Location:../login.php ');
    exit;
}