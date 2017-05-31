<?php    
    namespace test;

    require("../src/UphpException.php");

    class ActiveRecord{
        public function save(){
            $a = 0;
            echo 1/$a;            
        }
    }

    $a = new ActiveRecord();
    $a->save();