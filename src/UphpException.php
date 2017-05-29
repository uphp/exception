<?php
    namespace src;

    class UphpException extends \Exception{
        
        public function __construct($e){
            $page = $this->getTemplate("templates/exception.php");
            $page = str_replace("{{ TOP-TITLE }}", self::makeTitle($e->getMessage()), $page);
            echo $page;
        }

        public static function makeTitle($msg){
            $strReturn = "";
            $strReturn .= "<span class=\"uphp-class-error\">GenericError</span>";
            $strReturn .= "<span class=\"uphp-path-error\"> at ".__FILE__."</span>";
            $strReturn .= "<span class=\"uphp-on-line\"> on line 50</span>";
            $strReturn .= "<br>";
            $strReturn .= "<span class=\"uphp-exception-class\">".$msg."</span>";
            return $strReturn;
        }

        private function getTemplate($file) {

		    ob_start(); // start output buffer
		    include $file;
		    $template = ob_get_contents(); // get contents of buffer
		    ob_end_clean();
		    return $template;

		}

        /*public function getMessage(){ echo "getMessage"; }
        public function getCode(){       }
        public function getFile(){       }
        public function getLine(){       }
        public function getTrace(){       }
        public function getTraceAsString(){       }
        public function getPrevious(){       }
        public function __toString(){       }*/
    }