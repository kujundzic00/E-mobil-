<?php
if(isset($_POST['submit-admin'])){
require "db_config.php";
$username=trim($_POST['usernameA']);
$password=trim($_POST['passwordA']);
if(!empty($username) || !empty($password)){
$sql="SELECT * FROM admin where username=:username and password=:password";
$stmt=$connection->prepare($sql);
if(!$stmt){
echo "error";
}

else{
$stmt->bindParam(':username',$username,PDO::PARAM_STR);
$stmt->bindParam(':password',$password,PDO::PARAM_STR);
$stmt->execute();

$result=$stmt->fetch();
if($row=$result){
session_start();
$_SESSION['idA']=$row['id'];

header("Location: adminKonobar.php");
}
else{
echo '<script language="javascript">';
    echo 'alert("Ne postoji ovaj admin");';
    echo 'window.location.href="adminKonobar.php";';
    echo '</script>';
exit();
}

}}
else{
echo '<script language="javascript">';
    echo 'alert("Polja ne mogu biti prazna");';
    echo 'window.location.href="adminKonobar.php";';
    echo '</script>';
exit();
}

}
