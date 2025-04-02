<?php require_once('inc/header.php'); ?>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"> Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Addess</th>
                            <th scope="col">phone</th>
                            <th scope="col">Notes</th>
                            <th scope="col">Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $file = realpath(__DIR__ . "/data/order.json");
                        if (!empty(get_jsonfile($file))) {
                            foreach (get_jsonfile($file) as $product) {
                                echo " <tr>
                    <td>{$product['id']}</td>
                    <td> {$product['name']}</td>
                    <td> {$product['email']}</td>
                    <td> {$product['address']}</td>
                    <td> {$product['phone']}</td>
                    <td> {$product['notes']}</td>
                    <td>$ {$product['total_price']}</td>
                    <td>
                    <form action='handelers\delet_order.php' method='post'>
                    <input type='hidden' name='id' value=' {$product['id']}' >
                    <button class='btn btn-danger btn-sm'>delete</button>
                    </form>
                    </td>
                    </tr>
                    ";
                            }
                        }
                        ?>
                </table>
            </div>
        </div>
    </div>
</section>