<?php

    require_once 'upload.php';

    $success = false;
    $failed = false;

    $id = $_GET['id'];

    if (isset($_POST['edit_product'])){

        extract($_POST);

        $dir = upload('file', 'pictures');

        $result = $database->query("UPDATE products SET name='$name', description='$description', category='$category', price='$price', picture='$dir' WHERE id='$id'");

        if ($result){
            $success = true;
        }

    }

    $result = $database->query("SELECT * FROM products WHERE id='$id'");

    $product = $result->fetch_assoc();

?>

<?php if($success): ?>
    <div class="alert alert-success" role="alert">
        Product saved Successfully!
    </div>
<?php endif; ?>
<?php if($failed): ?>
    <div class="alert alert-danger" role="alert">
        Error! <?=$database->error;?>
    </div>
<?php endif; ?>

<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">New Product</h4>
                <p class="card-description">Add New Product</p>
                <form class="forms-sample" action="home.php?page=productEdit&id=<?=$id;?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputUsername1">Name</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" value="<?=$product['name'];?>" placeholder="Name" name="name" />
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea
                            class="form-control"
                            id="exampleTextarea1"
                            rows="4"
                            name="description"
                            placeholder="Description"
                        ><?=$product['description'];?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Category</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" value="<?=$product['category'];?>" placeholder="Category" name="category" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Price (RM)</label>
                        <input type="number" step="0.01" class="form-control" id="exampleInputPassword1" value="<?=$product['price'];?>" placeholder="Price (RM)" name="price" />
                    </div>
                    <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="file" class="file-upload-default" />
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" placeholder="Upload Image" />
                            <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button"> Upload </button>
                          </span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mr-2" name="edit_product"> Save </button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
