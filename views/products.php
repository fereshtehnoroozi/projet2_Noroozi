<?php
include "./public/headers.php";

global $viewData;
$product = $viewData['product'];

var_dump($viewData);

?>

<main>
    <section class="products">
        <marquee behavior="alternate">
            <h1 style="color: navy">Products</h1>
        </marquee>
        <hr>
        <div class="productContainer">
            <?php foreach ($products as $product) { ?>
                <div class="product">
                    <img src="./images/pic3" class="my_img">
                    <h2>
                        <?php echo $product['name']; ?>
                    </h2><br>
                    <p><b>Item Description:</b>
                        <?php echo $product['description']; ?>
                    </p>
                    <span class="price"><b>Price:</b>$
                        <?php echo $product['price']; ?>
                    </span><br>


                    <a href="productDetail=<?php echo $product['id']; ?>" class="btn btn-primary"><i class="bi bi-eye-fill"></i> View Product</a>
                </div>


            <?php } ?>
        </div>

    </section>
</main>

<?php
?>