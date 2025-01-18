<?php
    require_once('includes/core/models/bdd.php');
    require_once('includes/core/models/classes/User.php');
    
    
    function getAllUsers(): array{
        $conn = getConnexion();

        $SQLQuery = "SELECT u.id_users, u.name, u.firstname, u.password, u.email, u.message
            FROM users as u 
            ORDER BY u.nom ASC";

        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->execute();

        $userList = array();
        while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
            $user = new User($SQLRow['name'], $SQLRow['firstname'], $SQLRow['password'], $SQLRow['email'],
                $SQLRow['message']);

            $user->setId($SQLRow['id_users']);

            $userList[] = $user;
        }

        $SQLStmt->closeCursor();

        return $userList;
    }
    
    function userExists(string $login): bool{
        $conn = getConnexion();

        $SQLQuery = "
            SELECT COUNT(id) as existe
            FROM connexion
            WHERE login = :login
        ";

        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':login', $login, PDO::PARAM_STR);
        $SQLStmt->execute();

        $SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
        $loginTrouve = $SQLRow['existe'];

        $SQLStmt->closeCursor();

        return ($loginTrouve > 0);
    }

    function checkAuth(string $login): string{
        $conn = getConnexion();

        $SQLQuery = "
            SELECT password
            FROM connexion
            WHERE login = :login
        ";

        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':login', $login, PDO::PARAM_STR);
        $SQLStmt->execute();

        $SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
        $motDePasseStocke = $SQLRow['password'];

        $SQLStmt->closeCursor();
        // Pour hash le mot de passe plus tard
        return $motDePasseStocke;
    }
    
    function getUserIdByLogin(string $login): int{
        $conn = getConnexion();

        $SQLQuery = "
            SELECT id
            FROM connexion
            WHERE login = :login
        ";

        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':login', $login, PDO::PARAM_STR);
        $SQLStmt->execute();

        $SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
        $id = $SQLRow['id'];

        $SQLStmt->closeCursor();
        return ($id);

    }
    
    function insertAdmin(): bool {
        $conn = getConnexion();
        
        // INSERT INTO `connexion`(`id`, `login`, `password`) VALUES ('[value-1]','[value-2]','[value-3]')
        $SQLQuery = "INSERT INTO `connexion`(`login`, `password`) VALUES (:login, :password)";

        $login = "admin";
        $mdp = password_hash("bdx2023",PASSWORD_DEFAULT);
        
        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':login', $login, PDO::PARAM_STR);
        $SQLStmt->bindValue(':password', $mdp, PDO::PARAM_STR);

        if (!$SQLStmt->execute()){
            return false;
        }else{
            return true;
        }
    }
    
    