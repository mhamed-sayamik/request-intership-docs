<?php
    include_once "database-funs.php";
    if($login_row = CheckLogin($_POST['stud_user'], $_POST['stud_password'])){
        $_SESSION["stud_id"] = $login_row['id'];
        $_SESSION["name"] = $login_row['prenom']." ".$login_row['nom'];
        $_SESSION["filiere"] = $login_row['filiere'];
        $_SESSION["niveau"] = $login_row['id_Niveau'];
        header("Location: http://localhost:8080/request-intership-docs/generate-file.php");
    } 
    elseif($login_row = CheckAdminLogin($_POST['stud_user'], $_POST['stud_password'])){
        $_SESSION["admin_id"] = $login_row['id'];
        $_SESSION["name"] = $login_row['prenom']." ".$login_row['nom'];
        header("Location: http://localhost:8080/request-intership-docs/admin/depot.php");
    }else{
        $_SESSION["msg"]="incorrect Nom d'utilisateur ou mot de pass !";
    }                           
?> 