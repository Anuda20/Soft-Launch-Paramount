<?php
require 'db_connect.php'; // connect to database

$recommended_plants = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $land_size = $_POST['land_size'];
    $soil_type = $_POST['soil_type'];
    $sunlight_hours = $_POST['sunlight_hours'];

    // Simple plant recommendation rules
    $plants = [];
    if ($soil_type == 'sandy') {
        $plants[] = 'Cactus';
    } elseif ($soil_type == 'clay') {
        $plants[] = 'Bamboo';
    } elseif ($soil_type == 'loamy') {
        $plants[] = 'Tulips';
    }

    if ($sunlight_hours > 6) {
        $plants[] = 'Roses';
    }

    $recommended_plants = implode(', ', $plants);

    // Insert into database
    $stmt = $pdo->prepare("INSERT INTO land_planning (land_size, soil_type, sunlight_hours, recommended_plants) VALUES (?, ?, ?, ?)");
    $stmt->execute([$land_size, $soil_type, $sunlight_hours, $recommended_plants]);

    echo "<p style='color:green;'>✅ Land record added successfully!</p>";
}
?>

<h2>Add Land</h2>
<form method="post">
    <label>Land Size (sq meters):</label><br>
    <input type="number" step="0.01" name="land_size" required><br><br>

    <label>Soil Type:</label><br>
    <select name="soil_type" required>
        <option value="sandy">Sandy</option>
        <option value="clay">Clay</option>
        <option value="loamy">Loamy</option>
    </select><br><br>

    <label>Sunlight Hours:</label><br>
    <input type="number" name="sunlight_hours" required><br><br>

    <button type="submit">Add Land</button>
</form>
