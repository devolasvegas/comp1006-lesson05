<!DOCTYPE html>

<html>
<head>
	<meta content="text/html" charset="utf-8" http-equiv="content-type">
	<title>Beer Details</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
</head>
<body>
<h1> Beer Details </h1>
<?php

	/* Connect to the database */
	try {
		$conn = new PDO('mysql:host=sql.computerstudi.es;dbname=gc100022849', 'gc100022849', '9syKsQCu');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		echo 'Connection failed: ' . $e->getMessage();
	}

	/* Write the query */
	$sql = 'SELECT * FROM beers ORDER BY beer_name';

	/* prepare the query */
	$cmd = $conn ->prepare($sql);

	/* Send the query to the database */
	$cmd -> execute();

	/* Collect the data coming from database */
	$beers = $cmd -> fetchAll();


	/* Close database connection */
	$conn = null;

	/* Display the data received from database */
	echo '<table class="table table-striped">
			<thead>
				<th>Name</th>
				<th>Alcohol Content</th>
				<th>Domestic</th>
				<th>Light</th>
				<th>Price</th>
				<th>Delete</th>
			</thead>
			<tbody>';

	foreach($beers as $beer ) {

		echo
			'<tr>
				<td>' . $beer['beer_name'] . '</td>
				<td>' . $beer['alcohol_content'] . '</td>
				<td>' . $beer['domestic'] . '</td>
				<td>' . $beer['light'] . '</td>
				<td>' . $beer['price'] . '</td>
				<td><a href="#">Edit</a></td>
				<td><a class="confirmation" href="delete-beer.php?beer_id=' . $beer['beer_id'] . '" title="Delete Beer">Delete</a></td>
			</tr>';

	}
	echo '</tbody></table>';
?>

<!--JS Section-->
<script src="Scripts/lib/jquery-2.2.0.min.js"></script>
<script src="Scripts/app.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>
</html>
