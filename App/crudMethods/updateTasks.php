<?php
include 'dbConnect.php';
?>

<?php
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_GET['id']) && !empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['due_date']) && !empty($_POST['priority']) && !empty($_POST['progress'])) {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];
    $priority = $_POST['priority'];
    $progress = $_POST['progress'];

    // Prepare the SQL statement
    $sql = "UPDATE tasks SET title = :title, description = :description, due_date = :due_date, priority = :priority, progress = :progress WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    // Bind the parameters and execute the statement
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':due_date', $due_date);
    $stmt->bindParam(':priority', $priority);
    $stmt->bindParam(':progress', $progress);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        // Redirect to the main page
        header("Location: ../index.php");
        exit();
    } else {
        echo "Failed to update task.";
    }
}
?>


