<?php
header('Content-Type: application/json');
$ip = 'rp.nightstories.fr';
$port = '30120';

$info = @file_get_contents("https://$ip:$port/info.json");
$players = @file_get_contents("https://$ip:$port/players.json");

if ($info && $players) {
    echo json_encode([
        'info' => json_decode($info, true),
        'players' => json_decode($players, true)
    ]);
} else {
    http_response_code(503);
    echo json_encode(['error' => 'offline']);
}
