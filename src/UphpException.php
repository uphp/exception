<?php
    namespace src;

    class UphpException extends \Exception{
        
        public function __construct($e){
            //parent::__construct($e);
            $page = $this->getTemplate("templates/exception.php");
            $page = str_replace("{{ TOP-TITLE }}", self::makeTitle($e), $page);
            $page = str_replace("{{ TRACE }}", self::makeTrace($e), $page);
            $page = str_replace("{{ PREVIOUS }}", self::getCodeBlock($e), $page);
            echo $page;
        }

        private static function getCodeBlock(\Exception $e){
            $myFile = $e->getTrace()[0]["file"];
            $lines = file($myFile);//file in to an array
            //return $lines[($e->getTrace()[0]["line"] - 1)]; //line 2
            //return $lines;
            $str = "";
            foreach($lines as $line){
                $str .= $line;
            }
            //var_dump($str);
            return $str;
        }

        private static function makeTitle(\Exception $e)
        {
            $strReturn = "";
            $strReturn .= "<span class=\"uphp-class-error\">Exception throw</span>";
            $strReturn .= "<span class=\"uphp-path-error\"> at ".$e->getFile()."</span>";
            $strReturn .= "<span class=\"uphp-on-line\"> on line ".$e->getLine()."</span>";
            $strReturn .= "<br>";
            $strReturn .= "<span class=\"uphp-exception-class\">".$e->getCode()." :: ".$e->getMessage()."</span>";
            return $strReturn;
        }

        private static function makeTrace(\Exception $e)
        {
            $strReturn = "";
            $i = 1;
            foreach( $e->getTrace() as $trace){ 
                $i == 1 ? $class = "active" : $class = "";
                $strReturn .= "<a href=\"#\" class=\"list-group-item ".$class."\">";
                $strReturn .= "<h4 class=\"list-group-item-heading ".$class."\">".$trace["function"]."</h4>";
                $strReturn .= "<p class=\"list-group-item-text ".$class."\">".$trace["file"].", line ".$trace["line"]."</p>";
                $strReturn .= "</a>";
                $i++;
            }
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