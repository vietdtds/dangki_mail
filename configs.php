<?php
function connectDB()
{
  try {
    $conn = new PDO('mysql:host=localhost;dbname=users;port=3306', 'root', '');
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  return $conn;
}
