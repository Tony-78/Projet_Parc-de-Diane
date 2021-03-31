<?php
require "Controllers/index-controller.php";
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
  <link rel="stylesheet" href="Assets/css/style.css">
  <title>Parc de Diane</title>
</head>

<body>

  <header class="header ">
    <nav class="navbar navbar-expand-lg">
      <a class="navbar-brand logo d-flex w-50 mr-auto" href="index.php"><img src="assets/img/pdd2.png"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
        </svg>
      </button>
      <div class="collapse navbar-collapse w-100" id="navbarSupportedContent">
        <ul class="navbar-nav mb-2 mb-lg-0 nav_effect navbar-position">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Views/shops.php">Commerces</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Views/activities.php">Activités</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Views/services.php">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Views/list_announces.php">Annonces</a>
          </li>
        </ul>

        <?php
        if (isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "admin") {
        ?>
          <div class="dropdown navbar-nav ml-auto" id="login_button">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-user mr-1"></i>
              <?= $_SESSION["user"]["lastname"] . " " . $_SESSION["user"]["firstname"] ?>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="Views/profile_admin.php">Tableau de board</a>
              <form action="index.php" method="post">
                <button type="submit" name="SignOutButton" class="dropdown-item">Se déconnecter</button>
              </form>
            </div>
          </div>
        <?php
        } else if (isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "user") {
        ?>
          <div class="dropdown navbar-nav ml-auto" id="login_button">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-user mr-1"></i>
              <?= $_SESSION["user"]["lastname"] . " " . $_SESSION["user"]["firstname"] ?>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="Views/profile_user.php">Mon profil</a>
              <form action="index.php" method="post">
                <button type="submit" name="SignOutButton" class="dropdown-item">Se déconnecter</button>
              </form>
            </div>
          </div>
        <?php
        } else {
        ?>
          <div class="dropdown navbar-nav ml-auto" id="login_button">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Accès adhérent
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="Views/login.php">Connexion</a>
              <a class="dropdown-item" href="Views/register.php">Inscription</a>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
    </nav>
  </header>


  <div class="content">
    <div class="container-fluid wallpaper"></div>


    <h5 class="text-center sections-margin">La résidence du Parc de Diane est située dans un écrin de verdure au sein de la vallée de la Bièvre.<br>
      Un véritable coin de paradis à l’écart du stress des centres villes avec commerces et services sur place.</h5>

    <div class="modal fade" id="modal-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">COVID-19</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p class="text-center mt-3">Pour votre santé et celle de ceux qui vous entourent :<br><br>
              <u>Pensez à porter un masque facial</u><br><br>
              dans l'ascenseur et les circulations communes
            </p>
            <img src="assets/img/masque.png" class="w-100" alt="image masque">
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">50 ans du Parc de Diane</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p class="text-center mt-3 p-3">Un groupe de travail a été missionné pour rassembler des informations historiques sur la résidence.<br><br>
              Pour faciliter leur travail, un questionnaire a été réalisé pour les résidents ou anciens résidents du Parc de Diane pour qu'ils partagent des anecdotes ou des faits marquants de l'histoire de la résidence.<br><br>
              Si vous souhaitez répondre au questionnaire, merci d'envoyer un message à .....@gmail.com ou ......@gmail.com et le lien vous sera envoyé.<br><br>
              Merci,<br><br>
              La loge du Parc de Diane
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal-3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nettoyage et mise en peinture</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="mt-3 p-3 text-center">
              <p>Un nettoyage ainsi que la mise en peinture si nécessaire du local vélo de notre bâtiment seront effectués la troisième semaine de janvier.<br><br>
                A cet effet, il est nécessaire que le local soit débarrassé de tous les vélos et autres objets vous appartenant et ce pour le 18/01/2021 pendant la durée des travaux. Durant ce temps vous pouvez exceptionnellement entreposer vos vélos sur votre balcon si votre box est plein, aucun vélo n'y sera cependant toléré après le 31/01/2021, soit une semaine après le nettoyage et la réfection du local.<br><br>
                <u><b>Les dates à retenir sont rappelées dans le schéma de déroulement ci-dessous :</b></u>
              </p>
              <img src="assets/img/planning vélos.PNG" class="w-100" alt="image planning vélos">
              <p class="mt-3">Les vélos et autres objets présents dans un local au moment de la mise en peinture seront considérés comme encombrants et remis à une association (vélos) ou à la déchèterie.<br><br>
                Sincères salutations,<br><br>
                La loge du Parc de Diane</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container index-sections-margin">
      <h2 class="text-center">À la une</h2>
      <div class="white-divider mb-5"></div>
      <div class="card-deck">
        <div class="card">
          <img class="card-img-top img-card-news-size" src="assets/img/virus.jpg" alt="image virus">
          <div class="card-body">
            <h5 class="card-title text-center">COVID-19</h5>
            <p class="card-text my-4 text-center">"Porter un masque, pour mieux nous protéger"</p>
          </div>
          <div class="card-footer text-center">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-1">Plus d'infos</button>
          </div>
        </div>
        <div class="card">
          <img class="card-img-top img-card-news-size" src="assets/img/50ans.jpg" alt="image anniversaire pdd">
          <div class="card-body">
            <h5 class="card-title text-center">Anniversaire du Parc de Diane</h5>
            <p class="card-text my-4 text-center">En 2021 nous allons fêter les 50 ans du Parc de Diane</p>
          </div>
          <div class="card-footer text-center">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-2">Plus d'infos</button>
          </div>
        </div>
        <div class="card">
          <img class="card-img-top img-card-news-size" src="assets/img/local-velo.jpg" alt="image local">
          <div class="card-body">
            <h5 class="card-title text-center">Travaux</h5>
            <p class="card-text my-4 text-center">Travaux de peinture dans les locaux à vélos du 18/01/21 au 23/01/21 </p>
          </div>
          <div class="card-footer text-center">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-3">Plus d'infos</button>
          </div>
        </div>
      </div>
    </div>



    <div class="container index-sections-margin">
      <h2 class="text-center mb-3">Que trouve t-on au Parc de Diane ?</h2>
      <div class="white-divider mb-5"></div>
      <div class="row presentation-sections-width mx-auto" style="width: 55rem;">
        <div class="col-sm-6 p-0 recap-img">
          <div class="presentation-sections">
            <a href="Views/shops.php">
              <img src="Assets/img/pharmacie.jpg " class="card-img-top" alt="image commerces">
              <h2 style="text-shadow: 10px 10px 10px black;"><b>Commerces</b></h2>
            </a>
          </div>
        </div>
        <div class="col-sm-6 p-0 recap-img">
          <div class="presentation-sections">
            <a href="Views/activities.php">
              <img src="Assets/img/tennis.jpg" class="card-img-top" alt="image activités">
              <h2 style="text-shadow: 10px 10px 10px black;"><b>Activités</b></h2>
            </a>
          </div>
        </div>
      </div>
      <div class="row presentation-sections-width mx-auto" style="width: 55rem;">
        <div class="col-sm-6 p-0 recap-img">
          <div class="presentation-sections">
            <a href="Views/services.php">
              <img src="Assets/img/dentiste.jpg" class="card-img-top" alt="image services">
              <h2 style="text-shadow: 10px 10px 10px black;"><b>Services</b></h2>
            </a>
          </div>
        </div>
        <div class="col-sm-6 p-0 recap-img">
          <div class="presentation-sections">
            <a href="Views/list_announces.php">
              <img src="Assets/img/annonces.jpg" class="card-img-top" alt="image annonces">
              <h2 style="text-shadow: 10px 10px 10px black;"><b>Annonces</b></h2>
            </a>
          </div>
        </div>
      </div>
    </div>


    <div class="container index-sections-margin">
      <h2 class="text-center mx-3">Plan du Parc</h2>
      <div class="white-divider mb-5"></div>
      <div class="row">
        <div class="col-6">
          <img class="w-100" src="assets/img/plan_pdd.png" alt="image plan parc de diane">
        </div>
        <div class="col-6">
          <img class="w-100" src="assets/img/map_pdd.png" alt="image plan parc de diane map">
        </div>
      </div>
    </div>
  </div>

  <?php include "Views/includes/footer.php"; ?>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
  </script>
  <script src="Assets/js/script.js"></script>

</body>

</html>