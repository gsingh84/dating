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

class Database
{
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

    function add_Member($profile)
    {
        global $cnxn;

        //define a query
        $sql = "INSERT INTO members (fname, lname, age, gender, phone, email, state, seeking, bio, premium, interests) VALUES 
            (:fname, :lname, :age, :gender, :phone, :email, :state, :seeking, :bio, :premium, :interests)";

        //prepare the statement
        $statement = $cnxn->prepare($sql);

        $premium = 0;
        $interests = null;
        if(get_class($_SESSION['profile']) == "Premium")
        {
            $premium = 1;
            $interests_array = array_merge($profile->getIndoor(), $profile->getOutdoor());
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

    function allMembers()
    {
        global $cnxn;

        //define query
        $sql = "SELECT * FROM members";

        //prepare the statement
        $statement = $cnxn->prepare($sql);

        //execute the statement
        $statement->execute();

        //get result
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        //return the result
        return $result;
    }
}