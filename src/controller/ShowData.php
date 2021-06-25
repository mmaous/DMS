<?php
if (isset($_GET["insert"])){
    echo "taaaaaaaaz";
}elseif(isset($_GET["supprimer"]))
    if((isset($_GET["tableName"]) && isset($_GET["databaseName"]))){
        require 'functions.php';
        $table =$_GET["tableName"];
        $db = $_GET["databaseName"];
        $connect = connectDB($db);
        $delete = $connect->query('DROP TABLE '.$table);
        header("Location: DatabaseSelected.php?databasename=".$db);

    }else header("Location: DatabaseSelected.php");

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
                if(!(isset($_GET["tableName"]) && isset($_GET["databaseName"]))){
                        header("Location: /Database-Management-System");
                    }

                $table = $_GET["tableName"];
                //                    $table = "quiz_student";
                $db = $_GET["databaseName"];
                //                    $db = "hotel_farah";
                echo '<div class="text-center w-100">';
                echo '<a class="btn btn-info m-3 text-white btn-md" href="/Database-Management-System/src/controller/DatabaseSelected.php?databasename='.$db.'" style="background-color: rgba(31,44,71,0.84)">Retour a la listes des tableaux dans '.$db.'!</a>';
                echo '</div>';
                echo '<main class="text-white text-center w-100 m-auto p-3" style="background-color: rgba(31, 44, 71, 0.91);">';

                echo "<header class='card-header ' style='font-size: 2rem'>Les données de la table \"$table\" !</header>";
                    echo "<form>";

                    echo "</form>";
                    echo "<div class='text-center'>";
                    echo " <table class='table table-responsive-lg w-100 border-white'>";



                $connect = connectDB($db);

                    if(isset($_GET["consult"])) {

                        $fields = $connect->query("desc " . $table);
                        $fieldCount = 0;
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
                                echo "</tr></thead>";
                            } else   echo "no fields here!";
                            $data = $connect->query("select * from $table");

                            echo "<tbody style='border:1px solid white;background-color: #2D3851CD'>";

                           if(is_object($data)){
                               if ($data->num_rows > 0) {
                                   while ($row = $data->fetch_assoc()) {
                                       echo "<tr>";
                                       foreach ($fieldsArray as $fieldName) {
                                           echo "<td align='center'>" . $row[$fieldName] . "</td>";
                                       }
                                       echo "</tr>";
                                       //                echo "<br><br>";
                                   }
                                   echo "</tbody>";
                               } else   echo "no data here!";
                           }
                            $connect->close();
                        } else  echo "No data is found within this tables";

                        echo  '<tfooter class="text-center">';
                        echo '<td>';

                        echo '<form action="../views/insertForm.php">';
                        echo '<input name="tableName" value="'.$table.'" hidden>';
                        echo '<input name="databaseName" value="'.$db.'" hidden>';
                        echo ' <button type="submit" class="btn btn-outline-warning" >Insérer a c tableau</button>';
                        echo '</form>';
                        echo '</tfooter></table></div>';

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
