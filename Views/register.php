<?php
require "../Controllers/register-controller.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />
    <!-- Polices -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
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
                    <form class="form" action="register.php" method="post">
                        <h1 class="text-center text-info">Formulaire d'inscription</h1>
                        <div class="line-login mx-auto"></div>
                        <div class="form-user mt-5">
                            <label for="lastname">Nom :</label>
                            <input type="text" name="lastname" id="lastname" class="form-control background-login-input" placeholder="Votre nom" value="<?= isset($verifiedLastname) ? $verifiedLastname : "" ?>">
                            <span style="color:red;"><?= isset($arrayErrors["lastname"]) ? $arrayErrors["lastname"] : "" ?></span>
                        </div>
                        <div class="form-user mt-3">
                            <label for="firstname">Prénom :</label>
                            <input type="text" name="firstname" id="firstname" class="form-control background-login-input" placeholder="Votre prénom" value="<?= isset($verifiedFirstname) ? $verifiedFirstname : "" ?>">
                            <span style="color:red;"><?= isset($arrayErrors["firstname"]) ? $arrayErrors["firstname"] : "" ?></span>
                        </div>
                        <div class="form-user mt-3">
                            <label for="email">Adresse email :</label>
                            <input type="email" name="email" id="email" class="form-control background-login-input" placeholder="Votre adresse email" value="<?= isset($verifiedEmail) ? $verifiedEmail : "" ?>">
                            <span id="emailError"></span>
                            <span style="color:red;"><?= isset($arrayErrors["email"]) ? $arrayErrors["email"] : "" ?></span>
                        </div>
                        <div class="form-user mt-3">
                            <label for="phone">Numéro de téléphone :</label>
                            <input type="text" name="phone" id="phone" class="form-control background-login-input" placeholder="Votre numéro de téléphone" value="<?= isset($verifiedPhone) ? $verifiedPhone : "" ?>"
                                data-toggle="popover" data-trigger="focus" title="Numéro de téléphone"
                                data-content="Veuillez renseigner votre numéro de téléphone sous la forme 06XXXXXXXX (sans espace).">
                            <span style="color:red;"><?= isset($arrayErrors["phone"]) ? $arrayErrors["phone"] : "" ?></span>
                        </div>
                        <div class="form-user mt-3">
                            <label for="username">Identifiant :</label>
                            <input type="text" name="username" id="username" class="form-control background-login-input" placeholder="Votre identifiant reçu" value="<?= isset($verifiedUsername) ? $verifiedUsername : "" ?>"
                                data-toggle="popover" data-trigger="focus" title="Identifiant (6 caractères)"
                                data-content="Veuillez contacter le gardien pour récupérer votre identifiant.">
                            <span style="color:red;"><?= isset($arrayErrors["username"]) ? $arrayErrors["username"] : "" ?></span>
                        </div>
                        <div class="form-user mt-3">
                            <label for="password">Mot de passe :</label>
                            <input type="password" name="password" id="password" class="form-control background-login-input" placeholder="Votre mot de passe"
                                data-toggle="popover" data-trigger="focus" title="Mot de passe (entre 8 et 20 caractères)"
                                data-content="Veuillez renseigner votre mot de passe contenant au moins une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial.">
                            <input type="password" name="confirmPassword" id="password" class="form-control background-login-input mt-2" placeholder="Confirmer le mot de passe">
                            <span style="color:red;"><?= isset($arrayErrors["password"]) ? $arrayErrors["password"] : "" ?></span>
                        </div>
                        
                        <div class="mt-4 d-flex justify-content-between">
                            <input type="submit" name="addUser" class="btn btn-info btn-md addUser" value="Valider">
                            <a href="login.php" class="register">Déjà un compte ?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>






    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
    <script src="../Assets/js/script.js"></script>

</body>

</html>