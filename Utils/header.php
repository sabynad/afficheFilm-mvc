<?php
session_start();
?>

<!DOCTYPE html>

<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Louez une moto entre particuliers en toute confiance. Découvrez une large sélection de motos disponibles près de chez vous, à des prix compétitifs. Réservez facilement en ligne et profitez de votre prochaine aventure à deux roues.">

        <!-- -------------------------------- favicon --------------------------------- -->
        <link rel="shortcut icon" href="./Content/img/site/fav.ico" type="image/x-icon">

        <!-- ------------------------------- stylesheets ------------------------------ -->
        <link rel="stylesheet" href="./Content/css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- ------------------------------ libraries scripts  --------------------------- -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/29aef3fc25.js" crossorigin="anonymous"></script>

        <!-- --------------------------------icons-------------------------------------- -->
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

        <!-- --------------------------------fonts------------------------------------ -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">

        <!-- ------------------------------- scripts ------------------------------ -->
        <script src="./Content/js/script.js" defer></script>
        <script src="./Content/js/login_form_verify.js" defer></script>
        <script src="./Content/js/registration_form_verify.js" defer></script> 
        <!-- <script src="./Content/js/form-preresa.js" defer></script>  -->

        <title>Affiche de films</title>
    </head>

    <body>
        <header>
            <!------------------------------navbar------------------------------------>
            <div class="navbar-container">
                <nav class="navbar navbar-expand-lg bg-body-tertiary">
                    <div class="container-fluid">
                        <a href="?controller=home&action=home.php"><img src="./public/images/logo-detoure.png" class="logo" alt="image logo"></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
    
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <?php
                                // une fois connecté, soit je suis dans l'admin ou l'utilisateur
                                if(isset($_SESSION['nom'])){
                                    if($_SESSION['role']=='admin'){  
                                        include('header_admin.php');
                                    } else {
                                        include('header_user.php');
                                    }
                                } else {
                                    // Afficher le menu normal pour les visiteurs non connectés
                                    
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="?controller=affiche&action=all_affiches">Toutes les affiches</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Films
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Aventure – Guerre – Histoire – Action.</a></li>
                                        <li><a class="dropdown-item" href="#">Science fiction – fantastique – horreur.</a></li>
                                        <li><a class="dropdown-item" href="#">Drame – Comédie dramatique.</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Séries
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="?controller=affiche&action=serie_action_aventure">Action - Aventure</a></li>
                                        <li><a class="dropdown-item" href="?controller=affiche&action=serie_fantastique_science">Fantastique - Science-fiction</a></li>
                                        <li><a class="dropdown-item" href="#">Comédie</a></li>
                                        <li><a class="dropdown-item" href="#">Documentaire</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Animées
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="?controller=affiche&action=all_disney">Disney</a></li>
                                        <li><a class="dropdown-item" href="?controller=affiche&action=all_mangas">Mangas</a></li>
                                    </ul>
                                    <div class="navbar-nav ms-auto">    
                                    <li class="nav-item">
                                        <?php 
                                            if (isset($_SESSION["email"])) { // Si l'utilisateur est connecté
                                                echo '<li class="nav-item">';
                                                echo '<span class="nav-link">Vous êtes connecté ' . ($_SESSION["prenom"]) . '</span>';
                                                echo '<a class="btn btn-info" href="?controller=security&action=disconnection">Déconnexion</a>';
                                                echo '</li>';
                                            } else {
                                                echo '<li class="nav-item">';
                                                echo '<a class="btn btn-warning" href="?controller=security&action=user_connection">Connexion</a>';
                                                echo '</li>';
                                            }  
                                        ?>
                                        <?php } ?>
                                    </li>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>     
            </div>
        </header>
    </body>
</html>
