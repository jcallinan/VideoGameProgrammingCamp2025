<?php
$data = json_decode(file_get_contents("php://input"), true);
$name = trim($data['name']);
$code = trim($data['code']);
if (!$name || $code !== "camp2025") {
  echo json_encode(["success" => false]);
  exit;
}
$file = __DIR__ . '/../data/campers.json';
$campers = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
$id = uniqid("camper_");
$campers[$id] = ["name" => $name, "progress" => []];
file_put_contents($file, json_encode($campers, JSON_PRETTY_PRINT));
setcookie("camper_id", $id, time()+86400, "/");
echo json_encode(["success" => true]);
?>