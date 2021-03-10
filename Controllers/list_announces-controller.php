<?php
session_start();
require "../Models/Database.php";
require "../Models/Announces.php";


$Announces = new Announces();



$countAnnounces = $Announces->countAnnounces();


if (isset($_POST["searchAnnounce"])) {
    $search = htmlspecialchars($_POST["searchAnnounce"]);
    $querySearch =  $search . "%";
    $allAnnouncesInformations = $Announces->searchAnnounce($querySearch);
} else {
    if(!isset($_GET["page"])) {
        header("Location: list_announces.php?page=1");
    } else {
        $regexPage = "/^[0-9]+$/";
        $actualPage = htmlspecialchars($_GET["page"]);
    
        if(preg_match($regexPage, $actualPage)) {
            $totalPages = ceil($countAnnounces["countAnnounces"] / 20);
            $startValue = ($actualPage - 1) * 20;
            $allAnnouncesInformations = $Announces->getAnnouncesPaginate($startValue);
        }
    }    
}




// SUPPRESSION D'UNE ANNONCE

if (isset($_POST["deleteAnnounce"])){

    $regexIdAnnounce = "/^[0-9]+$/";

    if (preg_match($regexIdAnnounce, $_POST["deleteAnnounce"])) {
        $verifiedIdAnnounce = htmlspecialchars($_POST["deleteAnnounce"]);
        $Announces->deleteAnnounce($verifiedIdAnnounce);
        header("Location: list_announces.php?page=1");
        $_SESSION["deleteAnnounce"] = "success";
        exit();
    } else {
        $_SESSION["deleteAnnounce"] = "error";
    }
}