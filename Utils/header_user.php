<body>
    <header>
        <!------------------------------navbar------------------------------------>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">                     
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
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Commandes</a>
                </li>
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
    </header>
</body>