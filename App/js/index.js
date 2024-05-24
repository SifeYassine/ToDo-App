// Display Task Modal
const displayTaskModal = document.getElementById("displayTaskModal");
const displayTaskModalContent = document.getElementById(
  "displayTaskModalContent"
);
const closeDisplayTaskModal = document.getElementById("closeDisplayTaskModal");

// Create Task Modal
const createTaskModal = document.getElementById("createTaskModal");
const createTaskModalContent = document.getElementById(
  "createTaskModalContent"
);
const closeCreateTaskModal = document.getElementById("closeCreateTaskModal");

// Edit Task Modal
const editTaskModal = document.getElementById("editTaskModal");
const editTaskModalContent = document.getElementById("editTaskModalContent");
const closeEditTaskModal = document.getElementById("closeEditTaskModal");

function openDisplayTaskModal(taskId) {
  displayTaskModal.showModal();
  displayTaskModalContent.src = `./modals/displayTaskModal.php?id=${taskId}`;
}

function openCreateTaskModal() {
  createTaskModal.showModal();
  createTaskModalContent.src = "./modals/createTaskModal.php";
}

function openEditTaskModal(taskId) {
  editTaskModal.showModal();
  editTaskModalContent.src = `./modals/updateTaskModal.php?id=${taskId}`;
}

closeDisplayTaskModal.addEventListener("click", function () {
  displayTaskModal.close();
});

closeCreateTaskModal.addEventListener("click", function () {
  createTaskModal.close();
});

closeEditTaskModal.addEventListener("click", function () {
  editTaskModal.close();
});
