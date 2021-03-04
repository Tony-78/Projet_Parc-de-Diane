<?php

class Usernames extends Database {


    private $username_id;
    private $username_username;

    /**
     * Get the value of username_id
     */ 
    public function getUsername_id()
    {
        return $this->username_id;
    }

    /**
     * Set the value of username_id
     *
     * @return  self
     */ 
    public function setUsername_id($username_id)
    {
        $this->username_id = $username_id;

        return $this;
    }


    
    /**
     * Get the value of username_username
     */ 
    public function getUsername_username()
    {
        return $this->username_username;
    }

    /**
     * Set the value of username_username
     *
     * @return  self
     */ 
    public function setUsername_username($username_username)
    {
        $this->username_username = $username_username;

        return $this;
    }



    public function __construct() {
        parent::__construct();
    }


    /**
     * Méthode qui permet de vérifier si un username (nom) est déjà présent en BDD
     * 
     * @param string
     * @return boolean
     */
    public function verifyUserPresenceForRegister(string $username) {
        $query = "SELECT `Usernames`.`username_username`
        FROM `Usernames`
        WHERE `Usernames`.`username_username` = :username;";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("username", $username);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetch(PDO::FETCH_ASSOC);
        // si $resultQuery retourne true -> le username est déjà présent en BDD
        if(!empty($resultQuery)) {
            return true;
        } else {
            return false;
        }
    }



    /**
     * Méthode qui permet de récupérer l'id d'un username
     * 
     * @return array|boolean
     */
    public function searchUsernameId(string $username) {
        $query = "SELECT `Usernames`.`username_id` FROM `Usernames` WHERE `Usernames`.`username_username` = :username;";
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


    /**
     * Méthode qui permet de savoir si un unsername_id est présent en BDD (dans la table Users)
     * 
     * @return boolean
     */
    public function verifyUsernameIdPresenceForRegister(int $id) {
        $query = "SELECT `Users`.`username_id` FROM `Users` WHERE `Users`.`username_id` = :id;";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("id", $id, PDO::PARAM_INT);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetch(PDO::FETCH_ASSOC);
        if(!empty($resultQuery)) {
            return true;
        } else {
            return false;
        }
    }
    


    
}