<?php
$expresion = $_POST["expresion"] ?? "";
$resultado = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $btn = $_POST["btn"] ?? "";

    if ($btn === "C") {
        $expresion = "";
    } elseif ($btn === "←") {
        $expresion = substr($expresion, 0, -1);
    } elseif ($btn === "=") {
        $limpia = preg_replace("/[^0-9+\-*\/().]/", "", $expresion);
        if ($limpia === "") {
            $error = "Escribe algo antes de calcular";
        } else {
            try {
                $valor = eval("return ($limpia);");
                if (is_numeric($valor) && is_finite($valor)) {
                    $resultado = "$limpia = " . round($valor, 10);
                } else {
                    $error = "Error matematico";
                }
            } catch (Throwable $e) {
                $error = "Expresion no valida";
            }
        }
    } else {
        $expresion .= $btn;
    }
}
?>
<h4 class="text-decoration-underline">Calculadora Avanzada</h4>
<form method="post" action="main.php#calculadora-avanzada">
    <input type="hidden" name="expresion" value="<?= htmlspecialchars($expresion) ?>">

    <input type="text" class="form-control mb-3" readonly value="<?= htmlspecialchars($expresion) ?>" placeholder="0">

    <?php if ($resultado !== ""): ?>
        <div class="alert alert-success"><?= $resultado ?></div>
    <?php endif; ?>
    <?php if ($error !== ""): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <div class="row g-2">
        <div class="col-3 d-grid"><button type="submit" name="btn" value="C" class="btn btn-danger">C</button></div>
        <div class="col-3 d-grid"><button type="submit" name="btn" value="(" class="btn btn-secondary">(</button></div>
        <div class="col-3 d-grid"><button type="submit" name="btn" value=")" class="btn btn-secondary">)</button></div>
        <div class="col-3 d-grid"><button type="submit" name="btn" value="←" class="btn btn-secondary">←</button></div>

        <div class="col-3 d-grid"><button type="submit" name="btn" value="7" class="btn btn-secondary">7</button></div>
        <div class="col-3 d-grid"><button type="submit" name="btn" value="8" class="btn btn-secondary">8</button></div>
        <div class="col-3 d-grid"><button type="submit" name="btn" value="9" class="btn btn-secondary">9</button></div>
        <div class="col-3 d-grid"><button type="submit" name="btn" value="/" class="btn btn-warning">÷</button></div>

        <div class="col-3 d-grid"><button type="submit" name="btn" value="4" class="btn btn-secondary">4</button></div>
        <div class="col-3 d-grid"><button type="submit" name="btn" value="5" class="btn btn-secondary">5</button></div>
        <div class="col-3 d-grid"><button type="submit" name="btn" value="6" class="btn btn-secondary">6</button></div>
        <div class="col-3 d-grid"><button type="submit" name="btn" value="*" class="btn btn-warning">×</button></div>

        <div class="col-3 d-grid"><button type="submit" name="btn" value="1" class="btn btn-secondary">1</button></div>
        <div class="col-3 d-grid"><button type="submit" name="btn" value="2" class="btn btn-secondary">2</button></div>
        <div class="col-3 d-grid"><button type="submit" name="btn" value="3" class="btn btn-secondary">3</button></div>
        <div class="col-3 d-grid"><button type="submit" name="btn" value="-" class="btn btn-warning">-</button></div>

        <div class="col-3 d-grid"><button type="submit" name="btn" value="0" class="btn btn-secondary">0</button></div>
        <div class="col-3 d-grid"><button type="submit" name="btn" value="." class="btn btn-secondary">.</button></div>
        <div class="col-3 d-grid"><button type="submit" name="btn" value="=" class="btn btn-primary">=</button></div>
        <div class="col-3 d-grid"><button type="submit" name="btn" value="+" class="btn btn-warning">+</button></div>
    </div>
</form>
