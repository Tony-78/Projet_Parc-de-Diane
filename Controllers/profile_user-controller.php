<?php
session_start();
require "../Models/Database.php";
require "../Models/Users.php";
require "../Models/Usernames.php";

if (!isset($_SESSION["user"])) {
    header("Location: ../index.php");
}

// OBJECTS CREATION
$Users = new Users();
$Usernames = new Usernames();


$verifiedUsername = $_SESSION["user"]["username"];
// WE COLLECT THE USERNAME_ID OF THE USER
$idUsername = $Usernames->searchUsernameId($verifiedUsername);



// MODIFY INFORMATIONS OF THE USER ACCOUNT

if (isset($_POST["modifyInfosButton"])) {

    // REGEX
    $regexName = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð '-]+$/";
    $regexPhone = "/^([0]{1})([1-9]{1})([0-9]{2}){4}$/";

    $arrayErrors = [];

    // LASTNAME CHECK
    if (isset($_POST["lastname"])) {
        if (preg_match($regexName, $_POST["lastname"])) {
            $verifiedLastname = htmlspecialchars($_POST["lastname"]);
        } else {
            $arrayErrors["lastname"] = "<i>Erreur, veuillez entrer votre nom</i>";
        }

        if (empty($_POST["lastname"])) {
            $arrayErrors["lastname"] = "<i>Veuillez renseigner le champ</i>";
        }
    }

    // FIRSTNAME CHECK
    if (isset($_POST["firstname"])) {
        if (preg_match($regexName, $_POST["firstname"])) {
            $verifiedFirstname = htmlspecialchars($_POST["firstname"]);
        } else {
            $arrayErrors["firstname"] = "<i>Erreur, veuillez entrer votre prénom</i>";
        }

        if (empty($_POST["firstname"])) {
            $arrayErrors["firstname"] = "<i>Veuillez renseigner le champ</i>";
        }
    }

    // EMAIL CHECK
    if (isset($_POST["email"])) {
        if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $verifiedEmail = htmlspecialchars($_POST["email"]);
        } else {
            $arrayErrors["email"] = "<i>Erreur, veuillez entrer votre email</i>";
        }

        if (empty($_POST["email"])) {
            $arrayErrors["email"] = "<i>Veuillez renseigner le champ</i>";
        }
    }

    // PHONE CHECK
    if (isset($_POST["phone"])) {
        if (preg_match($regexPhone, $_POST["phone"])) {
            $verifiedPhone = htmlspecialchars($_POST["phone"]);
        } else {
            $arrayErrors["phone"] = "<i>Erreur, veuillez entrer un numéro de téléphone valide</i>";
        }

        if (empty($_POST["phone"])) {
            $arrayErrors["phone"] = "<i>Veuillez renseigner le champ</i>";
        }
    }


    if (empty($arrayErrors)) {

        $arrayParameters = [
            "lastname" => $verifiedLastname,
            "firstname" => $verifiedFirstname,
            "mail" => $verifiedEmail,
            "phone" => $verifiedPhone,
            "id_username" => $idUsername["username_id"]
        ];

        if ($Users->updateUser($arrayParameters)) {

            // HYDRATATION
            $_SESSION["user"]["lastname"] = $Users->getUser_lastname();
            $_SESSION["user"]["firstname"] = $Users->getUser_firstname();
            $_SESSION["user"]["mail"] = $Users->getUser_mail();
            $_SESSION["user"]["tel"] = $Users->getUser_phone();

            $_SESSION["updateInfoMessage"] = "success";
        } else {
            $_SESSION["updateInfoMessage"] = "error";
        }
    }
}



// DELETE USER ACCOUNT

if (isset($_POST["deleteAccount"])) {
    $Users->deleteUser($idUsername["username_id"]);
    session_destroy();
    header("Location: ../index.php");
}


// PASSWORD CHANGEMENT OF THE USER ACCOUNT

if (isset($_POST["modifyPasswordButton"])) {

    $regexPassword = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?.!@$%^&*-]).{8,20}$/";

    if (((password_verify($_POST["actualPassword"], $_SESSION["user"]["password"]))) && (($_POST["newPassword"]) == ($_POST["newPasswordVerif"]))) {
        if (preg_match($regexPassword, $_POST["newPassword"])) {
            $verifiedNewPassword = password_hash($_POST["newPassword"], PASSWORD_BCRYPT);

            $arrayParameters = [
                "password" => $verifiedNewPassword,
                "id_username" => $idUsername["username_id"]
            ];

            $Users->updatePassword($arrayParameters);

            unset($_SESSION["user"]);
            header("Location: ../Views/login.php");

            $_SESSION["passwordMessage"] = "success";
        } else {
            $_SESSION["passwordMessage"] = "error";
        }
    } else {
        $_SESSION["passwordMessage"] = "error";
    }
}
