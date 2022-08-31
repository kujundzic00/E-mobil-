<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require "PHPMailer/SMTP.php";
require "PHPMailer/Exception.php";
require "PHPMailer/PHPMailer.php";

if(isset($_POST['signup-submit'])){

require "db_config.php";
$uname=$_POST['uid'];
$ulastname=$_POST['ulastname'];
$unumber=$_POST['unumber'];
$email=$_POST['mail'];
$password=$_POST['pwd'];
$passwordRepeat=$_POST['pwd-repeat'];
$emailVerification="not verified";
$message='';


if(empty($uname) || empty($email) || empty($password) || empty($passwordRepeat
|| empty($ulastname) ||empty($unumber))){

    echo '<script language="javascript">';
    echo 'alert("Filds are empty");';
    echo 'window.location.href="ls.php";';
    echo '</script>';



}
else if(!filter_var($email,FILTER_VALIDATE_EMAIL ) && !preg_match("/^[a-zA-Z]*$/",$uname)){
/*!preg_match("/^[a-zA-Z0-9]*$/",$username)*/
echo '<script >';
    echo 'alert("Email and name are wrong");';
    echo 'window.location.href="ls.php";';
    echo '</script>';
exit();

}
else if(!filter_var($email,FILTER_VALIDATE_EMAIL ) || !preg_match("/^[a-zA-Z]*$/",$uname)
|| !preg_match("/^[a-zA-Z]*$/",$ulastname) || !preg_match("/^[0-9]*$/",$unumber)
){
/*!preg_match("/^[a-zA-Z0-9]*$/",$username)*/
echo '<script language="javascript">';
    echo 'alert("Check email/name/lastname/number");';
    echo 'window.location.href="ls.php";';
    echo '</script>';
exit();

}
else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
echo '<script language="javascript">';
    echo 'alert("Put the correct email");';
    echo 'window.location.href="ls.php";';
    echo '</script>';
exit();

}
else if(!preg_match("/^[a-zA-Z]*$/",$uname)){
echo '<script language="javascript">';
    echo 'alert("Name has to be a-z A-Z");';
    echo 'window.location.href="ls.php";';
    echo '</script>';
exit();

}
else if(!preg_match("/^[a-zA-Z]*$/",$ulastname)){
echo '<script language="javascript">';
    echo 'alert("Lastname has to be a-z A-Z");';
    echo 'window.location.href="ls.php";';
    echo '</script>';
exit();
}
else if(!preg_match("/^[0-9]*$/",$unumber)){

echo '<script language="javascript">';
    echo 'alert("Number has to be 0-9");';
    echo 'window.location.href="ls.php";';
    echo '</script>';
exit();
}
else if($password !==$passwordRepeat){
echo '<script language="javascript">';
    echo 'alert("Both password has to be same");';
    echo 'window.location.href="ls.php";';
    echo '</script>';
exit();

}
else{
$sql="SELECT email FROM korisnik where email=:email ";
$stmt=$connection->prepare($sql);
if(!$stmt){
exit();
}


else{
/*   mysqli_stmt_bind_param($stmt,"s",$email);*/
$stmt->bindParam(':email',$email,PDO::PARAM_STR);

/*s string,b boolean, i interger moze vise
parametra da se salje samo se doda jos jedno s ili nesto drugo*/

$stmt->execute();



$resultCheck=$stmt->rowCount();
if($resultCheck>0){
echo "Ovaj email vec postoji u bazi";
$message='<label>Email already exists</label>';
exit();
}
else{
$sql="INSERT INTO korisnik(name,lastname,email,number,pwd,user_activation_code,email_status)
VALUES(:name,:lastname,:email,:number,:pwd,:user_activation_code,:email_status)";
$stmt=$connection->prepare($sql);
if(!$stmt){
exit();
}
else{


$token = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz@#$&*";
$token= str_shuffle($token);
$token= substr($token,0,10);


$hashedPwd=password_hash($password,PASSWORD_DEFAULT); //bcrypt
$user_activation_code=md5(rand());


$stmt->bindParam(':name',$uname,PDO::PARAM_STR);
$stmt->bindParam(':lastname',$ulastname,PDO::PARAM_STR);
$stmt->bindParam(':email',$email,PDO::PARAM_STR);
$stmt->bindParam(':number',$unumber,PDO::PARAM_STR);
$stmt->bindParam(':pwd',$hashedPwd,PDO::PARAM_STR);

$stmt->bindParam(':user_activation_code',$token,PDO::PARAM_STR);
$stmt->bindParam(':email_status',$emailVerification,PDO::PARAM_STR);
$stmt->execute();

echo '<script language="javascript">';
    echo 'alert("Uspesno kreiran korisnik, sada je potrebno da aktivirate nalog, link je poslat na vasu adresu, proverite SPAM");';
    echo 'window.location.href="ls.php";';
    echo '</script>';

try {


$base_url = "https://aleksa.proj.vts.su.ac.rs/ProjekatFinalno/confirm.php?email=$email&token=$token";
$mail_body = "
<p>Hi " . $_POST['uid'] . ",</p>
<p>Thanks for registration.Your password is " . $password . ", This passwrod will work only after your email verification</p>
<p>Please open this link to verife your emaill address and get 10% to reservation - " . $base_url . "
    email_verification.php?activation=code" . $user_activation_code . "

<p>Best Regards,<br />Admin
</p>
";


$mail = new PHPMailer(true);

$mail->setFrom('aleksakujundzic1010@gmail.com', "$uname");
$mail->
$mail->addAddress($email, $uname);
$mail->Subject = "Please verify email";
$mail->isHTML(true);
$mail->Body = "
<html lang='en'>
<head>
    <title>Verification</title>
</head>
<body>
Please<br>
Click on the link below to verify email
<a href='$base_url'>Click here</a></body>
</html>

";
$mail->send();

echo '<script language="javascript">';
    echo 'alert("Uspesno kreiran korisnik i poslat mejl poruka je mozda u spamu");';
    echo 'window.location.href="ls.php";';
    echo '</script>';
exit();
}
catch (Exception $e){
echo '<script language="javascript">';
    echo 'alert("Mejl je nemoguce poslati);';
    echo 'window.location.href="ls.php";';
    echo '</script>';
exit();
}


}










session_start();
$_SESSION['userId']=$uname;
$_SESSION['last_login_timestap']=time();







}

}

}


}

else{
header("Location:../ls.php");
exit();
}
?>
