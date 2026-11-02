<?php
require 'datos.php';

$tabActiva = "perfil";
if (isset($_POST["btn"])) {
    $tabActiva = "calculadora-avanzada";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi CV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="contenedor shadow">
        <ul class="nav nav-tabs mb-3" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link <?= $tabActiva === "perfil" ? "active" : "" ?>" data-bs-toggle="tab" data-bs-target="#perfil" type="button" role="tab" aria-selected="<?= $tabActiva === "perfil" ? "true" : "false" ?>">Perfil</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link <?= $tabActiva === "calculadora-avanzada" ? "active" : "" ?>" data-bs-toggle="tab" data-bs-target="#calculadora-avanzada" type="button" role="tab" aria-selected="<?= $tabActiva === "calculadora-avanzada" ? "true" : "false" ?>">Calculadora Avanzada</button>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade <?= $tabActiva === "perfil" ? "show active" : "" ?>" id="perfil" role="tabpanel">
                <img id="foto" src="foto.jpeg" alt="Foto de Danny Ricardo Macias Alvarado">
                <h4 id="titulo"><?= $nombre ?></h4>
                <div class="text-center">
                    <p><?= $ubicacion ?></p>
                </div>
                <h4 class="text-decoration-underline">Perfil Profesional</h4>
                <p><?= $perfil ?></p>
                <h4 class="text-decoration-underline">Estudios</h4>
                <ul>
                    <?php foreach ($estudios as $estudio): ?>
                        <li><?= $estudio ?></li>
                    <?php endforeach; ?>
                </ul>
                <h4 class="text-decoration-underline">Experiencia Profesional</h4>
                <ul>
                    <?php foreach ($experiencia as $trabajo): ?>
                        <li><?= $trabajo ?></li>
                    <?php endforeach; ?>
                </ul>
                <h4 class="text-decoration-underline">Conocimientos Técnicos</h4>
                <ul>
                    <?php foreach ($conocimientos as $conocimiento): ?>
                        <li><?= $conocimiento ?></li>
                    <?php endforeach; ?>
                </ul>
                <h4 class="text-decoration-underline">Contacto</h4>
                <ul>
                    <?php foreach ($contacto as $etiqueta => $valor): ?>
                        <li><strong><?= $etiqueta ?>: </strong><?= $valor ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="tab-pane fade <?= $tabActiva === "calculadora-avanzada" ? "show active" : "" ?>" id="calculadora-avanzada" role="tabpanel">
                <?php require 'calculadora-avanzada.php'; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
