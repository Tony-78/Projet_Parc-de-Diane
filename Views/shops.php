<?php
require "../Controllers/shops-controller.php";
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


    <section id="shops">
        <div class="container-fluid wallpaper-shops"></div>
        <div class="container-fluid">
            <div class="row justify-content-center my-5">
                <h4>Les résidents ont la chance de disposer de quelques commerces au sein du Parc de Diane</h4>
            </div>
            <div class="row shops-height">
                <div class="col-md-6 text-description order-2 order-md-1">
                    <div class="mt-5 mx-5 margin-content">
                        <h2>Petit Casino</h2>
                        <div class="line"></div>
                        <p><span class="font-weight-bold">Numéro de téléphone</span> : 01 39 56 28 00</p>
                        <p><span class="font-weight-bold">Horaires</span> :</p>
                        <div class="row">
                            <div class="text-right col-4 col-lg-2">
                                <p> Lundi :<br>
                                    Mardi : <br>
                                    Mercredi : <br>
                                    Jeudi : <br>
                                    Vendredi : <br>
                                    Samedi : <br>
                                    Dimanche : </p>
                            </div>
                            <div class="col-8 col-lg-3">
                                <p>
                                    8h30 - 13h et 15h30 - 20h<br>
                                    8h30 - 13h et 15h30 - 20h<br>
                                    8h30 - 13h et 15h30 - 20h<br>
                                    8h30 - 13h et 15h30 - 20h<br>
                                    8h30 - 13h et 15h30 - 20h<br>
                                    8h30 - 13h et 15h30 - 20h<br>
                                    9h - 12h30<br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 casino-img img-col-height order-1 order-md-2">

                </div>
            </div>
            <div class="row shops-height">
                <div class="col-md-6 boulangerie-img img-col-height">

                </div>
                <div class="col-md-6 text-description">
                    <div class="mt-5 mx-5 margin-content">
                        <h2>Maison Cros</h2>
                        <div class="line"></div>
                        <p><span class="font-weight-bold">Numéro de téléphone</span> : 01 39 50 25 29</p>
                        <p><span class="font-weight-bold">Horaires</span> :</p>
                        <div class="row">
                            <div class="text-right col-4 col-lg-2">
                                <p> Lundi :<br>
                                    Mardi : <br>
                                    Mercredi : <br>
                                    Jeudi : <br>
                                    Vendredi : <br>
                                    Samedi : <br>
                                    Dimanche : </p>
                            </div>
                            <div class="col-8 col-lg-3">
                                <p>
                                    8h30 - 13h et 15h30 - 20h<br>
                                    8h30 - 13h et 15h30 - 20h<br>
                                    8h30 - 13h et 15h30 - 20h<br>
                                    8h30 - 13h et 15h30 - 20h<br>
                                    8h30 - 13h et 15h30 - 20h<br>
                                    8h30 - 13h et 15h30 - 20h<br>
                                    9h - 12h30<br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row shops-height">
                <div class="col-md-6 text-description order-2 order-md-1">
                    <div class="mt-5 mx-5 margin-content">
                        <h2>Pharmacie Li</h2>
                        <div class="line"></div>
                        <p><span class="font-weight-bold">Numéro de téléphone</span> : 01 39 56 22 62</p>
                        <p><span class="font-weight-bold">Horaires</span> :</p>
                        <div class="row">
                            <div class="text-right col-4 col-lg-2">
                                <p> Lundi :<br>
                                    Mardi : <br>
                                    Mercredi : <br>
                                    Jeudi : <br>
                                    Vendredi : <br>
                                    Samedi : <br>
                                    Dimanche : </p>
                            </div>
                            <div class="col-8 col-lg-3">
                                <p>
                                    9h - 12h30 et 14h30 - 20h<br>
                                    9h - 12h30 et 14h30 - 20h<br>
                                    9h - 12h30 et 14h30 - 20h<br>
                                    9h - 12h30 et 14h30 - 20h<br>
                                    9h - 12h30 et 14h30 - 20h<br>
                                    9h - 12h30 et 14h30 - 19h30<br>
                                    Fermé<br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pharmacie-img img-col-height order-1 order-md-2">

                </div>
            </div>
            <div class="row shops-height">
                <div class="col-md-6 coiffeur-img img-col-height">

                </div>
                <div class="col-md-6 text-description">
                    <div class="mt-5 mx-5 margin-content">
                        <h2>Salon du Parc</h2>
                        <div class="line"></div>
                        <p><span class="font-weight-bold">Numéro de téléphone</span> : 01 39 56 50 45</p>
                        <p><span class="font-weight-bold">Horaires</span> :</p>
                        <div class="row">
                            <div class="text-right col-4 col-lg-2">
                                <p> Lundi :<br>
                                    Mardi : <br>
                                    Mercredi : <br>
                                    Jeudi : <br>
                                    Vendredi : <br>
                                    Samedi : <br>
                                    Dimanche : </p>
                            </div>
                            <div class="col-8 col-lg-3">
                                <p>
                                    9h - 12h30 et 13h - 19h<br>
                                    9h - 12h30 et 13h - 19h<br>
                                    9h - 12h30 et 13h - 19h<br>
                                    9h - 12h30 et 13h - 19h<br>
                                    9h - 12h30 et 13h - 19h<br>
                                    9h - 12h30 et 13h - 18h<br>
                                    Fermé<br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row shops-height">
                <div class="col-md-6 text-description order-2 order-md-1">
                    <div class="mt-5 mx-5 margin-content">
                        <h2>Lav'story</h2>
                        <div class="line"></div>
                        <p><span class="font-weight-bold">Numéro de téléphone</span> : 09 83 05 62 44</p>
                        <p><span class="font-weight-bold">Horaires</span> :</p>
                        <div class="row">
                            <div class="text-right col-4 col-lg-2">
                                <p> Lundi :<br>
                                    Mardi : <br>
                                    Mercredi : <br>
                                    Jeudi : <br>
                                    Vendredi : <br>
                                    Samedi : <br>
                                    Dimanche : </p>
                            </div>
                            <div class="col-8 col-lg-3">
                                <p>
                                    Fermé<br>
                                    10h - 19h<br>
                                    10h - 19h<br>
                                    10h - 19h<br>
                                    10h - 19h<br>
                                    10h - 19h<br>
                                    9h - 12h<br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 laverie-img img-col-height order-1 order-md-2">

                </div>
            </div>
        </div>
    </section>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
    <script src="../Assets/js/script.js"></script>

</body>

</html>