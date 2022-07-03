<?php
    session_start();
    //check if the user is athentificated
        if(!isset($_SESSION["admin_id"])){
        $_SESSION["msg"] = "connectez-vous d'abord!";
        header("Location: http://localhost:8080/request-intership-docs/");
    }
    //check logout
    if(isset($_GET['action'])){
        if($_GET['action'] == "LogOut"){
                    session_unset();
                    header("Location: http://localhost:8080/request-intership-docs/");
                }
    }
        
?>