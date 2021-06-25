<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <title>Name Your DB - DBGenie</title>-->
<!--    <link href="../assets/images/favicon.png" rel="icon" >-->
<!--    <link href="../assets/css/bootstrap.css" rel="stylesheet" type="text/css">-->
<!--    <link href="../assets/css/style.css" rel="stylesheet" type="text/css">-->
<!--</head>-->
<!--<body class="bg-white">-->
<!--   <form class="form-inline align-items-center text-center" method="get" id="DbnameForm" action="DbnameBuilder.php" >-->
<!---->
<!--        <div id="headerTitle" class="card-header text-center mt-2 mb-5 pb-3" >-->
<!--            <span class="text-white text-lg-center">YOUR DATABASE DATABASES</span>-->
<!--            <a href="../../index.php">-->
<!--                <button class="btn btn-outline-light btn-sm float-left">Home</button>-->
<!--            </a>-->
<!--        </div>-->
<!--        <div class="form-group mx-sm-3 mb-2">-->
<!--            <div class="list-group align-items-center">-->
<!--                <span class="banner m-4 text-capitalize text-white text-center">Choisir une base de données a manipuler !</span>-->
<!--                <ul>-->
                        <?php
                        require_once './functions.php';

                        $connect = connect();
                        $dbnames = $connect->query("SHOW DATABASES");


                        $dbs = onlyUsersDb($dbnames);

                        foreach ($dbs as $d)
                            echo "<a href=\"../index.php\"><button class=\"btn btn-success m-2 \">$d</button></a>"
                        ?>
<!--                </ul>-->
<!---->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--<footer class="bg-white" id="footer">-->
<!--    <div class="py-2">-->
<!--        <div class="container text-center ">-->
<!--            <p class="text-white d-inline m-4 text-left ">Realiser par : MHAND MAOUS</p>-->
<!--            <p class="text-white text-center m-4 d-inline">Groupe tp : G4 - SMI6</p>-->
<!--            <p class="text-white  text-right m-4 d-inline">CNE : 17-01590008</p>-->
<!--        </div>-->
<!--    </div>-->
<!--</footer>-->
<!---->
<!---->
<!--<script src="../assets/js/bootstrap.js"></script>-->
<!--</body>-->
</html>