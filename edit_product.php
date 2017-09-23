<?php
require_once('database.php');

// Get IDs
$product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

//if (isset($_GET['product_id'])) {

           //$product_id = $_GET['product_id'];
		   //$product_id = $_POST['product_id']; //if your method="post"

           //$sql = mysql_query("SELECT * FROM articles WHERE product_id='$product_id'");
           //while($row = mysql_fetch_array($sql)) {
           //$product_id = $row['product_id'];
           //$code = $row['code'];
           //$name = $row['name'];
           //$price = $row['price'];
                
           //}


// Validate inputs
if ($category_id == null || $category_id == false ||
        $code == null || $name == null || $price == null || $price == false) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    // UPDATE the product to the database  
    //$query = "UPDATE products  
              //SET listPrice = :price
              //WHERE productID = :product_id";
    $query = "UPDATE products 
    		 SET categoryID = '$category_id' 
    		 WHERE productID = '$product_id'";          
                 
    $statement = $db->prepare($query);
    //$statement->bindValue(':price', $price);
    $statement->bindValue(':product_id', $product_id);
    $statement->execute();
    $statement->closeCursor();
    
 
    

    // Display the Product List page
    include('index.php');
}
?>