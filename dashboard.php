<?php

    $success = false;
    $failed = false;



    if (isset($_GET['buy_now'])){

        $product_id = $_GET['buy_now'];

        $result = $database->query("INSERT INTO orders (product_id, user_id, status) 
                                VALUES ('$product_id', '" . $auth['id'] . "', 0)");

        if ($result){
            $success = true;
        }

    }

    $result = $database->query("SELECT * FROM products");
?>

<?php if($success): ?>
    <div class="alert alert-success" role="alert">
        Order Submitted Successfully!
    </div>
<?php endif; ?>
<?php if($failed): ?>
    <div class="alert alert-danger" role="alert">
        Error! <?=$database->error;?>
    </div>
<?php endif; ?>

<div class="row">
    <?php while($product = $result->fetch_assoc()): ?>
        <div class="col-sm-4 stretch-card grid-margin">
            <div class="card">
                <div class="card-body p-0">
                    <img class="img-fluid w-100" src="./<?=$product['picture'];?>" alt="" />
                </div>
                <div class="card-body px-3 text-dark">
                    <div class="d-flex justify-content-between">
                        <p class="text-muted font-13 mb-0"><?=$product['name'];?></p>
                    </div>
                    <h5 class="font-weight-semibold"> <?=$product['description'];?> </h5>
                    <div class="d-flex justify-content-between font-weight-semibold">
                        <?php if ($auth['role'] == 2 ): ?>
                            <p class="mb-0">
                                <a href="home.php?page=dashboard&buy_now=<?=$product['id'];?>" class="btn btn-primary">Buy Now</a> </p>
                        <?php endif; ?>
                        <p class="mb-0">RM <?=$product['price'];?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>
