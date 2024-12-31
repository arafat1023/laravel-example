<?php
$host = "localhost";
$dbname = "laravel_database";
$username = "root";
$password = "Iamgenious12@";

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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination Example</title>
    <style>
        .pagination {
            text-align: center;
            margin-top: 20px;
        }
        .pagination a {
            margin: 0 5px;
            text-decoration: none;
            padding: 5px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            color: #333;
        }
        .pagination a:hover {
            background-color: #f0f0f0;
        }
        .pagination a.active {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            pointer-events: none;
        }
    </style>
</head>
<body>
    <h1>Projects</h1>

    <?php
    // Display fetched records
    foreach ($projects as $project) {
        echo "<h3>{$project['name']}</h3>";
        echo "<p>{$project['description']}</p>";
        echo "<hr>";
    }
    ?>

    <div class="pagination">
        <?php
        // Display pagination links
        for ($i = 1; $i <= $totalPages; $i++) {
            $active = $i == $currentPage ? "active" : "";
            echo "<a href='?page=$i' class='$active'>Page $i</a> ";
        }
        ?>
    </div>
</body>
</html>

