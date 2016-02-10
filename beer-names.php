<!DOCTYPE html>

<html>
<head>
	<meta content="text/html" charset="utf-8" http-equiv="content-type">
	<title>Beer Names</title>
</head>
<body>
	<h1> Beer Names </h1>
	<?php

	/* Connect to the database */
	try {
		$conn = new PDO('mysql:host=sql.computerstudi.es;dbname=gc100022849', 'gc100022849', '9syKsQCu');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		echo 'Connection failed: ' . $e->getMessage();
	}

	/* Write the query */
	$sql = 'SELECT beer_name FROM beers';

	/* prepare the query */
	$cmd = $conn ->prepare($sql);

	/* Send the query to the database */
	$cmd -> execute();

	/* Collect the data coming from database */
	$beerNames = $cmd -> fetchAll();

	/* Close database connection */
	$conn = null;

	/* Display the data received from database */
	foreach($beerNames as $beer ) {
		echo $beer['beer_name'] . '</br>';
	}

	?>
</body>
</html>
