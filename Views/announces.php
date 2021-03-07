<?php
require "../Controllers/announces-controller.php";
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
                    <div class="col-lg-6">
                        <div class="border shadow h-100">
                            <div class="row ">
                                <div class="col-sm-5">
                                    <img class="image boxPicture" src="../Assets/img/tennis.jpg">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9">
                                    <p class="value3 px-2 mb-0">06 mars 2021</p>
                                    <h4 class="search-result-item-heading px-2">Donne cours de français</h4>
                                    <p class="description px-2"> Not just usual Metro. But something bigger</p>
                                </div>
                                <div class="col-sm-3 text-align-center">

                                    <p class="fs-mini text-muted">Contact : <br>0504030201</p>


                                    <p class="fs-mini text-muted">N° résident : <br>999999</p>


                                    <button type="button" class="btn btn-danger mb-5"><i class="far fa-trash-alt"></i></button>
                                    <button type="button" class="btn btn-danger mb-5"><i class="far fa-trash-alt"></i></button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="border shadow h-100">
                            <div class="row ">
                                <div class="col-sm-5">
                                    <img class="image boxPicture" src="../Assets/img/tennis.jpg">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9">
                                    <p class="value3 px-2 mb-0">06 mars 2021</p>
                                    <h4 class="search-result-item-heading px-2"> Donnrs de français Donne cours de français français frança</h4>
                                    <p class="description px-2 text-justify">Not just usual Metro. But something bigger. Not just usual widgets, but real widgets. Not just yet another admin template, but next generation admin template.Not just usual widgets, but real widgets. Not just yet another admin template, but next generation admin template.tion admin template. tion admin template. tion admin template. tion admin temp on admin template. tion admin temp on admin template. tion adm</p>
                                </div>
                                <div class="col-sm-3 text-align-center">

                                    <p class="fs-mini text-muted">Contact : <br>0504030201</p>


                                    <p class="fs-mini text-muted">N° résident : <br>999999</p>


                                    <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                    <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="border shadow h-100">
                            <div class="row ">
                                <div class="col-sm-5">
                                    <img class="image boxPicture" src="../Assets/img/tennis.jpg">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9">
                                    <p class="value3 px-2 mb-0">06 mars 2021</p>
                                    <h4 class="search-result-item-heading px-2"> Donne cours de français Donne cours de français Donne cours de français</h4>
                                    <p class="description px-2">Not just usual Metro. But something bigger. Not just usual widgets, but real widgets. Not just yet another admin template, but next generation admin template.Not just usual widgets, but real widgets. Not just yet another admin template, but next generation admin template.</p>
                                </div>
                                <div class="col-sm-3 text-align-center">

                                    <p class="fs-mini text-muted">Contact : <br>0504030201</p>


                                    <p class="fs-mini text-muted">N° résident : <br>999999</p>


                                    <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                    <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="border shadow h-100">
                            <div class="row ">
                                <div class="col-sm-5">
                                    <img class="image boxPicture" src="../Assets/img/tennis.jpg">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9">
                                    <p class="value3 px-2 mb-0">06 mars 2021</p>
                                    <h4 class="search-result-item-heading px-2"> Donneçais Donne cours de français Donne cours de français</h4>
                                    <p class="description px-2">Not just usual Metro. But something bigger. Not just usual widgets, but real widgets. Not just yet another admin template, but next generation admin template.Not just usual widgets, but real widgets. Not just yet another admin template, but next generation admin template.</p>
                                </div>
                                <div class="col-sm-3 text-align-center">

                                    <p class="fs-mini text-muted">Contact : <br>0504030201</p>


                                    <p class="fs-mini text-muted">N° résident : <br>999999</p>


                                    <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                    <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>


        <!-- <div class="col-lg-4 col-md-6 col-sm-12 mt-5">
                            <div class="card h-100">
                                <img src="<?= $profil["picture"] ?>" class="test" alt="...">
                                <div class="card-body">
                                    <h1 class="card-title text-center h4"><?= $profil["lastName"] . " " . $profil["firstName"] ?></h1>
                                    <div class="card-text h5">
                                        <p class="my-3"><span class="font-weight-bold">Age</span> : <?= $profil["age"] ?></p>
                                        <p class="my-3"><span class="font-weight-bold">Code Postal</span> : <?= $profil["postalCode"] ?></p>
                                        <p class="my-3"><span class="font-weight-bold">Description</span> :</p>
                                        <p class=""><?= $profil["description"] ?></p>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <small class="text-muted"><i class="far fa-heart fa-2x heartIcon"></i></small>
                                </div>
                            </div>
                        </div> -->

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