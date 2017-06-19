<?php
namespace src;
    
function uphpErrorHandler($errno, $errstr, $errfile, $errline)
{
    //echo "Numero: " . $errno . "| Texto: " . $errstr . "| Arquivo: " . $errfile . "| Linha: " . $errline;

    if (! (error_reporting() & $errno)) {
        return;
    }

    $errorType = array (
        E_ERROR => 'PHP Error',
        E_WARNING => 'PHP Warning',
        E_PARSE => 'PHP Parsing Error',
        E_NOTICE => 'PHP Notice',
        E_CORE_ERROR => 'PHP Core Error',
        E_CORE_WARNING => 'PHP Core Warning',
        E_COMPILE_ERROR => 'PHP Compile Error',
        E_COMPILE_WARNING => 'PHP Compile Warning',
        E_USER_ERROR => 'PHP User Error',
        E_USER_WARNING => 'PHP User Warning',
        E_USER_NOTICE => 'PHP User Notice',
        E_STRICT => 'PHP Strict Notice',
        E_RECOVERABLE_ERROR => 'PHP Recoverable Error'
    );

    if (array_key_exists($errno, $errorType)) {
        $errTypeStr = $errorType[$errno];
    } else {
        $errTypeStr = 'Caught Exception';
    }

    throw new UphpException($errstr, $errTypeStr);
}

function uphpExceptionHandler($ex)
{
    throw new UphpException($ex->getMessage(), "Caught Exception", $ex);
}
