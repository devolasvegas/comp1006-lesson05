<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Saved Beer</title>
</head>
<body>
<?php
	// Store the form inputs into variables
	$beer_name = $_POST['beer_name'];
	$alcohol_content = $_POST['alcohol_content'];
	$domestic = $_POST['domestic'];
	$light = $_POST['light'];
	$price = $_POST['price'];
	$isOkay = true;

	// Validate inputs before connect to the database
	if (empty($beer_name)) {
		echo 'Name is required <br>';
		$isOkay = false;
	}
	if(empty($alcohol_content) || (!is_numeric($alcohol_content)) || ($alcohol_content <= 0)) {
		echo 'Alcohol content is required and must be 0 or greater <br>';
		$isOkay = false;
	}
	if (empty($price) || (!is_numeric($price)) || ( $price <= 0 )) {
		echo 'Price is required and must be 0 or greater <br>';
		$isOkay = false;
	}
	// Check flag is form is okay to send
	if ($isOkay) {
		// Connect to the database
		echo $beer_name . '<br>';
		echo $alcohol_content . '<br>';
		echo $domestic . '<br>';
		echo $light . '<br>';
		echo $price . '<br>';

		try {
			$conn = new PDO('mysql:host=sql.computerstudi.es;dbname=gc100022849', 'gc100022849', '9syKsQCu');
		} catch (PDOException $e) {
			echo 'Connection failed: ' . $e->getMessage();
		}

		$sql = "INSERT INTO beers (beer_name, alcohol_content, domestic, light, price) VALUES (:beer_name, :alcohol_content, :domestic, :light, :price)";
		// Create a command object
		$cmd = $conn ->prepare($sql);

		// Put each input value into the proper field
		$cmd -> bindParam(':beer_name', $beer_name, PDO::PARAM_STR);
		$cmd -> bindParam(':alcohol_content', $alcohol_content, PDO::PARAM_INT);
		$cmd -> bindParam(':domestic', $domestic, PDO::PARAM_BOOL);
		$cmd -> bindParam(':light', $light, PDO::PARAM_BOOL);
		$cmd -> bindParam(':price', $price, PDO::PARAM_INT);

		// Execute the save
		$cmd -> execute();

		// Disconnect
		$conn = null;

		echo 'Beer saved <br>' . '<a href="beers.php" title="View Beers">View Beer Listings</a>';

	}


?>
</body>
</html>