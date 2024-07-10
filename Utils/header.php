
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
                                        <li><a class="dropdown-item" href="?controller=affiche&action=film_reel">Aventure – Guerre – Histoire – Action.</a></li>
                                        <li><a class="dropdown-item" href="?controller=affiche&action=film_ireel">Science fiction – fantastique – horreur.</a></li>
                                        <li><a class="dropdown-item" href="?controller=affiche&action=film_drama">Drame – Comédie dramatique.</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Séries
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="?controller=affiche&action=serie_action_aventure">Action - Aventure</a></li>
                                        <li><a class="dropdown-item" href="?controller=affiche&action=serie_fantastique_science">Fantastique - Science-fiction</a></li>
                                        <li><a class="dropdown-item" href="?controller=affiche&action=serie_comedie">Comédie</a></li>
                                        <li><a class="dropdown-item" href="?controller=affiche&action=serie_documentaire">Documentaire</a></li>
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
        