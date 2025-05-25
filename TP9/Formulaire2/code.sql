-- Création de la base de données
CREATE DATABASE IF NOT EXISTS etudiants_db;

-- Utilisation de la base
USE etudiants_db;

-- Création de la table
CREATE TABLE IF NOT EXISTS etudiants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    filiere VARCHAR(100),
    age INT,
    date_enregistrement TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);