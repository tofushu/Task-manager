<?php
// Include the connection file
require('connection.php');

// Prepare the SQL query
$select_query = $conn->prepare("select * from tbltask order by dateCreated desc");

// Execute the query
$select_query->execute();

// Get the result of the query
$result = $select_query->get_result();

// Fetch the tasks as an associative array
$tasks = $result->fetch_all(MYSQLI_ASSOC);

// Encode the tasks as JSON
echo json_encode($tasks);

// Close the database connection
$conn->close();
?>