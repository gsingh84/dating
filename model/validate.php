<?php
session_start();

//validate name
function validName($name)
{
    return ctype_alpha($name) && !empty($name);
}

//validate age
function validAge($age)
{
    return is_numeric($age) && $age > 18;
}

//valid phone
function validPhone($phone)
{
    return is_numeric($phone) && strlen($phone) == 10;
}

//valid outdoor
function validOutdoor($outdoor)
{
    global $f3;
    return in_array($outdoor, $f3->get('outdoor'));
}

//valid indoor
function validIndoor($indoor)
{
    global $f3;
    return in_array($indoor, $f3->get('indoor'));
}

$errors = array();

if(!validName($firstName)) {
    $errors['firstname'] = "Please enter a valid first name";
}
if(!validName($lastName)) {
    $errors['lastname'] = "Please enter a valid last name";
}
if(!validAge($age)) {
    $errors['age'] = "Please enter a valid age";
}
if(!isset($gender))
{
    $errors['gender'] = "Please select a gender";
}
if(!validPhone($phone))
{
    $errors['phone'] = "Please enter a valid phone number";
}

$success = sizeof($errors) == 0;


