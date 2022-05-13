<?php
    include_once "db.class.php";
    $db_etudiants = new db("localhost", "root", "","est","etudiant");
    $query = "SELECT * FROM etudiant WHERE user='{$_SESSION["stud_user"]}';";
    $stud_row = mysqli_fetch_assoc($db_etudiants->fetch_query($query));
    
    $_SESSION['stud_fullname']  =  $stud_row['prenom'] . " " . $stud_row['nom'];
    
    //$year= ..;
    
    












?>