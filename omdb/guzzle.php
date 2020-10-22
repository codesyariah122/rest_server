<?php
require '../vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();

$response = $client->request('GET', 'http://omdbapi.com', [
    'query' => [
        'apiKey' => '43c80ec7',
        's' => 'transformer'
    ]
]);

$result = json_decode($response->getBody()->getContents(), 1);
// var_dump($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie</title>
</head>
<body>
    <?php foreach($result['Search'] as $movie):?>
        <ul>
            <li>Title : <?=$movie['Title']?></li>
            <li>Year: <?=$movie['Year']?></li>
            <li>
                <img src="<?=$movie['Poster']?>" alt="">
            </li>
        </ul>
    <?php endforeach;?>
</body>
</html>
