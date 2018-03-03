<?php
//Gursimran Singh
//02/16/18
//member.php

/**
 * The Member class represents a regular member account.
 *
 * The Member class represents a member with a name, age
 * gender and phone. User can create regular account with
 * this class.
 * @author Gursimran Singh
 * @copyright 2018
 */
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

    /**
     * This creates new Member class object, that stores member
     * basic information.
     *
     * @param $fname member first name
     * @param $lname member last name
     * @param $age member age
     * @param $gender member gender
     * @param $phone member phone number
     */
    public function __construct($fname, $lname, $age, $gender, $phone)
    {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->age = $age;
        $this->gender = $gender;
        $this->phone = $phone;
    }

    /**
     * This is a method for setting and validating the first name data type.
     * It stores only if the all characters are alphabets and string length
     * is less than 20.
     * @param $fname member first name
     */
    public function setFname($fname)
    {
        //set fname if all characters are alpha and number if char
        //less than 20
        if(ctype_alpha($fname) && strlen($fname) < 20)
            $this->fname = $fname;
        else //other wise store null
            $this->fname = null;
    }

    /**
     * This is a method for setting and validating the last name data type.
     * It stores only if the all characters are alphabets and string length
     * is less than 20.
     * @param $lname member last name
     */
    public function setLname($lname)
    {
        //set lname if all characters are alpha and number if char
        //less than 20
        if(ctype_alpha($lname) && strlen($lname) < 20)
            $this->lname = $lname;
        else //other wise store null
            $this->$lname = null;
    }

    /**
     * This is a method for setting and validating the age data type.
     * It stores only if the data type is numeric and non-negative.
     * @param $age
     */
    public function setAge($age)
    {
        //set age if the value is numeric and no-negative
        if(is_numeric($age) && $age > 0)
            $this->age = $age;
        else //other wise set it to zero
            $this->age = 0;
    }

    /**
     * This is a setter for setting and validating the gender data type.
     * It stores only if the data type is alpha and either male or female.
     * @param $gender
     */
    public function setGender($gender)
    {
        //set gender if the value is alpha and either male or female
        if(ctype_alpha($gender) && ($gender == 'Male' || $gender == 'Female'))
            $this->gender = $gender;
        else //other wise set it to null
            $this->$gender = null;
    }

    /**
     * This is a setter for setting the phone number of the member.
     * @param $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * This is a getter for getting the first name of the member.
     * @return this returns member's first name
     */
    public function getFname()
    {
        return $this->fname;
    }

    /**
     * This is a getter for getting the last name of the member.
     * @return this returns member's last name
     */
    public function getLname()
    {
        return $this->lname;
    }

    /**
     * This is getter for getting the age of the member.
     * @return this returns member's age
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * This is a getter for getting email of the member.
     * @return this returns member's email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * This is setter for setting the email.
     * @param $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * This is a getter for getting the state of the member.
     * @return this returns member's state
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * This is setter for setting the state of the member.
     * @param $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * This is getter for getting the seeking field.
     * @return this returns seeking
     */
    public function getSeeking()
    {
        return $this->seeking;
    }

    /**
     * This is a method for setting the seeking field.
     * @param $seeking
     */
    public function setSeeking($seeking)
    {
        $this->seeking = $seeking;
    }

    /**
     * This is a getter for setting the member bio field.
     * @return this returns bio
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * This is a method for setting the bio field.
     * @param $bio
     */
    public function setBio($bio)
    {
        strip_tags($bio); //remove html tags before assigning
        $this->bio = $bio;
    }

    /**
     * This is method for getting the gender.
     * @return returns gender
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * This is a method for getting the phone number
     * @return returns phone number
     */
    public function getPhone()
    {
        return $this->phone;
    }
}