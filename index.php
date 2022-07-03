<?php
    session_start();
    if(isset($_SESSION["stud_id"])){  
        header("Location: http://localhost:8080/request-intership-docs/generate-file.php");
    }
    if(isset($_POST["login"])){
        include_once "src/login.php";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet"> 
    <title>se connecter</title>
</head>
<body>
    <div class="bg-hero">
        <section class="left">
            <div class="logo"><img src="images\est-logo.png" ></div>
            
            <form id="login-form" method="post">
                <label for="stud_user">Nom d'utilisateur: </label><br>
                <input type="text" name="stud_user" required><br>
                <label for="stud_password">Password :</label><br>
                <input type="password" name="stud_password" required><br>
                <input type="submit" value="se connecter" name="login"><br>  
                <?php
                if(isset($_SESSION['msg'])){
                    echo $_SESSION["msg"];
                    unset($_SESSION["msg"]);
                }
                
                ?>
            </form>
        </section>
        <section class="right">
            <div class="content">
                <h1>Télécharger votre documents de stage facilement.</h1>
            </div>
            <div class="img"><img src="images/students.png"></div>
        </section>
    </div>
</body>

</html>
