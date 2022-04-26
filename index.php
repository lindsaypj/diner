<?php

// turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require the autoload file
require_once('vendor/autoload.php');

// Create an instance of the base class
$f3 = Base::instance();


////   ROUTES   ////

// Define default route
$f3->route('GET /', function() {
//    echo "Diner Project";

    $view = new Template();
    echo $view->render('views/home.html');
});

// Define Breakfast route
$f3->route('GET /breakfast', function() {
    $view = new Template();
    echo $view->render('views/breakfast.html');
});

// Define Lunch route
$f3->route('GET /lunch', function() {
    $view = new Template();
    echo $view->render('views/lunch.html');
});

// Define Dinner route
$f3->route('GET /dinner', function() {
    echo "Dinner Page";
//    $view = new Template();
//    echo $view->render('views/dinner.html');
});

// Define Order route
$f3->route('GET /order', function() {
    $view = new Template();
    echo $view->render('views/order_form.html');
});


// Run fat-free
$f3->run();
