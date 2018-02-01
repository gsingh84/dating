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
$f3->set('states', array('Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware', 'District of Columbia', 'Florida', 'Georgia', 'Hawaii', 'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana', 'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire', 'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota', 'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island', 'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont', 'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'));

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
        //get user input
        $firstName = $_POST['firstname'];
        $lastName = $_POST['lastname'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];

        //include file
        include('model/validate.php');
        //set user values into fat free
        $f3->set('firstname', $firstName);
        $f3->set('lastname', $lastName);
        $f3->set('age', $age);
        $f3->set('gender', $gender);
        $f3->set('phone', $phone);
        $f3->set('errors', $errors);
        $f3->set('success', $success);

        //set values in session if success
        if($success) {
            $_SESSION['firstname'] = $firstName;
            $_SESSION['lastname'] = $lastName;
            $_SESSION['age'] = $age;
            $_SESSION['gender'] = $gender;
            $_SESSION['phone'] = $phone;

            //redirect to next page
            header("Location: http://gsingh.greenriverdev.com/328/dating/profile");
            exit; //exit page
        }
    }

    //display personal info page
    $template = new Template();
    echo $template->render('pages/personal-info.html');
});

$f3->route('GET|POST /profile', function($f3){

    //get user input
    $email = $_POST['email'];
    $state = $_POST['state'];

    //set values in fat free
    $f3->set('email', $email);
    $f3->set('state', $state);
    //display personal info page
    $template = new Template();
    echo $template->render('pages/profile.html');
});

//Run fat free
$f3->run();