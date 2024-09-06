<?php
function autoload($class)
{
    $rootPath = $_SERVER['DOCUMENT_ROOT'];

    $file = $rootPath . "/classes/$class.class.php";

    if (file_exists($file)) {
        require_once $file;
    }
}

spl_autoload_register('autoload');
?>