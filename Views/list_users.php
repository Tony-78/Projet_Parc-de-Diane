<?php
require "../Controllers/list_users-controller.php";
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
    <title>Liste des utilisateurs - Parc de Diane</title>
</head>

<body>

    <?php include "includes/navbar.php"; ?>

    <h3 class="text-center mt-5">Liste des utilisateurs</h3>
    <div class="white-divider mb-5"></div>
    <?php
    
    if (isset($_SESSION["deleteUser"])) {
        if ($_SESSION["deleteUser"] == "success") {
    ?>
            <div class="container">
                <div class="alert alert-success alert-dismissible fade show text-center mt-3" role="alert">
                    <p>Le compte utilisateur a bien été supprimé.</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        <?php
            unset($_SESSION["deleteUser"]);
        } else {
        ?>
            <div class="container">
                <div class="alert alert-danger alert-dismissible fade show text-center mt-3" role="alert">
                    <p>Il y a eu une erreur lors de la suppression du compte utilisateur</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
    <?php
            unset($_SESSION["deleteUser"]);
        }
    }
    ?>
    <div class="container">
        <section class="panel">
            <div class="panel-body">
                <div class="row mb-3 justify-content-center">
                    <div class="col-sm-10">
                        <div class="text-center">
                            <form action="list_users.php" method="post">
                                <input type="text" placeholder="Rechercher un user" name="searchUser">
                                <button type="submit" class="btn btn-success btn-sm mx-3 mb-1">Rechercher</button>
                                <a href="list_users.php">
                                    <button type="button" class="btn btn-secondary btn-sm mb-1">Réinitialiser</button>
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-hover p-table">
                <thead>
                    <tr class="text-center">
                        <th>Utilisateur</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($allUsersInformations)) {
                        foreach ($allUsersInformations as $userValue) {
                    ?>
                            <tr class="text-center">
                                <td>
                                    <?= $userValue["user_lastname"] . " " . $userValue["user_firstname"] ?>
                                    <br>
                                    <small><?= $userValue["username_username"] ?></small>
                                </td>
                                <td>
                                    <a href="mailto:<?= $userValue["user_mail"] ?>"><?= $userValue["user_mail"] ?></a>
                                </td>
                                <td>
                                    <?= $userValue["user_tel"] ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteAccountModal<?= $userValue["username_id"] ?>"><i class="far fa-trash-alt"></i></button>

                                    <div class="modal fade" id="deleteAccountModal<?= $userValue["username_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Suppression de compte</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Attention, cette action sera irréversible !
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="list_users.php" method="post" class="form">
                                                        <button type="submit" name="deleteAccount" class="btn btn-danger btn-sm" value="<?= $userValue["username_id"] ?>">Supprimer le compte</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>


                        <?php
                        }
                        if (isset($totalPages)) {
                        ?>
                </tbody>
            </table>
            <div class="mt-3 text-center">
                <a class="btn btn-info btn-sm" href="list_users.php?page=1"><<</a>
                <a class="btn btn-info btn-sm" href="list_users.php?page=<?= $actualPage > 1 ? $actualPage - 1 : 1 ?>"><</a>

                <?php
                            for ($page = 1; $page <= $totalPages; $page++) {
                ?>
                    <a class="btn btn-info btn-sm" href="list_users.php?page=<?= $page ?>"><?= $page ?></a>
                <?php
                            }
                ?>
                <a class="btn btn-info btn-sm" href="list_users.php?page=<?= $actualPage < $totalPages ? $actualPage + 1 : $totalPages ?>">></a>
                <a class="btn btn-info btn-sm" href="list_users.php?page=<?= $totalPages ?>">>></a>
            </div>
        <?php
                        }
                    } else {
        ?>
                </tbody>
            </table>
        <div>
            <p class="text-center mt-5">Il n'y a aucun résultat de recherche.</p>
        </div>
    <?php
                    }
    ?>

        </section>
    </div>





    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="../Assets/js/script.js"></script>

</body>

</html>