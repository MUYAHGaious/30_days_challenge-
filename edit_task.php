<?php
session_start();

// Find the task to edit
if (isset($_GET['id'])) {
    $taskId = $_GET['id'];
    $taskToEdit = null;
    
    foreach ($_SESSION['task'] as &$task) {
        if ($task['id'] === $taskId) {
            $taskToEdit = $task;
            break;
        }
    }

    if ($taskToEdit) {
        // Handle form submission
        if (isset($_POST['update_task'])) {
            $taskToEdit['name'] = $_POST['task_name'];
            $taskToEdit['priority'] = $_POST['priority'];
            $taskToEdit['deadline'] = $_POST['deadline'];
            
            // Update session
            $_SESSION['task'] = array_map(function($t) use ($taskToEdit) {
                return $t['id'] === $taskToEdit['id'] ? $taskToEdit : $t;
            }, $_SESSION['task']);
            
            // Redirect back to the main page
            header('Location: view_tasks.php');
            exit;
        }
    } else {
        echo "Task not found.";
        exit;
    }
} else {
    echo "No task ID provided.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/fontawesome.min.css" integrity="sha512-B46MVOJpI6RBsdcU307elYeStF2JKT87SsHZfRSkjVi4/iZ3912zXi45X5/CBr/GbCyLx6M1GQtTKYRd52Jxgw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        *, *::before, *::after {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    html {
        font-size: 62.5%;
    }

    body {
        font-family: 'Comic Neue', cursive;
        background-color: rgb(224, 247, 250);
        padding: 20px;
    }

    .container {
        width: 600px;
        margin: auto;
        background-color: rgb(255, 255, 255);
        padding: 60px;
        box-shadow: 3px 2px 20px rgb(0, 247, 255);
    }

    h1, h2 {
        text-align: center;
        font-size: 6rem;
    }

    form {
        display: flex; 
        flex-direction: column; 
        gap: 10px; 
        margin-bottom: 20px;
    }

    input[type="text"], select, input[type="date"] {
        flex: 1;
        margin-right: 10px;
        padding: 10px;
        border: 1px solid rgb(0, 247, 255);
        border-radius: 10px;
        font-size: 1.5rem; 
        outline: none;
    }
    input:focus {
        outline: 5px solid rgb(224, 247, 250);
    }

    button {
        background-color: rgb(0, 123, 255);
        color: white; 
        padding: 15px;
        border: none;
        border-radius: 5px;
        display: inline-block;
        font-size: 1.5rem; 
        cursor: pointer; 
    }

    button:hover, .back:hover {
        background-color: #0056b3;
    }

    .task-actions {
        display: flex;
        gap: 5px; 
    }

    .task-actions .btn__complete {
        background-color: #28a745;
    }

    .task-actions .btn__edit {
        background-color: #ffc107; 
    }

    .task-actions .btn__delete {
        background-color: #dc3545; 
    }

    ul {
        list-style-type: none;
        padding: 0;
    }

    li {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
        background-color: #f9f9f9;
        margin-bottom: 5px;
        border-radius: 5px;
    }

    li.completed {
        text-decoration: line-through;
        background-color: #d4edda; 
    }

    .task-actions button {
        margin-left: 5px; 
        padding: 10px; 
        font-size: 1.5rem; 
        cursor: pointer;
    }

    .back   {

        text-decoration: none;
        font-size: 150%;
        background-color:rgb(0, 123, 255);
        color: #f9f9f9;
        padding: 7px;
        border-radius: 10px;
    }
</style>
</head>
<body>
    <div class="container">
        <h1>Edit Task</h1>
        <form method="POST">
            <input type="text" name="task_name" value="<?= htmlspecialchars($taskToEdit['name']) ?>" required>
            <select name="priority" required>
                <option value="Low" <?= $taskToEdit['priority'] === 'Low' ? 'selected' : '' ?>>Low</option>
                <option value="Medium" <?= $taskToEdit['priority'] === 'Medium' ? 'selected' : '' ?>>Medium</option>
                <option value="High" <?= $taskToEdit['priority'] === 'High' ? 'selected' : '' ?>>High</option>
            </select>
            <input type="date" name="deadline" value="<?= htmlspecialchars($taskToEdit['deadline']) ?>" required>
            <button type="submit" name="update_task"><i class="fa-regular fa-pen-to-square"></i> Update Task</button>
        </form>
    </div>
</body>
</html>
