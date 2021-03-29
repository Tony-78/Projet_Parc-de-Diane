<?php
require "../Controllers/error404-controller.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <!-- Polices -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../Assets/css/style.css">
    <title>Erreur 404 - Parc de Diane</title>
</head>

<body>

    <header class="header">
        <nav class="navbar navbar-expand-lg d-flex">
            <a class="navbar-brand logo d-flex w-50 mr-auto" href="../index.php"><img src="../assets/img/pdd2.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
            </button>
            <div class="collapse navbar-collapse w-100" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0 nav_effect">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="shops.php">Commerces</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="activities.php">Activités</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="services.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="list_announces.php">Annonces</a>
                    </li>
                </ul>

                <?php
                if (isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "admin") {
                ?>
                    <div class="dropdown navbar-nav ml-auto" id="login_button">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-user mr-1"></i>
                            <?= $_SESSION["user"]["lastname"] . " " . $_SESSION["user"]["firstname"] ?>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="profile_admin.php">Tableau de board</a>
                            <form action="../index.php" method="post">
                                <button type="submit" name="SignOutButton" class="dropdown-item">Se déconnecter</button>
                            </form>
                        </div>
                    </div>
                <?php
                } else if (isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "user") {
                ?>
                    <div class="dropdown navbar-nav ml-auto" id="login_button">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-user mr-1"></i>
                            <?= $_SESSION["user"]["lastname"] . " " . $_SESSION["user"]["firstname"] ?>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="profile_user.php">Mon profil</a>
                            <form action="../index.php" method="post">
                                <button type="submit" name="SignOutButton" class="dropdown-item">Se déconnecter</button>
                            </form>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <div class="dropdown navbar-nav ml-auto" id="login_button">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Accès adhérent
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="login.php">Connexion</a>
                            <a class="dropdown-item" href="register.php">Inscription</a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </nav>
    </header>

    <div class="content">
        <div class="container-fluid my-5">
            <div class="text-center">
                <h1>Oups !</h1>
                <p class="mt-3">La page recherchée n'existe pas!</p>
                <a href="../index.php" class="btn btn-primary mt-5">Retourner à l'accueil</a>
            </div>
        </div>
    </div>


    <?php include "includes/footer.php"; ?>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="../Assets/js/script.js"></script>

</body>

</html>