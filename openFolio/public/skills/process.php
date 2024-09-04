<?php
session_start();

include_once "../../config/config.php";
include_once "../../includes/functions.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $profficiency = $_POST['profficiency'];
        $description = $_POST['description'];
        $user_id = $_SESSION['user']['id'];


        try {
        
            $results = addSkill($name, $profficiency, $description, $user_id);
            if(!$results){
                $_SESSION['message'] =  "Erro:".$sql."<br>". mysqli_error($conn);
                header("location: add.php");
            }
        
            $_SESSION['message'] = "Skill added";
            header("location: ../dashboard.php");
        
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    elseif(isset($_POST['edit-skill'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $profficiency = $_POST['profficiency'];
        $description = $_POST['description'];

        $results = editSkill($name, $profficiency, $description, $id);
        if(!$results){
            $_SESSION['message'] =  "Erro:".$sql."<br>". mysqli_error($conn);
            header("location: edit.php?id=$id");
        }

        $_SESSION['message'] = "Skill edited";
        header("location: ../dashboard.php");
    }
    
}

