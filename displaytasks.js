// Function to display tasks from the database
function displayTasks() {
  // Send a GET request to the server to retrieve the tasks
  $.ajax({
    type: "GET",
    url: "displaytasks.php",
    success: function (response) {
      // Get the table body element where the tasks will be displayed
      var taskDisplay = $(".task-display");

      // Clear the current contents of the table body
      taskDisplay.empty();

      // Parse the response as JSON
      var tasks = JSON.parse(response);

      // Loop through each task and add it to the table body
      tasks.forEach(function (task) {
        taskDisplay.append(`
          <tr>
            <td>${task.dateCreated}</td>
            <td>${task.taskName}</td>
            <td>${task.taskDeadline}</td>
            <td>${task.status}</td>
            <td>
              <button class="edit-button" data-id="${task.taskId}">Edit</button>
              <button class="delete-button" data-id="${task.taskId}">Delete</button>
            </td>
          </tr>
        `);
      });
    },
  });
}

// Call the displayTasks function initially to display the tasks when the page loads
displayTasks();
