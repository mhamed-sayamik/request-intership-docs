<?php
    include "src/session.php";
    include_once "src/database-funs.php";
    //if isset post_array -> p
    if(isset($_POST['save'])){
         storeEtudInfo();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/generate-file.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="styles\navbar.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <?php include "src/navbar.php"?>
    <div class="main">
        <h1 class="page-name">settings</h1>
        <div class="content-card">
            <h2 class="card-name">votre informations</h2>
            <p class="card-breakdown">changer votre informations personelles.</p>
            <form method="post" id="stage-form" action="">
            <div class="coll">
            <label for="prenom">prenom</label >
            <input type="text" name="prenom" >
            </div>
            <div class="coll">
            <label for="nom">nom</label>
            <input type="text" name="nom" >
            </div><br>
            <div class="coll">
            <label for="email">email</label>
            <input type="text" name="email" >
            </div>
            <div class="coll">
            <label for="tel">téléphone</label>
            <input type="text" name="tel" id="">
            </div>
            <div class="coll">
            <label for="adresse">adresse</label>
            <input type="text" name="adresse">
            </div>
            <div class="coll">
            </div><br>
            <input type="submit" name="save" value="enregistrer">
        </div>
        

    </div>
    </div>
</body>
</html>