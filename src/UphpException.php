<?php
    namespace src;
    
    require("../src/errorHadler.php");
    set_error_handler("src\uphpErrorHandler");

    class UphpException extends \Exception{
        
        public function __construct($msg = "", $type = "")
        {
            parent::__construct($msg);
            $page = self::getTemplate("templates/exception.php");

            $page = str_replace("{{ TOP-TITLE }}", self::makeTitle($this, $type), $page);
            $page = str_replace("{{ TRACE }}", self::makeTrace($this), $page);
            echo $page;
        }

        private static function getCodeBlock(string $file, int $referenceLine)
        {
            $lines = file($file);
            $i = 1;
            $fileStr = "";
            foreach($lines as $line){
                if($i >= ($referenceLine - 10) && $i <= ($referenceLine + 10)){
                    $fileStr .= $line;
                }
                $i++;
            }
            return str_replace("<?php", "", $fileStr);
        }

        private static function makeTitle(\Exception $e, string $type)
        {
            $strReturn = "";
            $strReturn .= "<span class=\"uphp-type-error\">PHP " . $type . "</span>";
            $strReturn .= "<span class=\"uphp-exception-error\"> - " . self::getClassName() . "</span>";
            $strReturn .= "<br>";
            $strReturn .= "<span class=\"uphp-message-error\">".$e->getMessage()."</span>";
            return $strReturn;
        }

        private static function makeTrace(\Exception $e)
        {
            $strReturn = "";
            $i = 1;
            foreach( $e->getTrace() as $trace){

                if(($trace["line"] - 11) > 1) {
                    $dataLineOffset = "data-line-offset=\"" . ($trace["line"] - 11) . "\"";
                    $dataStart = ($trace["line"] - 10);
                } else {
                     $dataLineOffset = "";
                     $dataStart = 1;
                }               

                if($i == 1) {
                    $control = "OPEN";
                    $display = "style=\"display: block;\"";
                }else{
                    $control = "CLOSE";
                    $display = "style=\"display: none;\"";
                }

                $strReturn .= "<div class=\"row\">";
                    $strReturn .= "<div class=\"col-md-12\">";
                        $strReturn .= "<div class=\"panel\">";
                            $strReturn .= "<div class=\"panel-heading\" onclick=\"closeOpen($(this))\" control=\"" . $control . "\">";
                                $strReturn .= "<h3 class=\"panel-title\">" . $i . ". in " . $trace["file"] . " at line " . $trace["line"] . "</h3>";
                            $strReturn .= "</div>";
                            $strReturn .= "<div " . $display . "class=\"panel-body\" >";
                                $strReturn .= "<pre " . $dataLineOffset . " data-start=\"" . $dataStart . "\" data-line=\"" . $trace["line"] . "\" class=\"line-numbers\"><code class=\"language-php\">" . self::getCodeBlock($trace["file"], $trace["line"]) . "</code></pre>";
                            $strReturn .= "</div>";
                        $strReturn .= "</div>";
                    $strReturn .= "</div>";
                $strReturn .= "</div>";

                $i++;
            }
            return $strReturn;
        }

        private static function getTemplate($file)
        {

		    ob_start(); // start output buffer
		    include $file;
		    $template = ob_get_contents(); // get contents of buffer
		    ob_end_clean();
		    return $template;

		}

        private static function getClassName()
        {
            $classNameCalled = get_called_class();
            $classNameArray = explode("\\", $classNameCalled);
            return end($classNameArray);
        }
    }