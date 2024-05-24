<?php
if(isset($_GET['action']) && $_GET['action'] == 'export') {
    // Include database connection
    include './crudMethods/dbConnect.php';

    // Fetch tasks from the database
    $sql = "SELECT title, description, due_date, priority, progress, user_id, category_id FROM tasks";
    $stmt = $pdo->query($sql);

    // Create a file handle for writing CSV
    $filename = "Tasks.csv";
    $file = fopen($filename, "w");

    // Write CSV header
    fputcsv($file, array('Title', 'Description', 'Due Date', 'Priority', 'Progress', 'User ID', 'Category ID'));

    // Write each task to CSV
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        fputcsv($file, $row);
    }

    // Close the file handle
    fclose($file);

    // Set appropriate headers for file download
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '"');

    // Output file contents
    readfile($filename);

    // Delete the file after download
    unlink($filename);

    // Stop further execution
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Task Management</title>
    <style>
        .export-button {
            height: 40px;
            font-weight: bold;
            background-color: #7777ff;
            border-radius: 10px;
            width: 120px;
            box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25);
            cursor: pointer;
        }
    </style>
</head>
<body>
    <button class="export-button" onclick="exportTasks()">Export Tasks</button>

    <script>
        function exportTasks() {
            window.location.href = "fileExport.php?action=export";
        }
    </script>
</body>
</html>
