<?php
    require_once('includes/core/models/bdd.php');
    require_once('includes/core/models/classes/Concert.php');
    require_once('includes/core/models/dao/dao_artiste.php');
    
    function getConcertById($id_concert){
        //pour récupérer un concert à partir de son identifiant et retourner un objet Concert correspondant.
        //$id_concert ds l'argument represente le concert qu'on souhaite récupérer.
        $conn = getConnexion();

        $SQLQuery = "SELECT id_concert, date, time, libelle, artistes.id_artistes, concert.id_artistes, concert_description, concert_pic FROM concert
        INNER JOIN artistes on artistes.id_artistes = concert.id_artistes
        WHERE id_concert = :id_concert";
        //La requête préparée contient un paramètre :id_concert qui sera substitué par la valeur du paramètre $id_concert.
        $SQLStmt = $conn->prepare($SQLQuery);
        //Elle utilise la méthode bindValue() pour lier la valeur de $id_concert au paramètre :id_concert
        $SQLStmt->bindValue(':id_concert', $id_concert, PDO::PARAM_INT);
        $SQLStmt->execute();

        $SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
        $concert = new Concert($SQLRow['date'],$SQLRow['time'], $SQLRow['libelle'], getArtistById($SQLRow ['id_artistes']), $SQLRow['concert_description'], $SQLRow['concert_pic']);
        $concert->setId($SQLRow['id_concert']);

        $SQLStmt->closeCursor();
        return $concert;
    }
    
    function getConcerts(){
        $conn = getConnexion();

        $SQLQuery = "SELECT
                        `id_concert`,
                        `date`,
                        `time`,
                        `libelle`,
                        name,
                        `concert_description`,
                        `concert_pic`
                        
                    FROM
                        `concert`
                    INNER JOIN artistes
                    ON concert.id_artistes=artistes.id_artistes
                ";

        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->execute();

        $concertsList = array();
        $concertsList = $SQLStmt -> fetchAll();
        $SQLStmt->closeCursor();
        return $concertsList;
    }
 
 /*fonction getAgenda du départ*/
 function getAgenda(){
        $conn = getConnexion();

        $SQLQuery = "SELECT
                        `id_concert`,
                        `date`,
                        `time`,
                        `libelle`,
                        id_artistes,
                        `concert_description`,
                        `concert_pic`
                    FROM
                        `concert`
                    ";

        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->execute();

        $concertsList = array();

        while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
            $concert = new Concert($SQLRow['date'], $SQLRow['time'], $SQLRow['libelle'], 
                       getArtistById($SQLRow['id_artistes']), $SQLRow['concert_description'], $SQLRow['concert_pic']);

            $concert->setId($SQLRow['id_concert']);
            $concertsList[] = $concert;
        }
        $SQLStmt->closeCursor();
        return $concertsList;
    }
 
    
/*fonction getAgenda alternative    
    function getAgenda(){
        $conn = getConnexion();

        $SQLQuery = "SELECT
                        `id_concert`,
                        `date`,
                        `time`,
                        `libelle`,
                        id_artistes,
                        `concert_description`,
                        `concert_pic`
                    FROM
                        `concert`
                    ";

        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->execute();

        $concertsList = array();

        while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
            // on extrait la valeur de la colonne id_artistes de la ligne des résultats de la requête SQL et on l'assigne à la variable $artistId.
            $artistId = $SQLRow['id_artistes'];
            $concert = new Concert(
                $SQLRow['date'], 
                $SQLRow['time'], 
                $SQLRow['libelle'], 
                       /*getArtistById($SQLRow['id_artistes'])*/
                       //si $artistId est true, alors la 1e expression apres le ? est exécutée, sinon null apres les : sera retourné dans le constructeur de concert comme valeur de l'artiste.
                /*$artistId ? getArtistById($artistId) : null, 
                $SQLRow['concert_description'], 
                $SQLRow['concert_pic']
            );

            $concert->setId($SQLRow['id_artistes']);
            $concertsList[] = $concert;
        }
        $SQLStmt->closeCursor();
        return $concertsList;
        
    }*/
    
    
    
    //La fonction editConcert prend un objet de type Artiste en paramètre et renvoie un booléen pour indiquer si 
    //la mise à jour de l'artiste a bien été effectuée dans la base de données.
//les parentheses: lors de l'appel de cette fonction, il faudra passer un objet de type(de la classe) Artiste en argument.
    //cela signifie que $newArtiste doit être un objet de la classe Artiste.
    // d'ailleurs, on trouve l'instanciation(new Artiste)dans le controller.
    //attention, cet objet de la classe Artiste ne sera pas forcement appelé $newArtiste. C'est juste un nom pour representer 
    // le paramètre.
    function insertConcert(Concert $newConcert): bool {
        $conn = getConnexion();

        $SQLQuery = "INSERT INTO concert(date, time, libelle, id_artistes, concert_description, concert_pic)
        VALUES (:date, :time, :libelle, :id_artistes, :concert_description, :concert_pic)";

        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':date', $newConcert->getDate(), PDO::PARAM_STR);
        $SQLStmt->bindValue(':time', $newConcert->getTime(), PDO::PARAM_STR);
        $SQLStmt->bindValue(':libelle', $newConcert->getLibelle(), PDO::PARAM_STR);
        $SQLStmt->bindValue(':id_artistes', $newConcert->getArtist()->getId(), PDO::PARAM_INT);
        $SQLStmt->bindValue(':concert_description', $newConcert->getConcertDescription(), PDO::PARAM_STR);
        $SQLStmt->bindValue(':concert_pic', $newConcert->getConcertPic(), PDO::PARAM_STR);

        if (!$SQLStmt->execute()){
            return false;
        }else{
            return true;
        }
    }
    
    //La fonction editConcert prend un objet de type Artiste en paramètre et renvoie un booléen pour indiquer si 
    //la mise à jour de l'artiste a bien été effectuée dans la base de données.
//les parentheses: lors de l'appel de cette fonction, il faudra passer un objet de type(de la classe) Artiste en argument.
    //cela signifie que $editArtiste doit être un objet de la classe Artiste.
    function editConcert(Concert $editConcert) : bool{
        $conn = getConnexion();

        $SQLQuery = "UPDATE concert 
                    SET date = :date, time = :time, libelle = :libelle, id_artistes = :id_artistes, concert_description =:concert_description, concert_pic = :concert_pic
                    WHERE id_concert = :id_concert";

        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':id_concert', $editConcert->getId(), PDO::PARAM_INT);//lier id de l'artiste
        $SQLStmt->bindValue(':date', $editConcert->getDate(), PDO::PARAM_STR);
        $SQLStmt->bindValue(':time', $editConcert->getTime(), PDO::PARAM_STR);
        $SQLStmt->bindValue(':libelle', $editConcert->getLibelle(), PDO::PARAM_STR);
        $SQLStmt->bindValue(':id_artistes', $editConcert->getArtist()->getId(), PDO::PARAM_INT);
        $SQLStmt->bindValue(':concert_description', $editConcert->getConcertDescription(), PDO::PARAM_STR);
        $SQLStmt->bindValue(':concert_pic', $editConcert->getConcertPic(), PDO::PARAM_STR);
        return $SQLStmt->execute();
    }
    
    function deleteConcert(int $deleteConcert) : bool{
        $conn = getConnexion();

        $SQLQuery = "DELETE FROM concert WHERE id_concert = :id_concert";
        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':id_concert', $deleteConcert, PDO::PARAM_INT);

        return $SQLStmt->execute();
    }       
           
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
            