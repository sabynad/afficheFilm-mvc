
<body>
    <header>
        <!------------------------------navbar------------------------------------>
        
                   
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <!-- Autres liens spécifiques à l'administration -->
                            <li class="nav-item">
                                <a class="nav-link" href="?controller=user&action=all_users">Gérer les utilisateurs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">Gérer les affiches</a>
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
                </div>
            </nav>
        </div>
    </header>
</body>