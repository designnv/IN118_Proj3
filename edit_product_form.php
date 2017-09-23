<?php
$product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
require('database.php');

        //include "../edit_product.php";

        

       
//testing this theory
$query = 'SELECT *
          FROM products
          WHERE productID = :product_id';
$query = 'SELECT *
          FROM categories
          ORDER BY categoryID';          
$statement = $db->prepare($query);
$statement->bindValue(':product_id', $product_id);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>





<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<!-- the body section -->
<body>
    <header><h1>Product Manager</h1></header>

    <main>
        <h1>Edit Product</h1>
    <!-- Begin Form -->
        <form action="edit_product.php" method="post"
              id="edit_product_form">

            <label>Category:</label>
            <select name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>
		<br>
<!-- Display product data to edit -->


	
            <label>Code:</label>
            <input type="text" name="code"><br>
		<br>
            <label>Name:</label>
            <input type="text" name="name"><br>
		<br>
            <label>List Price:</label>
            <input type="text" name="price"><br>
		<br>
            <label>&nbsp;</label>
            <input type="submit" value="Save Changes"><br>
      
        </form>
        
	<!-- End Form -->
        <p><a href="index.php">View Product List</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </footer>
</body>
</html>
