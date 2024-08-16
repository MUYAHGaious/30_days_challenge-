<?php
session_start();

if (isset($_GET['id'])) {
    $taskId = $_GET['id'];

    foreach ($_SESSION['task'] as &$task) {
        if ($task['id'] === $taskId) {
            $task['completed'] = !$task['completed'];
            break;
        }
    }
}

header('Location: view_tasks.php');
exit;
?>
