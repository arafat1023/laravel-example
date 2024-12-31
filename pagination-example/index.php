<?php
require 'db.php';

// Number of records per page
$recordsPerPage = 5;

// Get current page or default to 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the offset
$offset = ($page - 1) * $recordsPerPage;

try {
    // Fetch total records (using prepared statement)
    $totalRecordsQuery = $pdo->prepare("SELECT COUNT(*) FROM projects");
    $totalRecordsQuery->execute();
    $totalRecords = $totalRecordsQuery->fetchColumn();
    $totalPages = ceil($totalRecords / $recordsPerPage);

    // Fetch paginated records (using prepared statement)
    $query = $pdo->prepare("SELECT * FROM projects LIMIT :offset, :recordsPerPage");
    $query->bindValue(':offset', $offset, PDO::PARAM_INT);
    $query->bindValue(':recordsPerPage', $recordsPerPage, PDO::PARAM_INT);
    $query->execute();
    $projects = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Handle database errors
    die("Database error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .pagination a {
            padding: 8px 12px;
            margin: 0 4px;
            text-decoration: none;
            border: 1px solid #ddd;
            color: #333;
            border-radius: 4px;
        }
        .pagination a:hover {
            background-color: #eee;
        }
        .pagination a.active {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }
        .pagination .disabled {
            color: #aaa;
            pointer-events: none;
            cursor: default;
        }
    </style>
</head>
<body>

<h1>Projects</h1>

<?php if (empty($projects)): ?>
    <p>No projects found.</p>
<?php else: ?>
    <table>
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

    <div class="pagination">
        <?php if ($page > 1): ?>
            <a href="?page=<?= $page - 1 ?>">Previous</a>
        <?php else: ?>
            <span class="disabled">Previous</span>
        <?php endif; ?>

        <?php
        $maxLinks = 5;
        $start = max(1, $page - floor($maxLinks / 2));
        $end = min($totalPages, $page + floor($maxLinks / 2));

        if ($totalPages > $maxLinks) {
            if ($end == $totalPages) {
                $start = $totalPages - $maxLinks + 1;
            } elseif ($start == 1) {
                $end = $maxLinks;
            }
        }

        if ($start > 1) {
            echo '<a href="?page=1">1</a>';
            if ($start > 2) {
                echo '<span>...</span>';
            }
        }

        for ($i = $start; $i <= $end; $i++): ?>
            <a href="?page=<?= $i ?>" class="<?= $i == $page ? 'active' : '' ?>"><?= $i ?></a>
        <?php endfor;

        if ($end < $totalPages) {
            if ($end < $totalPages - 1) {
                echo '<span>...</span>';
            }
            echo '<a href="?page=' . $totalPages . '">' . $totalPages . '</a>';
        }
        ?>

        <?php if ($page < $totalPages): ?>
            <a href="?page=<?= $page + 1 ?>">Next</a>
        <?php else: ?>
            <span class="disabled">Next</span>
        <?php endif; ?>
    </div>
<?php endif; ?>

</body>
</html>