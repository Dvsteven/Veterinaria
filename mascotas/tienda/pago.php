<?php
// pago.php

// Obtener el total de la compra
$total = $_POST['total'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Proceso de Pago</h1>
    </header>
    <main>
        <section id="payment">
            <h2>Resumen del Pago</h2>
            <p>Total: $<?= number_format($total, 2) ?></p>
            <p>Tu pedido ha sido procesado. ¡Gracias por comprar con nosotros!</p>
        </section>
    </main>
</body>
</html>