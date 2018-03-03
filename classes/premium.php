<?php
//Gursimran Singh
//02/16/18
//premium.php

/**
 * The Premium class represents a premium member account.
 *
 * The Premium class represents a premium object, that stores
 * indoors and outdoors user interests. User can create
 * premium account with this class.
 * @author Gursimran Singh
 * @copyright 2018
 */
class Premium extends Member
{
    //fields
    private $_indoorInterests;
    private $_outdoorInterests;

    /**
     * This is create new Premium class object, that stores
     * some additional information.
     * @param $fname member's first name
     * @param $lname member's last name
     * @param $age member's age
     * @param $gender
     * @param $phone member's phone number
     */
    public function __construct($fname, $lname, $age, $gender, $phone)
    {
        //pass personal info to its parent class
        parent::__construct($fname, $lname, $age, $gender, $phone);
    }

    /**
     * This is a method for setting the premium member indoor interests.
     * @param $indoor
     */
    public function setIndoor($indoor)
    {
        $this->_indoorInterests = $indoor;
    }

    /**
     * This is a method for getting the premium member indoor interests.
     * @return indoor interests
     */
    public function getIndoor()
    {
        return $this->_indoorInterests;
    }

    /**
     * This is a setter for setting the premium member outdoor interests.
     * @param $outdoor
     */
    public function setOutdoor($outdoor)
    {
        $this->_outdoorInterests = $outdoor;
    }

    /**
     * This is a method for getting the premium member outdoor interests.
     * @return outdoor interests
     */
    public function getOutdoor()
    {
        return $this->_outdoorInterests;
    }
}