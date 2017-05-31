<?php    
    namespace test;

    require("../src/UphpException.php");

    class RecordNotFoundException extends \src\UphpException 
    {
        public function __construct()
        {
            parent::__construct("Record not found", "UPhp ActiveRecord");
        }
    }

    class ActiveRecord{
        public function save(){
            $a = 0;
            throw new RecordNotFoundException();
            //echo 1/$a;            
        }
    }

    $a = new ActiveRecord();
    $a->save();