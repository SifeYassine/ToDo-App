// Add event listener to close the modal when the create task button is clicked
document
  .getElementById("updateTaskButton")
  .addEventListener("click", function () {
    window.parent.document.getElementById("editTaskModal").close();
    window.parent.location.reload();
  });
