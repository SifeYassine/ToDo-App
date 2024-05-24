<?php
include '../crudMethods/readTasks.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css" />
    <title>Document</title>
</head>
<body class="flex flex-col items-center">
    <section class="w-[40vw] h-[auto] flex flex-col items-center rounded-2xl" style="background-color: #FDFFC2; box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25);">
      <?php if (!empty($task)) : ?> 

       <?php
        $priorityColor = $task['priority'] === "Low" ? "green" : ($task['priority'] === "Medium" ? "orange" : "red");
        $progressColor = $task['progress'] === "Doing" ? "orange" : "green";
         ?>
        <article class="w-[95%] h-[90%] px-10 py-7">
            <h1 class="block text-base font-medium text-[#69665c]">
                <?= $task['title'] ?? 'No title' ?>
            </h1>

            <div class="flex justify-center items-center">
                <div class="task-priority mx-2 mb-3">
                    <div class="bg-[<?= $priorityColor ?>] flex items-center justify-center rounded-lg" style="width: 70px; height:30px;">
                        <?= $task['priority'] ?? 'No priority' ?>
                    </div>
                </div>

                <div class="task-progress mx-2 mb-3">
                    <div class="bg-[<?= $progressColor ?>] flex items-center justify-center rounded-lg" style="width: 65px; height:30px;">
                        <?= $task['progress'] ?? 'No progress' ?>
                    </div>
                </div>

                <div class="my-4">
                    <h2 class="border bg-[#D9D9D9] rounded-lg mx-2 mb-3">
                        <?= $task['due_date'] ?? 'No due date' ?>
                    </h2>
                </div>
            </div>

            <label for="description" class="block text-base font-medium text-[#69665c]">
                Description:
            </label>
            <div class="w-[100%] h-32 bg-[#D9D9D9] rounded-lg">
                <?= $task['description'] ?? 'No description' ?>
            </div>
        </article>
      <?php else : ?>
        <p>No task found.</p>
      <?php endif; ?>
    </section>
</body>
</html>
