<?php
    include_once "src/session.php";
    include_once "../src/database-funs.php";
    if(isset($_GET['action'])){
        $action = $_GET['action'];
        $doc_id = $_GET['id'];
        if($action == "accept") acceptDoc($doc_id , $_SESSION['stud_id']);
        if($action == "deny") denyDoc($doc_id, $_SESSION['stud_id']);
    }
    
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
        <h1 class="page-name">dépot des documents</h1>
        <div class="content">
            <table class="data-table">
                <tr>
                    <th>id</th>
                    <th>fichier</th>
                    <th>type</th>
                    <th>date de dépot</th>
                    <th>état</th>
                    <th>etudiant</th>
                </tr>
            <?php
            if(isset($_GET['stud_id'])){
                $documents = getEtudDocs($_GET['stud_id']);
            }else{
                $documents = getDocuments();
            }
            while($document = mysqli_fetch_assoc($documents)){
            $filepath = $document["fichier_attache"];
            $id = $document['id'];
            $stud_id = $document['id_etudiant'];
            echo    "<tr><td>#".$id."</td>
                    <td class=\"action\" ><a href=\"{$filepath}\" target=\"_blank\">".basename($filepath)."</a></td>
                    <td>".$document["type"]."</td>
                    <td>".$document["date_de_depot"]."</td>
                    <td>".$document["etat"]."</td>
                    <td>".$document["prenom"]." ".$document["nom"]."</td>
                    <td class='action'><a href='?action=accept&id=$id&stud=$stud_id'>accepter</a></td>
                    <td class='action red'><a href='?action=deny&id=$id&stud=$stud_id'>reffuser</a></td>
                    <td>".""."</td></tr>";

            }
            ?>
            </table> 
            <div class="filter-card">

            </div>
        </div>
    </div>
    </div>
</body>