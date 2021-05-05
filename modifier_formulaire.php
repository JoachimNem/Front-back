<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Modifier une personne</title>
</head>

<body>
    <?php
    $id = $_GET["id"];
    $bdd = mysqli_init();
    mysqli_real_connect($bdd, "localhost", "admin", "", "gestion_employe");
    $result = mysqli_query($bdd, "SELECT * FROM EMP2 WHERE noemp=$id;");
    ?>
    <form action="modifier.php" method="POST">
        <input class="form-control" name="noemp" placeholder="Entrez le numéro d'employé" value="<?php echo $_POST["noemp"] ?>">
        <input type="text" class="form-control" name="nom" placeholder="Entrez le nom" value="<?php echo $_POST["nom"] ?>">
        <input type="text" class="form-control" name="prenom" placeholder="Entrez le prénom" value="<?php echo $_POST["prenom"] ?>">
        <input class="form-control" name="emploi" placeholder="Entrez l'emploi" value="<?php echo $_POST["emploi"] ?>">
        <input class="form-control" name="sup" placeholder="Entrez le supérieur" value="<?php echo $_POST["sup"] ?>">
        <input class="form-control" name="embauche" placeholder="Entrez la date d'embauche" value="<?php echo $_POST["embauche"] ?>">
        <input class="form-control" name="sal" placeholder="Entrez le salaire" value="<?php echo $_POST["sal"] ?>">
        <input class="form-control" name="comm" placeholder="Entrez la commission" value="<?php echo $_POST["comm"] ?>">
        <input class="form-control" name="noserv" placeholder="Entrez le numéro de service" value="<?php echo $_POST["noserv"] ?>">
        <input class="form-control" name="noproj" placeholder="Entrez le numéro de projet" value="<?php echo $_POST["noproj"] ?>">


        <input type="submit" class="btn btn-success" value="Soumettre">
        <?php
        mysqli_close($bdd);
        ?>

    </form>

</body>

</html>