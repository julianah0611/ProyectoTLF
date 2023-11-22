
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analizador de Cadenas PHP</title>
	<style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .resultados {
            margin-top: 20px;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        strong {
            color: #333;
        }
    </style>
</head>
<body>
    <h1>Analizador de Cadenas PHP</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="cadena">Ingresa una cadena:</label><br>
        <textarea name="cadena"  rows="10" cols="50"><?php echo isset($_POST['cadena']) ? htmlspecialchars($_POST['cadena']) : ''; ?></textarea><br><br>
        <input type="submit" value="Analizar">
    </form>
	<div class="resultados">
	<?php require_once('acciones.php'); ?>
		</div>
</body>
</html>