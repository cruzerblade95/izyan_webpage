<?php

    $success = false;
    $failed = false;

    if (isset($_GET['delete'])){

        $row = $database->query("DELETE FROM products WHERE id='" . $_GET['delete'] . "' ");

        if ($row){
            $success = true;
        }
    }

    $result = $database->query("SELECT * FROM products");

?>

<?php if($success): ?>
    <div class="alert alert-success" role="alert">
        Product deleted Successfully!
    </div>
<?php endif; ?>
<?php if($failed): ?>
    <div class="alert alert-danger" role="alert">
        Error! <?=$database->error;?>
    </div>
<?php endif; ?>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Products</h4>
                <p class="card-description"> List of Products</code>
                </p>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Code/ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Price (RM)</th>
                            <th>Picture</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php while($product = $result->fetch_assoc()): ?>
                                <tr>
                                    <td>M<?=$product['id'];?></td>
                                    <td><?=$product['name'];?></td>
                                    <td><?=$product['description'];?></td>
                                    <td><?=$product['category'];?></td>
                                    <td><?=$product['price'];?></td>
                                    <td>
                                        <a href="./<?=$product['picture'];?>" class="btn btn-info">Download</a>
                                    </td>
                                    <td>
                                        <a href="home.php?page=productEdit&id=<?=$product['id'];?>" class="btn btn-success">Edit</a>
                                        <a href="home.php?page=productDisplay&delete=<?=$product['id'];?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
