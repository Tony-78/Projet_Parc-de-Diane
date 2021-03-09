<?php

class Announces extends Database {

    private $announce_id;
    private $announce_title;
    private $announce_picture;
    private $announce_description;
    private $announce_create_date;
    private $announce_update_date;
    private $user_id;
    private $announce_category_id;

    /**
     * Get the value of announce_id
     */ 
    public function getAnnounce_id()
    {
        return $this->announce_id;
    }

    /**
     * Set the value of announce_id
     *
     * @return  self
     */ 
    public function setAnnounce_id($announce_id)
    {
        $this->announce_id = $announce_id;

        return $this;
    }

    

    /**
     * Get the value of announce_title
     */ 
    public function getAnnounce_title()
    {
        return $this->announce_title;
    }

    /**
     * Set the value of announce_title
     *
     * @return  self
     */ 
    public function setAnnounce_title($announce_title)
    {
        $this->announce_title = $announce_title;

        return $this;
    }

    

    /**
     * Get the value of announce_picture
     */ 
    public function getAnnounce_picture()
    {
        return $this->announce_picture;
    }

    /**
     * Set the value of announce_picture
     *
     * @return  self
     */ 
    public function setAnnounce_picture($announce_picture)
    {
        $this->announce_picture = $announce_picture;

        return $this;
    }

    

    /**
     * Get the value of announce_description
     */ 
    public function getAnnounce_description()
    {
        return $this->announce_description;
    }

    /**
     * Set the value of announce_description
     *
     * @return  self
     */ 
    public function setAnnounce_description($announce_description)
    {
        $this->announce_description = $announce_description;

        return $this;
    }

    

    /**
     * Get the value of announce_create_date
     */ 
    public function getAnnounce_create_date()
    {
        return $this->announce_create_date;
    }

    /**
     * Set the value of announce_create_date
     *
     * @return  self
     */ 
    public function setAnnounce_create_date($announce_create_date)
    {
        $this->announce_create_date = $announce_create_date;

        return $this;
    }

    

    /**
     * Get the value of announce_update_date
     */ 
    public function getAnnounce_update_date()
    {
        return $this->announce_update_date;
    }

    /**
     * Set the value of announce_update_date
     *
     * @return  self
     */ 
    public function setAnnounce_update_date($announce_update_date)
    {
        $this->announce_update_date = $announce_update_date;

        return $this;
    }

    

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
     * Get the value of announce_category_id
     */ 
    public function getAnnounce_category_id()
    {
        return $this->announce_category_id;
    }

    /**
     * Set the value of announce_category_id
     *
     * @return  self
     */ 
    public function setAnnounce_category_id($announce_category_id)
    {
        $this->announce_category_id = $announce_category_id;

        return $this;
    }



    // constructeur pour connecter mon objet à la base de donnée
    // des qu'on lance la création de l'objet , on connecte ce fichier à la bdd
    public function __construct() {
        parent::__construct();
    }


