<?php
    include_once "src/session.php";
    include_once "src/database-funs.php";
    //save stage
    define ('SITE_ROOT', realpath(dirname(__FILE__)));
    $mime_filter = array('image/jpeg', 'image/png', 'application/pdf');
    $filiere = $_SESSION["filiere"];
    $niveau = getNiveau($_SESSION["niveau"]);
    if(isset($_POST['send']))
    {   
        //Stores the filetype e.g document/jpeg
        $documenttype = $_FILES['document']['type'];
        $documentUserName = $_FILES['document']['name'];
        $ext = pathinfo($documentUserName, PATHINFO_EXTENSION); 
        //Stores the filename as it was on the client computer.
        $documentName = $_POST['file-name']."-".uniqid().".".$ext;
        //Stores any error codes from the upload.
        $documenterror = $_FILES['document']['error'];
        //Stores the tempname as it is given by the host when uploaded.
        $documenttemp = $_FILES['document']['tmp_name'];
        //check file type
        if (in_array($documenttype, $mime_filter)) {
            //The path you wish to upload the document to
            $documentPath = SITE_ROOT."/".$niveau."/".$filiere."/";
            $documentRelPath = "../".$niveau."/".$filiere."/";
            if(is_uploaded_file($documenttemp)) {
                if (!file_exists($documentPath)) {
                    mkdir($documentPath, 0777, true);
                }
                if(move_uploaded_file($documenttemp, $documentPath.$documentName)) {
                    if($_POST['file-name'] == 'aut'){
                        StoreDoc($documentRelPath, $documentName, $_SESSION["stud_id"],"autorisation");
                    }
                    if($_POST['file-name'] == 'conv'){
                        StoreDoc($documentRelPath, $documentName, $_SESSION["stud_id"], "convocation");
                    }
                    echo '<script>document.getElementById("msg").innerText = "fichier envoyé avec success" </script>';
                }
                else {   
                    echo '<script>document.getElementById("msg").innerText = "fichier envoyé avec success" </script>';
                }
            }
            else {
                echo '<script>document.getElementById("msg").innerText = "une erreur s\'est intrompu" </script>';
            }
            }
        } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/depot.css">
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
        <div class="content-card">
            <h2 class="card-name">uploader votre document</h2>
            <p class="card-breakdown">Uploader votre document ou convotion pour la réviser.</p>
            <form enctype="multipart/form-data" method="POST" id="depot-form">
            <div class="coll">
            <label for="file-name">type de document</label>
            <select name="file-name" required>
                <option value="aut">autorisation</option>
                <option value="conv">convocation</option>
            </select>
            </div><br>
            <div class="coll">
            <label for="file">fichier</label>
            <input type="file" name="document"  required>
            </div><br>
            <input type="submit" name="send" value="envoyer">
            </form>
            <div id="msg"></div>
        </div>

    </div>
    </div>
</body>

