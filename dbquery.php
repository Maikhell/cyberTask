<?php
include 'connection.php';
// Get the JSON data sent from JavaScript
$data = json_decode(file_get_contents('php://input'), true);
if ($data && isset($data['command'])) {
    $command = $data['command'];
    switch ($command) {
    case 'add':
    if (isset($data['taskName']) && isset($data['dueDate']) && isset($data['taskNote'])) {
        
        $taskName = $data['taskName'];
        $dueDate = $data['dueDate'];
        $taskNote = $data['taskNote'];
        $startDate = date("Y-m-d"); 
        $percentageBar = 0; 
        $progressStatus = 'Incomplete'; 
        
        $sql = "INSERT INTO crud_tb (taskName, dueDate, taskNote, startDate, percentageBar, progressStatus)
                VALUES ('$taskName', '$dueDate', '$taskNote', '$startDate', $percentageBar, '$progressStatus')";
        if ($conn->query($sql) === TRUE) {
            echo "Task added successfully!";
        } else {
            echo "Error adding task: " . $conn->error;
        }
        } else {
        echo "Incomplete data for adding task!";
        }
        break;

        
    case 'edit':
            // Add functionality for editing a task here
            // Retrieve necessary data like task ID, new details, and perform an SQL UPDATE query
            // Example: 
            // $taskId = $data['taskId'];
            // $newTaskName = $data['newTaskName'];
            // $newDueDate = $data['newDueDate'];
            // $newTaskNote = $data['newTaskNote'];
            // $sql = "UPDATE crud_tb SET task_name = '$newTaskName', due_date = '$newDueDate', task_note = '$newTaskNote' WHERE id = $taskId";
        break;
        
    case 'delete':
            // Add functionality for deleting a task here
            // Retrieve the task ID and perform an SQL DELETE query
            // Example:
            // $taskId = $data['taskId'];
            // $sql = "DELETE FROM crud_tb WHERE id = $taskId";
        break;
        
        default:
            echo "Invalid command!";
        break;
    }
} else {
    echo "No command received!";
}

$conn->close();
?>