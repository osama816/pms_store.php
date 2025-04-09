<?php
include_once("../core/function.php");
include_once("../core/validete.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_POST as $key => $value) {
        $$key = htmlspecialchars(trim($value));
    }

    $error = validateRegister($name, $email, $password, $confirm_password);
    if (!empty($error)) {
        setmessage("danger", $error);
        header('Location:../form_register.php ');
        exit;
    }
}

if (user_register($name, $email, $password)) {
    setmessage("success", "add user success");
    header('Location:../index.php ');
    exit;
} else {
    setmessage("danger", "add user fild");
    header('Location:../form_register.php ');
    exit;
}

?>