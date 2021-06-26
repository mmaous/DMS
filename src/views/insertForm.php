<?php

if((!isset($_GET["table"]) OR !isset($_GET["db"])) OR (empty($_GET["db"]) OR empty($_GET["table"]))){
    header("Location: /DMS/src/views/ExistingDbs.php");
    die();
}?>
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
</div>
<main class="text-white text-center w-75 m-auto pb-5 p-3" style="background-color: rgba(31, 44, 71, 0.91);">
    <header class="card-header " style="font-size: 2rem">Inserer les donnes !</header>
<!--    <div class="text-center">-->
<!--        <div class=" w-100 border-white " >-->
            <?php

            require '../controller/functions.php';

            if(!(isset($_GET["table"]) && isset($_GET["db"]))){
                header("Location: /DMS");
            }

            $table = $_GET["table"];
            //                    $table = "quiz_student";
            $db = $_GET["db"];
            //                    $db = "hotel_farah";
            echo '<a class="btn btn-info m-3 text-white btn-md" href="/DMS/src/controller/DatabaseSelected.php?db='.$db.'" style="background-color: rgba(31,44,71,0.84)">Retour a la listes des tableaux dans '.$db.'!</a>';
            echo '<div class="text-center w-100">';
            echo '</div>';
            echo '<main class="text-white text-center w-100 mb-2 p-3" style="background-color: rgba(31, 44, 71, 0.91);">';

            echo "<header class='card-header ' style='font-size: 2rem'>Les données de la table \"$table\" !</header>";
            echo "<div class='text-center' style='overflow-wrap: normal; overflow-x: auto'>";


            $db = $_GET["db"];
            $table = $_GET["table"];

            $connect = connectDB($db);

            $fields = $connect->query("desc ".$table);

            if ($fields->num_rows > 0){
                echo '<form action="insertData.php" method="post"><div align="center" class="form-group">';
                while($field = $fields->fetch_assoc()){
                    if ($field["Field"] !=="id") {
                        if (strpos($field["Type"], 'tinyint(1)') !== false) {
                            echo "<select class='form-select custom-select bg-white  w-50 datafield' name='typeBool'><option value='true'>true</option><option value='false'>false</option> <br>";
                        }elseif((strpos($field["Type"], "text") !== false) or (strpos($field["Type"], "varchar") !== false) ){
                            echo "<label for='".$field["Field"]."'>".$field["Field"]."</label>";
                            echo "<input id='".$field["Field"]."' class='form-control datafield w-50' name='".$field["Field"]."' value='NULL' type='text' required>";
                        }elseif(strpos($field["Type"], "int") !== false){
                            echo "<label for='".$field["Field"]."'>".$field["Field"]."</label>";
                            echo "<input id='".$field["Field"]."' class='form-control datafield w-50' name='".$field["Field"]."' value='NULL' type='number' required>";
                        }elseif(strpos($field["Type"], "date") !== false){
                            echo "<label for='".$field["Field"]."'>".$field["Field"]."</label>";
                            echo "<input id='".$field["Field"]."' class='form-control datafield w-50' name='".$field["Field"]."' type='date' value='2018-07-22' required>";
                        }
                    }
                }
                echo '<button type="submit">submit</button></form>';
            }else echo "no fields to insert into!";


            $connect->close();
           ?>
    </div>
    </div></div></div>
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



