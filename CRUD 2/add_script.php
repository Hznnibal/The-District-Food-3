<?php
include 'db.php';

function getcategorie() {
    global $conn;
    $sql = "SELECT * FROM categorie";
    $result = $conn->query($sql);

    $categories = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $categories[] = $row;
        }
    }

    return $categories;
}

// Utilisez la fonction pour obtenir la liste des categoriees
$categorieList = getcategorie();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["ajouter"])) {
    // Check if the keys exist in the $_POST array
    $libelle = isset($_POST["plat_title"]) ? $_POST["plat_title"] : null;
    $description = isset($_POST["plat_label"]) ? $_POST["plat_label"] : null;
    $prix = isset($_POST["prix"]) ? $_POST["prix"] : null;
    $id_categorie = isset($_POST["categorie"]) ? $_POST["categorie"] : null;
    // Vérifier si un fichier a été téléchargé
    if (isset($_FILES["plat_picture"])) {
        $file_name = $_FILES["plat_picture"]["name"];

        // Check if the required values are not null
        if ($libelle !== null && $description !== null && $prix !== null) {
            // Insérer les données dans la base de données
            $sql = "INSERT INTO plat (libelle, description, prix, image , id_categorie) VALUES ('$libelle', '$description', '$prix', '$file_name', '$id_categorie')";
            if ($conn->query($sql) === TRUE) {
                // Rediriger vers la page d'accueil
                header("Location: index.php");
                exit();
            } else {
                echo "Erreur lors de l'ajout du plat : " . $conn->error;
            }
        } else {
            echo "Certains champs ne sont pas définis.";
        }
    } else {
        echo "Aucune image téléchargée.";
    }
}

?>




