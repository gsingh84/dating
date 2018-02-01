<?php
//Gursimran Singh
//01/19/18
//index.php

//turn on error reporting
error_reporting(E_ALL);
ini_set('display_errors', TRUE);

//Require the autoload file
require_once('vendor/autoload.php');

session_start();

//Create an instance of the Base class
$f3 = Base::instance();

$f3->set('indoors', array('tv','movies', 'cooking', 'board games', 'puzzles', 'reading', 'playing card', 'video games'));
$f3->set('outdoors', array('hiking', 'biking', 'swimming', 'collecting', 'walking', 'climbing'));

//Set debug level
$f3->set('DEBUG', 3);

//Define a default route
$f3->route('GET /', function($f3) {
    $view = new View;
    echo $view->render('pages/home.html');
});

//define a route for personal info
$f3->route('GET|POST /info', function($f3){

    if(isset($_POST['submit']))
    {
        $firstName = $_POST['firstname'];
        $lastName = $_POST['lastname'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];

        include('model/validate.php');
        $f3->set('firstname', $firstName);
        $f3->set('lastname', $lastName);
        $f3->set('age', $age);
        $f3->set('gender', $gender);
        $f3->set('phone', $phone);
    }
    $view = new View;
    echo $view->render('pages/personal-info.html');
});

//Run fat free
$f3->run();