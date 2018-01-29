<?php
//Gursimran Singh
//01/19/18
//index.php

//turn on error reporting
error_reporting(E_ALL);
ini_set('display_errors', TRUE);

//Require the autoload file
require_once('vendor/autoload.php');

//Create an instance of the Base class
$f3 = Base::instance();

$f3->set('indoors', array('tv','movies', 'cooking', 'board games', 'puzzles', 'reading', 'playing card', 'video games'));
$f3->set('outdoors', array('hiking', 'biking', 'swimming', 'collecting', 'walking', 'climbing'));

//Set debug level
$f3->set('DEBUG', 3);

//Define a default route
$f3->route('GET /', function($f3) {
    $f3->set('title', 'int');
    $view = new View;
    echo $view->render('pages/interests.html');
});

//Run fat free
$f3->run();