<?php 
    include("includes/header.php");
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h3>Create Page</h3>
        </div>
        <div class="col-12">
        <form action="stores.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Image</label>
                <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="name" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Price</label>
                <input type="text" name="price" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">In_Stock</label>
                <input type="default" name="in_stock" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" value="Upload" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </div>
</div>
<?php
    include("includes/footer.php");
?>
