<?php
session_start();

// Initialize tasks in session if not present
if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [];
}

// Handle adding a new task
if (isset($_POST['add_task'])) {
    $task = [
        'id' => uniqid(),
        'name' => $_POST['task_name'],
        'completed' => false,
    ];
    $_SESSION['tasks'][] = $task;
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Todo List</title>
</head>
<body>
    <h1>My Todo List</h1>

    <!-- Add Task Form -->
    <form method="POST" action="">
        <input type="text" name="task_name" placeholder="Enter your task" required>
        <button type="submit" name="add_task">Add Task</button>
    </form>

    <!-- Display Task List -->
    <ul>
        <?php foreach ($_SESSION['tasks'] as $task): ?>
        <li>
            <?php echo htmlspecialchars($task['name']); ?>
            <a href="?edit=<?php echo urlencode($task['id']); ?>">Edit</a>
            <a href="?delete=<?php echo urlencode($task['id']); ?>">Delete</a>
        </li>
        <?php endforeach; ?>
    </ul>

    <!-- Edit Task Form -->
    <?php if (isset($_GET['edit'])): ?>
    <?php
    $editTaskId = $_GET['edit'];
    $taskToEdit = null;
    foreach ($_SESSION['tasks'] as $task) {
        if ($task['id'] === $editTaskId) {
            $taskToEdit = $task;
            break;
        }
    }
    ?>
    <?php if ($taskToEdit): ?>
    <form method="POST" action="">
        <input type="hidden" name="task_id" value="<?php echo htmlspecialchars($taskToEdit['id']); ?>">
        <input type="text" name="task_name" value="<?php echo htmlspecialchars($taskToEdit['name']); ?>" required>
        <button type="submit" name="update_task">Update Task</button>
    </form>
    <?php endif; ?>
    <?php endif; ?>

</body>
</html>
