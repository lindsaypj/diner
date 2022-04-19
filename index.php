<?php

// turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require the autoload file
require_once('vendor/autoload.php');

// Create an instance of the base class
$f3 = Base::instance();

// Define default route
$f3->route('GET /', function() {
//    echo "Diner Project";

    $view = new Template();
    echo $view->render('views/home.html');
});

// Run fat-free
$f3->run();
