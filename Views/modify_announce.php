<?php
require "../Controllers/modify_announce-controller.php";
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
                <form class="form" enctype="multipart/form-data" action="modify_announce.php" method="post">
                    <h1 class="text-center text-info">Modification d'une annonce</h1>
                    <div class="line-login mx-auto"></div>
                    <div class="form-user mt-5">
                        <label for="announceTitle">Titre de l'annonce :</label>
                        <input type="text" name="announceTitle" id="announceTitle" class="form-control background-login-input" placeholder="Titre de l'annonce" maxlength="50" value="<?= isset($announceInfos["announce_title"]) ? $announceInfos["announce_title"] : "" ?>">
                        <span style="color:red;"><?= isset($arrayErrors["announceTitle"]) ? $arrayErrors["announceTitle"] : "" ?></span>
                    </div>
                    <div class="form-user mt-3">
                        <label for="announceCategory">Catégorie de l'annonce :</label>
                        <select name="announceCategory" id="announceCategory">
                            <option value="Veuillez choisir" <?= isset($announceInfos["announce_category_name"]) && ($announceInfos["announce_category_name"] == "Veuillez choisir") ? "selected" : "" ?>>Veuillez choisir</option>
                            <option value="1" <?= isset($announceInfos["announce_category_name"]) && ($announceInfos["announce_category_name"] == "Cours particuliers") ? "selected" : "" ?>>Cours particuliers</option>
                            <option value="2" <?= isset($announceInfos["announce_category_name"]) && ($announceInfos["announce_category_name"] == "Garde d'enfants") ? "selected" : "" ?>>Garde d'enfants</option>
                            <option value="3" <?= isset($announceInfos["announce_category_name"]) && ($announceInfos["announce_category_name"] == "Mobilier") ? "selected" : "" ?>>Mobilier</option>
                            <option value="4" <?= isset($announceInfos["announce_category_name"]) && ($announceInfos["announce_category_name"] == "Multimédia") ? "selected" : "" ?>>Multimédia</option>
                            <option value="5" <?= isset($announceInfos["announce_category_name"]) && ($announceInfos["announce_category_name"] == "Autres") ? "selected" : "" ?>>Autres</option>
                        </select>
                        <span style="color:red;"><?= isset($arrayErrors["announceCategory"]) ? $arrayErrors["announceCategory"] : "" ?></span>
                    </div>
                    <div class="form-user mt-3">
                        <label for="announceDescription">Description de l'annonce :</label>
                        <textarea id="announceDescription" name="announceDescription" rows="6" class="form-control background-login-input" maxlength="300" placeholder="Veuillez décrire votre annonce"><?= isset($announceInfos["announce_description"]) ? $announceInfos["announce_description"] : "" ?></textarea>
                        <span style="color:red;"><?= isset($arrayErrors["announceDescription"]) ? $arrayErrors["announceDescription"] : "" ?></span>
                    </div>

                    <div class="form-user mt-3">

                        <div>
                            <label for="imgToUpload">Choisir une image (optionnel) :</label>
                        </div>
                        <div>
                            <input class="textUpload" type="file" id="imgToUpload" name="imgToUpload">
                            <p class="mt-1 format_size_img_upload"><i>Formats autorisés : .png / .jpeg / .jpg<br>
                                    Taille max de l'image : 8 Mo<i></p>
                        </div>

                        <span style="color:red;" class="mb-5"><?= isset($arrayErrors["imgToUpload"]) ? $arrayErrors["imgToUpload"]  : "" ?></span>
                        <img src="../Assets/img/img-announces/<?= isset($announceInfos["announce_picture"]) ? $announceInfos["announce_picture"] : "default.png" ?>" class="boxPicture"><input type="text" name="actualImg"  value="<?= $announceInfos["announce_picture"] ?> ">
                    </div>
                    

                    <div class="mt-4 d-flex justify-content-end">
                        <button type="submit" name="modifyAnnounceButton" class="btn btn-info btn-md addUser" value="<?= $verifiedIdAnnounce ?>">Valider les modifications</button>
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