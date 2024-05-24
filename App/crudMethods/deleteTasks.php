<?php
include 'dbConnect.php';
?>

<?php
// Check if id is provided
if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the SQL statement
    $sql = "DELETE FROM tasks WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    // Bind the id parameter and execute the statement
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    if ($stmt->execute()) {
        // Redirect to the main page
        header("Location: ../index.php");
        exit();
    } else {
        echo "Failed to delete name.";
    }
}
?>
