<?php
session_start();
require "../Models/Database.php";
require "../Models/Users.php";
require "../Models/Usernames.php";

if (isset($_POST["addUser"])) {
   
    $regexName = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð '-]+$/";
    $regexPhone = "/^([0]{1})([1-9]{1})([0-9]{2}){4}$/";
    $regexUsername = "/^[1-9]{6}$/";
    $regexPassword = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?.!@$%^&*-]).{8,20}$/";
    // $regexPassword = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})$/";
    
    $arrayErrors = [];

    $Usernames = new Usernames();


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

    if (isset($_POST["username"])) {
        if (preg_match($regexUsername, $_POST["username"])) {
            // Méthode permettant de savoir si un username est présent en BDD, si true alors le username est présent
            if ($Usernames->verifyUserPresenceForRegister($_POST["username"])) {
                $id = $Usernames->searchUsernameId($_POST["username"]);
                // var_dump($id);
                // var_dump($Usernames->test((int)$id["username_id"]));
                if ($Usernames->verifyUsernameIdPresenceForRegister($id["username_id"])) {
                    $arrayErrors["username"] = "<i>Identifiant déjà utilisé</i>";
                } else {
                    $verifiedUsername = htmlspecialchars($_POST["username"]);
                }
            } else {
                $arrayErrors["username"] = "<i>Veuillez entrer un identifiant valide</i>";
            }
        } else {
            $arrayErrors["username"] = "<i>Erreur, veuillez entrer votre identifiant donné par le gardien</i>";
        }

        if (empty($_POST["username"])) {
            $arrayErrors["username"] = "<i>Veuillez renseigner votre identifiant donné par le gardien</i>";
        }
    }

    if ($_POST["password"] === $_POST["confirmPassword"]) {
        if(preg_match($regexPassword, $_POST["password"])) {
            $verifiedPassword = password_hash($_POST["password"], PASSWORD_BCRYPT);
        } else {
            $arrayErrors["password"] = "<i>Veuillez renseigner un mot de passe valide</i>";
        }
    } else {
        $arrayErrors["password"] = "<i>Les 2 mots de passes ne sont pas identiques.</i>";
    }


    if (empty($arrayErrors)) {

        $Users = new Users();

        $idUsername = $Usernames->searchUsernameId($verifiedUsername);

        $arrayParameters = [
            "lastname" => $verifiedLastname,
            "firstname" => $verifiedFirstname,
            "mail" => $verifiedEmail,
            "phone" => $verifiedPhone,
            "username" => $verifiedUsername,
            "password" => $verifiedPassword,
            "idUsername" => $idUsername["username_id"]
        ];
        
        // On exécute la méthode addPatient pour envoyer les valeurs en BDD
        if ($Users->addUser($arrayParameters)) {
            $_SESSION["registerMessage"] = "success";
            header("Location: ../Views/login.php");
        } else {
            $_SESSION["registerMessage"] = "error";
        }
    }
}

if (isset($_SESSION["user"])) {
    header("Location: ../index.php");
}

