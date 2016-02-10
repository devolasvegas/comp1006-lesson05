<!DOCTYPE html>
<html>
<head>
	<meta content="text/html" charset="utf-8" http-equiv="content-type" >
	<title> Beer Dropdown </title>
</head>
<body>
	<form method="post" action="show-dropdown-choise.php">
		<label for="name">Select a beer:</label>
		<select name="name" id="name">
			<?php
			/**
			 * Created by PhpStorm.
			 * User: esattahaibis
			 * Date: 2016-01-27
			 * Time: 11:29 AM
			 */
			// Connect to the database
			$conn = new PDO('mysql:host=sql.computerstudi.es;dbname=gc100022849', 'gc100022849', '9syKsQCu');

			// Prepare query
			$sql = 'SELECT beer_name FROM beers ORDER BY beer_name';

			// Run query
			$cmd = $conn ->prepare($sql);

			// Store results
			$cmd -> execute();
			$beerNames = $cmd -> fetchAll();

			// Close connection
			$conn = null;

			// Loop trough the results and add each beer to dropdown
			foreach ($beerNames as $beer) {
				echo '<option>' . $beer['beer_name'] . '</option>';
			}

			?>
		</select>
		<button>Go</button>
	</form>
</body>
</html>


