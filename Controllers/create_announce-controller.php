<?php
session_start();

if (isset($_POST["addAnnounce"])) {
    
    $arrayErrors = [];

    
    if (isset($_POST["announceTitle"])) {
        $verifiedAnnounceTitle = htmlspecialchars($_POST["announceTitle"]);
        if (empty($_POST["announceTitle"])) {
            $arrayErrors["announceTitle"] = "<i>Veuillez renseigner le champ</i>";
        }
    }

    if (isset($_POST["announceCategory"])) {
        if ((($_POST["announceCategory"]) == "Cours particuliers") || ($_POST["announceCategory"] == "Garde d'enfants") || ($_POST["announceCategory"] == "Mobilier") || ($_POST["announceCategory"] == "Multimédia") || ($_POST["announceCategory"] == "Autres")) {
            $verifiedAnnounceCategory = htmlspecialchars($_POST["announceCategory"]);
        } else {
            $arrayErrors["announceCategory"] = "<i>Erreur, veuillez sélectionner une catégorie</i>";
        }

        if ($_POST["announceCategory"] == "Veuillez choisir") {
            $arrayErrors["announceCategory"] = "<i>Veuillez faire un choix</i>";
        }
    }

    if (isset($_POST["announceDescription"])) {
        $verifiedAnnounceDescription = htmlspecialchars($_POST["announceDescription"]);
        if (empty($_POST["announceDescription"])) {
            $arrayErrors["announceDescription"] = "<i>Veuillez renseigner le champ</i>";
        }
    }


    if (empty($arrayErrors)) {
        echo "c'est bon";
    }
}

