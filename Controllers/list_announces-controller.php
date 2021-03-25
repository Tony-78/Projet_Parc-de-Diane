<?php
session_start();
require "../Models/Database.php";
require "../Models/Announces.php";


$Announces = new Announces();


// PAGINATION / RESEARCH ANNOUNCE / ANNOUNCES DISPLAY

if (isset($_POST["searchAnnounce"])) {
    $search = htmlspecialchars($_POST["searchAnnounce"]);
    $querySearch =  $search . "%";
    $allAnnouncesInformations = $Announces->searchAnnounce($querySearch);
} else if (isset($_POST["searchAnnounceCategorySelect"])) {
    if ($_POST["searchAnnounceCategorySelect"] == "Cours particuliers" || $_POST["searchAnnounceCategorySelect"] == "Garde d'enfants" || $_POST["searchAnnounceCategorySelect"] == "Mobilier" || $_POST["searchAnnounceCategorySelect"] == "Multimédia" || $_POST["searchAnnounceCategorySelect"] == "Autres") {
        $categorySearch = htmlspecialchars($_POST["searchAnnounceCategorySelect"]);
        $allAnnouncesInformations = $Announces->searchAnnounceCategoryWithSelect($categorySearch);
    } else {
        $_SESSION["searchAnnounce"] = "error";
    }
    
} else {
    if (!isset($_GET["page"])) {
        header("Location: list_announces.php?page=1");
    } else {
        $regexPage = "/^[0-9]+$/";
        $actualPage = htmlspecialchars($_GET["page"]);

        if (preg_match($regexPage, $actualPage)) {
            $countAnnounces = $Announces->countAnnounces();
            $totalPages = ceil($countAnnounces["countAnnounces"] / 20);
            $startValue = ($actualPage - 1) * 20;
            $allAnnouncesInformations = $Announces->getAnnouncesPaginate($startValue);
        }
    }
}



// DELETE ANNOUNCE

if (isset($_POST["deleteAnnounce"])) {

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
