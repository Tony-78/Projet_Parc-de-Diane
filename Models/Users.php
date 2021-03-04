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


    // constructeur pour connecter mon objet à la base de donnée
    // des qu'on lance la création de l'objet , on connecte ce fichier à la bdd
    public function __construct() {
        parent::__construct();
    }


    /**
     * Méthode qui permet d'ajouter un compte en base de données
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
     * Méthode qui permet de modifier les données d'un compte
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
     * Méthode qui permet de modifier mot de passe
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
     * Méthode qui permet de supprimer un compte
     * 
     * @param int
     * @return boolean
     */
    public function deleteUser(int $idUsername) {
        $query = "DELETE FROM `Users` WHERE `username_id` = :id;";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("id", $idUsername, PDO::PARAM_STR);
        return $buildQuery->execute();
    }

}



