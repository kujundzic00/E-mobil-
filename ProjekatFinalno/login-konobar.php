<?php
if(isset($_POST['submit-konobar'])){
    require "db_config.php";
    $username=trim($_POST['usernameK']);
    $password=trim($_POST['passwordK']);
    if(!empty($username) || !empty($password)){
        $sql="SELECT * FROM radnik where username=:username";
        $stmt=$connection->prepare($sql);
        if(!$stmt){
            echo "error";
        }

        else{
            $stmt->bindParam(':username',$username,PDO::PARAM_STR);

            $stmt->execute();

            $result=$stmt->fetch();
            if($row=$result){

                $pwdCheck=password_verify($password,$row['password']);

                if($pwdCheck==false){
                    echo '<script >';
                    echo 'alert("Wrong password");';
                    echo 'window.location.href="adminKonobar.php";';
                    echo '</script>';
                    exit();
                }
                else if($pwdCheck==true){
                    session_start();
                    $_SESSION['idK']=$row['id'];
                    header("Location:adminKonobar.php");
                    exit();
                }
                else{
                    header("Location: adminKonobar.php");
                    exit();
                }





            }
            else{
                echo '<script language="javascript">';
                echo 'alert("Ne postoji ovaj konobar");';
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

