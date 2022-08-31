<?php
session_start();
require_once "db_config.php";
$datum =$_SESSION['adminRezDatum'];

$sql = 'SELECT * FROM rezervacija where datum=:datum';
$stmt = $connection->prepare($sql);
$stmt->bindParam(':datum', $datum, PDO::PARAM_STR);
$stmt->execute();
$json_array=array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $json_array[]=$row;

}
echo json_encode($json_array);