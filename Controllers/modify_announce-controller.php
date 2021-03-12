<?php
session_start();
require "../Models/Database.php";
require "../Models/Announces.php";

$Announces = new Announces();

if (isset($_POST["modifyAnnounceAccess"])) {
    $_SESSION["ModifyIdAnnounceAccess"] = $_POST["modifyAnnounceAccess"];
}

if (isset($_POST["modifyAnnounceAccess"]) || isset($_SESSION["ModifyIdAnnounceAccess"])) {

    $regexIdAnnounce = "/^[0-9]+$/";
    $id = isset($_POST["modifyAnnounceAccess"]) ? $_POST["modifyAnnounceAccess"] : $_SESSION["ModifyIdAnnounceAccess"];

    if (preg_match($regexIdAnnounce, $id)) {
        $verifiedIdAnnounce = htmlspecialchars($id);

        $announceInfos = $Announces->getAnnounceInformationsByAnnounceId($verifiedIdAnnounce);
    }
} else {
    header("Location: personal_announces.php");
    $_SESSION["updateAnnounceMessage"] = "error";
}

$Actualdate = strftime("%Y/%m/%d %H:%M:%S", time());



// MODIFICATION DES INFOS DE L'ANNONCE

if (isset($_POST["modifyAnnounceButton"])) {

    $arrayErrors = [];

    if (isset($_POST["announceTitle"])) {
        $verifiedAnnounceTitle = htmlspecialchars($_POST["announceTitle"]);
        if (empty($_POST["announceTitle"])) {
            $arrayErrors["announceTitle"] = "<i>Veuillez renseigner le champ</i>";
        }
    }

    if (isset($_POST["announceCategory"])) {
        if ((($_POST["announceCategory"]) == "1") || ($_POST["announceCategory"] == "2") || ($_POST["announceCategory"] == "3") || ($_POST["announceCategory"] == "4") || ($_POST["announceCategory"] == "5")) {
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

    $regexIdAnnounce = "/^[0-9]+$/";

    if (preg_match($regexIdAnnounce, $_POST["modifyAnnounceButton"])) {
        $verifiedIdAnnounce = htmlspecialchars($_POST["modifyAnnounceButton"]);
    }



    $extensions = array(".png", ".jpeg", ".jpg");
    $extensionsType = array("image/png", "image/jpeg", "image/gif");
    $maxSize = (1024 * 1024) * 8;
    $repertory = "../Assets/img/img-announces/";
    $scanImg = scandir("../Assets/img/img-announces");



    // On vérifie qu'un fichier a bien été envoyé via le formulaire 'fileToUpload' et qu'il n'y a pas eu d'erreur pendant l'envoi
    if (isset($_FILES["imgToUpload"]) && $_FILES["imgToUpload"]["error"] == 0) {
        // On récupère l'extension du fichier
        $extensionFile = strrchr($_FILES["imgToUpload"]["name"], ".");
        // On récupère le type du fichier temporaire pour le comparer plus bas avec le tableau 'extensionsType'
        $fileType = mime_content_type($_FILES["imgToUpload"]["tmp_name"]);
        // On vérifie que l'extension de notre fichier match avec celles autorisées dans le tableau 'extensions'
        // Après &&, on vérifie le type match avec le tableau 'extensionsType'
        if (in_array($extensionFile, $extensions) && in_array($fileType, $extensionsType)) {

            // On récupère le poids du fichier
            $fileSize = $_FILES["imgToUpload"]["size"];
            // On compare le poids du fichier avec le max autorisé dans la variable 'maxSize'
            if ($fileSize <= $maxSize) {
                // On récupère l'extension pour l'upload
                // On renomme notre fichier avec un ID unique (un nom random) et on lui redonne son extension
                $fileName = uniqid() . $extensionFile;
                // On upload le fichier avec la fonction 'move_uploaded_file' qui comprend 2 paramètres : 
                // - Le nom du fichier temporaire
                // - La destination du fichier et le nom qui a été renommé précedemment
                if (move_uploaded_file($_FILES["imgToUpload"]["tmp_name"], $repertory . $fileName)) {
                    $scanImg = scandir("../Assets/img/img-announces");
                }
            } else {
                $arrayErrors["imgToUpload"] = "<i>Votre fichier doit faire moins de 8 Mo, veuillez réessayer.</i>";
            }
        } else {
            $arrayErrors["imgToUpload"] = "<i>Le fichier n'est pas une image, veuillez réessayer.</i>";
        }
    }


    if (empty($arrayErrors)) {

        $arrayParameters = [
            "announceTitle" => $verifiedAnnounceTitle,
            "announceImgName" => isset($fileName) ? $fileName : $_POST["actualImg"],
            "announceDescription" => $verifiedAnnounceDescription,
            "announceModifiedDate" => $Actualdate,
            "announceCategory" => $verifiedAnnounceCategory,
            "announceId" => $verifiedIdAnnounce
        ];

        if ($Announces->updateAnnounce($arrayParameters)) {
            unset($_SESSION["ModifyIdAnnounceAccess"]);
            header("Location: personal_announces.php");
            $_SESSION["updateAnnounceMessage"] = "success";
        } else {
            $_SESSION["updateAnnounceMessage"] = "error";
        }
    } else {
        $announceInfos = $Announces->getAnnounceInformationsByAnnounceId($verifiedIdAnnounce);
    }
}
