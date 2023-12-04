<?php
// Connexion à la base de données (remplacez les valeurs par les vôtres)
include 'db.php';

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

// Fonction pour récupérer la liste des plats
function getplat() {
    global $conn;
    $sql = "SELECT * FROM plat";
    $result = $conn->query($sql);

    $plat = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $plat[] = $row;
        }
    }

    return $plat;
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
$categorieList = getcategorie();

// Si le formulaire d'ajout est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["ajouter"])) {
    $id_plat = $_POST["id_plat"];
    $libelle = $_POST["libelle"];
    $description = $_POST["description"];   
    $prix = $_POST["prix"];
    $image = $_POST["image"];
    $id_categorie = $_POST["id_categorie"];

    // Insérer les données dans la base de données
    $sql = "INSERT INTO plat (id_plat, libelle, description, prix, image, id_categorie ) VALUES ('$id_plat', '$libelle', '$description', ' $prix', '$image', '$id_categorie')";
    if ($conn->query($sql) === TRUE) {
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    } else {
        echo "Erreur lors de l'ajout du plat : " . $conn->error;
    }
}



// Si l'ID de l'categorie est passé en paramètre pour la modification ou la suppression
if (isset($_GET["id_plat"])) {
    $plat_id = $_GET["id_plat"];

    // Supprimer le plat
    if (isset($_GET["action"]) && $_GET["action"] == "supprimer") {
        $sql = "DELETE FROM plat WHERE id_plat = $plat_id";
        if ($conn->query($sql) === TRUE) {
            header("Location: {$_SERVER['PHP_SELF']}");
            exit();
        } else {
            echo "Erreur lors de la suppression du plat : " . $conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des plats</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>

<h1>Liste des plats</h1>
<a href="add_form.php">Ajouter</a>

<!-- Liste des plats -->
<ul>
<?php
    $plats = getplat();

    foreach ($plats as $platss) {
        echo "<div class=\"platss-container\">";
        echo "<li><img class=\"img_index\" src='../images_the_district/food/{$platss['image']}'>";

        foreach ($categorieList as $categorie) {
            if ($platss['id_categorie'] == $categorie['id_categorie']) {
                echo " - {$categorie['libelle']}";
                break; // Sortez de la boucle des categoriees une fois que vous avez trouvé la correspondance
            }
        }
        echo " - {$platss['libelle']} - {$platss['prix']} - ";
        echo "<div class=\"buttons\">";
        echo "<a href=\"update_form.php?id_plat={$platss['id_plat']}\">Modifier</a>";
        echo "<a href=\"{$_SERVER['PHP_SELF']}?id_plat={$platss['id_plat']}&action=supprimer\">Supprimer</a>";
        echo "</div>";
        echo "</div>"; // Fermez la div du container d'categorie
    }
    ?>

</body>
</html>

<?php
// Fermer la connexion à la base de données
$conn->close();
?>

