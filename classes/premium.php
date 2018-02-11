<?php

class Premium extends Member
{
    private $_indoorInterests = array();
    private $_outdoorInterests = array();

    public function __construct($fname, $lname, $age, $gender, $phone)
    {
        //pass personal info to its parent class
        parent::__construct($fname, $lname, $age, $gender, $phone);
    }

    public function setIndoor($indoor)
    {
        array_push($this->_indoorInterests, $indoor);
    }

    public function getIndoor()
    {
        return $this->_indoorInterests;
    }

    public function setOutdoor($outdoor)
    {
        array_push($this->_outdoorInterests, $outdoor);
    }

    public function getOutdoor()
    {
        return $this->_outdoorInterests;
    }
}