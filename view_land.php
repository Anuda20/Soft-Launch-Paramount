<?php
require 'db_connect.php'; // connect to database

// Fetch all land records
$stmt = $pdo->query("SELECT * FROM land_planning ORDER BY land_id DESC");
$lands = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>All Land Records</h2>
<table class="min-w-full border border-gray-300">
    <thead class="bg-gray-200">
        <tr>
            <th class="border px-4 py-2">Land ID</th>
            <th class="border px-4 py-2">Land Size (sq m)</th>
            <th class="border px-4 py-2">Soil Type</th>
            <th class="border px-4 py-2">Sunlight Hours</th>
            <th class="border px-4 py-2">Recommended Plants</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($lands as $land): ?>
        <tr>
            <td class="border px-4 py-2"><?= $land['land_id'] ?></td>
            <td class="border px-4 py-2"><?= $land['land_size'] ?></td>
            <td class="border px-4 py-2"><?= $land['soil_type'] ?></td>
            <td class="border px-4 py-2"><?= $land['sunlight_hours'] ?></td>
            <td class="border px-4 py-2"><?= $land['recommended_plants'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
