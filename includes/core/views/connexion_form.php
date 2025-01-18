<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>formulaire de connexion</title>
        <link rel="stylesheet" href="public/style/style.css">

    </head>
    <body id="connexion_form_body">  
    
    <?php require_once('includes/partials/header.php');?>
    
    <!-----------------------formulaire de déconnexion---------------------->
        <?php if (isset($_SESSION['login']) && $_SESSION['login'] != '') : ?>
                <div class='connexion_form' id='deconnecter'><a href='index.php?page=userform&action=logout'>Me déconnecter</a></div>
            <?php else : ?> 
<!----------------------------------formulaire de connexion----------------->
                <div class="connexion_form">
                    <?php if(isset($message)): ?>
                        <p><?= $message ?> </p>
                    <?php endif; ?>
                    
                    <?php if(isset($_GET['message'])): ?>
                        <p><?= $_GET['message'] ?> </p>
                    <?php endif; ?>
                    <form id="connexion_form_container" action="index.php?page=userform&action=login" method="post">
                        <img src="public/img/gallerie.jpg" alt="light bulbs" class="connexion_picture">
                        <div class=text_connexion_form>
                            <h1>Connexion</h1>
                            <div class="connexion_entree">
                                <label for="login">Username</label>
                                <input type="text" name="login" id="login" required>
                            </div>
                            
                            <div class="connexion_entree">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" required>
                            </div>
                            
                            <div>
                                <button class="connect-btn" type="submit">Log in</button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php endif; ?>
        <script src="public/script/script.js"></script>
    </body>
</html>