// Add event listener to close the modal when the create task button is clicked
document
  .getElementById("createTaskButton")
  .addEventListener("click", function () {
    window.parent.document.getElementById("createTaskModal").close();
    window.parent.location.reload();
  });
