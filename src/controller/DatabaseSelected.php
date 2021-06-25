<?php
//    if($_GET("databaseName") !== null or ($_POST("databaseName")) !== null ){
//    header("Location: /");
//}
//?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Name Your DB - DBGenie</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="../../assets/images/favicon.png" rel="icon">
    <link href="../../assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../../assets/css/style.css" rel="stylesheet" type="text/css">
</head>
<body id="homepage" class="bg-white">

<div id="headerTitle" class="card-header text-center mt-2 mb-2 pb-3">
    <span class="text-white text-lg-center">YOUR DATABASE TABLES</span>
    <a href="../../index.php">
        <button class="btn btn-outline-light btn-sm float-left">Home</button>
    </a>
</div>
<div class="text-center w-100">
    <a class="btn btn-danger m-3 text-white btn-md" href="../views/ExistingDbs.php" style="background-color: rgba(31,44,71,0.84)">Retour a la listes des bases des données!</a>
</div>
<main class="text-white text-center w-75 m-auto p-3" style="background-color: rgba(31, 44, 71, 0.91);">
    <header class="card-header " style="font-size: 2rem">Choisissez table à consulter !</header>
    <div class="text-center">
        <table class="table table-responsive-lg w-100 border-white " >
            <thead>
                <tr>
                    <th>Nom de Table</th>
                    <th>Fields</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require 'functions.php';
                    $databaseSelected = $_GET["databasename"];

                    $connect = connectDB($databaseSelected);

                    $tables = $connect->query("show tables;");

                    if ($tables->num_rows > 0) {
                        while ($table = $tables->fetch_assoc()) {
                            $currentTable = $table["Tables_in_" . $databaseSelected];
                            echo "<tr><td>" . $currentTable . "</td>";
                            $fields = $connect->query("desc " . $currentTable);

                            echo "<td style='text-align: center'>";
                            $i=0;
                            if ($fields->num_rows > 0){
                                while ($field = $fields->fetch_assoc()){
                                    $type = $field["Type"];
                                    if($type === "tinyint(1)")
                                        echo "<i style='margin: 1rem'>* ".$field["Field"] ." (type = Boolean)</i>";
                                    else
                                        echo "<i style='margin: 1rem'>* ".$field["Field"] ." (type = ".$type.")</i>";


                                    $i++;
                                        if($i>1){
                                            $i=0;
                                            echo "<br><hr>";
                                        }

                                }
                            }else
                                echo "no field here!";
                            echo "</td>";

                            echo ' <td class="p-2 m-0 text-center btn-group-sm"><form action="ShowData.php"><input name="tableName" value="'.$currentTable.'" hidden>'.
                                '<input name="databaseName" value="'.$databaseSelected.'" hidden><button name="consult" class="btn btn-sm btn-outline-info m-2" >Consulter</button>'.
                                '<button name="insert" class="btn btn-outline-warning btn-sm m-2" >Insérer</button>'.
                                '<button name="supprimer" class="btn btn-outline-danger m-2 btn-sm" style="color: #f6baa9; border-color: #f6baa9" >Supprimer</button>'.
                                "</form></td></tr>";
                        }
                    } else {
                        echo "no table here !";
                    }


                $connect->close();
                ?>
                <tr>

                </tr>
            </tbody>
        </table>
    </div>
</main>
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