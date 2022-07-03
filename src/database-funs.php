<?php

use JetBrains\PhpStorm\Internal\ReturnTypeContract;

include_once "db.class.php";
$db= new db("localhost", "root", "", "rid");
// generate aut
    //insert entrenprise/stage/etudiant
    function GetLastId($table) {
        global $db;
        $query = "SELECT max(id) FROM  $table;";
        $max_row  = $db->result_query($query);
        $id = ++$max_row['max(id)'];
        return $id;
    }
    function StoreEtuEntr($etud_id, $nom, $siege_soc, $tele, $fax, $email , $dateD, $dateF) {
        global $db;
        //get last entr id
        $entr_id = GetLastId("entreprise");
        //get last stage id
        $stage_id = GetLastId("stage");
        //echo $stage_id; 
        //insert entr 
        //echo "INSERT INTO entreprise (id, nom,  siege_sociale,  tele,  fax,  email) VALUES ($entr_id, $nom, $siege_soc, $tele, $fax, $email);";
        //insert stage with entr id 
        //echo "INSERT INTO stage (id, Date_de_debut, Date_de_fin, id_ENTREPRISE) VALUES ('$stage_id', '$dateD', '$dateF', '$entr_id');"; 
        //insert etud id_stage
        //
        //echo "UPDATE etudiant Set id_STAGE = '$stage_id' WHERE id='$etud_id';";


        $db->normal_query("INSERT INTO entreprise (id, nom,  siege_sociale,  tele,  fax,  email) VALUES ('$entr_id', '$nom', '$siege_soc', '$tele', '$fax', '$email');");
        //insert stage with entr id 
        $db->normal_query("INSERT INTO stage (id, Date_de_debut, Date_de_fin, id_ENTREPRISE) VALUES ('$stage_id', '$dateD', '$dateF', '$entr_id');");    
        //insert etud id_stage
        $db->normal_query("UPDATE etudiant Set id_STAGE = '$stage_id' WHERE id='$etud_id';");
    }
    function GetStudentInfo(){
        global $db;
        $etudi = $db->result_query("SELECT * FROM etudiant WHERE id='{$_SESSION["stud_id"]}");
        
    }
    function getFiliere($id){
        global $db;
        $filiere = $db->result_query("SELECT * FROM filiere WHERE id=$id");
        return $filiere['filiere'];
    }
    function getNiveau($id){
        global $db;
        $niveau = $db->result_query("SELECT * FROM Niveau WHERE id=$id");
        return $niveau['niveau'];
    }
    




