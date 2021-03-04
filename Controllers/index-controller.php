<?php
session_start();
if(isset($_POST["SignOutButton"])) {
    unset($_SESSION["user"]);
    session_destroy();
    header("Location: ../index.php");
}