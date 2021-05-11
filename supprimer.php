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
    } else {
        supprimer_Mysqli($_GET['id']);
        header('tableau.php');
    }


    // $id = $_GET["id"];

    function supprimer_Mysqli($id)
    {
        $bdd = mysqli_init();
        mysqli_real_connect($bdd, "localhost", "admin", "", "gestion_employe");
        mysqli_query($bdd, "DELETE FROM EMPLOYES WHERE noemp= $id;");
        mysqli_close($bdd);
    }
