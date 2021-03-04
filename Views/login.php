<?php
require "../Controllers/login-controller.php";
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
    <title>Parc de Diane</title>
</head>

<body>

    <!-- Header -->

    <?php include "includes/navbar.php"; ?>


    <div id="login">
        <h3 class="text-center mt-5">Espace résidents</h3>
        <div class="container mt-5">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6">
                    <form class="form" action="login.php" method="post">
                        <h1 class="text-center text-info">Connectez-vous</h1>
                        <div class="line-login mx-auto"></div>
                        <?php
                        if (isset($_SESSION["registerMessage"])) {
                            if ($_SESSION["registerMessage"] == "success") {
                        ?>
                                <div class="alert alert-success text-center my-5">
                                    <p>Votre inscription a bien été prise en compte. Vous pouvez dès à présent vous connecter.</p>
                                </div>
                            <?php
                                unset($_SESSION["registerMessage"]);
                            } else {
                            ?>
                                <div class="alert alert-danger text-center my-5">
                                    <p>Il y a eu une erreur lors de l'inscription.</p>
                                </div>
                            <?php
                                unset($_SESSION["registerMessage"]);
                            }
                        }

                        if (isset($_SESSION["connexionErrorMessage"])) {
                            if ($_SESSION["connexionErrorMessage"] == "error") {
                            ?>
                                <div class="alert alert-danger text-center my-5">
                                    <p>Vérifiez vos informations de connexion.</p>
                                </div>
                            <?php
                                unset($_SESSION["connexionErrorMessage"]);
                            }
                        }

                        if (isset($_SESSION["passwordMessage"])) {
                            if ($_SESSION["passwordMessage"] == "success") {
                            ?>
                                <div class="alert alert-success text-center my-5">
                                    <p>Votre mot de passe a bien été modifié.</p>
                                </div>
                        <?php
                                unset($_SESSION["passwordMessage"]);
                            }
                        }
                        ?>
                        <div class="form-user mt-5">
                            <label for="username">Identifiant :</label>
                            <input type="text" name="username" id="username" class="form-control background-login-input" placeholder="Votre identifiant">
                        </div>
                        <div class="form-password mt-3">
                            <label for="password">Mot de passe :</label>
                            <div class="login-eye">
                                <input type="password" name="password" id="password" class="form-control background-login-input" placeholder="Votre mot de passe">
                                <i class="fa fa-eye-slash" id="togglePassword"></i>
                            </div>
                        </div>
                        <div class="mt-5 d-flex justify-content-between">
                            <input type="submit" name="connectUser" class="btn btn-info btn-md" value="Connexion">
                            <a href="register.php" class="register">Inscription</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>







    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
    <script src="../Assets/js/script.js"></script>

</body>

</html>