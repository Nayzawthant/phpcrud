<?php 
  include("includes/header.php");
  include("includes/function.php");
  $id = $_GET['id'];
  if(!$id){
    header("Location: index.php");
  } 
  $dishe = select_one($id);
?>
    <div class="row">
        <div class="col-12">
            <h3>Update Article</h3>
        </div>
        <div class="col-12">
            <form action="update.php" method="POST" enctype="multipart/form-data" >
                <div class="mb-3">
                    <img src="/php/phprefrance/<?php echo $dishe['image']; ?>" width="80px" alt="">
                    <label for="exampleInputEmail1" class="form-label">Image</label>
                    <input type="file" value="/php/phprefrance/<?php echo $dishe['image']; ?>" name="image"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="name" value="<?php echo $dishe['name'] ?>" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Price</label>
                    <input type="text" value="<?php echo $dishe['price'] ?>" name="price" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">In_Stock</label>
                    <input type="default" value="<?php echo $dishe['in_stock'] ?>" name="in_stock" class="form-control" id="exampleInputPassword1">
                </div>
            <input type="hidden" name="id" value="<?php echo $dishe['id']; ?>"/>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
<?php 
 include('includes/footer.php');
?>