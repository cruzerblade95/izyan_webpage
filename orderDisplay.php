<?php

    $success = false;
    $failed = false;

    if (isset($_GET['update'])){

        $row = $database->query("UPDATE orders SET status='".$_GET['update']."' WHERE id='" . $_GET['id'] . "' ");

        if ($row){
            $success = true;
        }
    }

    if ($auth['role'] == 1){
        $result = $database->query("SELECT *,o.id as idOrder, p.name as nameProduct, u.name as nameUser FROM orders o, products p, users u WHERE o.product_id = p.id AND o.user_id = u.id");
    }else{
        $result = $database->query("SELECT *,o.id as idOrder,p.name as nameProduct, u.name as nameUser FROM orders o, products p, users u WHERE o.product_id = p.id AND o.user_id = u.id AND u.id='".$auth['id']."'");
    }


?>

<?php if($success): ?>
    <div class="alert alert-success" role="alert">
        Order updated Successfully!
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
                <h4 class="card-title">Order</h4>
                <p class="card-description"> List of Orders</code>
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
                            <th>Made By</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php while($product = $result->fetch_assoc()): ?>
                            <tr>
                                <td>M<?=$product['product_id'];?></td>
                                <td><?=$product['nameProduct'];?></td>
                                <td><?=$product['description'];?></td>
                                <td><?=$product['category'];?></td>
                                <td><?=$product['price'];?></td>
                                <td>
                                    <a href="./<?=$product['picture'];?>" class="btn btn-info">Download</a>
                                </td>
                                <td><?=$product['nameUser'];?></td>
                                <td>
                                    <?php if($product['status'] == 0): ?>
                                        <label class="badge badge-primary">Pending</label>
                                    <?php endif; ?>
                                    <?php if($product['status'] == 1): ?>
                                        <label class="badge badge-success">Completed</label>
                                    <?php endif; ?>
                                    <?php if($product['status'] == 2): ?>
                                        <label class="badge badge-danger">Rejected</label>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($auth['role'] == 1): ?>
                                        <a href="home.php?page=orderDisplay&update=1&id=<?=$product['idOrder'];?>" class="btn btn-success">Completed</a>
                                        <a href="home.php?page=orderDisplay&update=2&id=<?=$product['idOrder'];?>" class="btn btn-danger">Rejected</a>
                                    <?php endif; ?>
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
