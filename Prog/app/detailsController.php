<?php
    if (isset($_GET['id'])) {
        $productoId = $_GET['id'];
    
        $apiUrl = "https://crud.jonathansoto.mx/api/products/$productoId";
    
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
            $producto = json_decode($response, true);
        }
    
        curl_close($ch);
    } else {
        echo "No se ha proporcionado un ID de producto.";
        exit;
    }
?>