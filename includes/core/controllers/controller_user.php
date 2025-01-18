<?php
    switch ($action){
        case 'list':{
            require_once("includes/core/views/connexion_form.php");
            break;
        }
        case 'login':{
                require_once "includes/core/models/dao/dao_user.php";
                if (!empty($_POST)){
                    $loginSaisi = htmlspecialchars($_POST['login']);
                    $mdpSaisi = htmlspecialchars($_POST['password']);
                    
                    if (userExists($loginSaisi))
                    {
                        //checkAuth verifie si le login et mdp corresp à un enregistrement ds la bdd
                        $mdpBDD = checkAuth($loginSaisi, $mdpSaisi);
                        if(password_verify($mdpSaisi,$mdpBDD))
                        {
                            $_SESSION['login'] = $loginSaisi;
                            $_SESSION['iduser'] = getUserIdByLogin($loginSaisi);
                            
                            $message = "Vous etes bien connecté en tant que admin";
                            header('Location: index.php?message='.$message);
                        }
                        else
                        {
                            $message = "Mauvaises informations d'identification !";
                        }
                    }
                    else
                    {
                        $message = "Cet utilisateur n'existe pas !";
                    }
                }
                require_once("includes/core/views/view_homepage.php");
                break;
            }
        case "createAdmin" : 
            {
                require_once "includes/core/models/dao/dao_user.php";
                if(insertAdmin())
                {
                    echo "admin OK";
                }
                else
                {
                    echo "admin NON";
                }
                break;
            }
        case 'logout':{
            if (isset($_SESSION['login'])){
                unset($_SESSION['login']);
            }
            header('Location: index.php');
            break;
        }

        default:{

        }
    }

?>