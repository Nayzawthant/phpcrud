<?php 

    include("includes/function.php");

    if ($_POST) {
        $errors = [];
        if (empty($_POST['name'])) {
            $errors['name'] = "Please provide name value";
        }
        if (empty($_POST['price'])) {
            $errors['price'] = "Please provide price value";
        }

        if (!empty($errors)) {
            header("Location:create.php");
        }

        $name = $_POST['name'];
        $price = $_POST["price"];
        $in_stock = $_POST["in_stock"];
        $target_file = "";
        
        if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
              if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
              }
              else {
                echo "Sorry, there was an error uploading your file.";
              }
            }
            else {
              echo "File is not an image.";
            }
          }
          else {
            echo "Sorry, there was an error uploading your file.";
          }

        if(insert($name, $price, $target_file, $in_stock)) {
            header("Location: index.php");
        } else {
            header("Location: create.php");
        }
    }


?>