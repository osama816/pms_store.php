<?php require_once('inc/header.php'); ?>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
        <div class="col-12" style="overflow-x: auto; width: 100%;">
            <div class="col-12">
                <table  class="table table-bordered" style="min-width: 800px;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"> Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Addess</th>
                            <th scope="col">phone</th>
                            <th scope="col">Notes</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">status</th>
                            <th scope="col">created_at</th>
                            <th scope="col">products</th>
                            <th scope="col"></th>
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
                    <td> {$product['total_price']}</td>
                    <td> {$product['status']}</td>
                    <td> {$product['created_at']}</td><td>";
                    foreach ($product['products'] as $cart ) {
                        $total=$cart['price']*$cart['quantity'];
                        echo " 
                                                    <li class='border p-2 my-1'> {$cart['product_name']} :
                                    <span class='text-success mx-2 mr-auto bold'>{$cart['quantity']} x {$cart['price'] }$     = {$total}$ </span>
                                </li>
                            ";
                        }
                        
                    echo " </td><td>
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
    </div>
</section>