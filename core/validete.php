<?php
function validaterequired($name, $fildname)
{
    return empty($name) ? "$fildname is requied " : null;
}

function validatemail($email)
{
    return !filter_var($email, FILTER_VALIDATE_EMAIL) ? "email is invailed " : null;
}

function passwordmath($password, $confirm_password)
{
    return $password !== $confirm_password ? "password not match" : null;
}
function name_string($name)
{
    return is_numeric($name) ? "Name Must be text" : null;
}

function validatepassword($password)
{
    if (strlen($password) < 6) {
        return "password must be 6 cher";
    }
    if (!preg_match("/[a-z]/", $password)) {
        return "password must be upercase";
    }
    if (!preg_match("/[1-9]/", $password)) {
        return "password must be number";
    }
    if (!preg_match("/[A-Z]/", $password)) {
        return "password must be lowercase";
    }
    return null;
}


function validateRegister($name, $email, $password, $confirm_password)
{
    $date =
        [
            "name" => $name,
            "email" => $email,
            "password" => $password,
            "confirm_password" => $confirm_password,
        ];

    foreach ($date as $key => $value) {
        if ($error = validaterequired($value, $key)) {
            return $error;
        }
    }

    if ($error = validatemail($email)) {
        return $error;
    }
    if ($error = name_string($name)) {
        return $error;
    }
    if ($error = passwordmath($password, $confirm_password)) {
        return $error;
    }
    if ($error = validatepassword($password)) {
        return $error;
    }
    return null;
}



function validate_Login($email, $password)
{
    $date =
        [
            "email" => $email,
            "password" => $password
        ];

    foreach ($date as $key => $value) {
        if ($error = validaterequired($value, $key)) {
            return $error;
        }
    }

    if ($error = validatemail($email)) {
        return $error;
    }

    return null;
}
function validate_order($name, $email, $address, $phone, $notes)
{

    $date =
        [
            "name" => $name,
            "email" => $email,
            "address" => $address,
            "phone" => $phone,
            "notes" => $notes,

        ];

    foreach ($date as $key => $value) {
        if ($error = validaterequired($value, $key)) {
            return $error;
        }
    }
    if ($error = validatemail($email)) {
        return $error;
    }

}
