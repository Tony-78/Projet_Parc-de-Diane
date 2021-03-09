<?php
require "../Controllers/list_announces-controller.php";
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

    <?php include "includes/navbar.php"; ?>

    <h3 class="text-center mt-5">Annonces</h3>
    <div class="white-divider mb-5"></div>
    <?php
    if (isset($_SESSION["announceMessage"])) {
        if ($_SESSION["announceMessage"] == "success") {
    ?>
            <div class="container">
                <div class="alert alert-success alert-dismissible fade show text-center mt-3" role="alert">
                    <p>Votre annonce a bien été ajoutée.</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        <?php
            unset($_SESSION["announceMessage"]);
        } else {
        ?>
            <div class="container">
                <div class="alert alert-danger alert-dismissible fade show text-center mt-3" role="alert">
                    <p>Il y a eu une erreur lors de la création de l'annonce.</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
    <?php
            unset($_SESSION["announceMessage"]);
        }
    }
    ?>
    </div>
    <?php
    if (!isset($_SESSION["user"])) {
    ?>
        <div class="container">
            <div class="alert alert-danger text-center my-3">
                <p>CETTE SECTION EST RESERVEE AUX RESIDENTS DU PARC DE DIANE.</p>
            </div>
        </div>
    <?php
    } else {
    ?>
        <div class="container">
            <a href="create_announce.php" class="btn btn-primary">Ajouter une annonce</a>
        </div>

        <div class="container">
            <div class="row ng-scope">
                <div class="card-group">
                    <?php
                    if (!empty($allAnnounces)) {
                        foreach ($allAnnounces as $announceValue) {
                    ?>
                            <div class="col-lg-6 mt-3">
                                <div class="border shadow h-100">
                                    <div class="row ">
                                        <div class="col-sm-5">
                                            <img class="boxPicture" src="../Assets/img/img-announces/<?= !is_null($announceValue["announce_picture"]) ? $announceValue["announce_picture"] : "default.png" ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <p class="value3 px-3 mb-0"><?= strftime("%d/%m/%Y", strtotime($announceValue["announce_create_date"])) ?></p>
                                            <p class="fs-mini text-muted px-3 mb-1">Contact : <?= $announceValue["user_tel"] ?></p>
                                            <p class="fs-mini text-muted px-3"><?= $announceValue["announce_category_name"] ?></p>
                                            <h4 class="search-result-item-heading px-3"><?= $announceValue["announce_title"] ?></h4>
                                            <p class="description px-3 text-justify"><?= $announceValue["announce_description"] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    } else {
                        ?>
                </div>
            </div>
            <div>
                <div>
                    <p class="text-center mt-5">Il n'y a aucune annonce.</p>
                </div>
            </div>
        <?php
                    }
        ?>
        </div>

    <?php
    }
    ?>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
    <script src="../Assets/js/script.js"></script>

</body>

</html>