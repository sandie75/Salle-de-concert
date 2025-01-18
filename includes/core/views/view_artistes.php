<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>artistes</title>
        <link rel="stylesheet" href="public/style/style.css">
    </head>
    <body>
        <?php require_once('includes/partials/header.php');?>
        <main class="artists-main">
            <h1>Artistes</h1>
    <!----- Le crud est ici, avec les actions add, edit, delete dans les liens --->
    <!-- les login sont dans le controller user -->
            <div class="form_acces">
                <?php
                //mettre le isset dans les case dans le controller?
                    if (isset($_SESSION['login'])) {
                    print('<div id="ajouter-container"><a class="ajouter" href="index.php?page=artistes&action=add">Ajouter</a></div>');
                    }
                ?>
                
            </div>
            <div class="artist-container">
                <?php if(isset($message)): ?>
                <!--"?=" correspond à "?php echo"-->
                <!-- si la variable message existe, afficher la variable-->
                    <p><?= $message ?> </p>
                <?php endif; ?>
                <!-- reformulation de leyla pour passer le message dans l'url-->
                <?php if(isset($_GET['message'])): ?>
                    <p><?= $_GET['message'] ?> </p>
                <?php endif; ?>
                
                <?php foreach($allArtists as $artist) : ?>
                    <article class='artist'>
                        <div>
                            <img class='portrait' alt='portrait' src='public/img/artistes/<?= $artist->getPicture()?>'>
                        </div>
                        <div class='artist-description'>
                                <h2><?= $artist->getName() ?></h2>
                                <p><?= $artist->getDescription() ?></p>
                                <?php if (isset($_SESSION['login'])) : ?>
                                    <div id="editer-container">
                                        <a class="editer" href="index.php?page=artistes&action=edit&id=<?=$artist->getId()?>">Editer</a>
                                    </div>
                                    <div id="supprimer-container">
                                        <!--le delete confirm est le message de confirmation du bouton delete. Voir dans le js (alerte js). L'id est examiné dans le controller l.65. 
                                            data-name est un attribut html -->
                                        <a class="supprimer" data-name=deleteConfirm href="index.php?page=artistes&action=delete&id=<?=$artist->getId()?>">Supprimer</a>
                                    </div>
                                <?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; ?>         
            </div>
        </main>
        <?php require_once('includes/partials/footer.php');?>
        <script src="public/script/script.js"></script>
    </body>
</html>