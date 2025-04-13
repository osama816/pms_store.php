<?php require_once('inc/header.php'); ?>
<?php require_once('core/function.php'); ?>

<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Shop </h1>
            <p class="lead fw-normal text-white-50 mb-0">Product Your Chooses</p>
        </div>
    </div>
</header>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $file = realpath(__DIR__ . "/data/cart.json");
                        $total = 0;
                        $total_price = 0;
                        if (!empty(get_jsonfile($file))) {
                            foreach (get_jsonfile($file) as $product) {
                                $total = $product['price'] *( isset($product['quantity'])?$product['quantity']:1);
                                $total_price += $total;
                                echo " <tr>
                    <td>{$product['id']}</td>
                    <td> {$product['product_name']}</td>
                    <td>$ {$product['price']}</td>
                    <td> 
                     <form action='handelers/update_quantity.php' method='post'>
                     <div class='input-group mb-3' style='max-width: 150px; margin: 0 auto;'>
                    <input type='number' name='quantity' class='form-control' value='{$product['quantity']}' min='1' max='10'>
                    <input type='hidden' name='id' value='{$product['id']}'>
                    <button type='submit' class='btn btn-outline-primary'>Update</button>
                    </div>
                    </form>
                    </td>
                    <td>$ {$total}</td>
                    <td>
                    <form action='handelers\deletproduct_cart.php' method='post'>
                    <input type='hidden' name='id' value=' {$product['id']}' >
                    <button class='btn btn-danger btn-sm'>delete</button>
                    </form>
                    </td>
                    </tr>
                    ";
                            }
                        }
                        ?>
                        <tr>
                            <td colspan="2">
                                Tatal Price
                            </td>
                            <td colspan="3">
                                <h3><?= $total_price ?> $</h3>
                            </td>
                            <td>
                                <a href="checkout.php" class="btn btn-primary">Checkout</a>
                            </td>
                        </tr>
                </table>
            </div>
        </div>
    </div>
</section>
<?php require_once('inc/footer.php'); ?>


