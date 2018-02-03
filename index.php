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
$f3->route('GET /', function() {
    $_SESSION = array();
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

        //set user values in session
        $_SESSION['fname'] = $firstName;
        $_SESSION['lname'] = $lastName;
        $_SESSION['age'] = $age;
        $_SESSION['gender'] = $gender;
        $_SESSION['phone'] = $phone;

        //set fat free errors array
        $f3->set('errors', $errors);

        if($success) {
            $_SESSION['page1'] = 'success';
            //redirect to next page
            header("Location: http://gsingh.greenriverdev.com/328/dating/profile");
        }
    }

    //display personal info page
    $template = new Template();
    echo $template->render('pages/personal-info.html');
});

$f3->route('GET|POST /profile', function($f3){
    if(isset($_POST['submit']))
    {
        //get user input
        $email = $_POST['email'];
        $state = $_POST['state'];
        $seeking = $_POST['seeking'];
        $bio = $_POST['bio'];

        //include file
        include('model/validate-profile.php');
        //set values in session
        $_SESSION['email'] = $email;
        $_SESSION['state'] = $state;
        $_SESSION['seeking'] = $seeking;
        $_SESSION['bio'] = $bio;

        //set fat free errors array
        $f3->set('errors', $errors);

        //move to next page if success
        if($success)
        {
            $_SESSION['page2'] = 'success';
            header("Location: http://gsingh.greenriverdev.com/328/dating/interests");
        }
    }

    //display personal info page
    $template = new Template();
    echo $template->render('pages/profile.html');
});

$f3->route('GET|POST /interests', function($f3){

    if(isset($_POST['submit']))
    {
        //get user input values
        $indoor = $_POST['indoors'];
        $outdoor = $_POST['outdoors'];

        //set session values
        $_SESSION['indoor'] = $indoor;
        $_SESSION['outdoor'] = $outdoor;

        //set error message
        if(!isset($indoor) && !isset($outdoor)) {
            $f3->set('error', 'Please select at least one interest');
        } else { //store all selected interests in session if success
            if(!isset($outdoor))
                $interests = $indoor;
            elseif (!isset($indoor))
                $interests = $outdoor;
            else
                $interests = array_merge($indoor, $outdoor); //merge array
            $_SESSION['interests'] = $interests;
            $_SESSION['page3'] = 'success';
            header("Location: http://gsingh.greenriverdev.com/328/dating/summary");
        }

    }

    //display personal info page
    $template = new Template();
    echo $template->render('pages/interests.html');
});

$f3->route('GET|POST /summary', function(){
    //check all the pages are completed before proceeding to the summary page
    if(!isset($_SESSION['page1']) || !isset($_SESSION['page2']) || !isset($_SESSION['page3']))
    {
        header("Location: http://gsingh.greenriverdev.com/328/dating/interests?success=no");
    }
    //display personal info page
    $template = new Template();
    echo $template->render('pages/summary.html');
});

//Run fat free
$f3->run();