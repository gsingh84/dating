<?php

class Premium extends Member
{
    private $_indoorInterests;
    private $_outdoorInterests;

    public function __construct($fname, $lname, $age, $gender, $phone)
    {
        //pass personal info to its parent class
        parent::__construct($fname, $lname, $age, $gender, $phone);
    }

//    public function setEmail($email)
//    {
//        parent::setEmail($email);
//    }

    public function setIndoor($indoor)
    {
        $this->_indoorInterests = $indoor;
    }

    public function getIndoor()
    {
        return $this->_indoorInterests;
    }

    public function setOutdoor($outdoor)
    {
        $this->_outdoorInterests = $outdoor;
    }

    public function getOutdoor()
    {
        return $this->_outdoorInterests;
    }
}