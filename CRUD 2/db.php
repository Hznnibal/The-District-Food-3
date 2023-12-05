<?php
$servername = "localhost";
$username = "mustapha";
$password = "Afpa1234";
$dbname = "mustapha";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; // Pour vérifier que la connexion fonctionne correctement
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit(); // Quitte le script en cas d'échec de connexion
}
?>