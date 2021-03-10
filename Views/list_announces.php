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
    if (isset($_SESSION["deleteAnnounce"])) {
        if ($_SESSION["deleteAnnounce"] == "success") {
    ?>
            <div class="container">
                <div class="alert alert-success alert-dismissible fade show text-center mt-3" role="alert">
                    <p>L'annonce a bien été supprimée.</p>
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
                    <p>Il y a eu une erreur lors de la suppression de l'annonce.</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        <?php
            unset($_SESSION["deleteAnnounce"]);
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
        <div class="container-fluid">
            <a href="create_announce.php" class="btn btn-primary">Ajouter une annonce</a>
        
            <div class="row mb-3 justify-content-center">
                <div class="col-sm-10">
                    <div class="text-center">
                        <form action="list_announces.php" method="post">
                            <input type="text" placeholder="Rechercher une annonce" name="searchAnnounce">
                            <button type="submit" class="btn btn-success btn-sm mx-3 mb-1">Rechercher</button>
                            <a href="list_announces.php">
                                <button type="button" class="btn btn-secondary btn-sm mb-1">Réinitialiser</button>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row ng-scope">
                    <?php
                    if (!empty($allAnnouncesInformations)) {
                        $currentAnnounce = 1;
                        $countAnnounce = count($allAnnouncesInformations);
                        foreach ($allAnnouncesInformations as $announceValue) {
                            if ($currentAnnounce == 1) {
                                ?>
                                <div class="card-group w-100">
                                <?php
                            }
                    ?>
                            <div class="card mt-3 <?= $currentAnnounce == 2 ? "ml-2" : "" ?>">
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

                                            <?php 
                                            if (($_SESSION["user"]["role"]) == "admin") {
                                                ?>

                                                <button type="button" class="btn btn-danger btn-sm mb-1 ml-3" title="Supprimer" data-toggle="modal" data-target="#deleteAnnounceModal<?= $announceValue["announce_id"] ?>"><i class="far fa-trash-alt"></i></button>

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
                                                        <form action="list_announces.php?page=1" method="post" class="form">
                                                            <button type="submit" name="deleteAnnounce" class="btn btn-danger btn-sm" value="<?= $announceValue["announce_id"] ?>">Supprimer l'annonce</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>

                                            <?php
                                            }
                                            ?>
                                            

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
                        if (isset($totalPages)) {
                            ?>

            </div>
        </div>        
                <div class="mt-3 text-center">
                    <a class="btn btn-info btn-sm" href="list_announces.php?page=1"><<</a>
                    <a class="btn btn-info btn-sm" href="list_announces.php?page=<?= $actualPage > 1 ? $actualPage - 1 : 1 ?>"><</a>
    
                    <?php
                                for ($page = 1; $page <= $totalPages; $page++) {
                    ?>
                        <a class="btn btn-info btn-sm" href="list_announces.php?page=<?= $page ?>"><?= $page ?></a>
                    <?php
                                }
                    ?>
                    <a class="btn btn-info btn-sm" href="list_announces.php?page=<?= $actualPage < $totalPages ? $actualPage + 1 : $totalPages ?>">></a>
                    <a class="btn btn-info btn-sm" href="list_announces.php?page=<?= $totalPages ?>">>></a>
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