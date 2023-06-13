<!DOCTYPE html>
<html>

<head>
    <title>Calculadora de Pagamento com Juros</title>
</head>

<body>
    <h1>Calculadora de Pagamento com Juros</h1>
    <form method="POST">
        <label for="preco">Preço do produto:</label>
        <input type="number" name="preco" id="preco" required><br><br>

        <label for="taxa_juros">Taxa de juros (% anual):</label>
        <input type="number" name="taxa_juros" id="taxa_juros" required><br><br>

        <label for="periodo">Período de tempo (em meses):</label>
        <input type="number" name="periodo" id="periodo" required><br><br>

        <input type="submit" value="Calcular">
    </form>

    <?php
    validaEntradas();
    function validaEntradas()
    {
        if ($_POST["preco"] <= 0 || $_POST["taxa_juros"] <= 0 || $_POST["periodo"] <= 0){
            echo "<p>Insira valores positivos</p>";
            return;
        }
        calculaJuros();
    }

    function calculaJuros()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $preco = $_POST["preco"];
            $taxa_juros = $_POST["taxa_juros"] / 100; // converte a taxa de juros de porcentagem para decimal
            $periodo = $_POST["periodo"] / 12;
    
            // Fórmula do juros compostos
            $pagamento_total = $preco * (1 + $taxa_juros) ** $periodo;
            mostraResultado($pagamento_total);
        }
    }

    function mostraResultado($conteudo)
    {
        echo "<h2>O total a ser pago pelo produto é: R$" . number_format($conteudo, 2, ",", ".") . "</h2>";
    }
    ?>
</body>

</html>