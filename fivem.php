<?php
$ip = "rp.nightstories.fr";
$port = 30120;

$infoUrl = "http://$ip:$port/info.json"; // si HTTPS, changez en https

$info = @file_get_contents($infoUrl);

if ($info === FALSE) {
    echo json_encode(['error' => true]);
    exit;
}

$data = json_decode($info, true);

echo json_encode([
    'error' => false,
    'info' => $data,
    'players' => $data['clients'] ?? 0
]);
?>
