
# Table: fonts
#------------------------------------------------------------
CREATE TABLE fonts(
  id              Int  Auto_increment  NOT NULL ,
  associated_with Varchar (10) NOT NULL ,
  font            Varchar (50) NOT NULL

  ,CONSTRAINT fonts_AK UNIQUE (font)
  ,CONSTRAINT fonts_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


# Table: personnalisations
#------------------------------------------------------------
CREATE TABLE personnalisations(
  id                         Int  Auto_increment  NOT NULL ,
  main_font_color            Varchar (20) NOT NULL ,
  secondary_font_color       Varchar (20) NOT NULL ,
  main_background_color      Varchar (20) NOT NULL ,
  secondary_background_color Varchar (20) NOT NULL ,
  header_background_color    Varchar (20) NOT NULL ,
  stats_background_color     Varchar (20) NOT NULL ,
  display_timer              Bool NOT NULL ,
  id_fonts_main              Int NOT NULL ,
  id_fonts_timer             Int NOT NULL

  ,CONSTRAINT personnalisations_PK PRIMARY KEY (id)
  ,CONSTRAINT personnalisations_main_fonts_FK FOREIGN KEY (id_fonts_main) REFERENCES fonts(id)
  ,CONSTRAINT personnalisations_timer_fonts_FK FOREIGN KEY (id_fonts_timer) REFERENCES fonts(id)
)ENGINE=InnoDB;


# Table: users
#------------------------------------------------------------
CREATE TABLE users(
  id                   Int  Auto_increment  NOT NULL ,
  username             Varchar (25) NOT NULL ,
  password             Varchar (70) NOT NULL ,
  mail                 Varchar (100) NOT NULL ,
  avatar_url           Varchar (100) NOT NULL ,
  id_personnalisations Int NOT NULL

  ,CONSTRAINT users_mail_AK UNIQUE (mail)
  ,CONSTRAINT users_avatar_url_AK UNIQUE (avatar_url)
  ,CONSTRAINT users_PK PRIMARY KEY (id)
  ,CONSTRAINT users_personnalisations_FK FOREIGN KEY (id_personnalisations) REFERENCES personnalisations(id)
)ENGINE=InnoDB;


# Table: stats
#------------------------------------------------------------
CREATE TABLE stats(
  id              Int  Auto_increment  NOT NULL ,
  best_single     Int NOT NULL ,
  single_scramble Varchar (100) NOT NULL ,
  single_date     Date NOT NULL ,
  best_ao5        Int NOT NULL ,
  ao5_scramble    Varchar (100) NOT NULL ,
  ao5_date        Date NOT NULL ,
  best_ao12       Int NOT NULL ,
  ao12_scramble   Varchar (100) NOT NULL ,
  ao12_date       Date NOT NULL ,
  best_ao50       Int NOT NULL ,
  ao50_scramble   Varchar (100) NOT NULL ,
  ao50_date       Date NOT NULL ,
  id_users        Int NOT NULL

  ,CONSTRAINT stats_PK PRIMARY KEY (id)
  ,CONSTRAINT stats_users_FK FOREIGN KEY (id_users) REFERENCES users(id)
  ,CONSTRAINT stats_users_AK UNIQUE (id_users)
)ENGINE=InnoDB;
