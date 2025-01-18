<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>agenda</title>
        <link rel="stylesheet" href="public/style/style.css">
    </head>

    <body>
        <?php 
        require_once('includes/partials/header.php');?>
        <main>
            <div class="banniere">
                <img class="imagebanniere" src="public/img/natacha-playing.jpg" alt="Natacha Kudritskaya">
                <img class="imagebanniere" src="public/img/sheku.jpg" alt="Sheku Kanneh-Mason">
                <img class="imagebanniere" src="public/img/lislevand-playing.jpg" alt="Rolph Lislevand">
                <img class="imagebanniere" src="public/img/oberlinger.jpg" alt="Dorothée Oberlinger">
                <img class="imagebanniere" src="public/img/joy-roe.jpg" alt="Elizabeth Joy-Roe">
                <img class="imagebanniere" src="public/img/savallsquare.jpg" alt="Jordi Savall">
                <img class="imagebanniere" src="public/img/hamon-playing3.jpg" alt="Pierre Hamon">
                <img class="imagebanniere" src="public/img/maxwell10.jpg" alt="Quatuor Maxwell">
                <img class="imagebanniere" src="public/img/minkowski.jpg" alt="Marc Minkowski">
                <img class="imagebanniere" src="public/img/isata.jpg" alt="Isata Kanneh-Mason">
                <img class="imagebanniere" src="public/img/alastair11.jpg" alt="Alastair">
                <img class="imagebanniere" src="public/img/orlinski-singing2.jpg" alt="Jakub Orlinski">
                
            </div>    
            <h1>L'agenda</h1>
            <!----- Le crud est ici, avec les actions add, edit, delete dans les liens --->
            <!-- les login sont dans le controller user -->
            <div class="form_acces">
                <?php
                //mettre le isset dans les case dans le controller?
                    if (isset($_SESSION['login'])) {
                    print('<div id="ajouter-container"><a class="ajouter" href="index.php?page=agenda&action=add">Ajouter</a></div>');
                    }
                ?>
                
            </div>
            <div class="agenda-container">
                
                <?php if(isset($message)): ?>
                <!--"?=" correspond à "?php echo"-->
                <!-- si la variable message existe, afficher la variable-->
                    <p><?= $message ?> </p>
                <?php endif; ?>
                <!-- reformulation de leyla pour passer le message dans l'url-->
                <?php if(isset($_GET['message'])): ?>
                    <p><?= $_GET['message'] ?> </p>
                <?php endif; ?>
                
                
                <?php foreach($concerts as $concert) :?>
                    <article class='date'>
                            <div class='concert-date'>
                                <h2 class='day'><?= $concert->getDate() ?></h2>
                                <h2 class='time'><?= $concert->getTime() ?></h2>
                                <h3 class='artist-agenda'><?= $concert->getArtist()->getName() ?></h3>
                                <h3 class='libelle'><?= $concert->getLibelle() ?></h3>
                            </div>
                            <div class='concert-description'>
                                <p><?= $concert->getConcertDescription()?></p>
                                <?php if (isset($_SESSION['login'])) : ?>
                                    <div id="editer-container">
                                        <a class="editer" href="index.php?page=agenda&action=edit&id=<?=$concert->getId()?>">Editer</a>
                                    </div>
                                    <div id="supprimer-container">
                                        <!--le delete confirm est le message de confirmation du bouton delete. Voir dans le js (alerte js). L'id est examiné dans le controller l.65. 
                                            data-name est un attribut html -->
                                        <a class="supprimer" data-name=deleteConfirm href="index.php?page=agenda&action=delete&id=<?=$concert->getId()?>">Supprimer</a>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class='concert-pic'>
                                <img class='concert-picture' alt='concert picture' src='<?= $concert->getConcertPic() ?>'>
                            </div>
                    </article>
                <?php endforeach; ?>
            </div>
            
        </main>
        
        <?php require_once('includes/partials/footer.php');?>
        
        <script src="public/script/script.js"></script>
    </body>
</html>