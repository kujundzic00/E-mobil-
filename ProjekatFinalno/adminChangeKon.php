<?php
if(isset($_POST['admin-create-kon'])){
    require_once "db_config.php";
    $username=trim($_POST['userKon']);
    $pw=trim($_POST['pwKon']);
    $name=trim($_POST['imeKon']);
    $surname=trim($_POST['prezimeKon']);

    if(empty($username) || empty($pw) ||empty($name) || empty($surname)){
        echo '<script language="javascript">';
        echo 'alert("Molim vas popnuti sva polja ukoliko zelite kreirate konobara);';
        echo 'window.location.href="adminKonobar.php";';
        echo '</script>';
        exit();
    }
    else if(!preg_match("/^[a-zA-Z]*$/",$name)){
        echo '<script language="javascript">';
        echo 'alert("Ime mora sadrzata mala,velika slova");';
        echo 'window.location.href="adminKonobar.php";';
        echo '</script>';
        exit();

    }

    else if(!preg_match("/^[a-z 0-9]*$/",$username)){
        echo '<script language="javascript">';
        echo 'alert("Korisnicko ime mora sadrzata mala slova,brojeve");';
        echo 'window.location.href="adminKonobar.php";';
        echo '</script>';
        exit();

    }
    else if(!preg_match("/^[a-zA-Z]*$/",$surname)){
        echo '<script language="javascript">';
        echo 'alert("Prezime mora sadrzati mala,velika slova");';
        echo 'window.location.href="adminKonobar.php";';
        echo '</script>';
        exit();
    }

    else {
        $sql = "SELECT username FROM radnik where username=:username ";
        $stmt = $connection->prepare($sql);
        if (!$stmt) {
            exit();
        } else {

            $stmt->bindParam(':username', $username, PDO::PARAM_STR);

            $stmt->execute();
            if($stmt->rowCount()>0){
                echo '<script >';
                echo 'alert("Ovo korisnicko ime vec postoji");';
                echo 'window.location.href="adminKonobar.php";';
                echo '</script>';
            }
            else{
                $sql="INSERT INTO radnik(username,password,Name,Surname) values (:uN,:pW,:N,:S)";
                $stmt=$connection->prepare($sql);
                if(!$stmt){
                    echo" Greska prilikom konekcije";
                }
                else{
                    $hashedPwd=password_hash($pw,PASSWORD_DEFAULT); //bcrypt
                $stmt->bindParam(':uN',$username,PDO::PARAM_STR);
                $stmt->bindParam(':pW',$hashedPwd,PDO::PARAM_STR);
                $stmt->bindParam(':N',$name,PDO::PARAM_STR);
                $stmt->bindParam(':S',$surname,PDO::PARAM_STR);
                $stmt->execute();
                    echo '<script >';
                    echo 'alert("Uspesno kreiran radnik");';
                    echo 'window.location.href="adminKonobar.php";';
                    echo '</script>';
                }
            }

        }

    }
}

if(isset($_POST['admin-change-kon'])){

    require_once "db_config.php";
    $username=trim($_POST['userKon']);
    $pw=trim($_POST['pwKon']);
    $name=trim($_POST['imeKon']);
    $surname=trim($_POST['prezimeKon']);
    if(empty($username) || empty($pw) ||empty($name) || empty($surname)){
        echo '<script language="javascript">';
        echo 'alert("Molim vas popnuti sva polja ukoliko zelite kreirate konobara");';
        echo 'window.location.href="adminKonobar.php";';
        echo '</script>';
        exit();
    }
    else if(!preg_match("/^[a-zA-Z]*$/",$name)){
        echo '<script language="javascript">';
        echo 'alert("Ime mora sadrzata mala,velika slova");';
        echo 'window.location.href="adminKonobar.php";';
        echo '</script>';
        exit();

    }

    else if(!preg_match("/^[a-z 0-9]*$/",$username)){
        echo '<script language="javascript">';
        echo 'alert("Korisnicko ime mora sadrzata mala slova,brojeve");';
        echo 'window.location.href="adminKonobar.php";';
        echo '</script>';
        exit();

    }
    else if(!preg_match("/^[a-zA-Z]*$/",$surname)){
        echo '<script language="javascript">';
        echo 'alert("Prezime mora sadrzati mala,velika slova");';
        echo 'window.location.href="adminKonobar.php";';
        echo '</script>';
        exit();
    }
    else{

        $sql="SELECT * FROM radnik where username=:userr";
        $stmt=$connection->prepare($sql);
        if(!$stmt){
            echo "greska prilikom koneckije";
        }
        else{

            $stmt->bindParam(':userr',$username,PDO::PARAM_STR);
            $stmt->execute();

            if($stmt->rowCount()>0){

            $sql="UPDATE radnik SET  password=:password,Name=:name,Surname=:surname where username=:username";
            $stmt=$connection->prepare($sql);
            if(!$stmt){
                echo"greska pri konekciji";
            }
            else{
                $hashedPwd=password_hash($pw,PASSWORD_DEFAULT); //bcrypt
                $stmt->bindParam(':name',$name,PDO::PARAM_STR);
                $stmt->bindParam(':password',$hashedPwd,PDO::PARAM_STR);
                $stmt->bindParam(':surname',$surname,PDO::PARAM_STR);
                $stmt->bindParam(':username',$username,PDO::PARAM_STR);
                $stmt->execute();

                echo '<script >';
                echo 'alert("Uspesno promenje informacije radnika gde je korsinicko ime : '.$username.'  ");';
                echo 'window.location.href="adminKonobar.php";';
                echo '</script>';
                exit();

            }
            }

            else{
                echo '<script >';
                echo 'alert("Ovo korisniko ime ne postoji");';
                echo 'window.location.href="adminKonobar.php";';
                echo '</script>';
                exit();
            }


        }




    }


}

if(isset($_POST['admin-delete-kon'])){

    require_once "db_config.php";

    $username=trim($_POST['userKon']);
    if(empty($username)){
        echo '<script >';
        echo 'alert("Ukoliko zelite da obrisite konobara, morate  popuniti korisnicko ime");';
        echo 'window.location.href="adminKonobar.php";';
        echo '</script>';
        exit();
    }
    else if(!preg_match("/^[a-z 0-9]*$/",$username)){
        echo '<script language="javascript">';
        echo 'alert("Korisnicko ime mora sadrzata mala slova,brojeve");';
        echo 'window.location.href="adminKonobar.php";';
        echo '</script>';
        exit();

    }

    else{
        $sql="DELETE FROM radnik where username=:username";
        $stmt=$connection->prepare($sql);
        if(!$stmt){
            echo "Greska prilikom konekcije";
        }
        else{
            $stmt->bindParam(':username',$username,PDO::PARAM_STR);
            $stmt->execute();
            if($stmt->rowCount()>0){
                echo '<script >';
                echo 'alert("Uspesno obrisan konobar gde je korisnicko ime bilo '.$username.' ");';
                echo 'window.location.href="adminKonobar.php";';
                echo '</script>';
                exit();

            }
            else{
                echo '<script >';
                echo 'alert("Ovo korisnikcko imene postoji");';
                echo 'window.location.href="adminKonobar.php";';
                echo '</script>';
                exit();
            }
        }
    }

}
