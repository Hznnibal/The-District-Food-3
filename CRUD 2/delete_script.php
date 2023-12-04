<?php
// Connexion à la base de données
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_plat = $_POST["plat_id"];

    // Supprimer l'categorie
    $sql = "DELETE FROM plat WHERE id_plat = $id_plat";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erreur lors de la suppression du plat : " . $conn->error;
    }
}

?>
