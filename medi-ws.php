<?php

//Localhost", "root", "", "pharmacyrecorddb"



if (isset($_GET['mname'])) 
{
    // Get the Fahrenheit value from the query parameter
    $mname = $_GET['mname'];
}









$host = "localhost";
$db_name = "pharmacyrecorddb";
$username = "root";
$password = "";

//$mname = $_POST["mname"];

//$mname = "dol";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}





header("Content-Type: application/json");
//require 'db.php';

try {
    //$stmt = $pdo->query("SELECT * FROM tbl_medicine");

    $stmt = $pdo->query("SELECT * FROM tbl_medicine where mname like '%$mname%'");
    $medidata = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        "status" => "Royal Pharmacy",
        "data" => $medidata
    ]);
} catch (Exception $e) {
    echo json_encode([
        "status" => "error",
        "message" => $e->getMessage()
    ]);
}


?>
