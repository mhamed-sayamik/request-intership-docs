<?php
    session_start();
    //check if the user is athentificated
     include_once "src/is_auth.php";
    //generate student infos
    include "src/student.php";
    //if download autorisation clicked
    if(isset($_POST["down-aut"])){
                    //generate autorisation
                    include_once "src\generate-aut.php";
                    
    }
?>      
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/dashboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Raleway&display=swap" rel="stylesheet"> 
    <title>Document</title>
</head>
<body>
    <div class="bg-hero">
    <section id="one">
    <h1>télécharger votre autorisation</h1>
    <p>l'autorisation est a rendre a l'école aprés le remplir</p>
    <form method="post">
        <input type="submit" value="télécharger" name="down-aut">
    </form>
    </section>
    <section id="two">
    <h1>génerer votre convention</h1>
    <p>imprimez et remplissez deux copies, une a rendre au établissement et une pour l'établissement d'assurence</p>
    <a href="convention.php"><button>génerer</button></a>
    </section>
    </div>
</body>
</html>