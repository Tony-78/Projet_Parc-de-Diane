<?php
session_start();
require "../Models/Database.php";
require "../Models/Announces.php";


$Announces = new Announces();

$allAnnounces = $Announces->getAllAnnouncesInformations();

