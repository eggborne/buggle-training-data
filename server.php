<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the raw POST data
    $json = file_get_contents('php://input');

    // Decode the JSON to get fileName and data
    $decodedData = json_decode($json, true);

    if (isset($decodedData['fileName']) && isset($decodedData['data'])) {
        $fileName = basename($decodedData['fileName']);
        $directory = basename($decodedData['directory']);
        $filePath = 'research/' . $directory . '/' . $fileName;
        
        file_put_contents($filePath, json_encode($decodedData['data'], JSON_PRETTY_PRINT));

        echo 'Data saved successfully';
    } else {
        echo 'Invalid request: fileName or data missing';
    }
} else {
    echo 'Invalid request method';
}
?>
