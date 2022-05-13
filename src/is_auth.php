<?php
    if(!isset($_SESSION["stud_user"])){
        $_SESSION["msg"] = "connectez-vous d'abord !";  
        header("Location: http://localhost:8080/request-intership-docs/");
    }
?>