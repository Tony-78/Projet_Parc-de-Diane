<?php
require "Controllers/index-controller.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Polices -->
  <link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="Assets/css/style.css">
  <title>Parc de Diane</title>
</head>

<body>

  <!-- Header -->

  <header class="header">
    <nav class="navbar navbar-expand-lg d-flex">
      <a class="navbar-brand logo d-flex w-50 mr-auto" href="index.php"><img src="assets/img/pdd2.png"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
        </svg>
      </button>
      <div class="collapse navbar-collapse w-100" id="navbarSupportedContent">
        <ul class="navbar-nav mb-2 mb-lg-0 nav_effect">
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
            <a class="nav-link" href="#">Annonces</a>
          </li>
        </ul>

        <?php
        if (isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "admin") {
        ?>
          <ul class="navbar-nav ml-auto w-100 justify-content-end">
            <a class="btn btn-success my-2 my-sm-0" href="Views/profile_admin.php" id="login_button">Mon dashboard</a>
          </ul>
          <ul class="navbar-nav ml-auto">
            <form action="index.php" method="post">
              <button type="submit" name="SignOutButton" class="btn btn-success my-2 my-sm-0">Se déconnecter</button>
            </form>
          </ul>
        <?php
        } else if (isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "user") {
        ?>
        <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
          <ul class="navbar-item">
            <a class="btn btn-success my-2 my-sm-0 w-100" id="profile_button" href="Views/profile_user.php">Mon profil</a>
          </ul>
          <li class="navbar-item">
            <form action="index.php" method="post">
              <button type="submit" name="SignOutButton" id="sign_out_button" class="btn btn-success my-2 my-sm-0">Se déconnecter</button>
            </form>
          </li>
        </ul>
        <?php
        } else {
        ?>
          <ul class="navbar-nav ml-auto">
            <a class="btn btn-success my-2 my-sm-0" href="Views/login.php" id="login_button">Connexion</a>
          </ul>
        <?php
        }
        ?>
      </div>
    </nav>
  </header>



  <div class="container-fluid mt-5 wallpaper">

  </div>


  <h5 class="text-center my-5">La résidence du Parc de Diane est située dans un écrin de verdure au sein de la vallée de la Bièvre.<br>
    Un véritable coin de paradis à l’écart du stress des centres villes avec commerces et services sur place.</h5>


  <!-- A la une (les 3 fenêtres modales et les cards) -->
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

  <div class="container my-5">
    <h1 class="text-center">À la une</h1>
    <div class="white-divider mb-5"></div>
    <div class="card-deck">
      <div class="card">
        <img class="card-img-top" src="assets/img/tennis.jpg" alt="">
        <div class="card-body">
          <h5 class="card-title text-center">COVID-19</h5>
          <p class="card-text my-4 text-center">"Porter un masque, pour mieux nous protéger"</p>
        </div>
        <div class="card-footer text-center">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-1">Plus d'infos</button>
        </div>
      </div>
      <div class="card">
        <img class="card-img-top" src="assets/img/tennis.jpg" alt="">
        <div class="card-body">
          <h5 class="card-title text-center">Anniversaire du Parc de Diane</h5>
          <p class="card-text my-4 text-center">En 2021 nous allons fêter les 50 ans du Parc de Diane</p>
        </div>
        <div class="card-footer text-center">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-2">Plus d'infos</button>
        </div>
      </div>
      <div class="card">
        <img class="card-img-top" src="assets/img/tennis.jpg" alt="">
        <div class="card-body">
          <h5 class="card-title text-center">Mise en peinture ???</h5>
          <p class="card-text my-4 text-center">Travaux de peinture dans les locaux à vélos du 18/01/21 au 23/01/21 </p>
        </div>
        <div class="card-footer text-center">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-3">Plus d'infos</button>
        </div>
      </div>
    </div>
  </div>



  <div class="container">
    <h1 class="text-center mb-3">bngdfbndgfd</h1>
    <div class="white-divider mb-5"></div>
    <div class="row">
      <div class="col-sm-6 p-0 recap-img">
        <div class="oaoa">
          <a href="Views/commerces.php">
            <img src="Assets/img/testimg.jpg" class="card-img-top" alt="...">
            <h2>Commerces</h2>
          </a>
        </div>
      </div>
      <div class="col-sm-6 p-0 recap-img">
        <a href="Views/activités.php"><img src="Assets/img/testimg.jpg" class="card-img-top" alt="..."></a>
        <h2>Activités</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6 p-0 recap-img">
        <a href="Views/services.php"><img src="Assets/img/testimg.jpg" class="card-img-top" alt="..."></a>
        <h2>Services</h2>
      </div>
      <div class="col-sm-6 p-0 recap-img">
        <a href="Views/services.php"><img src="Assets/img/testimg.jpg" class="card-img-top" alt="..."></a>
        <h2>Annonces</h2>
      </div>
    </div>
  </div>





  <div class="container mt-5">
    <h1 class="text-center mx-3">Plan du Parc</h1>
    <div class="white-divider mb-5"></div>
    <div class="row">
      <div class="col-6">
        <img class="w-100" src="assets/img/plan_pdd.png" alt="">
      </div>
      <div class="col-6">
        <img class="w-100" src="assets/img/map_pdd.png" alt="">
      </div>
    </div>
  </div>





  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
  </script>
  <script src="Assets/js/script.js"></script>

</body>

</html>