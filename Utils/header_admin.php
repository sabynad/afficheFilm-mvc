
<body>
    <header>
        <!------------------------------navbar------------------------------------>
        <div>
            <nav class="">
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <!-- Autres liens spécifiques à l'administration -->
                        <li class="nav-item">
                            <a class="nav-link" href="?controller=user&action=all_users">Gérer les utilisateurs</a>
                        </li>
                        
                        <li class="nav-item dropdown nav-admin-affiche">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Gérer les affiches
                            </a>
                        <div class="dropdown-menu">
                        <ul class="nav-item">
                            <a class="nav-link active" aria-current="page" href="?controller=admin&action=admin_all_affiches">Toutes les affiches</a>
                        </ul>
                        <a class="dropdown-item" href="#">Films</a>
                        
                        <ul class="submenu">
                            <li><a class="dropdown-item" href="?controller=affiche&action=film_reel">Aventure – Guerre – Histoire – Action.</a></li>
                            <li><a class="dropdown-item" href="?controller=affiche&action=film_ireel">Science fiction – fantastique – horreur.</a></li>
                            <li><a class="dropdown-item" href="?controller=affiche&action=film_drama">Drame – Comédie dramatique.</a></li>
                        </ul>
                        <a class="dropdown-item" href="#">Series</a>
                        <ul class="submenu">
                            <li><a class="dropdown-item" href="?controller=affiche&action=serie_action_aventure">Action - Aventure</a></li>
                            <li><a class="dropdown-item" href="?controller=affiche&action=serie_fantastique_science">Fantastique - Science-fiction</a></li>
                            <li><a class="dropdown-item" href="?controller=affiche&action=serie_comedie">Comédie</a></li>
                            <li><a class="dropdown-item" href="?controller=affiche&action=serie_documentaire">Documentaire</a></li>
                        </ul>
                        <a class="dropdown-item" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Animées
                    </a>
                    <ul class="submenu">
                        <li><a class="dropdown-item" href="?controller=affiche&action=all_disney">Disney</a></li>
                        <li><a class="dropdown-item" href="?controller=affiche&action=all_mangas">Mangas</a></li>
                    </ul>
                    </div>

                        </li>
                            
                        
                        <li class="nav-item">
                            <a class="nav-link" href="">Gérer les commandes</a>
                        </li>
                        <!-- Déconnexion -->
                        <li class="nav-item ms-auto"> 
                            <?php
                                if (isset($_SESSION["email"])) { // Si l'utilisateur est connecté
                                            echo '<li class="nav-item">';
                                            echo '<span class="nav-link">Vous êtes connecté ' . ($_SESSION["prenom"]) . '</span>';
                                    }        
                            ?>
                            <a class="btn btn-warning" href="?controller=security&action=disconnection">Déconnexion</a>
                        </li>
                    </ul>
                </div>
               
            </nav>
        </div>
    </header>
</body>