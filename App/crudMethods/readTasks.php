<?php
include 'dbConnect.php';
?>

<?php
// Initialize a variable to hold the list of tasks
$tasks = [];
$task = [];

// Fetch all tasks from the database
try {
    $stmt = $pdo->query("SELECT * FROM tasks");
    while ($row = $stmt->fetch()) {
        $tasks[] = [
            'id' => htmlspecialchars($row['id']),
            'title' => htmlspecialchars($row['title']),
            'description' => htmlspecialchars($row['description']),
            'due_date' => htmlspecialchars($row['due_date']),
            'priority' => htmlspecialchars($row['priority']),
            'progress' => htmlspecialchars($row['progress'])
        ];
    }
} catch (PDOException $e) {
    echo "Error fetching tasks: " . $e->getMessage();
}

if (isset($_GET['id'])) {
    $taskId = $_GET['id'];

    // Fetch the task by ID
    try {
        $stmt = $pdo->prepare("SELECT * FROM tasks WHERE id = :id");
        $stmt->execute(['id' => $taskId]);
        $task = $stmt->fetch();

        if ($task) {
            // Sanitize task data
            $task['id'] = htmlspecialchars($task['id']);
            $task['title'] = htmlspecialchars($task['title']);
            $task['description'] = htmlspecialchars($task['description']);
            $task['due_date'] = htmlspecialchars($task['due_date']);
            $task['priority'] = htmlspecialchars($task['priority']);
            $task['progress'] = htmlspecialchars($task['progress']);
        } else {
            echo "No task found with id $taskId.";
        }
    } catch (PDOException $e) {
        echo "Error fetching task: " . $e->getMessage();
    }
}
?>
