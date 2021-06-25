<?php
session_start();
require "src/controller/functions.php";
//$connect = connectServer();
//
////$_SESSION["server_connection"] = $connect;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome - DBGenie</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="assets/images/favicon.png" rel="icon" >
    <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
</head>
<body  id="homepage">
    <div id="headerTitle" class="alert header text-white">
        Prenez le contrôle de la structure de votre base de données!
    </div>
    <span class="form-inline text-center" style="margin-top: 8rem"  id="DbnameForm">
        <a href="src/views/DbCreateForm.html"><button class="btn btn-success m-2">Créer une base donneés!</button></a>
        <a href="src/views/ExistingDbs.php"><button class="btn btn-success m-2 ">Consultez vos bases de données !</button></a>
    </span>



    <footer class="position-fixed  bg-white" id="footer">
        <div class="p-3">
            <div class="container" align="center">
                <p class="text-white d-inline m-4 text-left ">Realiser par : MHAND MAOUS</p>
                <p class="text-white text-center m-4 d-inline">Groupe tp : G4 - SMI6</p>
                <p class="text-white  text-right m-4 d-inline">CNE : 17-01590008</p>
            </div>
        </div>
    </footer>


<script src="assets/js/bootstrap.js"></script>
</body>
</html>