<?php require_once('inc/header.php'); ?>
<?php  
if(!isset($_SESSION["user"])):
    setmessage("danger", "You should be logged in to view orders");
    header('Location:login.php');
    exit;
endif;
?>

<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">My Orders</h1>
            <p class="lead fw-normal text-white-50 mb-0">View your order history</p>
        </div>
    </div>
</header>

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
        <div class="col-12" style="overflow-x: auto; width: 100%;">
            <div class="col-12">
                <table class="table table-bordered" style="min-width: 800px;">
                    <thead>
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Date</th>
                            <th scope="col">Products</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $file = realpath(__DIR__ . "/data/order.json");
                        if (!empty(get_jsonfile($file))) {
                            foreach (get_jsonfile($file) as $order) {
                                if ($order["email"] == $_SESSION["user"]["email"]) {
                                    echo "<tr>
                                        <td>{$order['id']}</td>
                                        <td>{$order['name']}</td>
                                        <td>{$order['email']}</td>
                                        <td>{$order['created_at']}</td>
                                        <td>
                                            <ul class='list-unstyled'>";
                                    
                                    foreach ($order['products'] as $product) {
                                        $productTotal = $product['price'] * $product['quantity'];
                                        echo "<li>{$product['product_name']} - {$product['quantity']} x {$product['price']}$ = {$productTotal}$</li>";
                                    }
                                    
                                    echo "</ul>
                                        </td>
                                        <td>{$order['total_price']}$</td>
                                        <td>
                                            <span class='badge bg-" . ($order['status'] == 'pending' ? 'warning' : 'success') . "'>
                                                {$order['status']}
                                            </span>
                                        </td>
                                    </tr>";
                                }
                            }
                        } else {
                            echo "<tr><td colspan='7' class='text-center'>No orders found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
</section>

<?php require_once('inc/footer.php'); ?> 