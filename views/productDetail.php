<?php
include "./public/headers.php";
require_once './models/CartModel.php';
require_once './models/ProductModel.php';


?>
<main>
    <section>
        <!--Form to add new product-->
        <div class="registerfrm">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="login-container">
                            <center>
                                <h3 class="mb-3">Product Details</h3>
                            </center>
                            <hr />
                            <form action="#" method="post">
                                <div class="mb-3">
                                    <center><img src="./images/pic3" width="100" height="100" style="border-radius:5px;">
                                    </center><br>
                                    <label for="name"><b>Name</b></b></label>
                                    <input type="text" class="form-control" name="name" value="<?php echo $product['name']; ?>" placeholder="Product Name" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="price"><b>Price</b></label>
                                    <input type="text" class="form-control" name="price" value="<?php echo $product['price']; ?>" placeholder="Product prix" readonly>
                                </div>


                                <div class="mb-3">
                                    <label for="Qty" class="form-label"><b>Quantity *</b></label>
                                    <input type="number" class="form-control" name="Qty" min=0 max=<?php echo $product['qtty']; ?> required>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label"><b>Item Description</b></label>
                                    <textarea class="form-control" name="item_description" rows="3" readonly><?php echo $product['item_description']; ?></textarea>
                                </div>
                                <center>
                                    <div class="mb-3">
                                        <button name="addCart" class="btn btn-warning"><i class="bi bi-cart-plus-fill"></i> <b>Add to cart</b></button>
                                    </div>
                                </center>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
?>