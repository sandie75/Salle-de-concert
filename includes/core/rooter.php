<?php
    session_start();
    $page = $_GET["page"] ?? "index";
    $action = $_GET["action"] ?? "view";
    
    switch($page){
        case 'index':{
            require_once "includes/core/controllers/controller.php";
            break;
        }
        case 'agenda':{
            require_once "includes/core/controllers/controller_agenda.php";
            break;
        }
        case 'artistes':{
            require_once "includes/core/controllers/controller_artistes.php";
            break;
        }
        case 'reservations':{
            require_once "includes/core/controllers/controller_reservations.php";
            break;
        }
        case 'acces':{
            require_once "includes/core/controllers/controller_acces.php";
            break;
        }
        case 'userform':{
            require_once "includes/core/controllers/controller_user.php";
            break;
        }
        default:{
            require_once "includes/core/controller_error.php";
        }
    }