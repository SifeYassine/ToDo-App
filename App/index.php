<?php
include './crudMethods/createTasks.php';
include './crudMethods/readTasks.php';
include './crudMethods/updateTasks.php';
include './crudMethods/deleteTasks.php';
?>

<?php include './modals/tasksTemplate.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/dropDown.css" />
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="./css/modals.css">
  <title>Tasks Page</title>
</head>
<body class="flex flex-col items-center" style="background-color: #FF76CE;">
  <nav class="flex justify-center items-center mt-5 gap-3 rounded-xl" style="width: 40vw; height: 10vh; background-color: #ffb1e4; box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25);">  
  <a href="#" onclick="openCreateTaskModal(); return false;" class="w-[130px] h-[40px] flex justify-center items-center font-bold bg-[#7777ff] rounded-xl" style="box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25);">➕ New Task</a>
  
 <!-- Import Export/Buttons -->
  <?php include './fileUpload.php'?>
  <?php include './fileExport.php'?>

  </nav>
  <section class="w-[40vw] h-[auto] flex flex-col items-center justify-center gap-3 rounded-2xl" style="margin-top: 10vh; padding: 50px 0; background-color: #ffb1e4; box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25);">

    <!-- Generates Tasks  from Tasks Template -->
    <?php foreach ($tasks as $task): ?>
      <?php displayTask($task); ?>
    <?php endforeach; ?>
  </section>

  <!-- Display Task Modal -->
  <dialog id="displayTaskModal" class="modal" style="box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25);">
    <div class="modal-content">
      <button id="closeDisplayTaskModal" class="close-button" style="box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25);">❌ Close</button>
      <iframe id="displayTaskModalContent" style="width: 100%; height: 100%; border: none;"></iframe>
    </div>
  </dialog>

  <!-- Create Task Modal -->
  <dialog id="createTaskModal" class="modal" style="box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25);">
    <div class="modal-content">
      <button id="closeCreateTaskModal" class="close-button" style="box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25);">❌ Close</button>
      <iframe id="createTaskModalContent" style="width: 100%; height: 100%; border: none;"></iframe>
    </div>
  </dialog>

  <!-- Edit Task Modal -->
  <dialog id="editTaskModal" class="modal" style="box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25);">
    <div class="modal-content">
      <button id="closeEditTaskModal" class="close-button" style="box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25);">❌ Close</button>
      <iframe id="editTaskModalContent" style="width: 100%; height: 100%; border: none;"></iframe>
    </div>
  </dialog>

  <script src="./js/index.js"></script>
</body>
</html>

