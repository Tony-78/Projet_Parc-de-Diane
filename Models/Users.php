<?php

class Users extends Database {


    private $user_id;
    private $user_lastname;
    private $user_firstname;
    private $user_phone;
    private $user_mail;
    private $user_username;
    private $user_password;
    private $user_role;

    
    /**
     * Get the value of user_id
     */ 
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */ 
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }


    

    /**
     * Get the value of user_lastname
     */ 
    public function getUser_lastname()
    {
        return $this->user_lastname;
    }

    /**
     * Set the value of user_lastname
     *
     * @return  self
     */ 
    public function setUser_lastname($user_lastname)
    {
        $this->user_lastname = $user_lastname;

        return $this;
    }


    

    /**
     * Get the value of user_firstname
     */ 
    public function getUser_firstname()
    {
        return $this->user_firstname;
    }

    /**
     * Set the value of user_firstname
     *
     * @return  self
     */ 
    public function setUser_firstname($user_firstname)
    {
        $this->user_firstname = $user_firstname;

        return $this;
    }


    

    /**
     * Get the value of user_phone
     */ 
    public function getUser_phone()
    {
        return $this->user_phone;
    }

    /**
     * Set the value of user_phone
     *
     * @return  self
     */ 
    public function setUser_phone($user_phone)
    {
        $this->user_phone = $user_phone;

        return $this;
    }


    

    /**
     * Get the value of user_mail
     */ 
    public function getUser_mail()
    {
        return $this->user_mail;
    }

    /**
     * Set the value of user_mail
     *
     * @return  self
     */ 
    public function setUser_mail($user_mail)
    {
        $this->user_mail = $user_mail;

        return $this;
    }


    

    /**
     * Get the value of user_username
     */ 
    public function getUser_username()
    {
        return $this->user_username;
    }

    /**
     * Set the value of user_username
     *
     * @return  self
     */ 
    public function setUser_username($user_username)
    {
        $this->user_username = $user_username;

        return $this;
    }


    

    /**
     * Get the value of user_password
     */ 
    public function getUser_password()
    {
        return $this->user_password;
    }

    /**
     * Set the value of user_password
     *
     * @return  self
     */ 
    public function setUser_password($user_password)
    {
        $this->user_password = $user_password;

        return $this;
    }


    

    /**
     * Get the value of user_role
     */ 
    public function getUser_role()
    {
        return $this->user_role;
    }

    /**
     * Set the value of user_role
     *
     * @return  self
     */ 
    public function setUser_role($user_role)
    {
        $this->user_role = $user_role;

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
     * Method used to add a user in DB
     * 
     * @param array
     * @return boolean
     */
    public function addUser(array $arrayParameters) {
        $query = "INSERT INTO `Users` (`user_lastname`, `user_firstname`, `user_tel`, `user_mail`, `user_password`, `username_id`) 
                    VALUES (:lastname, :firstname, :tel, :mail, :password, :username );";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("lastname", $arrayParameters["lastname"], PDO::PARAM_STR);
        $buildQuery->bindValue("firstname", $arrayParameters["firstname"], PDO::PARAM_STR);
        $buildQuery->bindValue("tel", $arrayParameters["phone"], PDO::PARAM_STR);
        $buildQuery->bindValue("mail", $arrayParameters["mail"], PDO::PARAM_STR);
        $buildQuery->bindValue("password", $arrayParameters["password"], PDO::PARAM_STR);
        $buildQuery->bindValue("username", $arrayParameters["idUsername"], PDO::PARAM_STR);
        return $buildQuery->execute();
    }


    /**
     * Method used to modify personal informations
     * 
     * @param array
     * @return boolean
     */
    public function updateUser(array $arrayParameters) {
        $query = "UPDATE `Users` SET `user_lastname` = :lastname, `user_firstname` = :firstname, `user_mail` = :mail, 
                    `user_tel` = :tel WHERE `username_id` = :id;";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("lastname", $arrayParameters["lastname"], PDO::PARAM_STR);
        $buildQuery->bindValue("firstname", $arrayParameters["firstname"], PDO::PARAM_STR);
        $buildQuery->bindValue("mail", $arrayParameters["mail"], PDO::PARAM_STR);
        $buildQuery->bindValue("tel", $arrayParameters["phone"], PDO::PARAM_STR);
        $buildQuery->bindValue("id", $arrayParameters["id_username"], PDO::PARAM_STR);
        if ($buildQuery->execute()) {
            $this->setUser_lastname($arrayParameters["lastname"]);
            $this->setUser_firstname($arrayParameters["firstname"]);
            $this->setUser_mail($arrayParameters["mail"]);
            $this->setUser_phone($arrayParameters["phone"]);
            return true;
        } else {
            return false;
        }
        
    }


    /**
     * Method used to update a password 
     * 
     * @param array
     * @return boolean
     */
    public function updatePassword(array $arrayParameters) {
        $query = "UPDATE `Users` SET `user_password` = :password WHERE `username_id` = :id;";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("password", $arrayParameters["password"], PDO::PARAM_STR);
        $buildQuery->bindValue("id", $arrayParameters["id_username"], PDO::PARAM_STR);
        return $buildQuery->execute();
    }

    /**
     * Method used to delete an account from the DB
     * 
     * @param int
     * @return boolean
     */
    public function deleteUser(int $idUsername) {
        $query = "DELETE FROM `Users` WHERE `username_id` = :id AND `Users`.`user_status_id` = 2";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("id", $idUsername, PDO::PARAM_STR);
        return $buildQuery->execute();
    }


    /**
     * Method used to search a user by  its lastname, firstname or username
     * 
     * @param string
     * @return array|boolean
     */
    public function searchUser(string $search) {
        $query = "SELECT * FROM `Users` 
                    INNER JOIN `Usernames`
                    ON `Usernames`.`username_id` = `Users`.`username_id`
                    WHERE `Users`.`user_lastname` LIKE :search1
                    OR `Users`.`user_firstname` LIKE :search2 
                    OR `Usernames`.`username_username` LIKE :search3
                    ORDER BY `Users`.`user_lastname`;";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("search1", $search, PDO::PARAM_STR);
        $buildQuery->bindValue("search2", $search, PDO::PARAM_STR);
        $buildQuery->bindValue("search3", $search, PDO::PARAM_STR);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false;
        }
    }


    /**
     * Method used to count the number of users in DB
     * 
     * @return array|boolean
     */
    public function countUsers() {
        $query = "SELECT COUNT(*) AS `countUsers` FROM `Users` WHERE `Users`.`user_status_id` = 2 ;";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->execute();
        $countPatients = $buildQuery->fetch(PDO::FETCH_ASSOC);
        if(!empty($countPatients)) {
            return $countPatients;
        } else {
            return false;
        }
    }
    

    /**
     * Method used to collect 10 users based on a start value (pagination)
     * 
     * @param int
     * @return array|boolean
     */
    public function getUsersPaginate(int $startValue) {
        $query = "SELECT * FROM `Users`
        INNER JOIN `Usernames`
        ON `Usernames`.`username_id` = `Users`.`username_id`
        WHERE `Users`.`user_status_id` = 2
        LIMIT :startValue, 10;";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("startValue", $startValue, PDO::PARAM_INT);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false;
        }
    }
}




