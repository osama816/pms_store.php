<?php require_once('inc/header.php'); ?>

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-8 mx-auto">
                <h2>New product </h2>
                <form action="handelers/add_product.php" class="form border my-2 p-3" method="POST">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="product_name" class="form-label">product Name:</label>
                            <input type="text" id="product_name" name="product_name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="img_path" class="form-label">img path:</label>
                            <input type="text" name="img_path" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Type:</label>
                            <select name="type" id="type" class="form-select">
                                <option value="accessories">Accessories</option>
                                <option value="clothes">Clothes</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="price_befor_discount" class="form-label">price befor discount :</label>
                            <input type="number" name="price_befor_discount" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">price :</label>
                            <input type="number" name="price" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="details" class="form-label"> Details:</label>
                            <input type="text" name="details" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="add product" id="" class="btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="form border my-2 p-3">
        <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item ms-auto" style="transform: translateX(-800px);">
                <a class="btn btn-success" href="order.php">Order</a>
            </li>
        </ul>
    </div>
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">img path</th>
                            <th scope="col">Type</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $file = realpath(__DIR__ . "/data/product.json");
                        if (!empty(get_jsonfile($file))) {
                            foreach (get_jsonfile($file) as $product) {
                                echo " <tr>
                    <td>{$product['id']}</td>
                    <td> {$product['product_name']}</td>
                    <td>$ {$product['price']}</td>
                    <td> {$product['img_path']}</td>
                    <td> {$product['type']}</td>
                    <td>
                    <form action='handelers\delet_product.php' method='post'>
                    <input type='hidden' name='id' value=' {$product['id']}' >
                    <button class='btn btn-danger btn-sm'>delete</button>
                    </form>
                    </td>
                    </tr>
                    ";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php require_once('inc/footer.php'); ?>