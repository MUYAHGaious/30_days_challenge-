<?php
session_start();

if (isset($_GET['id'])) {
    $taskId = $_GET['id'];
    
    foreach ($_SESSION['task'] as $key => $task) {
        if ($task['id'] === $taskId) {
            unset($_SESSION['task'][$key]);
            break;
        }
    }

    
    $_SESSION['task'] = array_values($_SESSION['task']);

    
    header('Location: view_tasks.php');
    exit;
}
?>
