<?php
include 'update_script.php';
?>

<?php
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un plat</title>
</head>
<body>

<h1>Modifier le plat</h1>

<!-- Formulaire de modification -->
<form method="POST" action="update_script.php">
    <input type="hidden" name="id_plat" value="<?php echo $platss['id_plat']; ?>">
    <label for="plat_title">Titre:</label>
    <input type="text" name="plat_title" value="<?php echo $platss['libelle']; ?>" required>
    <label for="categorie">Catégorie:</label>  <!-- Updated field name -->
    <select name="categorie" id="id_categorie">
        <?php
        // Parcourez la liste des categoriees et créez des options pour le select
        foreach ($categorieList as $categorie) {
            echo '<option value="' . $categorie['id_categorie'] . '" ' . ($platss['id_categorie'] == $categorie['id_categorie'] ? 'selected' : '') . '>' . $categorie['libelle'] . '</option>';
        }
        ?>
    </select>
    <label for="plat_label">Description:</label>  <!-- Updated field name -->
    <input type="text" name="plat_label" value="<?php echo $platss['description']; ?>">
    <label for="prix">Prix :</label>
    <input type="text" name="prix" value="<?php echo $platss['prix']; ?>" required>
    <input type="file" name="plat_picture" value="<?php echo $platss['image']; ?>" accept="image/*" required><br>
    <!-- Ajoutez d'autres champs ici -->
    <button type="submit" name="modifier">Modifier</button>
</form>

</body>
</html>
