<?php
    include_once "src/session.php";
    include_once "src/database-funs.php";
    if(isset($_POST['gen-aut']) ){
        storeEtuEntr($_SESSION['stud_id'], $_POST['EntName'], $_POST['EntSiege'] , $_POST['Enttele'], $_POST['Entfax'], $_POST['Entemail'], $_POST['DateD'], $_POST['DateF'] );
        include_once "src/generate-aut.php";
    }
    if(isset($_POST['gen-conv'])){
        storeEtuEntr($_SESSION['stud_id'], $_POST['EntName'], $_POST['EntSiege'] , $_POST['Enttele'], $_POST['Entfax'], $_POST['Entemail'], $_POST['DateD'], $_POST['DateF'] );
        include_once "src/generate-conv.php";
    }
    if(isset($_POST['down-fiche'])){
        storeEtuEntr($_SESSION['stud_id'], $_POST['EntName'], $_POST['EntSiege'] , $_POST['Enttele'], $_POST['Entfax'], $_POST['Entemail'], $_POST['DateD'], $_POST['DateF'] );
        include_once "src/down-fiche.php";
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
        <h1 class="page-name">documents generation</h1>
        <div class="content-card">
            <h2 class="card-name">autorisation</h2>
            <p class="card-breakdown">génerer votre autorisation.</p>
            <form method="post" id="stage-form">
            <div class="coll">
            <label for="DateD">date de début</label>
            <input type="date" name="DateD" size="40" required>
            </div>
            <div class="coll">
            <label for="DateF">date de fin</label>
            <input type="date" name="DateF"  required>
            </div><br>
            <div class="coll">
            <label for="EntName">nom d'enteprise</label required>
            <input type="text" name="EntName" id="" required>
            </div>
            <div class="coll">
            <label for="EntSiege">siege sociale</label>
            <input type="text" name="EntSiege" id="" required>
            </div><br>
            <div class="coll">
            <label for="Enttele">téléphone</label>
            <input type="text" name="Enttele" id="">
            </div>
            <div class="coll">
            <label for="Entfax">fax</label>
            <input type="text" name="Entfax" id="">
            </div>
            <div class="coll">
            <label for="Entemail">email</label>
            <input type="text" name="Entemail" id="">
            </div><br>
            <input type="submit" name="gen-aut" value="generer ">
            </form>
        </div>
        <div class="content-card">
            <h2 class="card-name">convention</h2>
            <p class="card-breakdown">génerer votre convention.</p>
            <form method="post" id="stage-form">
            <div class="coll">
            <label for="DateD">date de début</label>
            <input type="date" name="DateD" size="40" required>
            </div>
            <div class="coll">
            <label for="DateF">date de fin</label>
            <input type="date" name="DateF"  required>
            </div><br>
            <div class="coll">
            <label for="EntName">nom d'enteprise</label required>
            <input type="text" name="EntName" id="" required>
            </div>
            <div class="coll">
            <label for="EntSiege">siege sociale</label>
            <input type="text" name="EntSiege" id="" required>
            </div><br>
            <div class="coll">
            <label for="Enttele">téléphone</label>
            <input type="text" name="Enttele" id="">
            </div>
            <div class="coll">
            <label for="Entfax">fax</label>
            <input type="text" name="Entfax" id="">
            </div>
            <div class="coll">
            <label for="Entemail">email</label>
            <input type="text" name="Entemail" id="">
            </div><br>
            <input type="submit" name="gen-conv" value="generer">
            </form>
        </div>
        <div class="content-card">
            <h2 class="card-name">fiche d'appreation</h2>
            <p class="card-breakdown">télecharger votre fiche d'appreation.</p>
            <form method="post" id="stage-form">
            <input type="submit" name="down-fiche" value="telecharger">
            </form>
        </div>
        

    </div>
    </div>
</body>
</html>
