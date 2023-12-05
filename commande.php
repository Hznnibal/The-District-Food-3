<?php
include 'header.php';

$servername = "localhost";
$username = "mustapha";
$password = "Afpa1234";
$dbname = "mustapha";

// Créez une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifiez la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Récupérez les données d'articles depuis la base de données
$sql = "SELECT * FROM plat";
$result = $conn->query($sql);

// Fermez la connexion,
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commandez en ligne</title>
    <link href="commande.css" rel="stylesheet" />


</head>
<body>

    <h2>Commandez en Ligne</h2>

    <form action="commande_script.php" method="post">
        <label for="name">Nom complet:</label>
        <input type="text" id="name" name="name" required>

        <label for="address">Adresse:</label>
        <textarea id="address" name="address" rows="4" required></textarea>

        <label for="items">Plats à commander:</label>
        <select id="items" name="items" multiple required>
            <?php
            // Affichez les options dynamiquement en utilisant les données de la base de données
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['libelle'] . "</option>";
                }
            }
            ?>
        </select>

        <label for="quantity">Quantité:</label>
        <input type="number" id="quantity" name="quantity" min="1" required>

        <button type="submit">Commander</button>
    </form>
</body>
</html>


<?php include 'footer.php'?>


