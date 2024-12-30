<?php
require 'db.php';

// Number of records per page
$recordsPerPage = 5;

// Get current page or default to 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the offset
$offset = ($page - 1) * $recordsPerPage;

// Fetch total records
$totalRecordsQuery = $pdo->query("SELECT COUNT(*) FROM projects");
$totalRecords = $totalRecordsQuery->fetchColumn();
$totalPages = ceil($totalRecords / $recordsPerPage);

// Fetch paginated records
$query = $pdo->prepare("SELECT * FROM projects LIMIT :offset, :recordsPerPage");
$query->bindValue(':offset', $offset, PDO::PARAM_INT);
$query->bindValue(':recordsPerPage', $recordsPerPage, PDO::PARAM_INT);
$query->execute();
$projects = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Projects Pagination</title>
    <style>
        a {
            padding: 8px 12px;
            margin: 0 4px;
            text-decoration: none;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
        }
        a:hover {
            background-color: #ddd;
        }
        a.active {
            font-weight: bold;
            color: white;
            background-color: #007bff;
        }
    </style>
</head>
<body>
<h1>Projects</h1>
<table border="1" cellpadding="10">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($projects as $project): ?>
        <tr>
            <td><?= htmlspecialchars($project['id']) ?></td>
            <td><?= htmlspecialchars($project['name']) ?></td>
            <td><?= htmlspecialchars($project['description']) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<!-- Pagination Links -->
<div>
    <?php if ($page > 1): ?>
        <a href="?page=<?= $page - 1 ?>">Previous</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="?page=<?= $i ?>" class="<?= $i == $page ? 'active' : '' ?>"><?= $i ?></a>
    <?php endfor; ?>

    <?php if ($page < $totalPages): ?>
        <a href="?page=<?= $page + 1 ?>">Next</a>
    <?php endif; ?>
</div>
</body>
</html>
