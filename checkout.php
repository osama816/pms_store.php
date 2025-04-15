<?php require_once('inc/header.php');

?>
<?php  
if(!isset($_SESSION["user"])):
    setmessage("danger", "shoud be Login");
    header('Location:login.php ');
    exit;
endif;
?>

<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Checkout </h1>
        </div>
    </div>
</header>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-4">
                <div class="border p-2">
                    <div class="products">
                        <ul class="list-unstyled">
                            <?php
                    $total=0;
                    $total_price=0;

                    $file = realpath(__DIR__ . "/data/cart.json");
            if (!empty(get_jsonfile($file))) {
                foreach (get_jsonfile($file) as $product ) {
                    $quantity=isset($product['quantity'])?$product['quantity']:1;
                    $total=$product['price']*$quantity;
                    $total_price+=$total;
                    
                    echo " 
                                                <li class='border p-2 my-1'> {$product['product_name']} -
                                <span class='text-success mx-2 mr-auto bold'>{$product['quantity']} x {$quantity }$     = {$total}$ </span>
                            </li>
                        ";
                    }
                    }
                        ?>
                        </ul>
                    </div>
                    <h3>Total : <?=$total_price?> $</h3>
                </div>
            </div>
            <div class="col-8">
                <form action="handelers/order.php" class="form border my-2 p-3 "method="post">
                    <div class="mb-3">
                            <input type="hidden" name="name" value="<?=$_SESSION["user"]["name"]?>" id="" class="form-control">
                            <input type="hidden" name="email" value="<?=$_SESSION["user"]["email"]?>" id="" class="form-control">
                        <div class="mb-3">
                            <label for="">Address</label>
                            <input type="text" name="address" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Phone</label>
                            <input type="number" name="phone" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Notes</label>
                            <input type="text" name="notes" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Send" id="" class="btn btn-success">
                        </div>
                    </div>
                    <input type="hidden" name="total_price" value="<?=$total_price?> ">
                </form>
            </div>
        </div>
    </div>
</section>
<?php require_once('inc/footer.php'); ?>