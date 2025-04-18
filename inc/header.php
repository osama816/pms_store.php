<?php require_once('core/function.php'); ?>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Homepage - EraaSoft PMS Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="">EraaSoft PMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="index.php">All Product</a></li>
                            <li><a class="dropdown-item" href="accessories.php">Accessories</a></li>
                            <li><a class="dropdown-item" href="clothes.php">Clothes</a></li>
                        </ul>
                    </li>

                </ul>
                <form class="d-flex" action="cart.php">
                    <button class="btn btn-outline-dark" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Cart
                        <span class="badge bg-dark text-white ms-1 rounded-pill">
                            <?php
                              $file = realpath(__DIR__ . "/../data/cart.json");
                              $cart=get_jsonfile($file);
                            if (!empty($cart)){
                            $count=0;
                           foreach ($cart as $product){
                                $count++;
                              }
                              echo $count;
                              }else{
                                echo 0;
                              }
                            ?>
                        </span>
                    </button>
                </form>
                <ul class="navbar-nav  mb-2 mb-lg-0 ms-lg-4">
                    <?php if (isset($_SESSION["user"])): ?>
                        <li class="nav-item"><a class="dropdown-item mb-lg-0 ms-lg-4" href="handelers/logout.php">Logout</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item"><a class="dropdown-item mb-lg-0 ms-lg-4" href="login.php">Login</a></li>
                    <?php endif; ?>
                </ul>
            </div>

        </div>
    </nav>
    <?php require_once "./core/function.php" ?>
    <div class="container content mt-4">
        <div class="text-center">
            <?php
            getmessage()
                ?>
        </div>
    </div>