    /**
     * Méthode qui permet d'ajouter une annonce en BDD
     * 
     * @param array
     * @return boolean
     */
    public function addAnnounce(array $arrayParameters) {
        $query = "INSERT INTO `Announces` (`announce_title`, `announce_picture`, `announce_description`, 
                                            `announce_create_date`, `user_id`, `announce_category_id`) 
                    VALUES (:title, :picture, :description, :createDate, :userId, :categoryId);";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("title", $arrayParameters["announceTitle"], PDO::PARAM_STR);
        $buildQuery->bindValue("picture", $arrayParameters["announceImgName"], PDO::PARAM_STR);
        $buildQuery->bindValue("description", $arrayParameters["announceDescription"], PDO::PARAM_STR);
        $buildQuery->bindValue("createDate", $arrayParameters["announceCreateDate"], PDO::PARAM_STR);
        $buildQuery->bindValue("userId", $arrayParameters["userId"], PDO::PARAM_STR);
        $buildQuery->bindValue("categoryId", $arrayParameters["announceCategory"], PDO::PARAM_STR);
        return $buildQuery->execute();
    }


    /**
     * Méthode qui permet de récupérer les informations d'une annonce
     * 
     * @return array|boolean
     */
    public function getAllAnnouncesInformations() {
        $query = "SELECT `Announces`.`announce_title`, `Announces`.`announce_picture`, `Announces`.`announce_description`,
            `Announces`.`announce_create_date`, `Users`.`user_tel`, `Announce_categories`.`announce_category_name`
            FROM `Announces` INNER JOIN `Users`
            ON `Announces`.`user_id` = `Users`.`user_id`
            INNER JOIN `Announce_categories`
            ON `Announce_categories`.`announce_category_id` = `Announces`.`announce_category_id`
            ORDER BY `Announces`.`announce_create_date` DESC;";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false; 
        }
    }


    /**
     * Méthode qui permet de récupérer les annonces d'une personne
     * 
     * @return array|boolean
     */
    public function getAllAnnouncesInformationsForOnePerson(int $idUser) {
        $query = "SELECT `Announces`.`announce_title`, `Announces`.`announce_picture`, `Announces`.`announce_description`,
        `Announces`.`announce_create_date`, `Users`.`user_tel`, `Announce_categories`.`announce_category_name`, `Announces`.`announce_id`
        FROM `Announces` INNER JOIN `Users`
        ON `Announces`.`user_id` = `Users`.`user_id`
        INNER JOIN `Announce_categories`
        ON `Announce_categories`.`announce_category_id` = `Announces`.`announce_category_id`
        WHERE `Users`.`user_id` = :id
        ORDER BY `Announces`.`announce_create_date` DESC;";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("id", $idUser, PDO::PARAM_INT);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false;
        }
    }


    /**
     * Méthode qui permet de supprimer une annonce
     * 
     * @param int
     * @return boolean
     */
    public function deleteAnnounce(int $idUser) {
        $query = "DELETE FROM `Announces` WHERE `announce_id` = :id;";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("id", $idUser, PDO::PARAM_INT);
        return $buildQuery->execute();
    }


    /**
     * Méthode qui permet de modifier un patient existant
     * 
     * @param array
     * @return boolean
     */
    public function updateAnnounce(array $arrayParameters) {
        $query = "UPDATE `Announces` SET `announce_title` = :title, `announce_description` = :description, `announce_picture` = :picture, 
                        `announce_create_date` = :modifiedDate, `announce_category_id` = :categoryId WHERE `announce_id` = :id;";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("title", $arrayParameters["announceTitle"], PDO::PARAM_STR);
        $buildQuery->bindValue("description", $arrayParameters["announceDescription"], PDO::PARAM_STR);
        $buildQuery->bindValue("picture", $arrayParameters["announceImgName"], PDO::PARAM_STR);
        $buildQuery->bindValue("modifiedDate", $arrayParameters["announceModifiedDate"], PDO::PARAM_STR);
        $buildQuery->bindValue("categoryId", $arrayParameters["announceCategory"], PDO::PARAM_STR);
        $buildQuery->bindValue("id", $arrayParameters["announceId"], PDO::PARAM_INT);
        return $buildQuery->execute();
    }


   /**
     * Méthode qui permet de récupérer les informations d'une annonce via le numéro d'annonce
     * 
     * @return array|boolean
     */
    public function getAnnounceInformationsByAnnounceId($idAnnounce) {
        $query = "SELECT `Announces`.`announce_title`, `Announces`.`announce_picture`, `Announces`.`announce_description`
                    , `Announce_categories`.`announce_category_name`
            FROM `Announces` 
            INNER JOIN `Announce_categories`
            ON `Announce_categories`.`announce_category_id` = `Announces`.`announce_category_id`
            WHERE `Announces`.`announce_id` = :id;";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("id", $idAnnounce, PDO::PARAM_INT);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetch(PDO::FETCH_ASSOC);
        if(!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false; 
        }
    }
}