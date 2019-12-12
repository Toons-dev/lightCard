<?php
session_start();

/**
 * Composer Autoload
 */
require __DIR__ . '/vendor/autoload.php';

/**
 * Require Config files in the right order
 */
require 'config/aliases.php';
require 'config/config.php';
require 'config/helpers.php';
require 'config/Db.php';
require 'config/classes/form.class.php';

/**
 * Autoload Classes
 */
spl_autoload_register (function ($class) {

    $sources = array_map(function($s) use ($class) {
        return $s . '/' . $class . '.php';
    },
    CLASSES_SOURCES);
    
    foreach ($sources as $source) {
        if (file_exists($source)) {
            require_once $source;
        } 
    } 
});


/**
 * Require routes
 */
require 'routes.php';