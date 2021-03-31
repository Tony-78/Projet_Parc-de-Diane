<?php
session_start();
require "../Models/Database.php";
require "../Models/Announces.php";

$Announces = new Announces();

$Actualdate = strftime("%Y/%m/%d %H:%M:%S", time());

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


// MODIFY ANNOUNCE

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
