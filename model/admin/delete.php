<?php
require '../../config/connect_db.php';
$id = $_GET['id'];
$sql = 'DELETE FROM tasks WHERE id= :id';
$statement = $conn->prepare($sql);
$statement->execute(['id'=> $id]);
 header("Location: index.php");
