# -----------------------------------------------------------------------------
#       TABLE : BATEAU
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS BATEAU
 (
   IDBATEAU INTEGER(2) NOT NULL  ,
   NOMBATEAU VARCHAR(128) NULL  ,
   VIEACT INTEGER(2) NULL  ,
   GOLDACT INTEGER(2) NULL  ,
   RHUMACT INTEGER(2) NULL  ,
   NIVCALLES INTEGER(2) NULL  ,
   NIVCANONS INTEGER(2) NULL  ,
   NIVPONT INTEGER(2) NULL  ,
   NIVMAT INTEGER(2) NULL  ,
   NIVBARRE INTEGER(2) NULL  ,
   NIVCOQUE INTEGER(2) NULL  ,
   IDPIRATE INTEGER(2) NOT NULL  
   , PRIMARY KEY (IDBATEAU) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE BATEAU
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_BATEAU_PIRATE
     ON BATEAU (IDPIRATE ASC);

# -----------------------------------------------------------------------------
#       TABLE : PR
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PR
 (
   IDPR INTEGER(2) NOT NULL  ,
   IDPIRATE INTEGER(2) NOT NULL  ,
   LONGITUDE VARCHAR(128) NULL  ,
   LATITUDE VARCHAR(128) NULL  
   , PRIMARY KEY (IDPR) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE PR
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_PR_PIRATE
     ON PR (IDPIRATE ASC);

# -----------------------------------------------------------------------------
#       TABLE : LC
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS LC
 (
   IDLC INTEGER(2) NOT NULL  ,
   IDCLAN INTEGER(2) NOT NULL  ,
   LONGITUDE VARCHAR(128) NULL  ,
   LATITUDE VARCHAR(128) NULL  
   , PRIMARY KEY (IDLC) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE LC
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_LC_CLAN
     ON LC (IDCLAN ASC);

# -----------------------------------------------------------------------------
#       TABLE : PIRATE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PIRATE
 (
   IDPIRATE INTEGER(2) NOT NULL  ,
   IDCLAN INTEGER(2) NOT NULL  ,
   PSEUDO VARCHAR(128) NULL  ,
   NIVPIRATE INTEGER(2) NULL  ,
   VICTOIRES INTEGER(2) NULL  ,
   COMBATS INTEGER(2) NULL  ,
   TITRE VARCHAR(128) NULL  ,
   DTP INTEGER(2) NULL  ,
   MDP VARCHAR(128) NULL  ,
   DATEINSCRI DATE NULL  ,
   MAIL VARCHAR(128) NULL  
   , PRIMARY KEY (IDPIRATE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE PIRATE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_PIRATE_CLAN
     ON PIRATE (IDCLAN ASC);

# -----------------------------------------------------------------------------
#       TABLE : CLAN
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CLAN
 (
   IDCLAN INTEGER(2) NOT NULL  ,
   NOMCLAN VARCHAR(128) NULL  
   , PRIMARY KEY (IDCLAN) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : SUCCES
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS SUCCES
 (
   IDSUCCES INTEGER(2) NOT NULL  ,
   TITRE VARCHAR(128) NULL  
   , PRIMARY KEY (IDSUCCES) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : COFFRE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS COFFRE
 (
   IDCOFFRE INTEGER(2) NOT NULL  ,
   IDPIRATE INTEGER(2) NOT NULL  ,
   LONGITUDE VARCHAR(128) NULL  ,
   LATITUDE VARCHAR(128) NULL  ,
   GOLD INTEGER(2) NULL  ,
   RHUM INTEGER(2) NULL  
   , PRIMARY KEY (IDCOFFRE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE COFFRE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_COFFRE_PIRATE
     ON COFFRE (IDPIRATE ASC);

# -----------------------------------------------------------------------------
#       TABLE : MESSUCCES
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS MESSUCCES
 (
   IDPIRATE INTEGER(2) NOT NULL  ,
   IDSUCCES INTEGER(2) NOT NULL  
   , PRIMARY KEY (IDPIRATE,IDSUCCES) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE MESSUCCES
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_MESSUCCES_PIRATE
     ON MESSUCCES (IDPIRATE ASC);

CREATE  INDEX I_FK_MESSUCCES_SUCCES
     ON MESSUCCES (IDSUCCES ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE BATEAU 
  ADD FOREIGN KEY FK_BATEAU_PIRATE (IDPIRATE)
      REFERENCES PIRATE (IDPIRATE) ;


ALTER TABLE PR 
  ADD FOREIGN KEY FK_PR_PIRATE (IDPIRATE)
      REFERENCES PIRATE (IDPIRATE) ;


ALTER TABLE LC 
  ADD FOREIGN KEY FK_LC_CLAN (IDCLAN)
      REFERENCES CLAN (IDCLAN) ;


ALTER TABLE PIRATE 
  ADD FOREIGN KEY FK_PIRATE_CLAN (IDCLAN)
      REFERENCES CLAN (IDCLAN) ;


ALTER TABLE COFFRE 
  ADD FOREIGN KEY FK_COFFRE_PIRATE (IDPIRATE)
      REFERENCES PIRATE (IDPIRATE) ;


ALTER TABLE MESSUCCES 
  ADD FOREIGN KEY FK_MESSUCCES_PIRATE (IDPIRATE)
      REFERENCES PIRATE (IDPIRATE) ;


ALTER TABLE MESSUCCES 
  ADD FOREIGN KEY FK_MESSUCCES_SUCCES (IDSUCCES)
      REFERENCES SUCCES (IDSUCCES) ;

