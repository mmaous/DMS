


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Name Your DB - DBGenie</title>
    <link href="../assets/images/favicon.png" rel="icon" >
    <link href="../assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/style.css" rel="stylesheet" type="text/css">
</head>
<body class="bg-white">
<!--    <form class="form-inline align-items-center text-center" method="get" id="DbnameForm" action="DbnameBuilder.php" >-->

        <div id="headerTitle" class="card-header text-center bg-success  mt-2 mb-5 pb-3" style="color: #e4ffe4; font-size: larger">
            <span class="">YOUR DATABASE DATABASES</span>
            <a href="../index.php">
                <button class="btn btn-outline-light float-left">Home</button>
            </a>
        </div>
        <div class="form-group mx-sm-3 mb-2">
<!--            <label for="Dbname" class="sr-only">Password</label>-->
<!--            <input type="text" class="form-control" id="Dbname" name="dbname" placeholder="Database name .. ">-->
            <div class="list-group align-items-center">
                <span class="banner m-4 text-capitalize text-white text-center">Choisir une base de données a manipuler !</span>
                <ul>
                    <?php
                    require_once './functions.php';

                    $connect = connect();
                    $dbnames = $connect->query("SHOW DATABASES");


                    $dbs = onlyUsersDb($dbnames);

                    foreach ($dbs as $d)
                        echo "<a href=\"../index.php\"><button class=\"btn btn-success m-2 \">$d</button></a>"
                ?>
                </ul>

            </div>
        </div>



<script src="../assets/js/bootstrap.js"></script>
</body>
</html>