


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Name Your DB - DBGenie</title>
    <link href="../assets/images/favicon.png" rel="icon" >
    <link href="../assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<!--    <form class="form-inline align-items-center text-center" method="get" id="DbnameForm" action="DbnameBuilder.php" >-->
        <div class="form-group mb-2">

            <span class="sr-only">What do you want you to name Database? </span>
        </div>
        <div class="form-group mx-sm-3 mb-2">
<!--            <label for="Dbname" class="sr-only">Password</label>-->
<!--            <input type="text" class="form-control" id="Dbname" name="dbname" placeholder="Database name .. ">-->
            <div class="list-group">
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
        <button type="../index.php" class="btn btn-success mb-2">Home</button>



<script src="../assets/js/bootstrap.js"></script>
</body>
</html>