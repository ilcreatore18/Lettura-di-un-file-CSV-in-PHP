<?php
$filename = "log.csv";
$file = fopen($filename, "r");

if (!$file) {
    die("Errore nell'apertura del file");
}

echo "<table border='1' style='border-collapse: collapse; text-align: left;'>";

$isHeader = true;

while (($row = fgetcsv($file, 1000, ",")) !== FALSE) {
    echo "<tr>";
    foreach ($row as $cell) {
        if ($isHeader) {
            echo "<th style='padding: 8px; background: #f2f2f2;'>" . htmlspecialchars($cell) . "</th>";
        } else {
            echo "<td style='padding: 8px;'>" . htmlspecialchars($cell) . "</td>";
        }
    }
    echo "</tr>";
    $isHeader = false;
}

echo "</table>";

fclose($file);
?>