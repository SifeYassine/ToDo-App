<?php
function comparePriorityAndProgress($a, $b) {
    $priorityMap = ["High" => 3, "Medium" => 2, "Low" => 1];
    $progressMap = ["Doing" => 1, "Done" => 2];

    if ($progressMap[$a['progress']] === $progressMap[$b['progress']]) {
        return $priorityMap[$b['priority']] - $priorityMap[$a['priority']];
    }
    return $progressMap[$a['progress']] - $progressMap[$b['progress']];
}

usort($tasks, 'comparePriorityAndProgress');

function displayTask($task) {
    $priorityColor = $task['priority'] === "Low" ? "green" : ($task['priority'] === "Medium" ? "orange" : "red");
    $progressColor = $task['progress'] === "Doing" ? "orange" : "green";
    $titleStyle = $task['progress'] === "Done" ? "text-decoration: line-through;" : "";
    ?>
    <article id="<?= $task['id'] ?>" class="rounded-xl" style="width: 60%; height: 95px; background-color: #FDFFC2; box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25); padding: 10px 0 0 10px">
      <a href="#" onclick="openDisplayTaskModal(<?= $task['id'] ?>); return false;" class="text-xl font-bold text-[#69665c]" style="padding-left: 10px; <?= $titleStyle ?>"><?= $task['title'] ?></a>
      <div class="flex" style="margin-top: 10px;">
        <div class="task-priority mx-2 mb-5">
          <div class="bg-[<?= $priorityColor ?>] flex items-center justify-center rounded-lg" style="width: 70px; height:30px;"><?= $task['priority'] ?></div>
        </div>
        <div class="task-progress mx-2 mb-5">
          <div class="bg-[<?= $progressColor ?>] flex items-center justify-center rounded-lg" style="width: 65px; height:30px;"><?= $task['progress'] ?></div>
        </div>
        <div class="menu-nav">
          <div class="dropdown-container" tabindex="-1">
            <div class="three-dots"></div>
            <div class="dropdown">
              <a href="#" onclick="openEditTaskModal(<?= $task['id'] ?>); return false;"><div class="choice text-[#69665c]">Edit</div></a>
              <a href="./crudMethods/deleteTasks.php?id=<?= $task['id'] ?>"><div class="choice text-[#69665c]">Delete</div></a>
            </div>
          </div>
        </div>
      </div>
    </article>
    <?php
}
?>