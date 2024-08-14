<?php
session_start();


if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [];
}


if (empty($_SESSION['tasks']) && isset($_COOKIE['tasks'])) {
    $_SESSION['tasks'] = unserialize($_COOKIE['tasks']);
}


function saveTasksToCookies() {
    setcookie('tasks', serialize($_SESSION['tasks']), time() + (86400 * 30), "/");
}


if (isset($_POST['add'])) {
    $task = [
        'id' => uniqid(),
        'name' => htmlspecialchars($_POST['task_name']),
        'priority' => $_POST['priority'],
        'deadline' => $_POST['deadline'],
        'completed' => false,
    ];
    $_SESSION['tasks'][] = $task;
    saveTasksToCookies();
}


if (isset($_POST['edit'])) {
    foreach ($_SESSION['tasks'] as &$task) {
        if ($task['id'] == $_POST['task_id']) {
            $task['name'] = htmlspecialchars($_POST['task_name']);
            $task['priority'] = $_POST['priority'];
            $task['deadline'] = $_POST['deadline'];
            break;
        }
    }
    saveTasksToCookies();
}


if (isset($_POST['delete'])) {
    $_SESSION['tasks'] = array_filter($_SESSION['tasks'], function ($task) {
        return $task['id'] != $_POST['task_id'];
    });
    saveTasksToCookies();
}


if (isset($_POST['complete'])) {
    foreach ($_SESSION['tasks'] as &$task) {
        if ($task['id'] == $_POST['task_id']) {
            $task['completed'] = !$task['completed'];
            break;
        }
    }
    saveTasksToCookies();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced To-Do List</title>
    <style>
        *, *::before,*::after   {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        html    {
            font-size: 62.5%;
        }

        body {
            font-family: 'Comic Neue', cursive;
            background-color: rgb(224, 247, 250);
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: rgb(255, 255, 255);
            padding: 20px;
            box-shadow: 3px 2px 20px rgb(0, 247, 255);
        }
        h1, h2 {
            text-align: center;
            font-size: 300%;
        }
        form {
            display: inline;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        input[type="text"], select, input[type="date"] {
            flex: 1;
            margin-right: 10px;
            padding: 10px;
            border: 1px solid rgb(0, 247, 255);
            border-radius: 10px;
            font-size: 150%;
        }
        button {
            background-color: rgb(0, 123, 255);
            padding: 15px;
            border: none;
            border-radius: 5px;
            display: inline-block;

        }
        .task-actions .btn__complete {
            background-color: #28a745;
            padding: 15px;
            border: none;
            border-radius: 5px;
            display: inline-block;
        }
        .task-actions .btn__edit {
            background-color: yellow;
            padding: 15px;
            border: none;
            border-radius: 5px;
            display: inline-block;
        }

        .task-actions .btn__delete    {
            background-color: red;
            padding: 15px;
            border: none;
            border-radius: 5px;
        }
        button:hover, .task-actions .btn__complete:hover, .task-actions .btn__edit:hover, .task-actions .btn__delete:hover {
            background-color: #0056b3;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            display: flex;
            justify-content: space-between;
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
            background-color: #28a745;
        }
        .task-actions button.delete {
            background-color: #dc3545;
        }
        .task-actions button.edit {
            background-color: #ffc107;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>To-Do List</h1>
        <form action="" method="post">
            <input type="text" name="task_name" placeholder="Enter task name" required>
            <select name="priority">
                <option value="High">High</option>
                <option value="Medium">Medium</option>
                <option value="Low">Low</option>
            </select>
            <input type="date" name="deadline">
            <button type="submit" name="add">Add Task</button>
        </form>

        <h2>Your Tasks</h2>
        <ul>
            <?php foreach ($_SESSION['tasks'] as $task): ?>
                <li class="<?php echo $task['completed'] ? 'completed' : ''; ?>">
                    <span><?php echo $task['name']; ?> [<?php echo $task['priority']; ?>] - <?php echo $task['deadline']; ?></span>
                    <div class="task-actions">
                        <form action="" method="post" >
                            <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                            <button class="btn__complete" type="submit" name="complete"><?php echo $task['completed'] ? 'Unmark' : 'Complete'; ?></button>
                        </form>
                        <form action="" method="post" >
                            <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                            <button class="btn__edit" type="submit" name="edit" class="edit">Edit</button>
                        </form>
                        <form action="" method="post" >
                            <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                            <button class="btn__delete" type="submit" name="delete" class="delete" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
