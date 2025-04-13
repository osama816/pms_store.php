<?php require_once('inc/header.php');
?>



<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 ">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">All Product </h1>

        </div>
    </div>
</header>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php

            $file = realpath(__DIR__ . "/data/product.json");
            if (!empty(get_jsonfile($file))):
                foreach (get_jsonfile($file) as $product):
                    if ($product["type"] !== "clothes") {
                        continue;
                    }
                    ?>

                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale
                            </div>
                            <!-- Product image-->
                            <a href="about.php?id=<?= $product["id"] ?>">
                                <img class="card-img-top" style="height: 100%;width: 100%;" src="<?= $product["img_path"] ?>"
                                    alt="..." />
                            </a>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?= $product["product_name"] ?></h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    <span
                                        class="text-muted text-decoration-line-through">$<?= $product["price_befor_discount"] ?></span>
                                    <?= $product["price"] ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <?php
                            $file_cart = realpath(__DIR__ . "/data/cart.json");
                            $cart_products = get_jsonfile($file_cart);
                            $product_in_cart = false;
                            
                            if (!empty($cart_products)) {
                                foreach ($cart_products as $cart) {
                                    if ($cart['product_id'] == $product["id"]) {
                                        $product_in_cart = true;
                                        break;
                                    }
                                }
                            }
                            
                            if (!$product_in_cart):
                            ?>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <form action="handelers/add_cart.php" method="POST">
                                        <input type="hidden" name="product_name" value="<?= $product["product_name"] ?>">
                                        <input type="hidden" name="price" value="<?= $product["price"] ?>">
                                        <input type="hidden" name="product_id" value="<?= $product["id"] ?>">
                                        <button type="submit" class="btn btn-outline-dark mt-auto">Add to cart</button>
                                    </form>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php
                            if ($product_in_cart):
                            ?>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                        <button type="submit" class="btn btn-outline-dark mt-auto">product in cart</button>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>
    </div>
</section>
<?php require_once('inc/footer.php'); ?>

