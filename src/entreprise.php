<?php
    include_once "src/db.class.php";
    $db_entreprise = new db("localhost", "root", "", "est");
    if(!isset($_GET["q"])){
        $query = "SELECT * FROM entreprise;";
    }else{
        $query = "SELECT * FROM entreprise WHERE nom LIKE '{$_GET["q"]}%';";
    }
    
    $entr_rows = $db_entreprise->fetch_query($query);
?>