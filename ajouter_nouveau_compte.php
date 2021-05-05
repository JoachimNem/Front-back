<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mystyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Gestion personnel : se connecter</title>
</head>

<body>

    <?php

    $hash = password_hash($_POST['user_password'], PASSWORD_DEFAULT);
    $bdd = mysqli_init();
    mysqli_real_connect($bdd, "127.0.0.1", "admin", "", "gestion_employe");
    $rs = mysqli_query($bdd, "INSERT INTO utilisateur (id, email, status, hash) VALUES
    (NULL, " . "'" . $_POST['email'] . "', 'USER', '" . $hash .  "');");

    if ($rs) {
        header("location: form_connexion.php");
    } else {
        echo "<div class='insert_account'>
        <div><p>Erreur dans la création de votre compte.</p></div>
        <div><a class='btn btn-dark btn-sm' href='form_connexion.php'>Se connecter</a></div>
        </div>";
    }
    ?>

</body>

</html>