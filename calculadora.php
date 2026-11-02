<?php
$resultado = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["calcular"])) {
    $num1 = (float) $_POST["num1"];
    $num2 = (float) $_POST["num2"];
    $operacion = $_POST["operacion"];

    if ($operacion === "division" && $num2 == 0) {
        $resultado = "No se puede dividir entre 0";
    } else {
        if ($operacion === "suma") {
            $resultado = $num1 + $num2;
        } elseif ($operacion === "resta") {
            $resultado = $num1 - $num2;
        } elseif ($operacion === "multiplicacion") {
            $resultado = $num1 * $num2;
        } elseif ($operacion === "division") {
            $resultado = $num1 / $num2;
        }
    }
}
?>
<h4 class="text-decoration-underline">Calculadora</h4>
<form method="post" action="main.php#calculadora">
    <label for="num1" class="form-label">Numero 1:</label>
    <input type="number" id="num1" name="num1" step="any" required class="form-control mb-3" value="<?= $_POST["num1"] ?? "" ?>">

    <label for="num2" class="form-label">Numero 2:</label>
    <input type="number" id="num2" name="num2" step="any" required class="form-control mb-3" value="<?= $_POST["num2"] ?? "" ?>">

    <label for="operacion" class="form-label">Operacion:</label>
    <select id="operacion" name="operacion" class="form-select mb-3">
        <option value="suma">Suma (+)</option>
        <option value="resta">Resta (-)</option>
        <option value="multiplicacion">Multiplicacion (x)</option>
        <option value="division">Division (/)</option>
    </select>

    <button type="submit" name="calcular" value="1" class="btn btn-primary">Calcular</button>
</form>

<?php if ($resultado !== ""): ?>
    <p class="alert alert-success mt-3"><strong>Resultado:</strong> <?= $resultado ?></p>
<?php endif; ?>
