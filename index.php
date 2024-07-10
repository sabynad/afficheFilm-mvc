<?php 
    /* --------------------------------- Modèles -------------------------------- */
    require_once('App/Model.php');
    require_once('Models/Affiche.php');
    require_once('Models/Security.php');
    require_once('Models/User.php');
    // You can add your models here

    /* ------------------------------- Controllers ------------------------------ */
    require_once('App/Controller.php');

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
    
    <?php
        include('Utils/header.php');
    ?>  

    </header>

        <?php

        // Add your controllers here
        $controllers=['home', 'affiche','security','user', 'admin'];

        $controller_default='home';

        if(isset($_GET['controller']) and in_array($_GET['controller'],$controllers))
        {
            $nom_controller=$_GET['controller'];
        }
        else
            $nom_controller=$controller_default;

        $nom_classe="Controller_".$nom_controller;
        $nom_fichier="Controllers/".$nom_classe.".php";


        if(file_exists($nom_fichier))
        {
            require_once("$nom_fichier");
            $controller=new $nom_classe();
        }
        else 
            exit("ERROR 404:not found");

            // Uncomment below if you want a footer 
        // require_once('Utils/footer.php');

        ?>


    </body>
</html>
