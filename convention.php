<?php
session_start();
//check if user authentificated
include_once "src/is_auth.php";

//generate conv on click
if(isset($_POST["gen-conv"])){
  include "src/generate-conv.php";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/convention.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Raleway:wght@400;500&display=swap" rel="stylesheet">
  <script src="scripts/convention.js"></script>
  <script src="https://kit.fontawesome.com/1a6b4cc1f2.js" crossorigin="anonymous"></script>
  <title>génerer votre convention</title>
</head>

<body>
  <div class="bg-hero">
    <section class="top">
    <h1>Selectionner l'etrepriser de stage</h1>
    <form id="add-entr-form" method="POST">
      <div class="input-grp">
      <label for='nom-entr'>nom de l'entreprise</label>
      <input type='text' name='nom-entr' required>
      </div>
      <div class="input-grp">
      <label for='entr-loc'>adresse</label>
      <input type='text' name='entr-loc' required>
      </div>
      <input type="submit" name="gen-conv" value="générer ma convention">
    </form>
    </section>
  </div>
</body>

</html>