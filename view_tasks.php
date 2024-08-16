<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Tasks</title>
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
        padding: 7.5px;
        border: none;
        border-radius: 10px;
        text-decoration: none;
        color: black;
    }

    .task-actions .btn__delete {
        background-color: #dc3545; 
        padding: 7.5px;
        border: none;
        border-radius: 10px;
        text-decoration: none;
        color: black;
    }
    .task-actions .btn__edit:hover {
        background-color: #ff9800;

    }
     .task-actions .btn__delete:hover  {
        background-color: #c82333;
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
    <div class="container">
        <h1>View Tasks</h1>
        <ul>
            <?php foreach ($_SESSION['task'] as $task): ?>
            <li class="<?= $task['completed'] ? 'completed' : '' ?>">
                <input type="checkbox" <?= $task['completed'] ? 'checked' : '' ?>
                       onclick="location.href='toggle_complete.php?id=<?= $task['id'] ?>'">
                <span><?= htmlspecialchars($task['name']) ?> (Priority: <?= htmlspecialchars($task['priority']) ?>, Deadline: <?= htmlspecialchars($task['deadline']) ?>)</span>
                <div class="task-actions">
                    <a href="edit_task.php?id=<?= $task['id'] ?>" class="btn__edit">Edit</a>
                    <a href="delete_task.php?id=<?= $task['id'] ?>" class="btn__delete">Delete</a>
                </div>
            </li>
            <?php endforeach ?>
        </ul>
        <a href="add_task.php" class="back"> Add New Task</a>
    </div>
</body>
</html>
