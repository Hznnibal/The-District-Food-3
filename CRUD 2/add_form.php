<?php
include 'add_script.php';
?>

<?php
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Plat</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <h3>Ajouter un plat</h3>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
        <label for="plat_title">Titre:</label>
        <input type="text" name="plat_title" required><br>
        <label for="categorie">Catégorie:</label>
        <select name="categorie" id="id_categorie">
            <?php
            // Parcourez la liste des categoriees et créez des options pour le select
            foreach ($categorieList as $categorie) {
                echo '<option value="' . $categorie['id_categorie'] . '">' . $categorie['libelle'] . '</option>';
            }
            ?>
        </select><br>
        <label for="plat_label">Description:</label>
        <input type="text" name="plat_label"><br>
        <label for="prix">Prix :</label>
        <input type="text" name="prix" required><br>
        <label for="plat_picture">Image:</label>
        <input type="file" name="plat_picture" accept="image/*" required><br>
        <button type="submit" name="ajouter">Ajouter</button><br>
    </form>
</body>
</html>
