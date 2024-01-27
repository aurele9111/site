-- Création de la base de données
CREATE DATABASE IF NOT EXISTS your_database_name;

-- Utilisation de la base de données
USE your_database_name;

-- Création de la table postbacks
CREATE TABLE IF NOT EXISTS postbacks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    status INT,
    trans_id VARCHAR(255),
    user_id VARCHAR(255),
    sub_id_1 VARCHAR(255),
    sub_id_2 VARCHAR(255),
    amount_local DECIMAL(10, 2),
    amount_usd DECIMAL(10, 2),
    ip_click VARCHAR(15),
    type VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL
);
