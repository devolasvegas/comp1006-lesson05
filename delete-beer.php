<?php ob_start();
/**
 * Created by PhpStorm.
 * User: devon
 * Date: 2016-02-10
 * Time: 10:12 AM
 */
// Identify the record to delete
$beer_id = null;
$beer_id = $_GET['beer_id'];

if (is_numeric($beer_id)){
    // Connect to DB
    $conn = new PDO('mysql:host=sql.computerstudi.es;dbname=gc100022849', 'gc100022849','9syKsQCu');

    // Create SQL command
    $sql = "DELETE FROM beers WHERE beer_id = :beer_id";

    // Execute SQL command
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':beer_id', $beer_id, PDO::PARAM_INT);
    $cmd->execute();

    // Disconnect
    $conn = null;

    // Redirect back to beer-details.php
    header('location:beer-details.php');
}
ob_flush(); ?>