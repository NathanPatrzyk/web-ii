<?php

function autoload_classes($class)
{
    $rootPath = $_SERVER['DOCUMENT_ROOT'];

    $file = $rootPath . "/app/classes/$class.class.php";

    if (file_exists($file)) {
        require_once $file;
    }
}

function autoload_helpers($helper)
{
    $rootPath = $_SERVER['DOCUMENT_ROOT'];

    $file = $rootPath . "/app/helpers/$helper.class.php";

    if (file_exists($file)) {
        require_once $file;
    }
}

spl_autoload_register('autoload_classes');
spl_autoload_register('autoload_helpers');