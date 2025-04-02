<?php require_once('inc/header.php'); ?>
<?php
$id = $_GET["id"];
$file = realpath(__DIR__ . "/data/product.json");
if (!empty(get_jsonfile($file))) {
    foreach (get_jsonfile($file) as $product) {
        if ($product["id"] == $id) {
            $img_path = $product["img_path"];
            $product_name = $product["product_name"];
            $details = $product["details"];
            $price = $product["price"];
            break;
        }
    }
}

?>
?>

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5">
        <div class="row">
            <div class="col-12">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6">
                        <img class="more card-img-top mb-5 mb-md-0 " src="<?= $img_path ?>" alt="...">
                    </div>
                    <div class="col-md-6">
                        <h1 class="display-5 fw-bolder"> <?= $product_name ?></h1>
                        <div class="fs-5 mb-5">
                            <span>
                                <?= $details ?>
                            </span>
                        </div>
                        <div class="fs-5 mb-5">
                            <h2>
                                <?= $price ?> $
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
</section>
<?php require_once('inc/footer.php'); ?>