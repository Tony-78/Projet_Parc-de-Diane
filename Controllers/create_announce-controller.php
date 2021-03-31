<?php
session_start();
require "../Models/Database.php";
require "../Models/Announces.php";

if (!isset($_SESSION["user"])) {
    header("Location: ../index.php");
}

$Actualdate = strftime("%Y/%m/%d %H:%M:%S", time());

// ADD ANNOUNCE

if (isset($_POST["addAnnounce"])) {

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


    $extensions = array(".png", ".jpeg", ".jpg", ".PNG", ".JPEG", ".JPG");
    $extensionsType = array("image/png", "image/jpeg");
    $maxSize = (1024 * 1024) * 8;
    $repertory = "../Assets/img/img-announces/";

    if (isset($_FILES["imgToUpload"]) && $_FILES["imgToUpload"]["error"] == 0) {
        // WE COLLECT THE FILE EXTENSION
        $extensionFile = strrchr($_FILES["imgToUpload"]["name"], ".");
        // WE COLLECT THE TYPE OF THE TEMPORARY FILE TO COMPARE IT BELOW WITH THE ARRAY ($extensionsType)
        $fileType = mime_content_type($_FILES["imgToUpload"]["tmp_name"]);
        if (in_array($extensionFile, $extensions) && in_array($fileType, $extensionsType)) {
            // WE COLLECT THE SIZE OF THE FILE
            $fileSize = $_FILES["imgToUpload"]["size"];
            // WE CHECK THE SIZE OF THE FILE WITH THE SIZE MAX ($maxSize)
            if ($fileSize <= $maxSize) {
                // WE RENAME THE FILE WITH AN UNIQUE ID AND WE ADD ITS EXTENSION
                $fileName = uniqid() . $extensionFile;
                // WE MOVE THE UPLOADED FILE (2 PARAMETERS)
                //      - THE NAME OF THE UPLOADED IMG
                //      - THE DESTINATION OF THE FILE AND THE NAME THAT WAS RENAMED PREVIOUSLY
                move_uploaded_file($_FILES["imgToUpload"]["tmp_name"], $repertory . $fileName);
            } else {
                $arrayErrors["imgToUpload"] = "<i>Votre fichier doit faire moins de 8 Mo, veuillez réessayer.</i>";
            }
        } else {
            $arrayErrors["imgToUpload"] = "<i>Le fichier n'est pas une image, veuillez réessayer.</i>";
        }
    }


    if (empty($arrayErrors)) {

        $Announces = new Announces();

        $arrayParameters = [
            "announceTitle" => $verifiedAnnounceTitle,
            "announceImgName" => $fileName !=NULL ? $fileName : 'NULL',
            "announceDescription" => $verifiedAnnounceDescription,
            "announceUpdateDate" => $Actualdate,
            "userId" => $_SESSION["user"]["id"],
            "announceCategory" => $verifiedAnnounceCategory
        ];


        if ($Announces->addAnnounce($arrayParameters)) {
            $_SESSION["announceMessage"] = "success";
            header("Location: ../Views/list_announces.php?page=1");
        } else {
            $_SESSION["announceMessage"] = "error";
        }
    }
}
