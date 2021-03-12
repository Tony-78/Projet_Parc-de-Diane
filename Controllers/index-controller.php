<?php
session_start();
if(isset($_POST["SignOutButton"])) {
    session_destroy();
    header("Location: ../index.php");
}