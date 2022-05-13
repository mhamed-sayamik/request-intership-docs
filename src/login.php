<?php
    include_once "db.class.php";
    $stud_user = $_POST['stud_user'];
    $stud_password = $_POST['stud_password'];
    $stud_password = md5($stud_password);
    $db_logins = new db("localhost", "root", "","est","etudiant");
    $tablename = "etudiant";
    $query = "SELECT * FROM $tablename WHERE user='$stud_user' AND password='$stud_password';";
    if (mysqli_num_rows($db_logins->fetch_query($query)) == 1){
        $_SESSION["stud_user"]=$stud_user;
        header("Location: http://localhost:8080/request-intership-docs/dashboard.php");
    }else{
        $_SESSION["msg"]="incorrect Nom d'utilisateur ou mot de pass !";
    }                           
?> 