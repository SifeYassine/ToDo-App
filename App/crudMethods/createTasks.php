<?php
include 'dbConnect.php';
?>

<?php
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['due_date']) && !empty($_POST['priority']) && !empty($_POST['progress'])) {

    // Get data from form
    $title = $_POST['title'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];
    $priority = $_POST['priority'];
    $progress = $_POST['progress'];
    // $user_id = $_POST['user_id'];
    $user_id = 1;
    // $category_id = $_POST['category_id'];
    $category_id = 1;

    // Prepare the SQL statement
    $sql = "INSERT INTO tasks (title, description, due_date, priority, progress, user_id, category_id) VALUES (:title, :description, :due_date, :priority, :progress, :user_id, :category_id)";
    $stmt = $pdo->prepare($sql);

    // Bind the parameters individually
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':due_date', $due_date);
    $stmt->bindParam(':priority', $priority);
    $stmt->bindParam(':progress', $progress);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':category_id', $category_id);

    if ($stmt->execute()) {
        // Redirect to the main page to avoid form resubmission
        header("Location: ../index.php?refresh=1");
        exit();
    } else {
        echo "Failed to insert data";
    }
}
?>
