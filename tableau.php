<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau</title>
</head>

<body>
    <?php
    function affichage_Agenda()
    {
        $bdd = mysqli_init();
        mysqli_real_connect($bdd, "localhost", "admin", "", "gestion_employe");
        $result = mysqli_query($bdd, "SELECT * FROM EMPLOYES;");
        $tab_Affichage_Agenda = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($bdd);
        return $tab_Affichage_Agenda;
    }
    function tableau_Sup()
    {
        $bdd = mysqli_init();
        mysqli_real_connect($bdd, "localhost", "admin", "", "gestion_employe");
        // récupération données dans BDD pour tableau des supp
        $resultat = mysqli_query($bdd, "SELECT DISTINCT sup FROM EMPLOYES WHERE sup IS NOT NULL;");
        $tableau_Sup = mysqli_fetch_all($resultat, MYSQLI_ASSOC);
        mysqli_free_result($resultat);
        mysqli_close($bdd);
        return $tableau_Sup;
    }
    ?>
    <a href="form_new_emp.php"><Button class="btn btn-primary">Ajouter</Button></a>
    <a class="btn btn-dark btn-sm" href="deconnexion.php"> Se déconnecter</a>
    <table class="table table-striped table-dark">
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Emploi</th>
            <th>Supérieur</th>
            <th>Service</th>
            <th>Détail</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
        <?php

        $tab_sup = tableau_Sup();
        // print_r($tab_sup);

        $tab_recherche = [];
        foreach ($tab_sup as $valeur) {
            $tab_recherche[] = $valeur["sup"];
        }
        // print_r($tab_recherche);

        $tab_General = affichage_Agenda();

        foreach ($tab_General as $value) {
            echo "<tr>";

            echo "<td>" . $value["nom"] . "</td>";
            echo "<td>" . $value["prenom"] . "</td>";
            echo "<td>" . $value["emploi"] . "</td>";
            echo "<td>" . $value["sup"] . "</td>";
            echo "<td>" . $value["noserv"] . "</td>";
            echo "<td><a href='detail.php?id=$value[noemp]'><button class='btn btn-info'>Detail</button></a></td>";
            echo "<td><a href='form_modifier.php?id=$value[noemp]'><button class='btn btn-warning'>Modifier</button></a></td>";


            if (
                in_array($value["noemp"], $tab_recherche)
            ) {
                echo "<td></td>";
            } else {
                echo "<td><a href='supprimer.php?id=$value[noemp]'><button class='btn btn-danger'>Supprimer</button></a></td>";
            }
            echo "</tr>";
        }



        // while (!feof($file)) {
        //     $ligne = fgets($file);
        //     $infos = explode(";", $ligne);
        //     echo "<tr>";
        //     echo "<td>$infos[0]</td>";
        //     echo "<td>$infos[1]</td>";
        //     echo "<td>$infos[2]</td>";
        //     echo "<td>$infos[3]</td>";
        //     echo "<td>$infos[4]</td>";
        //     echo "<td><a href='form_modif.php?id=$infos[0]'><button class='btn btn-warning'>Modifier</button></a></td>";
        //     echo "</tr>";
        // } 
        ?>
</body>

</html>