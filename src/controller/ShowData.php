<?php

if(isset($_GET["supprimer"]))
    if((isset($_GET["table"]) && isset($_GET["db"]))){
        require 'functions.php';
        $table =$_GET["table"];
        $db = $_GET["db"];
        $connect = connectDB($db);
        $delete = $connect->query('DELETE FROM '.$table." where id=".$_GET["id"]);
        header("Location: ShowData.php?table=".$table."&db=".$db."&consult=");
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

<div id="headerTitle" class="card-header text-center mt-2 mb-5 pb-3">
    <span class="text-white text-lg-center">Table data!</span>
    <a href="../../index.php">
        <button class="btn btn-outline-light btn-sm float-left">Home</button>
    </a>
</div>
                <?php
                require 'functions.php';
                if(!(isset($_GET["table"]) && isset($_GET["db"]))){
                        header("Location: /DMS");
                    }

                $table = $_GET["table"];
                //                    $table = "quiz_student";
                $db = $_GET["db"];
                //                    $db = "hotel_farah";
                echo '<div class="text-center w-100">';
                echo '<a class="btn btn-info m-3 text-white btn-md" href="/DMS/src/controller/DatabaseSelected.php?db='.$db.'" style="background-color: rgba(31,44,71,0.84)">Retour a la listes des tableaux dans '.$db.'!</a>';
                echo '</div>';
                echo '<main class="text-white text-center w-100 mb-5 p-3" style="background-color: rgba(31, 44, 71, 0.91);">';

                echo "<header class='card-header ' style='font-size: 2rem'>Les données de la table $table !</header>";
                    echo "<form>";

                    echo "</form>";
                    echo "<div class='text-center' style='overflow-wrap: normal; overflow-x: auto'>";
                    echo " <table class='table w-75  table-sm border-white' ALIGN='CENTER'>";



                $connect = connectDB($db);

                    if(isset($_GET["consult"])) {

                        $fields = $connect->query("desc " . $table);
                        $fieldCount = 1;
                        $fieldsArray = [];
                        if (is_object($fields)){
                            if($fields->num_rows > 0) {
                                echo "<thead style='background-color: #0c5460'><tr>";
                                while ($field = $fields->fetch_assoc()) {
                                    $fieldCount++;
                                    $OneTimefield = $field["Field"];
                                    echo "<th style='padding: 1rem'> " . $OneTimefield . "</th>";
                                    array_push($fieldsArray, $OneTimefield);
                                }
                                echo "<th>Actions</th></tr></thead>";
                            } else   echo "pas de champs à afficher !";
                            $data = $connect->query("select * from ".$table);


                           if(is_object($data)){
                               if ($data->num_rows > 0) {
                                   echo "<tbody style='border:1px solid white;background-color: #2D3851CD'>";
                                   while ($row = $data->fetch_assoc()) {
                                       echo "<tr>";
                                       foreach ($fieldsArray as $fieldName) {
                                           if ($fieldName === "id") $id = $row[$fieldName];
                                           echo "<td align='center'>" . $row[$fieldName] . "</td>";
                                       }
                                       echo ' <td class="p-2 m-0 text-center btn-group-sm"><form action="ShowData.php">';
                                       echo '<input name="table" value="'.$table.'" hidden>'.
                                           '<input name="db" value="'.$db.'" hidden>'.
                                           '<input name="id" value="'.$id.'" hidden>'.
                                           '<a href="editData.php?table='.$table.'&db='.$db.'&id='.$id.'"><button name="modifier" type="button" class="btn btn-outline-warning btn-sm" >Modifier</button></a>'.
                                           '<button name="supprimer" type="submit" class="btn btn-outline-danger btn-sm" style="color: #f6baa9; border-color: #f6baa9" >Supprimer</button>'.
                                           "</form></td></tr>";                                   }
                               } else   echo "<td colspan='$fieldCount'>no data here!</td>";
                               echo "</tbody>";

                           }
                            $connect->close();
                        } else  echo "No data is found within this tables";

                        echo  "<tfooter >";
                        echo "<tr><td colspan='$fieldCount'>";

                        echo '<form action="../views/insertForm.php">';
                        echo '<input name="table" value="'.$table.'" hidden>';
                        echo '<input name="db" value="'.$db.'" hidden>';
                        echo ' <button type="submit" class="btn btn-outline-warning" >Insérer dans ce tableau</button>';
                        echo '</form>';
                        echo '</td></tr></tfooter></table></div>';

                    }
                ?>
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
