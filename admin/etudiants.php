<?php
    include_once "src/session.php";
    include_once "../src/database-funs.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/table.css">
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
        <h1 class="page-name">étudiants</h1>
        <div class="content">
            <table class="data-table">
                <tr>
                    <th>id</th>
                    <th>nom</th>
                    <th>niveau</th>
                    <th>departement</th>
                    <th>filiere</th>
                    <th>debut de stage</th>
                    <th>fin de stage</th>
                    <th>entreprise</th>
                </tr>
                <?php
                $etudiants = getStudStage();
                while($etudiant = mysqli_fetch_assoc($etudiants)){
                $id = $etudiant['id'];
                $name = $etudiant["prenom"]." ".$etudiant["nom"];
                echo    "<tr><td>#".$id."</td>
                        <td class='action'><a href='depot.php?stud_id=$id'>$name</a></td>
                        <td>".$etudiant["niveau"]."</td>
                        <td>".$etudiant["departement"]."</td>
                        <td>".$etudiant["filiere"]."</td>
                        <td>".$etudiant["date_de_debut"]."</td>
                        <td>".$etudiant["date_de_fin"]."</td>
                        <td>".$etudiant["entreprise"]."</td>
                        </td></tr>";
                }
                ?>
            </table> 
            <div class="filter-card">

            </div>
        </div>
    </div>
    </div>
</body>

