<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>réservations</title>
        <link rel="stylesheet" href="public/style/style.css">
    </head>
    <body>   
        
        <?php 
            require_once('includes/partials/header.php');
        ?>
        <main class='booking-main'>
            <h1>Réservez</h1>
            <div class="booking-container">
                <?php foreach ($concerts as $concert) : ?>
                    <article class='booking'>
                        <div class='booking-day'>
                            <p class='day'> <?= $concert['date']?></p>
                        </div>
                        <div class='booking-concert'>
                            <p><?= $concert['name']?></p>
                            <p><?= $concert['libelle']?></p>
                            <p><?= $concert['time']?></p>
                        </div>
                        <div class='booking-button'>
                            <a class='reservation-btn' href='http://www.fnacspectacles.com/artist/'>Réserver</a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </main>
        
        <?php require_once('includes/partials/footer.php');?>   
        
        <script src="public/script/script.js"></script>
    </body>
</html>