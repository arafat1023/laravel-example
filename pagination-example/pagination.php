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

$recordsPerPage = 2;
$stmt= $pdo->query("SELECT Count(*) As total_records from projects");
$totalRecords = $stmt->fetch()['total_records'];
$totalPages = ceil($totalRecords / $recordsPerPage);
echo "Total Records: " . $totalRecords;
echo "total pages: ". $totalPages;

$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$currentPage = max(1, min($currentPage, $totalPages)); // Ensure valid page
$offset = ($currentPage - 1) * $recordsPerPage;
echo "<p>Current Page: $currentPage</p>";
echo "<p>Offset: $offset</p>";

$stmt = $pdo->prepare("SELECT * FROM projects LIMIT :offset, :limit");
$stmt->bindValue(':limit', $recordsPerPage, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo "<p>Total Records: " . count($projects). " records for the pages</p>";
?>

