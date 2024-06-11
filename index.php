<?php

const API_URL = "https://whenisthenextmcufilm.com/api";
# inicializamos una nueva sesion de cULR ; ch = cURL handler
$ch = curl_init(API_URL);
// indicar que queremos recibir el resultado de la peticion y no mostrarlo en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
/* ejecutamos la peticion
    y guardamos el resultado
*/
$result = curl_exec($ch);

// otra alternativa es utilizar file_get_contents
// $result = file_get_content(API_URL); # si solo quieres hacer un GET de una API, este metodo no da mas opciones.

$data = json_decode($result, true); # 'true' means that the data is transformed to an associative array

curl_close($ch); # close the curl sesion

// var_dump($data); # see what the data have
?>



<head>
    <title>La proxima pelicula de marvel</title>
    <!-- Centered viewport --> 
    <meta charset="UTF-8"/>
    <meta name="description" content="la proxima pelicula de marvel"/>
    <meta name="viewport" content="with=device-width, initial-scale=1.0"/>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    />
</head>


<main>
    <section >
        <h2>La proxima produccion de marvel</h2>
    </section>
    <!-- <pre style="font-size: 10px; overflow:scroll; height: 200px;">
        <?php var_dump($data);?>
    </pre> -->
    <section>
        <img src="<?=$data["poster_url"]?>" width="300" alt="Poster de <?=$data["title"];?>" 
        style="border-radius: 20px ;"
        />
    </section>

    <hgroup>
        <h3><?= $data["title"];?> se estrena en <?= $data["days_until"];?> días</h3>
        <p>Fecha de estreno <?= $data["release_date"];?></p>
        <p>La siguiete es: <?=$data["following_production"]["title"];?>, Tipo: <?=$data["following_production"]["type"];?></p>
    </hgroup>
</main>


<style>
    :root {
        color-scheme: light dark;
    }

    body {
        display: grid;
        place-content: center;
    }
    img {
        margin: 0 auto;
    }
    section {
        display: flex;
        justify-content: center;
    }
    hgroup {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }
</style>