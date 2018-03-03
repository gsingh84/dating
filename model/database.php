<?php
//--------Table Structure---------------
//create table members (
//    member_id int Not Null AUTO_INCREMENT,
//    fname varchar(50),
//    lname varchar(50),
//    age int,
//    gender varchar(10),
//    phone varchar(10),
//    email varchar(50),
//    state varchar(25),
//    seeking varchar(10),
//    bio varchar(800),
//    premium tinyint,
//    image varchar(100),
//    interests varchar(100),
//    PRIMARY key (member_id)
//);

/**
 * This class represent Database object.
 *
 * The Database class use to insert and get the
 * member's information from database.
 * @author Gursimran Singh
 * @copyright 2018
 */
class Database
{
    /**
     * This a method for connecting to database.
     * @return PDO|void
     */
    function connect()
    {
        try {
            //Instantiate a database object
            $cnxn = new PDO(DB_DSN, DB_USERNAME,
                DB_PASSWORD);
            return $cnxn;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return;
        }
    }

    /**
     * This is a method for adding the member's profile information into
     * the database table.
     * @param $profile premium or member class object
     */
    function add_Member($profile)
    {
        global $cnxn;

        //define a query
        $sql = "INSERT INTO members (fname, lname, age, gender, phone, email, state, seeking, bio, premium, interests) VALUES 
            (:fname, :lname, :age, :gender, :phone, :email, :state, :seeking, :bio, :premium, :interests)";

        //prepare the statement
        $statement = $cnxn->prepare($sql);

        //set premium value to zero if the checkbox not selected
        $premium = 0;
        //set interests to null
        $interests = null;

        //change the values of above variables if the class type is premium
        if(get_class($_SESSION['profile']) == "Premium")
        {
            $premium = 1; //set premium to 1 if premium is selected
            //merge indoor and outdoor selections into one array
            $interests_array = array_merge($profile->getIndoor(), $profile->getOutdoor());

            //loop over array and add all the interests in one variable
            foreach ($interests_array as $interest) {
                $interests.=$interest;
                if($interest != end($interests_array)) {
                    $interests.=", ";
                }
            }
        }

        //bind parameters
        $statement->bindParam(':fname', $profile->getFname(), PDO::PARAM_STR);
        $statement->bindParam(':lname', $profile->getLname(), PDO::PARAM_STR);
        $statement->bindParam(':age', $profile->getAge(), PDO::PARAM_INT);
        $statement->bindParam(':gender', $profile->getGender(), PDO::PARAM_STR);
        $statement->bindParam(':phone', $profile->getPhone(), PDO::PARAM_STR);
        $statement->bindParam(':email', $profile->getEmail(), PDO::PARAM_STR);
        $statement->bindParam(':state', $profile->getState(), PDO::PARAM_STR);
        $statement->bindParam(':seeking', $profile->getSeeking(), PDO::PARAM_STR);
        $statement->bindParam(':bio', $profile->getBio(), PDO::PARAM_STR);
        $statement->bindParam(':premium', $premium, PDO::PARAM_INT);
        $statement->bindParam(':interests', $interests, PDO::PARAM_STR);

        //execute query
        $statement->execute();
    }

    /**
     * This method returns all members info from database
     * @return all rows from database as array
     */
    function allMembers()
    {
        global $cnxn;

        //define query
        $sql = "SELECT * FROM members ORDER BY lname";

        //prepare the statement
        $statement = $cnxn->prepare($sql);

        //execute the statement
        $statement->execute();

        //get result
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        //return the result
        return $result;
    }

    /**
     * This method lookup into the database and returns the member information
     * based on member's id.
     * @param $id member id
     * @return specific member profile details
     */
    function getDetails($id)
    {
        global $cnxn;

        //define query
        $sql = "SELECT * FROM members WHERE member_id = :id";

        //prepare the statement
        $statement = $cnxn->prepare($sql);

        //bind parameters
        $statement->bindParam(':id', $id, PDO::PARAM_INT);

        //execute the statement
        $statement->execute();

        //return result
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}