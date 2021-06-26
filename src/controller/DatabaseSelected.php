<?php
    if(!isset($_GET["db"])){
    header("Location: /DMS");
}


if (isset($_GET["insert"])){
    header("Location: /DMS/src/views/insertForm.php?db=".$_GET["db"]."&table=".$_GET["table"]);
    die();
}elseif(isset($_GET["supprimer"])){
    if((isset($_GET["table"]) && isset($_GET["db"]))) {
        require 'functions.php';
        $table = $_GET["table"];
        $db = $_GET["db"];
        $connect = connectDB($db);
        $delete = $connect->query('DROP TABLE ' . $table);
        header("Location: DatabaseSelected.php?db=" . $db);
    }
}elseif(isset($_GET["consult"])) echo "welcome";
?>
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
<main class="text-white text-center w-75 m-auto pb-5 p-3" style="background-color: rgba(31, 44, 71, 0.91);">
    <header class="card-header " style="font-size: 2rem">Choisissez table à consulter !</header>
    <div class="text-center">
        <table class="table table-responsive-lg w-100 border-white " >
            <thead>
                <tr>
                    <th>Nom de Table</th>
                    <th>Champs</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require 'functions.php';
                    $databaseSelected = $_GET["db"];

                    $connect = connectDB($databaseSelected);

                    $tables = $connect->query("show tables;");

                    if ($tables->num_rows > 0) {
                        while ($table = $tables->fetch_assoc()) {
//                            $id = null;
                            $currentTable = $table["Tables_in_" . strtolower($databaseSelected)];
                            echo "<tr><td>" . $currentTable . "</td>";
                            $fields = $connect->query("desc " . $currentTable);

                            echo "<td style='text-align: center'>";
                            $i=0;
                            if ($fields->num_rows > 0){
                                while ($field = $fields->fetch_assoc()){
                                    $type = $field["Type"];
                                    if($type == "tinyint(1)") {
//                                        if($fieldName = $field["Field"] == "id")   $id = $field[$fieldName] ;
                                        echo "<i style='margin: 1rem'>* " . $field["Field"] . " (type = Boolean)</i>";
                                    }else {
                                        if($field["Field"] === "id")   $id = $field["Field"];
                                        echo "<i style='margin: 1rem'>* " . $field["Field"] . " (type = " . $type . ")</i>";
                                    }
                                    $i++;
                                    if($i>1){
                                        $i=0;
                                        echo "<br><hr>";
                                    }

                                }
                            }else
                                echo "no field here!";
                            echo "</td>";

                            echo '<td class="p-2 m-0 text-center btn-group-sm"><form method="get" action="DatabaseSelected.php">'.
//                                '<input name="id" value="'.$id.'" hidden>'.
                                '<input name="table" value="'.$currentTable.'" hidden>'.
                                '<input name="db"  value="'.$databaseSelected.'" hidden>'.
                                '<a href="ShowData.php?table='.$currentTable.'&db='.$databaseSelected.'&consult="><button name="consult"  type="button"  class="btn btn-sm btn-outline-info m-2" > Consulter</button></a>'.
                                '<button name="insert" type="submit" class="btn btn-outline-warning btn-sm m-2" >Insérer</button>'.
                                '<button name="supprimer" type="submit" class="btn btn-outline-danger m-2 btn-sm" style="color: #f6baa9; border-color: #f6baa9" >Supprimer</button>'.
                                "</form></td></tr>";
                        }

                    } else  echo "pas de tableau à afficher !";

                    $connect->close();
                ?>
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