<?php include("include/header.php"); ?>
<?php 
    if($_SESSION['user_type'] != 'ADMIN'){
            $_SESSION['message'] = "Log in to continue";
            $_SESSION['status'] = "error";
            header("Location: ./login.php");
            exit();
        }
        ?>
<?php include("include/adminsidebar.php"); ?>
<h1 class="text-center mt-5">Add Products</h1>
<br>
<div class="card mx-5 mb-5">
        <br>
        <div class="cardbody mx-5">
                <form action="./Database/product.php" enctype="multipart/form-data" method="POST">
                        <br>
                        <div class="mb-3">
                                <label class="form-label">Product Name</label>
                                <input type="text" required name="p_name" required class="form-control" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                                <label class="form-label">Description</label>
                                <Textarea type="text" required name="p_description" required class="form-control" TextMode="MultiLine"> </textarea>
                        </div>
                        <div class="mb-3">
                                <label class="form-label">Quantity</label>
                                <input type="number" required name="p_quantity" required class="form-control" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Price</label>
                                <input type="number" required name="p_price" required class="form-control" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Image</label>
                                <input type="file" required name="p_image" accept="image/*" class="form-control" aria-describedby="emailHelp">
                        </div>
                        <button type="submit" class="btn btn-success" name="add_product">Submit</button>
                </form>
                <br>
        </div>
</div>

<?php include("include/footer.php"); ?>