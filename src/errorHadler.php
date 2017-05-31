<?php
namespace src;
    
function uphpErrorHandler($errno, $errstr, $errfile, $errline)
{
    ini_set('display_errors', false);
    if (!(error_reporting() & $errno)) {
        return;
    }

    $errorType = array (
        E_ERROR => 'Error',
        E_WARNING => 'Warning',
        E_PARSE => 'Parsing Error',
        E_NOTICE => 'Notice',
        E_CORE_ERROR => 'Core Error',
        E_CORE_WARNING => 'Core Warning',
        E_COMPILE_ERROR => 'Compile Error',
        E_COMPILE_WARNING => 'Compile Warning',
        E_USER_ERROR => 'User Error',
        E_USER_WARNING => 'User Warning',
        E_USER_NOTICE => 'User Notice',
        E_STRICT => 'Strict Notice',
        E_RECOVERABLE_ERROR => 'Recoverable Error'
    );

    if (array_key_exists($errno, $errorType)) {
        $errTypeStr = $errorType[$errno];
    } else {
        $errTypeStr = 'Caught Exception';
    }

    throw new UphpException($errstr, $errTypeStr);
}