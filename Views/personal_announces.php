<?php
require "../Controllers/personal_announces-controller.php";
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
    <title>Mes annonces - Parc de Diane</title>
</head>

<body>

    <?php include "includes/navbar.php"; ?>

    <h3 class="text-center mt-5">Mes annonces</h3>
    <div class="white-divider mb-5"></div>
    <?php

    if (isset($_SESSION["deleteAnnounce"])) {
        if ($_SESSION["deleteAnnounce"] == "success") {
    ?>
            <div class="container">
                <div class="alert alert-success alert-dismissible fade show text-center mt-3" role="alert">
                    <p>Votre annonce a bien été supprimée.</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        <?php
            unset($_SESSION["deleteAnnounce"]);
        } else {
        ?>
            <div class="container">
                <div class="alert alert-danger alert-dismissible fade show text-center mt-3" role="alert">
                    <p>Il y a eu une erreur lors de la suppression de votre annonce.</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        <?php
            unset($_SESSION["deleteAnnounce"]);
        }
    }

    if (isset($_SESSION["updateAnnounceMessage"])) {
        if ($_SESSION["updateAnnounceMessage"] == "success") {
        ?>
            <div class="container">
                <div class="alert alert-success alert-dismissible fade show text-center mt-3" role="alert">
                    <p>Votre annonce a bien été modifiée.</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        <?php
            unset($_SESSION["updateAnnounceMessage"]);
        } else {
        ?>
            <div class="container">
                <div class="alert alert-danger alert-dismissible fade show text-center mt-3" role="alert">
                    <p>Il y a eu une erreur lors de la modification de votre annonce.</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
    <?php
            unset($_SESSION["updateAnnounceMessage"]);
        }
    }

    ?>

    <div class="container">
        <div class="row ng-scope">

            <?php
            if (!empty($allPersonalAnnounces)) {
                $currentAnnounce = 1;
                $countAnnounce = count($allPersonalAnnounces);
                foreach ($allPersonalAnnounces as $announceValue) {
                    if ($currentAnnounce == 1) {
            ?>
                        <div class="card-group w-100">
                        <?php
                    }
                        ?>
                        <div class="col-lg-6 mt-3 mb-5">
                            <div class="border shadow h-100">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <img class="boxPicture" src="../Assets/img/img-announces/<?= $announceValue["announce_picture"] !='NULL' ? $announceValue["announce_picture"] : "default.png" ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p class="value3 px-3 mb-0"><?= strftime("%d/%m/%Y", strtotime($announceValue["announce_update_date"])) ?></p>
                                        <p class="fs-mini text-muted px-3 mb-1">Contact : <?= $announceValue["user_tel"] ?></p>

                                        <form action="modify_announce.php" method="post">
                                            <button type="submit" class="btn btn-success btn-sm ml-3 mb-1" title="Modifier" name="modifyAnnounceAccess" value="<?= $announceValue["announce_id"] ?>"><i class="far fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger btn-sm mb-1" title="Supprimer" data-toggle="modal" data-target="#deleteAnnounceModal<?= $announceValue["announce_id"] ?>"><i class="far fa-trash-alt"></i></button>
                                        </form>

                                        <div class="modal fade" id="deleteAnnounceModal<?= $announceValue["announce_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Suppression d'une annonce</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Attention, cette action sera irréversible !
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="personal_announces.php" method="post" class="form">
                                                            <button type="submit" name="deleteAnnounce" class="btn btn-danger btn-sm" value="<?= $announceValue["announce_id"] ?>">Supprimer l'annonce</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <p class="fs-mini text-muted px-3"><?= $announceValue["announce_category_name"] ?></p>
                                        <h4 class="search-result-item-heading px-3"><?= $announceValue["announce_title"] ?></h4>
                                        <p class="description px-3 text-justify"><?= $announceValue["announce_description"] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        if ($currentAnnounce == 2) {
                        ?>
                        </div>
                <?php
                        }
                        $currentAnnounce = $currentAnnounce == 1 ? 2 : 1;
                    }
                } else {
                ?>
        </div>
        <div>
            <div>
                <p class="mt-5 text-center">Vous n'avez pas d'annonces.</p>
            </div>
        </div>
    <?php
                }
    ?>
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