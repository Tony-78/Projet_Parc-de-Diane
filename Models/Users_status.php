<?php

class Users_status extends Database {

    private $user_status_id;
    private $user_status_role;
    

    /**
     * Get the value of user_status_id
     */ 
    public function getUser_status_id()
    {
        return $this->user_status_id;
    }

    /**
     * Set the value of user_status_id
     *
     * @return  self
     */ 
    public function setUser_status_id($user_status_id)
    {
        $this->user_status_id = $user_status_id;

        return $this;
    }


    /**
     * Get the value of user_status_role
     */ 
    public function getUser_status_role()
    {
        return $this->user_status_role;
    }

    /**
     * Set the value of user_status_role
     *
     * @return  self
     */ 
    public function setUser_status_role($user_status_role)
    {
        $this->user_status_role = $user_status_role;

        return $this;
    }


    /**
     * Construct method
     * 
     * @return exit
     * @see database
     */
    public function __construct() {
        parent::__construct();
    }



    /**
     * Method used to verify if a username is present in the DB (this method will show all informations from the account)
     * 
     * @param string
     * @return array|boolean
     */
    public function verifyUserPresence(string $username) {
        $query = "SELECT `user_id`, `user_firstname`, `user_lastname`, `user_tel`,
                    `user_mail`, `username_username`, `user_password`,`user_status_role`
        FROM `Users` 
        INNER JOIN `Users_status` 
        ON `Users_status`.`user_status_id` = `Users`.`user_status_id`
        INNER JOIN `Usernames`
        ON `Usernames`.`username_id` = `Users`.`username_id`
        WHERE `Usernames`.`username_username` = :username;";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("username", $username, PDO::PARAM_STR);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetch(PDO::FETCH_ASSOC);
        if(!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false;
        }
    }

    
}