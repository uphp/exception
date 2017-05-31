<?php
    require("../src/UphpException.php");

    function conta($x){
        return 1/$x;
    }

    function inverse($x) {
        
        return conta($x);
    }

    echo $shuahusa;
    echo inverse(0);
   