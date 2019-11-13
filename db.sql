#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: personne
#------------------------------------------------------------

CREATE TABLE personne(
        id            Int  Auto_increment  NOT NULL ,
        Nom           Varchar (50) NOT NULL ,
        Prenom        Varchar (50) NOT NULL ,
        DateNaissance Date NOT NULL ,
        img           Varchar (250) NOT NULL ,
        sex           Varchar (10) NOT NULL
	,CONSTRAINT personne_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: consultation
#------------------------------------------------------------

CREATE TABLE consultation(
        id            Int  Auto_increment  NOT NULL ,
        GroupeSanguin Varchar (3) NOT NULL ,
        Poids         Real NOT NULL ,
        Taille        Real NOT NULL ,
        Observation   Text NOT NULL ,
        id_personne   Int NOT NULL
	,CONSTRAINT consultation_PK PRIMARY KEY (id)

	,CONSTRAINT consultation_personne_FK FOREIGN KEY (id_personne) REFERENCES personne(id)
)ENGINE=InnoDB;

