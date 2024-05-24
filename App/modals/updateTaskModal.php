<?php
include '../crudMethods/readTasks.php';
include '../crudMethods/updateTasks.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Update Task</title>
</head>
<body class="flex flex-col items-center">
    <section class="w-[40vw] h-[auto] flex flex-col items-center rounded-2xl" style="background-color: #FDFFC2; box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25);">
        <form id="updateTaskForm" action="../crudMethods/updateTasks.php?id=<?= $task['id'] ?>" method="POST" class="w-[95%] h-[90%] px-10 py-7">
            <label for="title" class="block text-base font-medium text-[#69665c]">Title:</label>
            <input type="text" name="title" placeholder="Add a title..." id="title" value="<?= htmlspecialchars($task['title']) ?>" class="w-[100%] h-9 border bg-[#D9D9D9] rounded-lg outline-none focus:border-[#6A64F1]">

            <div class="flex justify-center">
                <div class="my-4">
                    <h2 class="mx-2 font-medium text-[#69665c]">Progress:</h2>
                    <select name="progress" id="progress" class="border bg-[#D9D9D9] rounded-lg outline-none focus:border-[#6A64F1] mx-2">
                        <option value="Doing" <?= $task['progress'] === 'Doing' ? 'selected' : '' ?> class="bg-[orange]">Doing</option>
                        <option value="Done" <?= $task['progress'] === 'Done' ? 'selected' : '' ?> class="bg-[green]">Done</option>
                    </select>
                </div>

                <div class="my-4">
                    <h2 class="mx-2 font-medium text-[#69665c]">Priority:</h2>
                    <select name="priority" id="priority" class="border bg-[#D9D9D9] rounded-lg outline-none focus:border-[#6A64F1] mx-2">
                        <option value="Low" <?= $task['priority'] === 'Low' ? 'selected' : '' ?> class="bg-[green]">Low</option>
                        <option value="Medium" <?= $task['priority'] === 'Medium' ? 'selected' : '' ?> class="bg-[orange]">Medium</option>
                        <option value="High" <?= $task['priority'] === 'High' ? 'selected' : '' ?> class="bg-[red]">High</option>
                    </select>
                </div>

                <div class="my-4">
                    <h2 class="mx-2 font-medium text-[#69665c]">Due date:</h2>
                    <input name="due_date" type="date" value="<?= $task['due_date'] ?>" class="border bg-[#D9D9D9] rounded-lg outline-none focus:border-[#6A64F1] mx-2">
                </div>
            </div>

            <label for="description" class="block text-base font-medium text-[#69665c]">Description:</label>
            <textarea rows="4" name="description" placeholder="Add a description..." id="description" class="w-full h-32 border bg-[#D9D9D9] rounded-lg outline-none focus:border-[#6A64F1] resize-none"><?= $task['description'] ?></textarea>

            <button id="updateTaskButton" type="submit" class="w-28 h-9 mt-5 rounded-lg bg-[#7777ff] font-bold" style="box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25);">Update Task</button>
        </form>
    </section>

    <script src="../js/closeUpdateModal.js"></script>
</body>
</html>
