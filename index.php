<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
}

// Configuration de la base de données
$servername = "sql308.infinityfree.com";
$username = "if0_35865595";
$password = "Mf5DL2ogTuX";
$dbname = "if0_35865595_user";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer l'ID de l'utilisateur connecté
$user_id = $_SESSION['user_id'];

// Requête SQL pour obtenir le montant total en dollars pour l'utilisateur spécifié
$sql = "SELECT SUM(amount_usd) AS total_amount FROM postbacks WHERE user_id = $user_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Récupérer la ligne résultante
    $row = $result->fetch_assoc();
    
    // Afficher le montant total
    $total_amount = $row['total_amount'];
    echo "Vous avez gagné un total de ", $total_amount , " USD.";
} else {
    echo "Aucune transaction trouvée.";
}

// Fermer la connexion à la base de données
$conn->close();
?>
