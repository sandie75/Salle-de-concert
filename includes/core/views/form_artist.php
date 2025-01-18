<?php
    require_once("includes/core/models/dao/dao_artiste.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>formulaire artiste</title>
        <link rel="stylesheet" href="public/style/style.css">

    </head>
    <body>
        
        <?php
            require_once('includes/partials/header.php');
        ?>
        <main class="form-artist-main">
           <?php if(isset($message)): ?>
                <?= $message ?> 
           <?php endif; ?>
           
           <?php if(isset($_GET['message'])): ?>
                <?= $_GET['message'] ?> 
           <?php endif; ?>
           
    <!--  le formulaire pour ajouter un artiste ----->
            <div class="form-artist-container">
                <form class="form-artist" action="" method="POST" enctype="multipart/form-data">
                    <h2>Ajouter ou modifier un artiste</h2>
                    <div class="submit-entree">
                        <label for="champName">Nom </label>
                        <input type="text" name="chName" id="champName" value="<?= $artist->getName() ?>" required/>
                    </div>
                    <div class="submit-entree">
                        <label for="champDescription">Description </label>
                        <textarea type="text" name="chDescription" id="champDescription" rows="10" value=""><?= $artist->getDescription() ?></textarea>
                    </div>
                    <div class="submit-entree">
                        <label for="chInstrument">Instrument </label>
                        <input type="text" name="chInstrument" id="chInstrument" value="<?= $artist->getInstrument() ?>" required/>
                    </div>
                    <div class="submit-entree">
                        <label for="champPicture">Image </label>
                        <input type="file" name="chPicture" id="champPicture" value="<?= $artist->getPicture() ?>"/>
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