<?php
// Connexion à la base de données (à réutiliser depuis votre fichier principal)
$servername = "localhost";
$username = "mustapha";
$password = "Afpa1234";
$dbname = "mustapha";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}

$limit = isset($_POST['limit']) ? $_POST['limit'] : 6;
$offset = isset($_POST['offset']) ? $_POST['offset'] : 0;

// Récupérer les plats supplémentaires depuis la base de données
$sql = "SELECT plat.libelle AS plat_libelle, plat.description, plat.prix, plat.image, plat.id_categorie AS plat_categorie
        FROM plat
        JOIN categorie ON plat.id_categorie = categorie.id_categorie
        LIMIT $limit OFFSET $offset";

$result = $conn->query($sql);

if ($result) {
    echo '<div class="row grid">';
    foreach ($result as $row) {
        echo '<div class="filters-content">';
        echo '<div class="col-sm-6 col-lg-4 grid-item ' . strtolower($row["plat_categorie"]) . '">';
        echo '<div class="box">';
        echo '<div class="img-box">';
        echo '<img src="images_the_district/food/' . $row["image"] . '" alt="plat">';
        echo '</div>';
        echo '<div class="detail-box">';
        echo '<h5>' . $row["plat_libelle"] . '</h5>';
        echo '<p>' . $row["description"] . '</p>';
        echo '<div class="options">';
        echo '<h6>$' . $row["prix"] . '</h6>';
        echo '<a href="commande.php">';
        echo '<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">';
        echo '<g>';
        echo '<g>';
        echo '<path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
             c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />';
        echo '</g>';
        echo '</g>';
        echo '<g>';
        echo '<g>';
        echo '<path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
             C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
             c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
             C457.728,97.71,450.56,86.958,439.296,84.91z" />';
        echo '</g>';
        echo '</g>';
        echo '<g>';
        echo '<g>';
        echo '<path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
             c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />';
        echo '</g>';
        echo '</g>';
        echo '<g>';
        echo '</g>';
        echo '<g>';
        echo '</g>';
        echo '<g>';
        echo '</g>';
        echo '<g>';
        echo '</g>';
        echo '<g>';
        echo '</g>';
        echo '<g>';
        echo '</g>';
        echo '<g>';
        echo '</g>';
        echo '<g>';
        echo '</g>';
        echo '<g>';
        echo '</g>';
        echo '<g>';
        echo '</g>';
        echo '<g>';
        echo '</g>';
        echo '<g>';
        echo '</g>';
        echo '<g>';
        echo '</g>';
        echo '<g>';
        echo '</g>';
        echo '<g>';
        echo '</g>';
        echo '<g>';
        echo '</g>';
        echo '<g>';
        echo '</g>';
        echo '<g>';
        echo '</g>';
        echo '</svg>';
        echo '</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "Query failed";
}

// Fermer la connexion
$conn = null;
?>
