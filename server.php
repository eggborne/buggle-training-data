<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents('php://input');
    $filePath = 'research/best-lists.json';
    file_put_contents($filePath, $json);
    echo 'Data saved successfully';
} else {
    echo 'Invalid request';
}
?>
