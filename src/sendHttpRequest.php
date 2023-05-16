<?php

function sendHttpRequest($url, $method, $body = null) {
    $curl = curl_init();
    
    // Set the URL
    curl_setopt($curl, CURLOPT_URL, $url);
    
    // Set the request method
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, strtoupper($method));
    
    // Set the request body if provided
    if ($body !== null) {
        curl_setopt($curl, CURLOPT_POSTFIELDS, $body);
    }
    
    // Set additional options if needed
    // ...

    // Return the response instead of outputting it directly
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    // Execute the request
    $response = curl_exec($curl);

    // Check for cURL errors
    if(curl_errno($curl)) {
        $error_message = curl_error($curl);
        // Handle the error appropriately (e.g., log, throw exception)
        // ...
    }

    // Close the cURL session
    curl_close($curl);

    // Return the response
    return $response;
}

?>
