<?php
$apiUrl = "https://crud.jonathansoto.mx/api/products";

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer 422|3swFeMEYBqDdjOsxSxr6gjMlFF5bix3kxg2qffuG',
]);

$response = curl_exec($ch);

if(curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    $productos = json_decode($response, true);
}

curl_close($ch);
?>
