<!-- delete_form.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer un PLat</title>
</head>
<body>

<h1>Supprimer un Plat</h1>

<form method="POST" action="delete_script.php">
    <plat_label for="plat_id">ID du plat à supprimer:</plat_label>
    <input type="text" name="id_plat" required>
    <button type="submit">Supprimer</button>
</form>

</body>
</html>
