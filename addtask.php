<?php
// Include the connection file
require('connection.php');

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape the task name and task deadline inputs
    $taskName = mysqli_real_escape_string($conn, $_POST['task-name']);
    $taskDeadline = mysqli_real_escape_string($conn, $_POST['task-deadline']);

    // Prepare the SQL query
    $insert_query = $conn->prepare("insert into tbltask(taskName, taskDeadline, dateCreated, status) 
                                    values (?, ?, NOW(), 'Not Started')");

    // Bind the parameters to the query
    $insert_query->bind_param("ss", $taskName, $taskDeadline);

    // Execute the query
    $insert_query->execute();

    // Get the result of the query
    $result = $insert_query->get_result();

    // Check if the query was successful
    if ($result) {
        // If there was an error, stop the script
        die("ERROR: Couldn't Insert task");
    } else {
        // Otherwise, display a success message
        echo "success";
    }

    // Close the database connection
    $conn->close();
}
?>