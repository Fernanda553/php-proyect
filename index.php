<?php
const API_URL = 'https://whenisthenextmcufilm.com/api';
# Inicializar una nueva sesión de cURL; ch= cURL handle
$ch = curl_init(API_URL);
// Indicar que queremos recibir el resultado de la petición y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
/* Ejecutar la petición
y guardar el resultado */

// Alternativa sería utilizar file_get_contents
// $result = file_get_contents(API_URL); // si solo quiero hacer un Get de una API

$result = curl_exec($ch);
$data = json_decode($result, true);

curl_close($ch);

?>

<head>
    <meta charset="UTF-8"/>
    <title>La próxima película de Marvel</title>
    <meta name="description" content="La próxima película de Marvel"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
>
</head>

<main>
    <section>
    <img src="<?= $data["poster_url"]?>"; width="400" alt="Poster de <?= $data["title"];?>"/>
    </section>

    <hgroup>
        <h3> <?= $data["title"]; ?> se estrena en <?= $data["days_until"];?> días</h3>
        <br/>
        <p>Fecha de estreno: <?= $data["release_date"]?></p>
        <p>La siguiente es: <?= $data["following_production"]["title"] ?> </p>
    </hgroup>
</main>
