<?php
session_start();
require "../Models/Database.php";
require "../Models/Users.php";
require "../Models/Usernames.php";

if (isset($_POST["SignOutButton"])) {
    session_destroy();
    header("Location: ../index.php");
}

if (!isset($_SESSION["user"])) {
    header("Location: ../index.php");
}

$Users = new Users();
$Usernames = new Usernames();



// SUPPRESSION DU COMPTE USER

if (isset($_POST["deleteAccount"]) && !empty($_POST["deleteAccount"])) {
  
    $regexId = "/^[0-9]+$/";

    if (preg_match($regexId, $_POST["deleteAccount"])) {
        $verifiedId = htmlspecialchars($_POST["deleteAccount"]);
        $Users->deleteUser($verifiedId);
        header("Location: list_users.php?page=1");
        $_SESSION["deleteUser"] = "success";
        exit();
    } else {
        $_SESSION["deleteUser"] = "error";
    }
}


// PAGINATION / RECHERCHE UTILISATEUR / AFFICHAGE DES UTILISATEURS

$countUsers = $Users->countUsers();

if (isset($_POST["searchUser"])) {
    $search = htmlspecialchars($_POST["searchUser"]);
    $querySearch =  $search . "%";
    $allUsersInformations = $Users->searchUser($querySearch);
} else {
    if(!isset($_GET["page"])) {
        header("Location: list_users.php?page=1");
    } else {
        $regexPage = "/^[0-9]+$/";
        $actualPage = htmlspecialchars($_GET["page"]);
    
        if(preg_match($regexPage, $actualPage)) {
            $totalPages = ceil($countUsers["countUsers"] / 10);
            $startValue = ($actualPage - 1) * 10;
            $allUsersInformations = $Users->getUsersPaginate($startValue);
        }
    }    
}