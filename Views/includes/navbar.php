<header class="header">
    <nav class="navbar navbar-expand-lg d-flex">
      <a class="navbar-brand logo d-flex w-50 mr-auto" href="../index.php"><img src="../assets/img/pdd2.png"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
        </svg>
      </button>
      <div class="collapse navbar-collapse w-100" id="navbarSupportedContent">
        <ul class="navbar-nav mb-2 mb-lg-0 nav_effect">
          <li class="nav-item">
            <a class="nav-link" href="../index.php">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="shops.php">Commerces</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="activities.php">Activités</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="services.php">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="list_announces.php">Annonces</a>
          </li>
        </ul>

        <?php
        if (isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "admin") {
        ?>
          <div class="dropdown navbar-nav ml-auto" id="login_button">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-user mr-1"></i>
            <?=  $_SESSION["user"]["lastname"] . " " . $_SESSION["user"]["firstname"] ?>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="profile_admin.php">Tableau de board</a>
              <form action="../index.php" method="post">
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
              <a class="dropdown-item" href="profile_user.php">Mon profil</a>
              <form action="../index.php" method="post">
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
              <a class="dropdown-item" href="login.php">Connexion</a>
              <a class="dropdown-item" href="register.php">Inscription</a>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
    </nav>
  </header>