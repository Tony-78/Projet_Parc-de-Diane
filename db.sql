#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Announce_categories
#------------------------------------------------------------

CREATE TABLE Announce_categories(
        announce_category_id   Int  Auto_increment  NOT NULL ,
        announce_category_name Varchar (255) NOT NULL
	,CONSTRAINT Announce_categories_PK PRIMARY KEY (announce_category_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Users_status
#------------------------------------------------------------

CREATE TABLE Users_status(
        user_status_id   Int  Auto_increment  NOT NULL ,
        user_status_role Varchar (15) NOT NULL
	,CONSTRAINT Users_status_PK PRIMARY KEY (user_status_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Usernames
#------------------------------------------------------------

CREATE TABLE Usernames(
        username_id       Int  Auto_increment  NOT NULL ,
        username_username Varchar (15) NOT NULL
	,CONSTRAINT Usernames_PK PRIMARY KEY (username_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Users
#------------------------------------------------------------

CREATE TABLE Users(
        user_id        Int  Auto_increment  NOT NULL ,
        user_lastname  Varchar (100) NOT NULL ,
        user_firstname Varchar (100) NOT NULL ,
        user_tel       Varchar (50) NOT NULL ,
        user_mail      Varchar (255) NOT NULL ,
        user_password  Varchar (60) NOT NULL ,
        user_status_id Int NOT NULL ,
        username_id    Int NOT NULL
	,CONSTRAINT Users_PK PRIMARY KEY (user_id)

	,CONSTRAINT Users_Users_status_FK FOREIGN KEY (user_status_id) REFERENCES Users_status(user_status_id)
	,CONSTRAINT Users_Usernames0_FK FOREIGN KEY (username_id) REFERENCES Usernames(username_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Announces
#------------------------------------------------------------

CREATE TABLE Announces(
        announce_id          Int  Auto_increment  NOT NULL ,
        announce_title       Varchar (100) NOT NULL ,
        announce_picture     Varchar (255) NOT NULL ,
        announce_description Varchar (2000) NOT NULL ,
        announce_update_date Datetime ,
        user_id              Int NOT NULL ,
        announce_category_id Int NOT NULL
	,CONSTRAINT Announces_PK PRIMARY KEY (announce_id)

	,CONSTRAINT Announces_Users_FK FOREIGN KEY (user_id) REFERENCES Users(user_id)
	,CONSTRAINT Announces_Announce_categories0_FK FOREIGN KEY (announce_category_id) REFERENCES Announce_categories(announce_category_id)
)ENGINE=InnoDB;
