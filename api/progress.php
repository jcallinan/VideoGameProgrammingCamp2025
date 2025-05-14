<?php
$camperId = $_COOKIE['camper_id'] ?? null;
$data = json_decode(file_get_contents("php://input"), true);
if (!$camperId || !$data['day']) {
  echo json_encode(["success" => false]);
  exit;
}
$file = __DIR__ . '/../data/campers.json';
$campers = json_decode(file_get_contents($file), true);
$campers[$camperId]['progress'][] = $data['day'];
file_put_contents($file, json_encode($campers, JSON_PRETTY_PRINT));
echo json_encode(["success" => true]);
?>