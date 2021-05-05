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

    <div class="all_content">
        <div class="connexion">
            <form action="script_connexion.php" method="post">

                <div>
                    <input class="case" type="email" id="email" name="email" placeholder="email" autofocus required>
                </div>
                <div>
                    <input class="case" type="password" id="password" name="user_password" placeholder="Mot de passe" required>
                </div>
                <input class="button" type="submit">Se connecter</button>
            </form>

            <a href="form_nouveau_compte.php"><button class="button">Créer un compte</button></a>
        </div>
    </div>

</body>

</html>