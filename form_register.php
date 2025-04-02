<?php require_once ('inc/header.php'); ?>

<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-8 mx-auto">
                <h2>Register </h2>
                <form action="handelers/register.php" class="form border my-2 p-3"method="POST">
                    <div class="mb-3">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>
                        
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="text" id="email" name="email" class="form-control">
                    </div>
                        
                    <div class="mb-3">
                        <label for="password" class="form-label">password:</label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>
                        
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirm Password:</label>
                        <input type="password" id="confirm_password" name="confirm_password" class="form-control">
                    </div>
                        
                        
                        <div class="mb-3">
                            <input type="submit" value="Login" id="" class="btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php require_once('inc/footer.php'); ?>