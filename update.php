<?php 
    include("includes/function.php");

    if($_POST){
        $errors= [];
        if(empty($_POST['id'])){
            $errors['id'] = 'Please provide id value';
        }
        if(empty($_POST['name'])){
            $errors['name'] = 'Please provide name value';
        }
        if(empty($_POST['price'])){
            $errors['price'] = 'Please provide price value';
        }

        if(!empty($errors)){
           header("Location: edit.php?id=".$id);
        } else {

            $id = $_POST["id"];
            $name = $_POST["name"];
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

            if(update($id, $name, $price, $in_stock, $target_file)) {
                header("Location: index.php");
            } else {
                header("Location: create.php?=".$id);
            }
        }

        
    }
?>