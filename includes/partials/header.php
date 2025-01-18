<!-- les action sont ici  -->
<header>
        <nav class="navbar">
            <div class="nav-title-container">
                <img src="public/img/icons/logoCurtainWhite.png" class="logoCurtain" alt="logo">
                <a href="index.php"><h2 class="nav-title">Salle Dufay</h2></a>
            </div>
            <ul class="nav-menu">
                <li class="nav-item"><a class="nav-link" href="index.php?page=agenda&action=list">Agenda</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?page=artistes&action=list">Artistes</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?page=reservations">Réservations</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?page=acces">Plan d'accès</a></li>
                <?php if(!isset($_SESSION["login"])):?>
                    <li class="nav-item"><a class="nav-link" href="index.php?page=userform&action=list">Connexion</a></li>
                <?php else:?>
                    <li class="nav-item"><a class="nav-link" href="index.php?page=userform&action=list">Déconnexion</a></li>
                <?php endif;?>
                
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    
</header>
