<?php

    /* le case list appelle la view agenda, les case add et edit appellent la view form-concert. Le case delete n'appelle 
rien, il n'en a pas besoin. Les action sont définies dans le header et dans les views.*/
    
    
    switch($action){
        //le action=list est dans le header, dans la nav.
        case 'list':{
            require_once('includes/core/models/dao/dao_concert.php');
            $concerts = getAgenda();
            require_once("includes/core/views/view_agenda.php");
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
                require_once("includes/core/models/dao/dao_concert.php");
                $artistsOptions = getAllArtists();
                if(empty($_POST)){      // vérifie si le formulaire a été envoyé ou non
                    //j'arrive sur le formulaire vierge
                    $concert = new Concert();
                }
                else{
                    // récupérer le chemin temporaire du fichier uploadé
                    $tmpPath = $_FILES['chConcertPicture']['tmp_name'];
                    $destPath = 'public/img/';
                    //name=nom du fichier
                    $fileName = $_FILES['chConcertPicture']['name'];
    
                    $fullDestName = $destPath.$fileName;
                    
                    if (!move_uploaded_file($tmpPath, $fullDestName)){
                        die("Tu as oublié l'image !");
                    }
                    //le formulaire est validé, j'ai cliqué sur submit
                    $artistId = intVal($_POST["chConcertArtiste"]);
                    
                    $fullArtist = getArtistById($artistId);
                    
                    //nouvelle instance pour composer un nouveau concert ac ttes les données du formulaire
                    $concert = new Concert(
                        //contenu de la parenthese: tout ce qui vient du formulaire
                        htmlspecialchars($_POST["chDate"]),//le champ chName est passé comme argument
                        htmlspecialchars($_POST["chTime"]),//eviter les injections de code
                        htmlspecialchars($_POST["chLibelle"]),
                        $fullArtist,
                        htmlspecialchars($_POST["chConcertDescription"]),
                        htmlspecialchars($fullDestName)
                        
                        );
                        
                        //ici, on appelle la fonction en meme temps qu'on utilise son résultat dans une condition.
                        
                        if(insertConcert($concert)){
                            //si le resultat de la fonction est true, le code suivant est exécuté.
                            $message = "Votre concert a été ajouté. ";
                            header('Location: ?page=agenda&action=list&message='.$message);
                        }
                        else{
                            $message="Erreur d'enregistrement";
                        }
                }
                require_once("includes/core/views/form_concert.php");
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
                require_once("includes/core/models/dao/dao_concert.php");
                require_once("includes/core/models/dao/dao_artiste.php");
                $artistsOptions = getAllArtists();
                //get pour recuperer l'id dans l'url, envoyé par le bouton ac le href. Fait référence à l'id dans le lien de la view artiste.
                //si l'id n'est pas défini, la valeur par defaut sera O.
                $id_concert=$_GET["id"]??0;
                $concert=getConcertById($id_concert);
                
                if(!empty($_POST)){
                    
                    //le formulaire est validé, j'ai cliqué sur submit
                        $concert->setDate($_POST["chDate"]);
                        $concert->setTime($_POST["chTime"]);
                        $concert->setLibelle($_POST["chLibelle"]);
                        $concert->setArtist(getArtistById($_POST["chConcertArtiste"]));
                        //On attend un objet de la classe artiste.la fct va le creer.
                        $concert->setConcertDescription($_POST["chConcertDescription"]);
                        
                        //temporary path. Le fichier est stocké qq part en attendant d'être réaffecté ds la destination choisie.
                        $tmpPath = $_FILES['chConcertPicture']['tmp_name'];
                        //endroit où le fichier sera enregistré. Chemin de destination
                        $destPath = 'public/img/';
                        //nom du fichier uploadé par le formulaire
                        $fileName = $_FILES['chConcertPicture']['name'];
                        //nom complet de la destination: destPath + fileName
                        $fullDestName = $destPath.$fileName;
                        
                        //si le nom de fichier n'est pas vide
                        if($fileName != ""){
                            //si le nom et le chemin du fichier sont différents du fichier d'origine
                            if($fullDestName != $concert->getConcertPic()){
                                move_uploaded_file($tmpPath, $fullDestName);
                                $concert->setConcertPic($fullDestName);
                            }
                        }
                        
                        if(editConcert($concert)){
                            $message = "Les infos ont été modifiées";
                            header('Location: ?page=agenda&action=list&message='.$message);
                        }
                        else{
                            $message="Erreur d'enregistrement";
                        }
                }
                require_once("includes/core/views/form_concert.php");
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
                require_once("includes/core/models/dao/dao_concert.php");
                $id_concert=$_GET["id"]??0;
                
                        if(deleteConcert($id_concert)){
                            $message="Suppression confirmée";
                            header('Location: ?page=agenda&action=list&message='.$message);
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
    