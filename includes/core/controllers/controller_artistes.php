<?php
/* le case list appelle la view artiste, les case add et edit appellent la view form-artist. Le case delete n'appelle 
rien, il n'en a pas besoin. Les action sont définies dans le header et dans les views?*/
    require_once('includes/core/models/dao/dao_artiste.php');
    switch($action){
        //le action=list est dans le header, dans la nav.
        case 'list':{
            $allArtists = getAllArtists();
            require_once("includes/core/views/view_artistes.php");
            break;
        }
        case 'add':{
            if(!isset($_SESSION['login']))
            { //si la session login n'est pas définie, je suis redirigée vers l'index
                header('Location: index.php'); 
                //header: fonction réseau native de php nous redirige vers index.php.
                exit();
            }
            else
            {
                require_once("includes/core/models/dao/dao_artiste.php");
                if(empty($_POST)){      // vérifie si le formulaire a été envoyé ou non
                    //j'arrive sur le formulaire vierge
                    $artist = new Artiste();
                }
                else{
                    // récupérer le chemin temporaire du fichier uploadé
                    $tmpPath = $_FILES['chPicture']['tmp_name'];
                    $destPath = 'public/img/artistes/';
                    $destFileName = $_FILES['chPicture']['name'];
    
                    $fullDestName = $destPath.$destFileName;
                    
                    if (!move_uploaded_file($tmpPath, $fullDestName)){
                        die("Tu as oublié l'image !");
                    }
                    //le formulaire est validé, j'ai cliqué sur submit
                    $artist = new Artiste(
                        
                        htmlspecialchars($_POST["chName"]),//le champ chName est passé comme argument
                        htmlspecialchars($_POST["chDescription"]),//eviter les injections de code
                        $destFileName,
                        
                        htmlspecialchars($_POST["chInstrument"])
                        );
                        
                        //ici, on appelle la fonction en meme temps qu'on utilise son résultat dans une condition.
                        if(insertArtiste($artist)){
                            //si le resultat de la fonction est true, le code suivant est exécuté.
                            $message = "Votre artiste a été ajouté. ";
                            header('Location: ?page=artistes&action=list&message='.$message);
                        }
                        else{
                            $message="Erreur d'enregistrement";
                        }
                }
                require_once("includes/core/views/form_artist.php");
                break;
            }
        }
        case 'edit':{
            if(!isset($_SESSION['login']))
            { //si la session login n'est pas définie, je suis redirigée vers l'index
                header('Location: index.php'); //header: fonction réseau native de php. nous redirige vers index.php.
                exit();
            }
            else
            {
                require_once("includes/core/models/dao/dao_artiste.php");
                //get pour recuperer l'id dans l'url. Fait référence à l'id dans le lien de la view artiste.
                $id_artist=$_GET["id"]??0;
                $artist=getArtistById($id_artist);
                if(!empty($_POST)){
                    //le formulaire est validé, j'ai cliqué sur submit
                        $artist->setName($_POST["chName"]);
                        $artist->setDescription($_POST["chDescription"]);
                        $artist->setPicture($_FILES["chPicture"]['name']);
                        $artist->setInstrument($_POST["chInstrument"]);
                        
                        $destPath = 'public/img/artistes/';
                        $tmpPath = $_FILES['chPicture']['tmp_name'];
                        $destFileName = $_FILES['chPicture']['name'];
    
                        $fullDestName = $destPath.$destFileName;
                        
                        if (!move_uploaded_file($tmpPath, $fullDestName)){
                            die("Tu as oublié l'image !");
                        }
                        
                        if(editArtiste($artist)){
                            $message = "Les infos ont bien été modifiés";
                            header('Location: ?page=artistes&action=list&message='.$message);
                        }
                        else{
                            $message="Erreur d'enregistrement";
                        }
                }
                require_once("includes/core/views/form_artist.php");
                break;
            }
        }
        case 'delete':{
            if(!isset($_SESSION['login']))
            { //si la session login n'est pas définie, je suis redirigée vers l'index
                header('Location: index.php'); //header: fonction réseau native de php. nous redirige vers index.php.
                exit();
            }
            else
            {
                require_once("includes/core/models/dao/dao_artiste.php");
                $id_artist=$_GET["id"]??0;
                
                        if(deleteArtiste($id_artist)){
                            $message="Suppression confirmée";
                            header('Location: ?page=artistes&action=list&message='.$message);
                        }
                        else{
                            $message="Erreur d'enregistrement";
                        }
                break;
            }
        }
        default:{
            require_once ("includes/core/controller_error.php");
        }
    }
    
    
    
    
    