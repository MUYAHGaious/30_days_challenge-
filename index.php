<?php

session_start();

if(isset($_SESSION['task'])){
    $_SESSION['task'] = [];
}

if(isset($_POST['add__task'])){
    $task = [
        'id' => uniqid(), 'name' => $_POST['task__name'], 'completed' => false, 
    ];
    $_SESSION['task'][] = $task;
}

// Handle updating an existing task
if (isset($_POST['update_task'])) {
    $taskId = $_POST['task_id'];
    $newName = $_POST['task_name'];
    foreach ($_SESSION['tasks'] as &$task) {
        if ($task['id'] === $taskId) {
            $task['name'] = $newName;
            break;
        }
    }
}

// Handle deleting a task
if (isset($_GET['delete'])) {
    $taskId = $_GET['delete'];
    foreach ($_SESSION['tasks'] as $key => $task) {
        if ($task['id'] === $taskId) {
            unset($_SESSION['tasks'][$key]);
            break;
        }
    }
    // Reindex the array to ensure sequential keys
    $_SESSION['tasks'] = array_values($_SESSION['tasks']);
}

if (isset($_POST['toggle_complete'])) {
    $taskId = $_POST['toggle_complete'];
    foreach ($_SESSION['tasks'] as &$task) {
        if ($task['id'] === $taskId) {
            // Toggle the completion status
            $task['completed'] = !$task['completed'];
            break;
        }
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="temp__containner">
        <div>
        <h2>Todo-List</h2>
        <form action="index.php" method="post">
            <input type="text" name= "task__name" placeholder="Name yourn task..." required>
            <input type="text" name="taskdescription" placeholder="Describe your task..." required>
            <input type="date" name="date" id="date" required>
            <select name="priority" id="priority" required>
                <option value="high">High</option>
                <option value="medium">Medium</option>
                <option value="low">Low</option>
            </select>
            <button type="submit" name="add__task">Add Task</button>
        </form>
        </div>
        <ul>
            <?php foreach ($_SESSION['task'] as $task): ?>
            <li><?php echo $task['name']; ?></li>
            <?php endforeach?>
        </ul>
        <ul>
            <?php foreach ($_SESSION['tasks'] as $task): ?>
            <li>
                <?php echo htmlspecialchars($task['name']); ?>
                <a href="edit.php?id=<?php echo urlencode($task['id']); ?>">Edit</a>
            </li>
            <?php endforeach; ?>
        </ul>
        <ul>
    <?php foreach ($_SESSION['tasks'] as $task): ?>
        <li>
            <form method="post" style="display:inline;">
                <input type="checkbox" name="toggle_complete" value="<?php echo $task['id']; ?>" <?php echo $task['completed'] ? 'checked' : ''; ?>>
                <span style="<?php echo $task['completed'] ? 'text-decoration: line-through;' : ''; ?>">
                    <?php echo $task['name']; ?>
                </span>
                <input type="submit" value="Update">
            </form>
        </li>
    <?php endforeach; ?>
</ul>

    </div>
</body>
</html>