CREATE DATABASE IF NOT EXISTS tp7_php;
USE tp7_php;
CREATE TABLE utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(10),
    nom VARCHAR(100),
    prenom VARCHAR(100),
    annee_naissance INT,
    identifiant VARCHAR(50) UNIQUE,
    mot_de_passe VARCHAR(255),
    sexe CHAR(1),
    debutant BOOLEAN,
    date_inscription TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
