<?php
require "../Controllers/profile_admin-controller.php";
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
    <title>Profil - Parc de Diane</title>
</head>

<body>

    <?php include "includes/navbar.php"; ?>

    <div class="content">
        <h3 class="text-center mt-5">Paramètres du compte</h3>
        <div class="white-divider mb-5"></div>
        <div class="container light-style flex-grow-1 container-p-y">
            <div class="card overflow-hidden">
                <?php
                if (isset($_SESSION["passwordMessage"])) {
                    if ($_SESSION["passwordMessage"] == "error") {
                ?>
                        <div class="container-fluid">
                            <div class="alert alert-danger alert-dismissible fade show text-center my-3" role="alert">
                                <p>Il y a eu une erreur lors de la modification de votre mot de passe.</p>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                    <?php
                        unset($_SESSION["passwordMessage"]);
                    }
                }
                    ?>
                    <div class="row no-gutters row-bordered row-border-light">
                        <div class="col-md-3 pt-0">
                            <div class="list-group list-group-flush account-settings-links">
                                <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">Coordonnées</a>
                                <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Changement de mot de passe</a>
                                <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-announces">Mes annonces</a>
                                <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-list-users">Liste des utilisateurs</a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="account-general">
                                    <?php
                                    if (isset($_SESSION["updateInfoMessage"])) {
                                        if ($_SESSION["updateInfoMessage"] == "success") {
                                    ?>
                                            <div class="container-fluid">
                                                <div class="alert alert-success alert-dismissible fade show text-center mt-3" role="alert">
                                                    <p>Votre profil a bien été modifié.</p>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            </div>
                                        <?php
                                            unset($_SESSION["updateInfoMessage"]);
                                        } else {
                                        ?>
                                            <div class="container-fluid">
                                                <div class="alert alert-danger alert-dismissible fade show text-center mt-3" role="alert">
                                                    <p>Il y a eu une erreur lors de la modification de vos données.</p>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                        <?php
                                            unset($_SESSION["updateInfoMessage"]);
                                        }
                                    }
                                        ?>
                                        <form action="profile_admin.php" method="post" class="form">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label class="form-label" for="lastname">Nom</label>
                                                    <input type="text" name="lastname" id="lastname" class="form-control mb-1" value="<?= $_SESSION["user"]["lastname"] ?>">
                                                    <span style="color:red;"><?= isset($arrayErrors["lastname"]) ? $arrayErrors["lastname"] : "" ?></span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="firstname">Prénom</label>
                                                    <input type="text" name="firstname" id="firstname" class="form-control mb-1" value="<?= $_SESSION["user"]["firstname"] ?>">
                                                    <span style="color:red;"><?= isset($arrayErrors["firstname"]) ? $arrayErrors["firstname"] : "" ?></span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="email">Adresse email</label>
                                                    <input type="email" name="email" id="email" class="form-control mb-1" value="<?= $_SESSION["user"]["mail"] ?>">
                                                    <span style="color:red;"><?= isset($arrayErrors["email"]) ? $arrayErrors["email"] : "" ?></span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="phone">Numéro de téléphone</label>
                                                    <input type="text" name="phone" id="phone" class="form-control mb-1" value="<?= $_SESSION["user"]["tel"] ?>">
                                                    <span style="color:red;"><?= isset($arrayErrors["phone"]) ? $arrayErrors["phone"] : "" ?></span>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end m-3">
                                                <input type="submit" name="modifyInfosButton" class="btn btn-info btn-md" value="Sauvegarder">
                                            </div>
                                        </form>
                                            </div>

                                            <div class="tab-pane fade show" id="account-change-password">
                                                <div class="card-body pb-2">
                                                    <form action="" method="post" class="form">
                                                        <div class="row mb-4">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Votre mot de passe actuel</label>
                                                                    <input type="password" name="actualPassword" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label">Votre nouveau mot de passe</label>
                                                                    <input type="password" name="newPassword" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label">Répéter le nouveau mot de passe</label>
                                                                    <input type="password" name="newPasswordVerif" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p class="mb-2">Exigences relatives au mot de passe</p>
                                                                <p class="small text-muted mb-2">Pour créer un nouveau mot de passe, vous devez remplir toutes les conditions suivantes :</p>
                                                                <ul class="small text-muted pl-4 mb-0">
                                                                    <li>Au moins une lettre majuscule</li>
                                                                    <li>Au moins une lettre minuscule</li>
                                                                    <li>Au moins un caractère spécial</li>
                                                                    <li>Au moins un chiffre</li>
                                                                    <li>Entre 8 et 20 caractères</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-end m-3">
                                                            <input type="submit" name="modifyPasswordButton" class="btn btn-info btn-md" value="Sauvegarder">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="account-announces">
                                                <div class="card-body pb-2">
                                                    <p class="mb-4">Pour consulter, modifier ou supprimer une annonce, cliquer sur le bouton ci-dessous :</p>
                                                    <a class="btn btn-success ml-3" href="personal_announces.php">Mes annonces</a>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="account-list-users">
                                                <div class="card-body pb-2">
                                                    <p class="mb-4">Consulter la liste des utilisateurs</p>
                                                    <a class="btn btn-info ml-3" name="listUsersButton" href="list_users.php">Accéder à la liste</a>
                                                </div>
                                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        </div>
            </div>
        </div>
    </div>

    <?php include "includes/footer.php"; ?>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="../Assets/js/script.js"></script>

</body>

</html>