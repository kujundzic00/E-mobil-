

<?php
    if(isset($_POST['show-reservations-sorted-by-date'])){
        session_start();

        $date=$_POST['adminDatum'];

        $_SESSION['adminRezDatum']=$date;

        if(empty($date)){


            echo '<script language="javascript">';
            echo 'alert("Datum ne sme biti prazan");';
            echo 'window.location.href="adminKonobar.php";';
            echo '</script>';
            exit();
        }
        else{
            header("Location:adminReservationPage.php");
        }

    }
