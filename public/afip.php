<?php
    include_once("./AfiPHP/Auth/WSAAAuth.php");
    echo "TOKEN testing AFIPHP";
        
    $nacho = new WSAAAuth("./AfiPHP/Keys/certificate.crt", "./AfiPHP/Keys/Laravel");
        
    dd($nacho);
            
    echo "EndToken";
?>