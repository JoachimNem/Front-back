
<?php
if (isset($_POST["id"]) && isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["emploi"]) && isset($_POST["sup"]) && isset($_POST["embauche"]) && isset($_POST["sal"]) && isset($_POST["comm"]) && isset($_POST["noserv"]) && isset($_POST["noproj"])) {

    $bdd = mysqli_init();
    mysqli_real_connect($bdd, "localhost", "admin", "", "gestion_employe");

    $modifier = mysqli_query($bdd, "UPDATE EMP2
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

    header("location:tableau.php");
}
?>