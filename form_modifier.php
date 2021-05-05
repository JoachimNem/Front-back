<?php

$isThereError = false;
$messages = [];
// execute que lorsque je viens de tableau.php
if (isset($_GET["noemp"])) {
    /*  recherche des données depuis la BDD selon le noemp du GET
        init mysql, connexion, exuexution select from where noemep = $_GET["noemp"]
        $data = mysqli_fetch .....
    */
    $bdd = mysqli_init();
    mysqli_real_connect($bdd, "localhost", "admin", "", "gestion_employe");
    $result = mysqli_query($bdd, "SELECT FROM EMPLOYES WHERE noemep = " . $_GET["noemp"] . ";");
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
} else if (!empty($_POST)) {
    /*
        control de données (isset, empty, preg_match)
    */
    if (
        !isset($_POST["prenom"]) || empty($_POST["prenom"]) || !preg_match("#^[a-z -]$#i", $_POST["prenom"])
    ) {
        // affichage du messages d'erreur
        $isThereError = true;
        $messages[] = "Erreur de saisie dans le prénom";
    }

    if (
        !isset($_POST["noemp"]) || empty($_POST["noemp"]) || !preg_match("#^[0-9]{4}$#", $_POST["noemp"])
    ) {
        // affichage du messages d'erreur
        $isThereError = true;
        $messages[] = "Erreur de saisie dans le numéro d'employé";
    }
    if (
        !isset($_POST["nom"]) || empty($_POST["nom"]) || !preg_match("", $_POST["nom"])
    ) {
        // affichage du messages d'erreur
        $isThereError = true;
        $messages[] = "Erreur de saisie dans le nom";
    }
    if (
        !isset($_POST["emploi"]) || empty($_POST["emploi"]) || !preg_match("", $_POST["emploi"])
    ) {
        // affichage du messages d'erreur
        $isThereError = true;
        $messages[] = "Erreur de saisie dans l'emploi";
    }
    if (
        !isset($_POST["sup"]) || empty($_POST["sup"]) || !preg_match("", $_POST["sup"])
    ) {
        // affichage du messages d'erreur
        $isThereError = true;
        $messages[] = "Erreur de saisie dans le supérieur";
    }
    if (
        !isset($_POST["embauche"]) || empty($_POST["embauche"]) || !preg_match("", $_POST["embauche"])
    ) {
        // affichage du messages d'erreur
        $isThereError = true;
        $messages[] = "Erreur de saisie dans la date d'embauche";
    }
    if (
        !isset($_POST["sal"]) || empty($_POST["sal"]) || !preg_match("", $_POST["sal"])
    ) {
        // affichage du messages d'erreur
        $isThereError = true;
        $messages[] = "Erreur de saisie dans le salaire";
    }
    if (
        !isset($_POST["comm"]) || empty($_POST["comm"]) || !preg_match("", $_POST["comm"])
    ) {
        // affichage du messages d'erreur
        $isThereError = true;
        $messages[] = "Erreur de saisie dans la commission";
    }
    if (
        !isset($_POST["noserv"]) || empty($_POST["noserv"]) || !preg_match("", $_POST["noserv"])
    ) {
        // affichage du messages d'erreur
        $isThereError = true;
        $messages[] = "Erreur de saisie dans le numéro de service";
    }
}

if (!$isThereError) {
    /*
        mysqli connect, mysqli_query(..., "UPDATE/INSERT emp set prenom = '" . $_POST["prenom"]
            . "' WHERE noemp = $_POST["noemp"])
        header (... index.php..)
    */
    mysqli_real_connect($bdd, "localhost", "admin", "", "gestion_employe");
    $modifier = mysqli_query($bdd, "UPDATE EMPLOYES
    SET nom = '" . $_POST["nom"] . "' ,
    prenom ='" . $_POST["prenom"] . "' ,
    emploi = '" . $_POST["emploi"] . "' ,
    sup = '" . $_POST["sup"] . "',
    embauche = '" . $_POST["embauche"] . "' ,
    sal = '" . $_POST["sal"] . "' , 
    comm = '" . $_POST["comm"] . "' , 
    noserv = '" . $POST["noserv"] . "', 
    noproj = '" . $_POST["noproj"] . "'
    WHERE noemp = '" . $_POST["id"] . "';");
    mysqli_free_result($modifier);
    header("location:tableau.php");
}
if (isset($_GET["noemp"]) || $isThereError) {

    if ($isThereError) {
        foreach ($messages as $message) {
            echo $message;
        }
    }

?>
    <form action="" method="POST">
        <input type="hidden" name="noemp" value="<?php echo $isThereError ? $_POST["noemp"] : $data["noemp"]; ?>">
        Nom : <input name="noemp" value="<?php echo $isThereError ? $_POST["noemp"] : $data["noemp"]; ?>">
        Prénom : <input type="text" name="prenom" value="<?php echo $isThereError ? $_POST["prenom"] : $data["prenom"]; ?>">
        Emploi : <input name="emploi" value="<?php echo $isThereError ? $_POST["emploi"] : $data["emploi"]; ?>">
        Suppérieur : <input name="sup" value="<?php echo $isThereError ? $_POST["sup"] : $data["sup"]; ?>">
        Date embauche : <input name="embauche" value="<?php echo $isThereError ? $_POST["embauche"] : $data["embauche"]; ?>">
        Salaire : <input name="sal" value="<?php echo $isThereError ? $_POST["sal"] : $data["sal"]; ?>">
        Commission : <input name="com" value="<?php echo $isThereError ? $_POST["com"] : $data["com"]; ?>">
        Numéro de service : <input name="noserv" value="<?php echo $isThereError ? $_POST["noserv"] : $data["noserv"]; ?>">

        <input type="submit" value="Valider">
    </form>
<?php
}
?>