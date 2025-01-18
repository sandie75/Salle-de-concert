<?php
    require_once('includes/core/models/bdd.php');
    require_once('includes/core/models/classes/Artiste.php');
    
    
    function getAllArtists(){
        $conn = getConnexion();

        $SQLQuery = "SELECT id_artistes,name,description,picture,instrument FROM artistes ORDER BY name ASC";

        $SQLStmt = $conn->prepare($SQLQuery);
        //la requete preparee est executee en appelant la methode execute
        $SQLStmt->execute();
        //tableau vide créé pour stocker les objets artistes.
        $listeArtistes = array();
        
        //boucle while pour parcourir les résultats de la requete avec la methode fetch.
        while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
            //A chaque itération, on crée une nouvelle instance de la classe artiste en utilisant les valeurs des 
            //colonnes name,etc.
            $unArtiste = new Artiste($SQLRow['name'], $SQLRow['description'], $SQLRow['picture'], $SQLRow['instrument']);
            //On appelle la fonction setId créée dans la classe Artiste pour attribuer la valeur de la colonne id_artiste
            //à l'objet artiste
            $unArtiste->setId($SQLRow['id_artistes']);
            //les objets unArtiste sont stockés dans le tableau listeArtistes 
            $listeArtistes[] = $unArtiste;
        }
        //la méthode closeCursor() est appelée pour libérer les ressources de la requête préparée.
        $SQLStmt->closeCursor();
        return $listeArtistes;  
        
    }
    
    function getArtistById($id_artistes){
        $conn = getConnexion();

        $SQLQuery = "SELECT id_artistes,name,description,picture, instrument FROM artistes WHERE id_artistes = :id_artistes";

        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':id_artistes', $id_artistes, PDO::PARAM_INT);
        $SQLStmt->execute();

        $SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
        $artist = new Artiste($SQLRow['name'],$SQLRow['description'], $SQLRow['picture'], $SQLRow['instrument']);
        $artist->setId($SQLRow['id_artistes']);

        $SQLStmt->closeCursor();
        return $artist;
    }
    
    function getArtistByName($name){
        $conn = getConnexion();
        $SQLQuery = "SELECT id_artistes,name,description,picture, instrument FROM artistes WHERE name = :name";
        
        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':name', $name, PDO::PARAM_STR);
        $SQLStmt->execute();

        $SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
        $artist = new Artiste($SQLRow['name'],$SQLRow['description'], $SQLRow['picture'], $SQLRow['instrument']);
        //recupere l'id
        $artist->setId($SQLRow['id_artistes']);

        $SQLStmt->closeCursor();
        return $artist;
    }
    
    function insertArtiste(Artiste $newArtiste): bool {
        $conn = getConnexion();

        $SQLQuery = "INSERT INTO artistes(name, description, picture, instrument)
        VALUES (:name, :description, :picture, :instrument)";
        //Les valeurs des propriétés de l'objet $editArtiste sont liées aux marqueurs de paramètres à l'aide de 
        // la méthode bindValue() de l'objet de requête préparée. 
        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':name', $newArtiste->getName(), PDO::PARAM_STR);
        $SQLStmt->bindValue(':description', $newArtiste->getDescription(), PDO::PARAM_STR);
        $SQLStmt->bindValue(':picture', $newArtiste->getPicture(), PDO::PARAM_STR);
        $SQLStmt->bindValue(':instrument', $newArtiste->getInstrument(), PDO::PARAM_STR);

        if (!$SQLStmt->execute()){
            return false;
        }else{
            return true;
        }
    }
    
    //La fonction editArtiste prend un objet de type Artiste en paramètre et renvoie un booléen pour indiquer si 
    //la mise à jour de l'artiste a bien été effectuée dans la base de données.
    function editArtiste(Artiste $editArtiste) : bool{
        $conn = getConnexion();

        $SQLQuery = "UPDATE artistes 
                    SET name = :name, description = :description, picture = :picture, instrument = :instrument
                    WHERE id_artistes = :id_artistes";

        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':id_artistes', $editArtiste->getId(), PDO::PARAM_INT);//lier id de l'artiste
        $SQLStmt->bindValue(':name', $editArtiste->getName(), PDO::PARAM_STR);
        $SQLStmt->bindValue(':description', $editArtiste->getDescription(), PDO::PARAM_STR);
        $SQLStmt->bindValue(':picture', $editArtiste->getPicture(), PDO::PARAM_STR);
        $SQLStmt->bindValue(':instrument', $editArtiste->getInstrument(), PDO::PARAM_STR);
        return $SQLStmt->execute();
    }
    
    function deleteArtiste(int $deleteArtiste) : bool{
        $conn = getConnexion();

        $SQLQuery = "DELETE FROM artistes WHERE id_artistes = :id_artistes";
        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':id_artistes', $deleteArtiste, PDO::PARAM_INT);

        return $SQLStmt->execute();
    }       
           
           
           
           
           
            
            