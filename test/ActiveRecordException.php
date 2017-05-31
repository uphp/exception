<?php    
    namespace test;

    ini_set('display_errors', false);
    require("../src/UphpException.php");
    use src\UphpException;

    class ActiveRecord{
        public function save(){
            $a = 0;
            if($a == 0){
                throw new UphpException("Erro ao salvar dados");
            }
            echo 1/$a;            
        }
    }

    
    $a = new ActiveRecord();
    $a->save();        