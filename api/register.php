<?php
$data = json_decode(file_get_contents("php://input"), true);
$name = trim($data['name']);
$code = trim($data['code']);
if (!$name || !$code) {
  echo json_encode(["success" => false]);
  exit;
}
$file = __DIR__ . '/../data/campers.json';
$campers = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
foreach ($campers as $c) {
  if ($c['name'] === $name) {
    echo json_encode(["success" => false, "message" => "Name already taken."]);
    exit;
  }
}
$id = uniqid("camper_");
$campers[$id] = ["name" => $name, "code" => $code, "progress" => []];
file_put_contents($file, json_encode($campers, JSON_PRETTY_PRINT));
echo json_encode(["success" => true]);
?>