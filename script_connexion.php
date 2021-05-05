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
    <title>Gestion personnel : connexion</title>
</head>

<body>
    <?php

    $tab = connexion($_POST['email']);



    for ($i = 0; $i < count($tab); $i++) {
        if (password_verify($_POST['user_password'], $tab[$i]['hash'])) {

            $_SESSION['email'] = $_POST['email'];

            header('Location: tableau.php');
        } else {
            echo "<div class='fail_connexion'>
                <div><p>Mot de passe invalide</p></div>
                <div><a class='btn btn-dark btn-sm' href='form_connexion.php'>Retour</a></div>
                </div>";
        }
    }

    function connexion($email)
    {
        $bdd = mysqli_init();
        mysqli_real_connect($bdd, "localhost", "admin", "", "gestion_employe");
        $result = mysqli_query($bdd, "SELECT hash, email, status FROM utilisateur WHERE email='$email';");
        $tab = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_close($bdd);
        return $tab;
    }

    ?>


</body>

</html>