// upload your aut
    //generate file
    
    //insert auto info
   function StoreDoc($path, $filename, $etud,$type) {
        global $db;   
        $_path = str_replace("\\","/",$path);
        $query = "INSERT INTO `document` (`id`, `fichier_attache`, `type`, `date_de_depot`, `id_Etat`, `id_etudiant`) VALUES (NULL, \"$_path$filename\",\"$type\", now(), 0, $etud)";
        $db->normal_query($query);
    }
    function updateDocEtat($id,$etat_id){
        global $db;
        $query = "UPDATE document SET id_Etat = $etat_id WHERE id = $id";
        $db->normal_query("$query");
    }
    function acceptDoc($id, $etud_id){
        updateDocEtat($id,1);
        NotifEtud("votre document numero $id a été accepté", $etud_id);

    }
    function DenyDoc($id, $etud_id){
        updateDocEtat($id,2);
        NotifEtud("votre document numero $id a été reffusé", $etud_id);
    }
    function NotifEtud($message, $id) {
        global $db;   
        $query = "INSERT INTO `notification` (`id`, `notification`, `date` , `id_Etudiant`) VALUES (NULL, '$message', now(), $id)";
        $db->normal_query($query);
    }
    /*function StoreAut($path, $filename, $etud) {
        StoreFile($path, $filename, $etud, "autorisation");
    }
    function StoreConv($path, $filename, $etud) {
        StoreFile($path, $filename, $etud, "convention");
    }*/
    
    //show filieres
    function GetFileres(){
        global $db;
        $notifs = $db->normal_query("SELECT notification FROM notification;");
        return $notifs;
    }
    function GetEtudInfos(){
        global $db;
        $etudi = $db->result_query("SELECT * FROM etudiant WHERE id='{$_SESSION["stud_id"]}'");
        return $etudi;
    }
    function GetEtudName(){
        $row = GetEtudInfos();
        return $row['nom'].' '.$row['prenom'];
    }

    function CheckLogin($user, $password){
        global $db;
        $password = md5($password);
        $query = "SELECT etudiant.*, filiere.*, niveau.*  FROM etudiant
        LEFT JOIN filiere
        ON etudiant.id_Filiere = filiere.id
        LEFT JOIN niveau
        ON etudiant.id_Niveau = niveau.id
        where etudiant.user='$user' AND etudiant.password='$password'";
        $login = $db->normal_query($query);
        if(!$login) return FALSE;
        if (mysqli_num_rows($login) == 1){
            return mysqli_fetch_assoc($login);
        }
        return FALSE;
    }
    function CheckAdminLogin($user, $password){
        global $db;
        $password = md5($password);
        $login = $db->normal_query("SELECT * FROM administrateur WHERE user='$user' AND password='$password';");
        if(!$login) return FALSE;
        if (mysqli_num_rows($login) == 1){
            return mysqli_fetch_assoc($login);
        }
        return FALSE;
    }
    function storeEtudInfo(){
        global $db;
        $fields = ["prenom" => $_POST['prenom'] ,
            "nom"     => $_POST['nom'],
            "email"   => $_POST['email'],
            "tele"    => $_POST['tel'] ,
            "adresse" => $_POST['adresse']
        ];
        $stud_id = $_SESSION["stud_id"];
        $queryBody = "";
        foreach($fields as $mysqlField =>  $inputField){
            if(!( $mysqlField == array_key_last($fields) )){
                $queryBody =$queryBody."$mysqlField = '$inputField' ,";
            }else{
                $queryBody =$queryBody."$mysqlField = '$inputField'";
            }       
            }
        
        $query = "UPDATE etudiant SET ".$queryBody."WHERE id = $stud_id";
        $db->normal_query("$query");
    }
    function storeADMINInfo(){
        global $db;
        $fields = ["prenom" => $_POST['prenom'] ,
            "nom"     => $_POST['nom'],
            "email"   => $_POST['email'],
            "tele"    => $_POST['tel'] ,
            "adresse" => $_POST['adresse']
        ];
        $admin_id = $_SESSION["admin_id"];
        $queryBody = "";
        foreach($fields as $mysqlField =>  $inputField){
            if(!( $mysqlField == array_key_last($fields) )){
                $queryBody =$queryBody."$mysqlField = '$inputField' ,";
            }else{
                $queryBody =$queryBody."$mysqlField = '$inputField'";
            }       
            }
        
        $query = "UPDATE administrateur SET ".$queryBody."WHERE id = $admin_id";
        $db->normal_query("$query");
    }
    function getDocuments(){
        global $db;
        $query="SELECT document .*, etudiant.nom, etudiant.prenom, etat.etat  FROM document
                LEFT JOIN etudiant
                ON document.id_etudiant = etudiant.id
                LEFT JOIN etat
                ON document.id_Etat = etat.id
                ORDER BY id DESC;";
        $documents = $db->normal_query($query);
        return $documents;
    }
    function getStudStage(){
        global $db;
        $query="SELECT etudiant.*, stage.date_de_debut, stage.date_de_fin, entreprise.entreprise ,departement.departement, filiere.filiere, niveau.niveau FROM etudiant LEFT JOIN stage ON etudiant.id_STAGE = stage.id LEFT JOIN filiere ON etudiant.id_Filiere = filiere.id LEFT JOIN entreprise ON stage.id_ENTREPRISE = entreprise.id LEFT JOIN niveau ON etudiant.id_Niveau = niveau.id LEFT JOIN departement ON filiere.id_Departement = departement.id ORDER BY id DESC ";
        $studplus = $db->normal_query($query);
        return $studplus;
    }
    function getEtudDocs($id){
        global $db;
        $query="SELECT document.*, etudiant.nom, etudiant.prenom, etat.etat  FROM document
                LEFT JOIN etudiant
                ON document.id_etudiant = etudiant.id
                LEFT JOIN etat
                ON document.id_Etat = etat.id AND document.id_etudiant = $id
                ORDER BY id DESC;";
        $documents = $db->normal_query($query);
        return $documents;
    }
    function getNotifs($id){
        global $db;
        $notifs = $db->normal_query("SELECT * FROM notification WHERE id_Etudiant=$id ORDER BY Date Desc");
        return $notifs;
    }
    
// generate conv


// upload your convention
/*

function nextEntrId() {
    global $db;
    $query = "SELECT max(id) FROM  entreprise;";
    $max_row  = $db->result_query($query);
    $id = ++$max_row['max(id)'];
    
    return $id;
}
function storeEntr($id, $nom, $adresse) {
    global $db;
    $query = "INSERT INTO entreprise (id,nom, adresse, approuve) VALUES ($id, '$nom', '$adresse',0);";
    $db->normal_query($query);
    
}
function storeEtudEntr($etudiant_id, $entreprise_id) {
    global $db;
    //etudiant a la convocation
    $query = "UPDATE etudiant Set entreprise = $entreprise_id, a_conv = 1 WHERE id=$etudiant_id;";
    $db->normal_query($query);
    
}
function studentHasAut($etudiant_id) {
    global $db;
    $query = "UPDATE etudiant Set a_auto = 1 WHERE id=$etudiant_id;";
    $db->normal_query($query);
    
}
function a_conv($etudiant_id) {
    global $db;
    $query = "SELECT a_conv FROM etudiant WHERE id=$etudiant_id;";
    $A_conv = $db->result_query($query);
    $a_conv = (int) $A_conv['a_conv'];
    
    return $a_conv;
}*/
?>