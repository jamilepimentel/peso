<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de Peso Ideal</title>
</head>

<body>
    <h2>Cálculo de Peso Ideal</h2>
    <form method="POST" action="">
        <label for="sexo">Sexo:</label>
        <select name="sexo" id="sexo" required>
            <option value="feminino">Feminino</option>
            <option value="masculino">Masculino</option>
        </select>
        <br><br>

        <label for="altura">Altura (metros):</label>
        <input type="number" name="altura" id="altura" step="0.01" required>
        <br><br>

        <label for="peso">Peso atual (kg):</label>
        <input type="number" name="peso" id="peso" step="0.1" required>
        <br><br>

        <input type="submit" value="Calcular">
    </form>

    <?php

    function calcularPesoIdeal($sexo, $altura) {
       
        if ($sexo === "feminino") {
         
            $pesoIdeal = (62.1 * $altura) - 44.7;
        } elseif ($sexo === "masculino") {
      
            $pesoIdeal = (72.2 * $altura) - 58;
        } else {
            return "Sexo inválido. Por favor, insira 'feminino' ou 'masculino'.";
        }

        return round($pesoIdeal, 2);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sexo = $_POST['sexo'];
        $altura = floatval($_POST['altura']);
        $peso = floatval($_POST['peso']);

        $pesoIdeal = calcularPesoIdeal($sexo, $altura);

        echo "<h3>Para uma pessoa do sexo $sexo com altura de " . number_format($altura, 2, ',', '.') . " m:</h3>";
        echo "<p>Peso ideal: " . number_format($pesoIdeal, 2, ',', '.') . " kg</p>";
        echo "<p>Peso atual: " . number_format($peso, 1, ',', '.') . " kg</p>";
    }

    ?>

</body>

</html>

