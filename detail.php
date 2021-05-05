<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Detail d'une personne</title>
</head>

<body>
    <a href="tableau.php"><Button class="btn btn-primary">Revenir au tableau</Button></a>
    <table class="table table-striped table-dark">
        <tr>
            <th>Numéro d'employé</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Emploi</th>
            <th>Supérieur</th>
            <th>Embauche</th>
            <th>Salaire</th>
            <th>Commission</th>
            <th>Numéro de service</th>
            <th>Service</th>
            <th>Ville</th>
        </tr>

        <?php

        $data = details_AllById($_GET["id"]);
        // $id = $_GET["id"];

        foreach ($data as $value) {
            echo "<tr>";
            echo "<td>" . $value["noemp"] . "</td>";
            echo "<td>" . $value["nom"] . "</td>";
            echo "<td>" . $value["prenom"] . "</td>";
            echo "<td>" . $value["emploi"] . "</td>";
            echo "<td>" . $value["sup"] . "</td>";
            echo "<td>" . $value["embauche"] . "</td>";
            echo "<td>" . $value["sal"] . "</td>";
            echo "<td>" . $value["comm"] . "</td>";
            echo "<td>" . $value["noserv"] . "</td>";
            echo "<td>" . $value["service"] . "</td>";
            echo "<td>" . $value["ville"] . "</td>";


            echo "</tr>";
        }


        ?>
</body>

</html>
<?php
function details_AllById($id)
{
    $bdd = mysqli_init();
    mysqli_real_connect($bdd, "localhost", "admin", "", "gestion_employe");
    $a = "SELECT * from EMPLOYES as e inner join SERVICES as s on e.NoServ = s.NoServ where NoEmp =" . $id . ";";
    $result = mysqli_query($bdd, $a);
    $b = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($bdd);
    return $b;
}
?>