<?php

// turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Start Session
session_start();

// Require the autoload file
require_once('vendor/autoload.php');
require_once('model/data-layer.php');

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
$f3->route('GET /order', function($f3) {
    // Add meals to Fat-Free hive
    $f3->set('meals', getMeals());

    $view = new Template();
    echo $view->render('views/order_form1.html');
});

// Define Order2 route
$f3->route('POST /order2', function($f3) {

    // Add meals to Fat-Free hive
    $f3->set('condiments', getCondiments());

    // Move Order Form 1 data to session
    $_SESSION['food'] = $_POST['food'];
    $_SESSION['meal'] = $_POST['meal'];

    $view = new Template();
    echo $view->render('views/order_form2.html');
});

// Define Summary route
$f3->route('POST /summary', function() {
    $conds = empty($_POST['conds']) ? "" : implode(", ", $_POST['conds']);
    $_SESSION['conds'] = $conds;

    $view = new Template();
    echo $view->render('views/order_summary.html');
});


// Run fat-free
$f3->run();
