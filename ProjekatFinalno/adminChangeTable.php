<?php
if(isset($_POST['add-table'])){
        require_once "db_config.php";
    $attribute=$_POST['opis'];
    $smoking=(int)($_POST['smoking']);
    $numberS=$_POST['numberS'];

    if(empty($attribute) ||empty($numberS)){
        echo '<script >';
        echo 'alert("Neko polje od polja za dodavanje stola je prazno, ID ne treba biti izabran prilikom dodavanja");';
        echo 'window.location.href="adminKonobar.php";';
        echo '</script>';
        exit();
    }
    else if(!preg_match("/^[a-z 0-9]*$/",$numberS)){
        echo '<script >';
        echo 'alert("Broj mesta mora biti broj");';
        echo 'window.location.href="adminKonobar.php";';
        echo '</script>';
        exit();

    }
    else{

        $sql="INSERT INTO sto(brojMesta,opis,pusenje) values (:broj,:opis,:smoking)";
        $stmt=$connection->prepare($sql);
        if(!$stmt){
            echo "greska prilikom konekcije";
            exit();
        }
        else{
            $stmt->bindParam(':broj',$numberS,PDO::PARAM_INT);
            $stmt->bindParam(':opis',$attribute,PDO::PARAM_STR);
            $stmt->bindParam(':smoking',$smoking,PDO::PARAM_INT);
            $stmt->execute();
            echo '<script >';
            echo 'alert("Uspesno je dodat novi sto");';
            echo 'window.location.href="adminKonobar.php";';
            echo '</script>';
            exit();

        }
    }




}
if (isset($_POST['delete-table'])){
    $idTable=$_POST['id-sto'];
    require_once "db_config.php";
    if(empty($idTable)){
        echo '<script >';
        echo 'alert("Id stola mora postojati");';
        echo 'window.location.href="adminKonobar.php";';
        echo '</script>';
        exit();
    }
    else{
        $sql="DELETE FROM sto where id=:id";
        $stmt=$connection->prepare($sql);
        if(!$stmt){
            echo "greska prilikom konekcije";
        }
        else{
            $stmt->bindParam(':id',$idTable,PDO::PARAM_INT);
            $stmt->execute();
            echo '<script >';
            echo 'alert("Uspesno brisan sto gde je id '.$idTable.'");';
            echo 'window.location.href="adminKonobar.php";';
            echo '</script>';
            exit();
        }
    }

}
if(isset($_POST['update-table'])){
    require_once "db_config.php";
    $idTable=$_POST['id-sto'];
    $attribute=$_POST['opis'];
    $smoking=(int)($_POST['smoking']);
    $numberS=$_POST['numberS'];


    if(empty($attribute) ||empty($numberS)){
        echo '<script >';
        echo 'alert("Neko polje od polja za dodavanje stola je prazno, ID ne treba biti izabran prilikom dodavanja");';
        echo 'window.location.href="adminKonobar.php";';
        echo '</script>';
        exit();
    }
    else if(!preg_match("/^[a-z 0-9]*$/",$numberS)){
        echo '<script >';
        echo 'alert("Broj mesta mora biti broj");';
        echo 'window.location.href="adminKonobar.php";';
        echo '</script>';
        exit();

    }
    else{
        $sql="UPDATE sto SET brojMesta=:broj,opis=:opis,pusenje=:pusenje where id=:id";
        $stmt=$connection->prepare($sql);
        if(!$stmt){echo  'greska prilikom konekcije';
        }
        else{
            $stmt->bindParam(':broj',$numberS,PDO::PARAM_INT);
            $stmt->bindParam(':opis',$attribute,PDO::PARAM_STR);
            $stmt->bindParam(':pusenje',$smoking,PDO::PARAM_INT);
            $stmt->execute();
            echo '<script >';
            echo 'alert("Uspesno izmenjen sto");';
            echo 'window.location.href="adminKonobar.php";';
            echo '</script>';
            exit();

        }

    }
}
