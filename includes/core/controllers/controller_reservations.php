<?php
    require_once('includes/core/models/dao/dao_concert.php');
   
    $concerts = getConcerts();
    
    require_once("includes/core/views/view_reservations.php");