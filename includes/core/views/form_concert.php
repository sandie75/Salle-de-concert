<?php
    require_once("includes/core/models/dao/dao_concert.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>formulaire concert</title>
        <link rel="stylesheet" href="public/style/style.css">

    </head>
    <body>
        
        <?php
            require_once('includes/partials/header.php');
        ?>
        <main class="form-concert-main">
           <?php if(isset($message)): ?>
                <?= $message ?> 
           <?php endif; ?>
           
           <?php if(isset($_GET['message'])): ?>
                <?= $_GET['message'] ?> 
           <?php endif; ?>
           
    <!--  le formulaire pour ajouter un concert ----->
            <div class="form-artist-container">
                <form class="form-concert" id="form-concert" action="" method="POST" enctype="multipart/form-data">
                    <h2>Ajouter ou modifier un concert</h2>
                    <div class="submit-entree">
                        <label for="champDate">Date </label>
                        <input type="text" name="chDate" id="champDate" value="<?= $concert->getDate() ?>" required>
                        <small></small>
                    </div>
                    <div class="submit-entree">
                        <label for="champTime">Heure </label>
                        <input type="text" name="chTime" id="champTime" value="<?= $concert->getTime() ?>" required>
                        <small></small>
                    </div>
                    <div class="submit-entree">
                        <label for="champLibelle">Libellé</label>
                        <input type="text" name="chLibelle" id="champLibelle" value="<?= $concert->getLibelle() ?>" required>
                    </div>
                    <div class="submit-entree">
                        <label for="champArtiste">Artiste</label>
                        <a href="index.php?page=artistes&action=add">Nouvel artiste</a>
                        <select name="chConcertArtiste" id="champConcertArtiste">
                            <?php foreach($artistsOptions as $artistOption) :?>
                                <?php if($concert->getArtist()->getId()==$artistOption->getId()):?>
                                    <option value="<?= $artistOption->getId()?>" selected><?= $artistOption->getName()?></option>
                                <?php else:?>
                                    <option value="<?= $artistOption->getId()?>"><?= $artistOption->getName()?></option>
                                <?php endif;?>
                            <?php endforeach; ?> 
                        </select>
                    </div>
                    <div class="submit-entree">
                        <label for="champConcertDescription">Description</label>
                        <textarea type="text" name="chConcertDescription" id="champConcertDescription" rows="10" value=""><?= $concert->getConcertDescription() ?></textarea>
                    </div>
                    <div class="submit-entree">
                        <label for="champConcertPicture">Image</label>
                        <input type="file" name="chConcertPicture" id="champConcertPicture" value="<?= $concert->getConcertPic() ?>">
                    </div>
                    <button class="form-btn" id="reinitialiser" type="reset">Réinitialiser</button>
                    <button class="form-btn" id="valider" type="submit">Valider</button>
                </form>
            </div>
        </main>
        <?php
            
            require_once('includes/partials/footer.php');
        ?>
        
        <script src="public/script/script.js"></script>
    </body>
</html>