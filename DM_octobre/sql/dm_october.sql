drop database if exists dm_octobre;
create database dm_octobre;
use dm_octobre;

#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: maternelle
#------------------------------------------------------------

CREATE TABLE maternelle(
        id_maternelle Int NOT NULL auto_increment ,
        libelle       Varchar (50) NOT NULL
	,CONSTRAINT maternelle_PK PRIMARY KEY (id_maternelle)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: enfant
#------------------------------------------------------------

CREATE TABLE enfant(
        id_enfant     Int NOT NULL auto_increment ,
        nom           Varchar (50) NOT NULL ,
        prenom        Varchar (50) NOT NULL ,
        point         Int NOT NULL ,
        id_maternelle Int NOT NULL
	,CONSTRAINT enfant_PK PRIMARY KEY (id_enfant)

	,CONSTRAINT enfant_maternelle_FK FOREIGN KEY (id_maternelle) REFERENCES maternelle(id_maternelle)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: objet
#------------------------------------------------------------

CREATE TABLE objet(
        id_objet  Int NOT NULL auto_increment ,
        libelle   Varchar (50) NOT NULL ,
        point     Int NOT NULL ,
        id_enfant Int NOT NULL
	,CONSTRAINT objet_PK PRIMARY KEY (id_objet)

	,CONSTRAINT objet_enfant_FK FOREIGN KEY (id_enfant) REFERENCES enfant(id_enfant)
)ENGINE=InnoDB;

insert into maternelle values (null,"CFA-INSTA");
insert into enfant values (null,"grimaldie","baltazar",100,1);
insert into objet values (null,"voiture",100,1);









