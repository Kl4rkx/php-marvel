<?php
const API_URL = "https://whenisthenextmcufilm.com/api";
# Primer llamada a API desde php

# Primero inicializar el cURL handler
$ch = curl_init(API_URL);

// Ahora vamos a indicar que queremos recibir la respuesta y no mostrarla por pantalla.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Se añade useragent para evitar que la API nos devuelva un error 403
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)');

/* Ahora ejecutar la petición
y guardar el resultado */

$result = curl_exec($ch);

// Ahora cogemos los datos
$data = json_decode($result, true);

// Ya no hay que cerrar la conexión porque PHP lo hace automáticamente

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proxima Película de Marvel</title>
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 64 64'%3E%3Crect width='64' height='64' rx='14' fill='%23e62429'/%3E%3Cpath d='M12 50V14h10l10 18 10-18h10v36H42V31L32 48 22 31v19H12z' fill='white'/%3E%3C/svg%3E">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
</head>

<main>
    <h2>Proxima Película de Marvel</h2>

    <h3>Titulo: <?= $data['title'] ?></h3>

    <img src="<?= $data['poster_url'] ?>" alt="Poster de la proxima película de Marvel"
        style=" height: 300px; border-radius: 10px;">

    <h3>Se estrena el <?= $data["release_date"] ?></h3>
    <p>Faltan <?= $data["days_until"] ?> días</p>
    <p>By: <a href="https://github.com/kl4rkx" target="_blank">@kl4rkx</a></p>
</main>

<style>
    main {
        display: grid;
        place-content: center;
        place-items: center;
        text-align: center;
        gap: 10px;
    }

    img {
        box-shadow: 0px 0px 10px 0px #000000;
    }
</style>