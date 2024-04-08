<?php
const API_URL = 'https://whenisthenextmcufilm.com/api';
$ch = curl_init(API_URL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
$data = json_decode($result, true);
curl_close($ch);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La próxima película de Marvel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"/>
</head>
<body style="display: grid; place-content: center;">
    <section style="display: flex; justify-content: center">
        <img src="<?= $data["poster_url"];?>" style="border-radius: 16px; margin: 0 auto;" width="400px" alt="">
    </section>
    <hgroup style="display: flex; flex-direction: column; justify-content: center;">
        <h3><?= $data["title"];?> se estrena en <?= $data["days_until"];?> días.</h3>
        <p>Fecha de estreno: <?= $data["release_date"]?></p>
        <p>La siguiente película es: <?= $data["following_production"]["title"]?></p>
    </hgroup>
</body>
</html>