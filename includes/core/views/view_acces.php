<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>accès</title>
        <link rel="stylesheet" href="public/style/style.css">
    </head>
    <body>
        <?php 
            require_once('includes/partials/header.php');
        ?>
        <main class="access-main">
            <h1>Plan d'accès</h1>
            <div class="googlemaps">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2660.7746481677536!2d6.450156175480952!3d48.17242434873574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4793a08ed0aaeee7%3A0xb7955f5ef3d4e666!2sAuditorium%20de%20la%20Louvi%C3%A8re!5e0!3m2!1sfr!2sfr!4v1681767254639!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>    
        </main>
        
        <?php require_once('includes/partials/footer.php');?>
        
        <script src="public/script/script.js"></script>
    </body>
</html>