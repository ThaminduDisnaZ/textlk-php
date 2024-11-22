<?php
// Your Text.lk token
$apiToken = "115|zivPot1MVvKMEJfd8I4XqmGtM3xUZl5QWM8mLIx9e0a44806";

// SMS sending endpoint
$apiUrl = "https://text.lk/api/v3/sms/send";

// SMS details
$data = [
    "recipient" => "94764501212", // Replace with recipient's phone number (Sri Lankan format with country code)
    "message"   => "Hello, this is a test message!", // Your message content
    "sender_id" => "TEXTLK", // Replace with your sender ID (if applicable, else Text.lk default will apply)
];

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); // Convert array to query string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Receive server response
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $apiToken", // Add the token in the Authorization header
    "Content-Type: application/x-www-form-urlencoded" // Content type for POST data
]);

// Execute the request
$response = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    echo "cURL error: " . curl_error($ch);
} else {
    // Decode the response (assumes it's JSON)
    $result = json_decode($response, true);
    print_r($result); // Print the result
}

// Close cURL session
curl_close($ch);
?>