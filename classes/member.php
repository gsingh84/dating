<?php
//Gursimran Singh
//02/16/18
//member.php

class Member
{
    //fields
    protected $fname;
    protected $lname;
    protected $age;
    protected $gender;
    protected $phone;
    protected $email;
    protected $state;
    protected $seeking;
    protected $bio;

    //Member class constructor
    public function __construct($fname, $lname, $age, $gender, $phone)
    {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->age = $age;
        $this->gender = $gender;
        $this->phone = $phone;
    }

    //set first name
    public function setFname($fname)
    {
        $this->fname = $fname;
    }

    //set last name
    public function setLname($lname)
    {
        $this->lname = $lname;
    }

    //set age
    public function setAge($age)
    {
        $this->age = $age;
    }

    //set gender
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    //set phone number
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    //get first name
    public function getFname()
    {
        return $this->fname;
    }

    //get last name
    public function getLname()
    {
        return $this->lname;
    }

    //get age
    public function getAge()
    {
        return $this->age;
    }

    //get email
    public function getEmail()
    {
        return $this->email;
    }

    //set email address
    public function setEmail($email)
    {
        $this->email = $email;
    }

    //getter for getting state
    public function getState()
    {
        return $this->state;
    }

    //set state
    public function setState($state)
    {
        $this->state = $state;
    }

    //get user seeking interest
    public function getSeeking()
    {
        return $this->seeking;
    }

    //set seeking
    public function setSeeking($seeking)
    {
        $this->seeking = $seeking;
    }

    //get user bio
    public function getBio()
    {
        return $this->bio;
    }

    //set bio
    public function setBio($bio)
    {
        $this->bio = $bio;
    }

    //get gender
    public function getGender()
    {
        return $this->gender;
    }

    //get phone number
    public function getPhone()
    {
        return $this->phone;
    }
}