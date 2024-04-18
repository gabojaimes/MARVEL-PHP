<?php 

const API_URL = "https://whenisthenextmcufilm.com/api";
# Inicializar una sesion de cURL
$ch = curl_init(API_URL);

//Indicamos queremos recibir el resultado y no mostrarla en pantalla

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
/*Ejecutar la peticion
y guardamos el resultado
*/
$result = curl_exec($ch);
$data = json_decode($result, true);
 
curl_close($ch);


?>

<head>
    <title>Proxima pelicula de Marvel MCU</title> 
    <meta name="description" content="UMC films">    
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- Centered viewport --> 
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    />
    <link rel="stylesheet"
     href="css/pico.classless.min.css"
      />

</head>

<main>
    <pre style="font-size: smaller; overflow: scroll; height: 258px;">
        <?php        
            var_dump($data);
        ?>
    </pre>
    <h2>La Proxima Pelicula de MARVEL</h2>
    <section>
       
        <img src="<?= $data["poster_url"]; ?>" alt="Poster MArvel <?= $data["title"]?>" width="250"
        style="border-radius: 16px;"
        >

    </section>
    <hgroup>
        <h3><?=  $data["title"]." se estrena en tan solo ".$data["days_until"]." dias"?></h3>
    <p>fecha de estreno: <?= $data["release_date"] ?></p>
    <p>La siguiente Pelicula sera: <?= $data["following_production"]["title"]; ?></p>

    </hgroup>
</main>

<style>

    :root{
        color-scheme: light dark;
    }

    body{

        display: grid;
        place-content: center;

    }

    section{
        display: flex ;
        justify-content: center;
        text-align: center;
    }
    hgroup{
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }
    img{
        margin: 0 auto;

    }
    h2{
        text-align: center;
    }
</style>