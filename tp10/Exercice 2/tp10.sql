USE TP10;
CREATE TABLE exercice (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    auteur VARCHAR(255) NOT NULL,
    date_creation DATE NOT NULL
);