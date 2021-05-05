<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="mystyle.css">
    <title>BDD personnel</title>
</head>

<body>
    <?php
    if (!isset($_SESSION['email'])) {
        header('Location: form_connexion.php');
    }
    ?>

    <?php
    //header('Location: tableau.php');


    if (preg_match("#[^\D]#", $_POST['sup']) && preg_match("#[^\D]#", $_POST['noserv'])) {
        Ajout_Employee($_POST['sup'], $_POST['noserv'], $_POST['nom'], $_POST['prenom'], $_POST['emploi'], $_POST['sal'], $_POST['comm']);
        echo "<p>Votre ajout a été correctement exécuté.</p>";
    } else {
        echo "<p>Vérifier saisie<p>";
        echo "<form action='ajouter.php' method='post'>
        <div class='form'>
            <legend>Entrez vos informations</legend>

            
            <div class= 'mb-3'>
                <label for='nom' class='form-label'>Nom :</label>
                <input type='text' class='form-control' id='nom' name='nom' value=" . $_POST['nom'] . ">
            </div>
            <div class= 'mb-3'>
                <label for='prenom' class='form-label'>Prenom :</label>
                <input type='text' class='form-control' id='prenom' name='prenom' value=" . $_POST['prenom'] . ">
            </div>
            <div class= 'mb-3'>
                <label for='emploi' class='form-label'>Emploi :</label>
                <input type='text' class='form-control' id='emploi' name='emploi' value=" . $_POST['emploi'] . ">
            </div>
            <div class='mb-3'>
                <label for='sup' class='form-label'>Numéro du supérieur :</label>
                <input type='text' class='form-control' id='sup' name='sup' value=" . $_POST['sup'] . ">
            </div>
            <div class='mb-3'>
                <label for='sal' class='form-label'>Salaire :</label>
                <input type='text' class='form-control' id='sal' name='sal' value=" . $_POST['sal'] . ">
            </div>
            <div class='mb-3'>
                <label for='comm' class='form-label'>Commission :</label>
                <input type='text' class='form-control' id='comm' name='comm' value=" . $_POST['comm'] . ">
            </div>
            <div class='mb-3'>
                <label for='noserv' class='form-label'>Numéro de votre service :</label>
                <input type='text' class='form-control' id='noserv' name='noserv' value=" . $_POST['noserv'] . ">
            </div>
            <div>
                </pan><button type='submit' class='btn btn-dark'>Envoyer</button>
            </div>
        </div>
    </form>";
    }


    function Ajout_Employee($sup, $noServ, $nom, $prenom, $emploi, $sal, $comm)
    {
        $bdd = mysqli_init();
        mysqli_real_connect($bdd, "localhost", "admin", "", "gestion_employe");
        $rs = mysqli_query($bdd, "INSERT INTO employes (noemp, nom, prenom, emploi, sup, embauche, sal, comm, noserv)
        SELECT MAX(noemp)+1, " . "'" . $nom . "', '" . $prenom . "', '" . $emploi . "', '" . $sup . "', '" . $sal . "', '" . $comm . "', '" . $noServ . "' " . " FROM employes;");
        mysqli_free_result($rs);
        mysqli_close($bdd);
    }

    ?>

    <div class=CTA>
        <a class="btn btn-dark btn-sm" href="tableau.php"> Revenir à la liste des employés</a>
    </div>


</body>

</html>