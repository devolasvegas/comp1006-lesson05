<!DOCTYPE html>

<html>
<head>
	<meta content="text/html" charset="utf-8" http-equiv="content-type">
	<title>Beer Information</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
	<h1> Beer Information </h1>
	<form method="post" action="save-beer.php">
		<fieldset class="form-group">
			<label for="beer_name" class="col-sm-2">Name: *</label>
			<input name="beer_name" id="beer_name" placeholder="Beer Name" required>
		</fieldset>
		<fieldset class="form-group">
			<label for="alcohol_content" class="col-sm-2">Alcohol Content: *</label>
			<input name="alcohol_content" id="alcohol_content" placeholder="5.0" required>
		</fieldset>
		<fieldset class="form-group">
			<label for="domestic" class="col-sm-2">Is it domestic beer?</label>
			<input name="domestic" id="domestic" type="checkbox">
		</fieldset>
		<fieldset class="form-group">
			<label for="light" class="col-sm-2">Is it light beer?</label>
			<input name="light" id="light" type="checkbox">
		</fieldset>
		<fieldset class="form-group">
			<label for="price" class="col-sm-2">Price: *</label>
			<input name="price" id="price" placeholder="45.50" required>
		</fieldset>
		<br>
		<button class="btn btn-primary col-sm-offset-2" type="submit">Save</button>
	</form>
<p>* : this areas required.</p>
</body>
</html>