<?php
namespace src;

require("errorHadler.php");

class UphpException extends \Exception
{
        
    public function __construct($msg = "", $type = "", $exObj = null)
    {
        ini_set('display_errors', false);
        parent::__construct($msg);
        $page = self::getTemplate("templates/exception.php");

        if ($exObj == null) {
            $object = $this;
        } else {
            $object = $exObj;
        }

        $page = str_replace("{{ TOP-TITLE }}", self::makeTitle($object, $type), $page);
        $page = str_replace("{{ TRACE }}", self::makeTrace($object), $page);
        //ob_clean();
        echo $page;
        exit;
    }

    private static function getCodeBlock(string $file = null, int $referenceLine = null)
    {
        if (! $file == null) {
            $lines = file($file);
            $i = 1;
            $fileStr = "";
            foreach ($lines as $line) {
                if ($referenceLine == null) {
                    break;
                }
                if ($i >= ($referenceLine - 10) && $i <= ($referenceLine + 10)) {
                    $fileStr .= $line;
                    //echo $line;
                }
                $i++;
            }
            $returnBlock = str_replace("<?php", "", $fileStr);
            $returnBlock = str_replace("<?=", "", $returnBlock);
            $returnBlock = str_replace("<?", "", $returnBlock);
            $returnBlock = str_replace("?>", "", $returnBlock);
            return $returnBlock;
        }
    }

    private static function makeTitle($e, string $type)
    {
        $strReturn = "<span class=\"uphp-type-error\">" . $type . "</span>";
        $strReturn .= "<span class=\"uphp-exception-error\"> - " . self::getClassName() . "</span>";
        $strReturn .= "<br>";
        $strReturn .= "<span class=\"uphp-message-error\">" . $e->getMessage() . "</span>";
        return $strReturn;
    }

    private static function makeTrace($e)
    {
        $strReturn = "";
        $i = 1;
        $control = false;
        
        foreach ($e->getTrace() as $trace) {
            if (isset($trace["line"])) {
                $traceFile = str_replace("\\", "/", $trace["file"]);
                $ar = explode("/", $traceFile);
                $fr = end($ar);
                
                //echo $e->uphpFile;
                if (isset($e->uphpFile)) {
                    if ($e->uphpFile != null) {
                        if (! $control) {
                            if ($e->file != $fr) {
                                $control = true;
                                continue;
                            }
                        }
                    }
                }

                if (($trace["line"] - 11) >= 1) {
                    $dataLineOffset = "data-line-offset=\"" . ($trace["line"] - 11) . "\"";
                    $dataStart = ($trace["line"] - 10);
                } else {
                    $dataLineOffset = "";
                    $dataStart = 1;
                }

                if ($i == 1) {
                    $control = "OPEN";
                    $display = "style=\"display: block;\"";
                } else {
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
            }
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
