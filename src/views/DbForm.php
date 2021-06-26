<?php
if (!$_GET["databasename"]) {
    header('Location: DbCreateForm.html');
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Creer Votre BD - DBGenie</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="../../assets/images/favicon.png" rel="icon">
    <link href="../../assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../../assets/css/style.css" rel="stylesheet" type="text/css">
</head>
<body class="bg-white">
<div id="headerTitle" class="card-header text-center  mt-2 mb-5 pb-3">
    <span class="text-white">Commencer par écrire le nom de la base de données</span>
    <a href="../../index.php">
        <button class="btn btn-outline-light btn-sm float-left">Home</button>
    </a>
</div>
<form class="form-inline text-white text-center DbnameForm " method="get" id="DbnameForm" action="../controller/tableBuilder.php">
    <span class="alert alert-danger text-center m-3 w-75">⚠️ si le nom de table existe déjà il sera remplacé par celui-ci en cas de validité!</span>
    <span class="card-title text-center w-50 alert alert-info"> Le nom de la base de données : <br><strong
                name="db"><?php echo "<a href='/DMS/src/controller/DatabaseSelected.php?databasename=".$_GET["databasename"]."'><button type='button' class='w-25 btn btn-dark bg-success border-left-0 border-right-0 m-2' >".$_GET["databasename"]."</button></a>"; ?></strong></span>
    <?php

    echo  "<input name='dbname' value=".$_GET["databasename"]. "  hidden>";

    ?>
    <fieldset class="m-1 alert alert-primary w-50">
        <label for="tableName" class="col-form-label text-dark">Nom de Table</label>
        <input type="text"
        <?php

            if (isset($_GET["tablename"]))
                echo "value =\"".$_GET["tablename"]."\"";
            else
                echo "placeholder=\"Saisir le nom de table\"";

        ?>
        class=" form-control w-100 datafield" id="tableName"
               name="tableName" required>
    </fieldset>
    <table id="database" class=" p-3 table table-active alert alert-primary" style="margin: 0 29.9rem; border-radius: 1px">
        <thead>
            <tr>
                <th>Nom de champ</th>
                <th>type</th>
                <th>longeur</th>

                <th>Action</th>
            </tr>
        </thead>
            <tfoot>
                <tr>
                    <td colspan="4">
                        <button type="button" class="btn btn-primary btn-sm float-sm-start" id="ajouter_ligne">Ajouter une ligne</button>
                    </td>
                </tr>
            </tfoot>
        <tbody>
        <tr>
            <td><span class="spanField">
                    <input type="text" class="form-control datafield w-75" id="col[1]" name="col[1]" placeholder="nom de champ ( ex: nbr_class)"  pattern="^[A-Z a-z0-9_]{3,16}$" title="usual identifier like: nbr_rooms_4" required>
                </span>
            </td>
            <td>
                <span class="spanField">
                    <select class="form-select custom-select bg-white  w-75 datafield" id="type[1]" name="type[1]" required>
                        <option value="int">Int</option>
                        <option value="text">Text</option>
                        <option value="tinyint(1)">Boolean</option>
                    </select>
                </span>
            </td>
            <td>
                <span class="spanField">
                    <input type="number" value="255" class="form-control datafield w-75" id="length[1]" name="length[1]" required>
                </span>
            </td>
            <td class="actions">
                <button type="button" class="btn btn-danger btn-sm w-100" disabled>X</button>
            </td>
        </tr>
        </tbody>
    </table>

    <div class="submit" aria-disabled="true">
        <button type="button" id="modifier" disabled="disabled" hidden>Modifier</button>
    </div>
    <button type="submit" name="finished" value="true" class=" btn btn-success m-4 valider">Ajout</button>
    <button type="submit" name="addAnotherTable" value="true" class="btn btn-success m-4 valider">Ajout +</button>
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
<script src="../../assets/js/script.js"></script>
</body>
</html>