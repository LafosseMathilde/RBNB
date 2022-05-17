CREATE TABLE Client (
    Id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Nom VARCHAR(255) NOT NULL,
    Prenom VARCHAR(255) NOT NULL,
    Email VARCHAR(255) NOT NULL UNIQUE,
    Phone VARCHAR(255) NOT NULL UNIQUE,
    Passwords VARCHAR(255) NOT NULL,
    Adresse VARCHAR(255) DEFAULT NULL,
    Hote INT NOT NULL,
        Constraint CHK_HOTE check(Hote=0 or Hote=1),
    DateCreation DATETIME NOT NULL, 
    DateModification DATETIME NOT NULL
);


CREATE TABLE Commentaire( 
    Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Avis VARCHAR(255) NOT NULL,
    Note INT NOT NULL,
    DateModification DATETIME NOT NULL,
    Client_id INT NOT NULL,
    Annonce_id INT NOT NULL
);

CREATE TABLE Region( 
    Id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Nom VARCHAR(255) NOT NULL
);



CREATE TABLE Services( 
    Id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Libelle VARCHAR(255) NOT NULL UNIQUE
);


CREATE TABLE Piece(
    Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Nom VARCHAR(255) NOT NULL UNIQUE
);


CREATE TABLE TypeImmo(
    Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Lib VARCHAR(255) NOT NULL UNIQUE,
    PrixMin INT NOT NULL 
);

CREATE TABLE TVA(
    Id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Taux INT NOT NULL,
    DateDepart DATETIME NOT NULL UNIQUE
);


CREATE TABLE Annonce( 
    Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Publication INT NOT NULL,
    constraint CHK_Publication check(Publication = 0 or Publication = 1),
    PrixHT FLOAT NOT NULL,
    Adresse VARCHAR(255) NOT NULL,
    DateCreation DATETIME NOT NULL,
    DateModification DATETIME NOT NULL,
    Client_Id INT NOT NULL,
    TypeImmo_Id INT NOT NULL,
    Region_Id INT NOT NULL,
    Constraint FK_AnnonceClient FOREIGN KEY(Client_Id) REFERENCES Client(Id),
    Constraint FK_AnnonceTypeImmo FOREIGN KEY(TypeImmo_Id) REFERENCES TypeImmo(Id),
    Constraint FK_AnnonceRegion FOREIGN KEY(Region_Id) REFERENCES Region(Id)
);




CREATE TABLE Posseder( 
    Piece_Id INT,
    Annonce_Id INT,
    Quantite INT NOT NULL,
    Constraint CHK_Quantite check(Quantite < 10),
    Constraint FK_PossederPiece FOREIGN KEY(Piece_Id) REFERENCES Piece(Id),
    Constraint FK_PossederAnnonce FOREIGN KEY(Annonce_Id) REFERENCES Annonce(Id),
    PRIMARY KEY(Piece_Id, Annonce_Id)
);

CREATE TABLE  Reservation( 
    Annonce_Id INT NOT NULL,
    Client_ID INT NOT NULL,
    DateDebut DATETIME NOT NULL, 
    DateFin DATETIME NOT NULL,
    constraint FK_ReservationAnnonce FOREIGN KEY (Annonce_Id) REFERENCES Annonce (Id),
    constraint FK_ReservationClient FOREIGN KEY (Client_Id) REFERENCES Client (Id),
    PRIMARY KEY (Annonce_Id, Client_Id, DateDebut, DateFin)
);


CREATE TABLE Photo(
    Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Chemin VARCHAR(255) NOT NULL,
    Annonce_Id INT NOT NULL,
    constraint FK_PhotoAnnonce  FOREIGN KEY (Annonce_Id) REFERENCES Annonce (Id)
);

CREATE TABLE Fournir(
    Service_Id INT NOT NULL,
    Annonce_Id INT NOT NULL
);


INSERT into Annonce (Id,Publication,PrixHT,Adresse,DateCreation,DateModification,Client_Id,TypeImmo_Id,Region_Id)
    VALUES (0, 0, 50, '15 Avenue de la mer', '2021-12-18', '2022-01-12', 0, 0, 0);

Insert into Fournir (Service_Id, Annonce_Id)
    values (1, 1);

insert into Client (Id,Nom,Prenom,Email,Phone,Adresse,Passwords,Hote,DateCreation,DateModification)
    VALUES (0, 'Karnevv', 'Thomas', 'thomaskarneev@gmail.com', '0623987412','15 Avenue de la mer','Admin', 0, '2021-12-18', '2022-01-12');

INSERT into Region (Id,Nom)
    VALUES (0, 'Nouvelle Aquitaine');

INSERT into Services (Id,Libelle)
    VALUES (0, 'Wifi');

INSERT INTO Piece (Id,Nom)
    VALUES (0,'cuisine');


INSERT into Posseder (Piece_Id, Annonce_Id, Quantite)
    VALUES (1, 1, 5);


INSERT into Reservation (Annonce_Id,Client_ID,DateDebut,DateFin)
    VALUES (1, 1, '2022-05-24', '2022-06-12');

INSERT into TypeImmo (Id,Lib,PrixMin)
    VALUES (0, 'maison', '800');
