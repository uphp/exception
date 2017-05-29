<?php
    require("../src/UphpException.php");
    use src\UphpException as UphpException;

    function inverse($x) {
        if (!$x) {
            throw new Exception("Divisao por zero");
        }
        return 1/$x;
    }

    try{
       echo inverse(0);
    }catch(Exception $e){
        new UphpException($e);
    }