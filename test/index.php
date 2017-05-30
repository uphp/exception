<?php
    require("../src/UphpException.php");
    use src\UphpException;

    function conta($x){
         if (!$x) {
            throw new Exception("Divisao por zero");
         }
        return 1/$x;
    }

    function inverse($x) {
        
        return conta($x);
    }

    try{
       echo inverse(0);
    }catch(Exception $e){
        new UphpException($e);
    }