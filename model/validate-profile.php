<?php
//Gursimran Singh
//01/19/18
//validate-profile.php

//validate email
function validEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

//validate state
function validState($state)
{
    global $f3;
    return in_array($state, $f3->get('states'));
}

//array for collecting errors
$errors = array();

//check errors on profile page
if(!validEmail($email)) {
    $errors['email'] = "Please enter a valid email";
}
if(!validState($state)) {
    $errors['state'] = "Please select a state";
}
if(!isset($seeking))
{
    $errors['seeking'] = "Please select a gender you are interested in";
}
if(empty($bio))
{
    $errors['bio'] = "Please say something about yourself";

}

//get array size
$success = sizeof($errors) == 0;