<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupérer les données du formulaire
    $name = htmlspecialchars($_POST["name"]);
    $address = htmlspecialchars($_POST["address"]);
    $items = isset($_POST["items"]) ? $_POST["items"] : [];
    $quantity = htmlspecialchars($_POST["quantity"]);

    // Faire quelque chose avec les données (par exemple, enregistrez-les dans une base de données)
    // Pour cet exemple, nous allons simplement les afficher
    echo "<h2>Commande confirmée</h2>";
    echo "<p>Nom: $name</p>";
    echo "<p>Adresse: $address</p>";
    echo "<p>Articles commandés:</p>";
    echo "<ul>";
    foreach ($items as $item) {
        echo "<li>$item</li>";
    }
    echo "</ul>";
    echo "<p>Quantité: $quantity</p>";
} else {
    // Rediriger si la page n'est pas accédée via POST
    header("Location: /");
    exit();
}
?>
