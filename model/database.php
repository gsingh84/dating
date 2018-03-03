<?php

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
}