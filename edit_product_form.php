<?php
$product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
require('database.php');

        //include "../edit_product.php";

        

       
//testing this theory
$query = 'SELECT *
          FROM categories
          ORDER BY categoryID';          
$statement = $db->prepare($query);
//$statement->bindValue(':product_id', $product_id);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
//$code = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
//$name = filter_input(INPUT_POST, 'name', FILTER_VALIDATE_INT);
//$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT);
$code = filter_input(INPUT_POST, 'code', FILTER_VALIDATE_INT);
$name = filter_input(INPUT_POST, 'name', FILTER_VALIDATE_INT);
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
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
            <input type="text" name="code" value="<?php echo $code; ?>"><br>
		<br>
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $name; ?>"><br>
		<br>
            <label>List Price:</label>
            <input type="text" name="price" value="<?php echo $price; ?>"><br>
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
