<?php
require 'db.php';

try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
}
catch (PDOException $e){
    echo "Connection failed: " . $e->getMessage();
    die("Connection failed: " . $e->getMessage());
}
?>

