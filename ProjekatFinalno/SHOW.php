<?php

session_start();
require_once "db_config.php";
$idUUU = $_SESSION['userUid'];
echo $idUUU;
$sql = 'SELECT * FROM rezervacija where idU=:ID';
$stmt = $connection->prepare($sql);
$stmt->bindParam(':ID', $idUUU, PDO::PARAM_INT);
$stmt->execute();
$json_array=array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $json_array[]=$row;

}
echo json_encode($json_array);

