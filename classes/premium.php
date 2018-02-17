<?php
//Gursimran Singh
//02/16/18
//premium.php

class Premium extends Member
{
    //fields
    private $_indoorInterests;
    private $_outdoorInterests;

    //Premium class constructor
    public function __construct($fname, $lname, $age, $gender, $phone)
    {
        //pass personal info to its parent class
        parent::__construct($fname, $lname, $age, $gender, $phone);
    }

    //set indoor array
    public function setIndoor($indoor)
    {
        $this->_indoorInterests = $indoor;
    }

    //get indoor array
    public function getIndoor()
    {
        return $this->_indoorInterests;
    }

    //set outdoor array
    public function setOutdoor($outdoor)
    {
        $this->_outdoorInterests = $outdoor;
    }

    //get outdoor array
    public function getOutdoor()
    {
        return $this->_outdoorInterests;
    }
}