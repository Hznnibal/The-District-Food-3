<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commandez en ligne</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            max-width: 600px;
            margin: auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, select, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
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
            <option value="item1">Article 1</option>
            <option value="item2">Article 2</option>
            <option value="item3">Article 3</option>
        </select>

        <label for="quantity">Quantité:</label>
        <input type="number" id="quantity" name="quantity" min="1" required>

        <button type="submit">Commander</button>
    </form>

</body>
</html>
