<?php
require_once('database.php');

// Get IDs
$product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
//$code = filter_input(INPUT_POST, 'code', FILTER_VALIDATE_INT);
//$name = filter_input(INPUT_POST, 'name', FILTER_VALIDATE_INT);
//$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT);
// Get the product data

$code = filter_input(INPUT_POST, 'code');
$name = filter_input(INPUT_POST, 'name');
$price = filter_input(INPUT_POST, 'price');
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
    		SET categoryID = '$category_id', code = '$code', name = '$name', price = '$price'  
    		WHERE productID = '$product_id'";          
    
                 
    $statement = $db->prepare($query);
    $statement->bindValue(':product_id', $product_id);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':code', $code);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':price', $price);
    $statement->execute();
    $statement->closeCursor();
    
 
    

    // Display the Product List page
    include('index.php');
}
?>