<?php
session_start();
require "../Models/Database.php";
require "../Models/Users_status.php";

if (isset($_SESSION["user"])) {
    header("Location: ../index.php");
}

if (isset($_POST["connectUser"])) {

    // REGEX
    $regexUsername = "/^[1-9]{6}$/";
    $regexPassword = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?.!@$%^&*-]).{8,20}$/";

    // USERNAME CHECK
    if (isset($_POST["username"])) {
        if (preg_match($regexUsername, $_POST["username"])) {
            $verifiedUsername = htmlspecialchars($_POST["username"]);
        } else {
            $arrayErrors["username"] = "<i>Votre identifiant doit comporter 6 caractères</i>";
        }

        if (empty($_POST["username"])) {
            $arrayErrors["username"] = "<i>Veuillez remplir le champ</i>";
        }
    }


    // PASSWORD CHECK
    if (isset($_POST["password"])) {
        if (preg_match($regexPassword, $_POST["password"])) {
            $verifiedPassword = $_POST["password"];
        } else {
            $arrayErrors["password"] = "<i>Veuillez renseigner votre mot de passe</i>";
        }

        if (empty($_POST["password"])) {
            $arrayErrors["password"] = "<i>Veuillez remplir le champ</i>";
        }
    }


    if (isset($verifiedUsername)) {
        $UserStatus = new Users_status();
        $resultQuery = $UserStatus->verifyUserPresence($verifiedUsername);
    }


    // IF THE USER HAS ENTERED A USERNAME AND PASSWORD CORRESPONDING TO HIS ACCOUNT
    if (!empty($resultQuery) && isset($verifiedPassword)) {
        // WE VERIFY IF THE PASSWORD MATCHES A HASH
        if (password_verify($verifiedPassword, $resultQuery["user_password"])) {
            $user = [];
            $user["id"] = $resultQuery["user_id"];
            $user["firstname"] = $resultQuery["user_firstname"];
            $user["lastname"] = $resultQuery["user_lastname"];
            $user["username"] = $resultQuery["username_username"];
            $user["tel"] = $resultQuery["user_tel"];
            $user["mail"] = $resultQuery["user_mail"];
            $user["password"] = $resultQuery["user_password"];
            $user["role"] = $resultQuery["user_status_role"];
            $_SESSION["user"] = $user;
            header("Location: ../index.php");
        } else {
            $_SESSION["connexionErrorMessage"] = "error";
        }
    } else {
        $_SESSION["connexionErrorMessage"] = "error";
    }
}


