<?php
session_start();
require "../Models/Database.php";
require "../Models/Announces.php";

$Announces = new Announces();

// SUPPRESSION D'UNE ANNONCE

if (isset($_POST["deleteAnnounce"])){

    $regexIdAnnounce = "/^[0-9]+$/";

    if (preg_match($regexIdAnnounce, $_POST["deleteAnnounce"])) {
        $verifiedIdAnnounce = htmlspecialchars($_POST["deleteAnnounce"]);
        $Announces->deleteAnnounce($verifiedIdAnnounce);
        header("Location: personal_announces.php");
        $_SESSION["deleteAnnounce"] = "success";
        exit();
    } else {
        $_SESSION["deleteAnnounce"] = "error";
    }
}


// AFFICHAGE DES ANNONCES

if ($_SESSION["user"]) {

    $regexIdSession = "/^[0-9]+$/";

    if (preg_match($regexIdSession, $_SESSION["user"]["id"])) {
        $verifiedIdSession = htmlspecialchars($_SESSION["user"]["id"]);
        $allPersonalAnnounces = $Announces->getAllAnnouncesInformationsForOnePerson($verifiedIdSession);
    }
}
