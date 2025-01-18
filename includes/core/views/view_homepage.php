<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Page d'accueil</title>
        <link rel="stylesheet" href="public/style/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
    <!--header-->
      
        <div class="headertop">
        </div>
        <div>
            <?php
                require_once('includes/partials/header.php');
            ?>
        </div>
        <!--Main-->
        
        <main class="homepage-main">
            
            <!--bannière-->
          
            <div class="homepage-banner-text">
                <h4 class="banner-machaut">Guillaume de Machaut</h4>
                <h2>L'amoureux tourment</h2>
                <h4 class="banner-date">13/05/2025</h4>
                <a class="info" href="index.php?page=reservations">Infos et réservations<img src="public/img/icons/arrow-right.png" alt="arrow Infos" class="arrow-info"></a>
            </div>        
                        
            <section class="homepage-text">
                    <p>Bienvenue dans la salle Dufay, un lieu emblématique de La Louvière où la musique prend vie ! Située au cœur de la ville, notre salle propose une programmation riche et variée, mêlant artistes de renommée internationale et talents locaux. Que vous soyez mélomane averti ou curieux de découvrir cet univers, la salle Dufay vous offre un cadre chaleureux et une acoustique exceptionnelle, propice à la contemplation et au partage. Découvrez également nos événements interactifs, conférences et rencontres, pour plonger au cœur de la musique sous toutes ses formes.</p>
            </section>    
            <section class="to-discover">
                <h4>À découvrir</h4>
                <div id="homepage-gallery">
                    <div class="hmp-card">
                        <div class="hmp-img-container">
                            <div class="hmp-gallery-title"><h3>Masterclass</h3></div>
                            <img src="public/img/homepage-img/masterclass.jpg" alt="violin" class="homepage-img">
                        </div>
                        <h5>Les masterclass du vendredi</h5>
                        <p class="hmp-card-text">Chaque vendredi après-midi, la salle Dufay devient un lieu d'échange et de transmission lors de masterclass exceptionnelles. Ces moments privilégiés offrent aux jeunes musiciens l'opportunité de travailler avec des artistes de renom, dans une atmosphère bienveillante et inspirante.</p>
                    </div>
                    <div class="hmp-card">
                        <div class="hmp-img-container">
                            <div class="hmp-gallery-title"><h3>Ateliers</h3></div>
                            <img src="public/img/homepage-img/festival.jpg" alt="photo-festival" class="homepage-img" id="img-ateliers">
                        </div>
                        <h5>Explorations musicales</h5>
                        <p class="hmp-card-text">Découvrez nos ateliers créatifs, une immersion ludique et inspirante dans l'univers de la musique classique. Ouverts à tous, ces moments d'exploration allient pratique musicale et créativité, pour éveiller les sens et révéler votre talent, quel que soit votre âge ou votre niveau.</p>
                    </div>   
                    <div class="hmp-card">
                        <div class="hmp-img-container">
                            <div class="hmp-gallery-title"><h3>Évènements</h3></div>
                            <img src="public/img/homepage-img/iriser.jpg" alt="flowers painting" class="homepage-img">
                        </div>
                        <h5>Ut pictura musica</h5>
                        <p class="hmp-card-text">Une conférence captivante sur les correspondances entre musique et peinture. Explorez les liens subtils entre ces deux arts à travers les regards d'experts en histoire de l'art et en musicologie. Vendredi 29 septembre, à 19h.</p>
                    </div>    
                </div>
            </section>
            <section class="newsletter">
                <div class="newsletter-text">
                    <p>Apportez de la musique dans votre boîte mail en vous abonnant à notre newsletter.</p>
                </div>
                <div class="newsletter-form">
                    <p>Adresse e-mail</p>
                    <form id="newsletter-box" method="action">
                        <label for="newsletter"></label>
                        <input type="email" name="email" id="email" required>
                        <div class="news-btn-container">
                            <a class="newsletter-btn" href="#"><img src="public/img/icons/newsletter-arrow.png" alt="submit arrow" class="newsletter-arrow"></a>
                        </div>
                    </form>
                </div>
            </section>
        </main>
        
        <!--footer-->
        
        <?php
            
            require_once('includes/partials/footer.php');
        ?>
        <script src="public/script/script.js"></script>
    </body>
</html>