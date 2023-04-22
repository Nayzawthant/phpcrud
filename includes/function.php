<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "refrance";


function insert($name, $price, $image, $in_stock) {
    try {
        global $servername, $username, $password, $database;
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO dishes (name, price, image, in_stock)
        VALUES ('".$name."', '".$price."', '".$image."', '".$in_stock."')";
        // use exec() because no results are returned
        $conn->exec($sql);

        return true;
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        return false;
    }
}

function select() {
    try {
        global $servername, $username, $password, $database;
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $stmt = $conn->prepare("SELECT * FROM dishes"); 
        $stmt->execute();
      
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $records = $stmt->fetchAll();
        return $records;
      } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
      }
}

function select_one($id) {
    try {
        global $servername, $username, $password, $database;
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $stmt = $conn->prepare("SELECT * FROM dishes WHERE id=$id");
        $stmt->execute();
      
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $record = $stmt->fetch();
        return $record;
      } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
      }
}

function update($id, $name, $price, $in_stock, $image){
    try {
        global $servername, $username, $password, $database;
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
        if (!empty($image)) {
          $sql = "UPDATE dishes SET name='".$name."', price='".$price."', in_stock='".$in_stock."', image='".$image."' WHERE id=$id;";
         
        } else {
          $sql = "UPDATE dishes SET name='".$name."', price='".$price."', in_stock='".$in_stock."' WHERE id=$id;";
        }
      
        // Prepare statement
        $stmt = $conn->prepare($sql);
      
        // execute the query
        $stmt->execute();
      
        // echo a message to say the UPDATE succeeded
        return true;

      } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        return false;
      }
      
}

function delete($id){
    
    try {
        global $servername, $username, $password, $database;
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        // sql to delete a record
        $sql = "DELETE FROM dishes WHERE id=$id;";
    
        // use exec() because no results are returned
        $conn->exec($sql);
        return true;
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        return false;
    }
}
?>

