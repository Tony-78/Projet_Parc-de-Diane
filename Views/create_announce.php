<?php
require "../Controllers/create_announce-controller.php";
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


    <h3 class="text-center mt-5">Annonces</h3>
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <form class="form" enctype="multipart/form-data" action="create_announce.php" method="post">
                    <h1 class="text-center text-info">Publication d'une annonce</h1>
                    <div class="line-login mx-auto"></div>
                    <div class="form-user mt-5">
                        <label for="announceTitle">Titre de l'annonce :</label>
                        <input type="text" name="announceTitle" id="announceTitle" class="form-control background-login-input" placeholder="Titre de l'annonce" maxlength="50" value="<?= isset($verifiedAnnounceTitle) ? $verifiedAnnounceTitle : "" ?>">
                        <span style="color:red;"><?= isset($arrayErrors["announceTitle"]) ? $arrayErrors["announceTitle"] : "" ?></span>
                    </div>
                    <div class="form-user mt-3">
                        <label for="announceCategory">Catégorie de l'annonce :</label>
                        <select name="announceCategory" id="announceCategory">
                            <option value="Veuillez choisir" <?= isset($_POST["announceCategory"]) && ($_POST["announceCategory"] == "Veuillez choisir") ? "selected" : "" ?>>Veuillez choisir</option>
                            <option value="1" <?= isset($_POST["announceCategory"]) && ($_POST["announceCategory"] == "1") ? "selected" : "" ?>>Cours particuliers</option>
                            <option value="2" <?= isset($_POST["announceCategory"]) && ($_POST["announceCategory"] == "2") ? "selected" : "" ?>>Garde d'enfants</option>
                            <option value="3" <?= isset($_POST["announceCategory"]) && ($_POST["announceCategory"] == "3") ? "selected" : "" ?>>Mobilier</option>
                            <option value="4" <?= isset($_POST["announceCategory"]) && ($_POST["announceCategory"] == "4") ? "selected" : "" ?>>Multimédia</option>
                            <option value="5" <?= isset($_POST["announceCategory"]) && ($_POST["announceCategory"] == "5") ? "selected" : "" ?>>Autres</option>
                        </select>
                        <span style="color:red;"><?= isset($arrayErrors["announceCategory"]) ? $arrayErrors["announceCategory"] : "" ?></span>
                    </div>
                    <div class="form-user mt-3">
                        <label for="announceDescription">Description de l'annonce :</label>
                        <textarea id="announceDescription" name="announceDescription" rows="6" class="form-control background-login-input" maxlength="300" placeholder="Veuillez décrire votre annonce"><?= isset($verifiedAnnounceDescription) ? $verifiedAnnounceDescription : "" ?></textarea>
                        <span style="color:red;"><?= isset($arrayErrors["announceDescription"]) ? $arrayErrors["announceDescription"] : "" ?></span>
                    </div>

                    <div class="form-user mt-3">
                        <div>
                            <label for="imgToUpload">Choisir une image (optionnel) :</label>
                        </div>
                        <div>
                            <input class="textUpload" type="file" id="imgToUpload" name="imgToUpload">
                        </div>
                        <span style="color:red;"><?= isset($arrayErrors["imgToUpload"]) ? $arrayErrors["imgToUpload"]  : "" ?></span>
                    </div>

                    <div class="mt-4 d-flex justify-content-between">
                        <input type="submit" name="addAnnounce" class="btn btn-info btn-md addUser" value="Publier">
                        <a class="btn btn-secondary btn-md" href="create_announce.php">Réinitialiser</a>
                    </div>
                </form>
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