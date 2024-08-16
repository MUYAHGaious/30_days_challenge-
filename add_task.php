<?php
session_start();


if (!isset($_SESSION['task'])) {
    $_SESSION['task'] = [];
}


if (isset($_POST['add_task'])) {
    $task = [
        'id' => uniqid(),
        'name' => $_POST['task_name'],
        'completed' => false,
        'priority' => $_POST['priority'],
        'deadline' => $_POST['deadline']
    ];
    $_SESSION['task'][] = $task;

    header('Location: view_tasks.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task</title>
    
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
        background-color:rgb(0, 123, 255);
        display: block;
        width: 100%;
        text-align: center;
        color: white; 
        padding: 15px;
        border: none;
        border-radius: 5px;
        font-size: 1.5rem; 
        cursor: pointer; 
    }
</style>
</head>
<body>

<h1>Add Task</h1>
<div class="container">

<form method="post" action="">
    <input type="text" name="task_name" placeholder="Enter task name" required>
    <select name="priority">
        <option value="High">High</option>
        <option value="Medium">Medium</option>
        <option value="Low">Low</option>
    </select>
    <input type="date" name="deadline">
    <button type="submit" name="add_task">Add Task</button>
</form>

<a href="view_tasks.php" class="back">Back to Task List</a>
</div>
</body>
</html>
