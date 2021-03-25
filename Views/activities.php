<?php
require "../Controllers/activities-controller.php";
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


    <section id="activity">
    <div class="container-fluid wallpaper-activities"></div>
        <div class="container-fluid">
            <div class="row justify-content-center my-5">
                <h4>La résidence du Parc de Diane offre de mutiples activités sportives.</h4>
            </div>
            <div class="row activities-height">
                <div class="col-md-6 text-description order-2 order-md-1">
                    <div class="mx-5 my-5 margin-content">
                        <h2>Tennis</h2>
                        <div class="line"></div>
                        <p>Les 2 courts de tennis sont situés au centre de la résidence. Ils sont réservés au jeu de tennis à l’exclusion de toute autre activité. Les joueurs doivent porter une tenue de tennis correcte et pratiquer leur sport dans le respect des autres joueurs et du voisinage.<br><br>
                            Un système de réservation à accès direct est prévu à cet effet sur le tableau d’affichage près des courts : vous réservez votre jour et créneau horaire avec un badge à clé. L’entrée sur le court de tennis se fait au moyen d’un badge simple.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 tennis-img img-col-height order-1 order-md-2">

                </div>
            </div>

            <div class="row activities-height">
                <div class="col-md-6 piscine-img img-col-height">

                </div>

                <div class="col-md-6 text-description">
                    <div class="mt-5 mx-5 margin-content">
                        <h2>Piscine</h2>
                        <div class="line"></div>
                        <p>La résidence dispose d’une belle piscine de 25m x 10 m ainsi et d’une pataugeoire. Des vestiaires et des douches sont également à la disposition des résidents.<br><br>
                            L’accès à la piscine est régi par un règlement spécifique, actualisé chaque année par le conseil syndical en fonction de l’évolution de la réglementation, fixant les horaires et jours d’ouverture, les conditions d’accès aux installations (par carte badge). Ce règlement est diffusé chaque année aux résidents.<br><br>
                            La piscine est ouverte entre mi-mai et mi-septembre. Un maître-nageur est recruté chaque année et est présent les mercredis, samedis et dimanches pour la surveillance des bassins.
                        </p>
                    </div>
                </div>

            </div>

            <div class="row activities-height">
                <div class="col-md-6 text-description order-2 order-md-1">
                    <div class="mt-5 mx-5 margin-content">
                        <h2>Club House</h2>
                        <div class="line"></div>
                        <p>Le Club house comprend une salle de réunion équipée d’un bar (aucune licence) et des équipements sanitaires (vestiaires, douches, toilettes).<br><br>
                            L’usage du club-house est réservé aux copropriétaires ou locataires du parc de Diane ainsi qu’à leurs représentants (conseils syndicaux, associations) pour des raisons à caractère privé, associatif ou administratif qui ne doivent entraîner aucun trouble pour le voisinage.<br><br>
                            XXXXXXXXXXX
                        </p>
                    </div>
                </div>

                <div class="col-md-6 club-house-img img-col-height order-1 order-md-2">

                </div>
            </div>

            <div class="row activities-height">
                <div class="col-md-6 ping-pong-img img-col-height">

                </div>

                <div class="col-md-6 text-description">
                    <div class="mt-5 mx-5 margin-content">
                        <h2>Ping-Pong</h2>
                        <div class="line"></div>
                        <p>Un tournoi inter-résidents est organisé chaque année au mois de mai.</p>
                    </div>
                </div>

            </div>

            <div class="row activities-height">
                <div class="col-md-6 text-description order-2 order-md-1">
                    <div class="mt-5 mx-5 margin-content">
                        <h2>Aires de jeux</h2>
                        <div class="line"></div>
                        <p>La résidence met à la disposition des copropriétaires et locataires du parc de Diane trois aires de jeux situées :<br><br>
                            <i>face aux bâtiments 14 et 15</i><br>
                            <i>entre les bâtiments 4, 5 et 7</i><br>
                            <i>entre les bâtiments 1, 18 et 14</i><br><br>
                            L’utilisation des installations placées dans les aires de jeux est placée sous la responsabilité des parents.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 jeux-img img-col-height order-1 order-md-2">

                </div>
            </div>

        </div>
    </section>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="../Assets/js/script.js"></script>

</body>

</html>