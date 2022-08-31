<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require "PHPMailer/SMTP.php";
require "PHPMailer/Exception.php";
require "PHPMailer/PHPMailer.php";

if(isset($_POST['reset-request-email'])){

    require_once "db_config.php";

    $selector= bin2hex(random_bytes(8));
    $token=random_bytes(32);

    $url= "https://aleksa.proj.vts.su.ac.rs/ProjekatFinalno/create-new-password.php?selector=".$selector."&validator=".bin2hex($token);

    //today date from 1907 in seconds+ 1h from now
    $experis=date("U")+1800;

    $userEmail=trim($_POST['helperino']);

echo"$userEmail";
echo"$experis";
echo"$token";
echo"$selector";

    $sql="DELETE FROM pwdreset WHERE pwdResetEmail=:pre";
    $stmt=$connection->prepare($sql);
    if(!$stmt){
        echo "There was an error";
        exit();
    } 
else{

    $stmt->bindParam(':pre', $userEmail, PDO::PARAM_STR);
    $stmt->execute();

        $sql2="INSERT INTO pwdreset(pwdResetEmail,pwdResetSelector,pwdResetToken,pwdResetExperis) values (:email,:selector,:token,:experis)";

        $stmt2=$connection->prepare($sql2);
        if(!$stmt2){
            echo "There was an error";
            exit();
        }
        else{
            $hashedToken=password_hash($token,PASSWORD_DEFAULT);
            $stmt2->bindParam(':email', $userEmail, PDO::PARAM_STR);
            $stmt2->bindParam(':selector', $selector, PDO::PARAM_STR);
            $stmt2->bindParam(':token', $hashedToken, PDO::PARAM_STR);
            $stmt2->bindParam(':experis', $experis, PDO::PARAM_STR);
            $stmt2->execute();
        
           try{
            $mail = new PHPMailer(true);

            $mail->setFrom('rezervacijastolovasu@protonmail.com',"RezervacijaStolova");
            $mail->addAddress($userEmail);
            $mail->Subject = "Please verify email";
            $mail->isHTML(true);
            $mail->Body = "
                    <html lang='en'>
                    <head>
                    
                        <title>Reset</title>
                        </head>
                        <body>
                        Please
                    Click on the link below to reset  yourpassword
                    <a href='$url'>$url</a></body>
                    </html>
 
                    ";
            $mail->send();}
        catch (Exception $e){

        }
        header("Location: resetpw.php?reset=success");
        
        

        }

    }


}
else{
    header("Location:ls.php");
}
