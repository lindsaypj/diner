<?php

// turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require the autoload file
require_once('vendor/autoload.php');

// Start Session
session_start();

// Test DataLayer
$datalayer = new DataLayer();

// Create an instance of the base class
$f3 = Base::instance();

// Create instance of Controller
$con = new Controller($f3);


////   ROUTES   ////

// Define default route
$f3->route('GET /', function() {
    $GLOBALS['con']->home();
});

// Define Breakfast route
$f3->route('GET /breakfast', function() {
    $GLOBALS['con']->breakfast();
});

// Define Lunch route
$f3->route('GET /lunch', function() {
    $GLOBALS['con']->lunch();
});

// Define Dinner route
$f3->route('GET /dinner', function() {
    $GLOBALS['con']->dinner();
});

// Define Order route
$f3->route('GET|POST /order', function() {
    $GLOBALS['con']->order();
});

// Define Order2 route
$f3->route('GET|POST /order2', function() {
    $GLOBALS['con']->order2();
});

// Define Summary route
$f3->route('GET|POST /summary', function() {
    $GLOBALS['con']->summary();
});

// Define Admin route
$f3->route('GET|POST /admin', function() {
    $GLOBALS['con']->admin();
});


// Run fat-free
$f3->run();
