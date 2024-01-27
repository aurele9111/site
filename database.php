<?php
// Paramètres de connexion à la base de données
$servername = "sql308.infinityfree.com"; // Nom du serveur MySQL
$username = "if0_35865595"; // Nom d'utilisateur MySQL
$password = "Mf5DL2ogTuX"; // Mot de passe MySQL
$dbname = "if0_35865595_user"; // Nom de la base de données

// Créer une connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Définir le jeu de caractères de la connexion
$conn->set_charset("utf8mb4");

// Note: Il est recommandé d'utiliser des requêtes préparées pour éviter les attaques par injection SQL.
?>
