<?php
// Get the form data
$university = $_POST["university"];
$course = $_POST["course"];

// Open the SQLite database
$db = new PDO("sqlite:university.db");

// Prepare the SQL statement
$sql = "SELECT name, university, course FROM courses WHERE university=:university AND course=:course";
$stmt = $db->prepare($sql);
$stmt->bindParam(":university", $university);
$stmt->bindParam(":course", $course);

// Execute the query
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Return the results as JSON
header("Content-Type: application/json");
echo json_encode($results);
?>
