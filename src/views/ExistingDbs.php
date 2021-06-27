<!DOCTYPE html>
<html lang="fr" >
<head>
    <title>Vos bases de données - DMS</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="../../assets/images/favicon.png" rel="icon" >
    <link href="../../assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../../assets/css/style.css" rel="stylesheet" type="text/css">
</head>
<body class="bg-white">

<div id="headerTitle" class="card-header text-center mt-2 mb-5 pb-3" >
    <span class="text-white text-lg-center">Vos bases de données</span>
    <a href="../../index.php">
        <button class="btn btn-outline-light btn-sm float-left">Accueil</button>
    </a>
</div>
   <form class="form-inline align-items-center text-center" method="get" id="DbnameForm" action="../controller/DatabaseSelected.php" >
        <div class="form-group mx-sm-3 mb-2">
            <div class="list-group align-items-center">
                <span class="banner m-4 text-white text-center">Choisissez une base de données à consulter !</span>
                <ul>
                        <?php
                        require '../controller/functions.php';

                        $connect = connectServer();
                        $dbnames = $connect->query("SHOW DATABASES");

                        $dbs = onlyUsersDb($dbnames);
                        $connect = null;

                        if (!empty($dbs)) {
                            foreach ($dbs as $d) {
                                echo "<button class='btn btn-success m-2' name='db' value='$d'>$d</button>";
                            }
                        } else {
                            echo "<div class='alert w-100 alert-danger text-dark text-center' >pas de base de données ici !<br><a  class='m-2' href='DbCreateForm.html'><button type='button' class='btn bg-info btn-outline-dark'>Créez une nouvelle base de données !</button></a></div>";
                        }

                        $dbnames=null;
                        $dbs=null;
                        ?>

                </ul>

            </div>
        </div>
   </form>

<footer class="position-fixed  bg-white" id="footer">
    <div class="p-3">
        <div class="container text-center ">
            <p class="text-white d-inline m-4 text-left ">Realiser par : MHAND MAOUS</p>
            <p class="text-white text-center m-4 d-inline">Groupe tp : G4 - SMI6</p>
            <p class="text-white  text-right m-4 d-inline">CNE : 17-01590008</p>
        </div>
    </div>
</footer>


<script src="../../assets/js/bootstrap.js"></script>
</body>
</html>