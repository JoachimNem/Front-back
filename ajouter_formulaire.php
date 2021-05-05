<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Ajouter une personne</title>
</head>

<body>
    <form action="ajouter.php" method="POST">
        <!-- <input class="form-control" name="noemp" placeholder="Entrez le numéro d'employé"> -->
        <input type="text" class="form-control" name="nom" placeholder="Entrez le nom">
        <input type="text" class="form-control" name="prenom" placeholder="Entrez le prénom">
        <input class="form-control" name="emploi" placeholder="Entrez l'emploi">
        <input class="form-control" name="sup" placeholder="Entrez le supérieur">
        <input class="form-control" name="embauche" placeholder="Entrez la date d'embauche">
        <input class="form-control" name="sal" placeholder="Entrez le salaire">
        <input class="form-control" name="comm" placeholder="Entrez la commission">
        <input class="form-control" name="noserv" placeholder="Entrez le numéro de service">
        <input class="form-control" name="noproj" placeholder="Entrez le numéro de projet">


        <input type="submit" class="btn btn-success" value="Soumettre">
    </form>

</body>

</html>