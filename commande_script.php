<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = htmlspecialchars($_POST["name"]);
    $address = htmlspecialchars($_POST["address"]);
    $items = isset($_POST["items"]) ? $_POST["items"] : [];
    $quantity = htmlspecialchars($_POST["quantity"]);

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

    header("Location: /");
    exit();
}
?>
