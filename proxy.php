<?php
// proxy.php

// Get the target URL from the query string
$targetUrl = $_GET['url'];

if (!$targetUrl) {
    http_response_code(400); // Bad request
    echo 'Target URL is required';
    exit();
}

// Set up cURL
$ch = curl_init($targetUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Forward any additional request headers
foreach (getallheaders() as $name => $value) {
    if ($name !== 'Host') {
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("$name: $value"));
    }
}

// Execute the request
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// Close cURL session
curl_close($ch);

// Set response headers
header('Content-Type: application/json');
http_response_code($httpCode);

// Forward the response
echo $response;
?>
