<?php
$file = __DIR__ . '/../data/campers.json';
$campers = json_decode(file_get_contents($file), true);
echo "<h1>Campers</h1><ul>";
foreach ($campers as $id => $c) {
  $progress = implode(", ", $c['progress']);
  echo "<li><strong>{$c['name']}</strong> - Completed: {$progress}</li>";
}
echo "</ul>";
?>

/* styles.css */
body { font-family: sans-serif; background: #f9fafb; color: #111; }
input, button { margin: 0.5rem 0; }
h1 { margin-bottom: 1rem; }
ul { margin-top: 1rem; }