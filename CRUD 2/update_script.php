<?php
include 'db.php';

if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["modifier"])) {
    $id_plat = isset($_POST["id_plat"]) ? $_POST["id_plat"] : null;
    $libelle = isset($_POST["plat_title"]) ? $_POST["plat_title"] : null;
    $description = isset($_POST["plat_label"]) ? $_POST["plat_label"] : null;
    $prix = isset($_POST["prix"]) ? $_POST["prix"] : null;
    $image = isset($_POST["plat_picture"]) ? $_POST["plat_picture"] : null;
    $id_categorie = isset($_POST["categorie"]) ? $_POST["categorie"] : null;

    // Check if id_categorie is empty or does not exist in categorie table
    if ($id_categorie === "") {
        // Handle the case where id_categorie is not valid
        echo "Invalid category selected.";
        exit();
    }

    // Ensure that id_categorie is an integer
    $id_categorie = intval($id_categorie);

    // Use prepared statement to prevent SQL injection
    $sql = "UPDATE plat SET id_categorie=?, libelle=?, description=?, prix=?, image=? WHERE id_plat=?";
    
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        echo "Erreur de préparation de la requête : " . $conn->error;
        exit();
    }

    // Bind parameters
    $stmt->bind_param("issssi", $id_categorie, $libelle, $description, $prix, $image, $id_plat);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        // Redirect to the home page
        header("Location: index.php");
        exit();
    } else {
        echo "Erreur lors de la modification du plat : " . $stmt->error;
    }

    $stmt->close();
}
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

// Récupérer l'ID de l'categorie à modifier
if (isset($_GET["id_plat"])) {
    $id_plat = $_GET["id_plat"];

    // Récupérer les détails de l'categorie depuis la base de données
    $sql = "SELECT * FROM plat WHERE id_plat = $id_plat";
    $result = $conn->query($sql);

    if ($result === false) {
        echo "Erreur lors de la requête : " . $conn->error;
        exit();
    }

    if ($result->num_rows > 0) {
        $platss = $result->fetch_assoc();
    } else {
        echo "Aucun enregistrement trouvé.";
        exit();
    }
} else {
    echo "Identifiant du plat non spécifié.";
    exit();
}

?>