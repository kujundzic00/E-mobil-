<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require "PHPMailer/SMTP.php";
require "PHPMailer/Exception.php";
require "PHPMailer/PHPMailer.php";

session_start();
require_once "db_config.php";
if(isset($_POST['submit-reservation'])) {

	$ekod=$_SESSION['sendEmail'];

    function rand_string($length)
    {
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz@#$&*";
        $size = strlen($chars);
            $str="";
        for ($i = 0; $i < $length; $i++) {
            $str .= $chars[rand(0, $size - 1)];



        }
        return $str;
    }

    $code = rand_string(30);


    $date = $_POST['date'];
    $timeP = $_POST['vremeP'];
    $timeT = $_POST['vremeT'];

    $intTimeP=(int)$timeP;
    $intTimeT=(int)$timeT;


    $table =(int) $_POST['sto'];
    $idU = $_SESSION['userUid'];

     $vremeMax=(int)$timeT+(int)$timeP;


    if (empty($date) || empty($timeP) || empty($timeT || empty($table))) {
        echo '<script language="javascript">';
        echo 'alert("Plese select all fields");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();
    }
    if($vremeMax>23){
        echo '<script language="javascript">';
        echo 'alert("Pokusali ste da rezervisete duze od naseg radnog vremena");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();
    }
    elseif (!preg_match("/^[0-9]*$/",$table)){
        echo '<script language="javascript">';
        echo 'alert("You have to enter number");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();
    }
    else{

        $query="SELECT * FROM rezervacija where idS=:idS and datum=:datum and sat=:sat";
        $s=$connection->prepare($query);
        $s->bindParam(':idS', $table, PDO::PARAM_INT);
        $s->bindParam(':datum', $date, PDO::PARAM_STR);
        $s->bindParam(':sat', $timeP, PDO::PARAM_INT);
      /*  $s->bindParam(':vreme', $timeT, PDO::PARAM_STR);*/
        $s->execute();

            if($s->rowCount()>0){
                $trajanje=$s->fetchColumn(4);
                $itrajanje=(int)$trajanje;
                $itimeP=(int)$timeP;
                $zbir=$itrajanje+$itimeP;

                echo "Vreme mora biti vece ili manje  od zavrsenog sata.$zbir. i manje od pocetnog .$timeP ";


            }

        else{

             if($intTimeP && $intTimeT==1){
                 $brojj=$intTimeP+$intTimeT;
                 $sqlProvera="SELECT * from suma where idTable=:table and endH5=:startt and datum=:datum";
                 $priprema=  $connection->prepare($sqlProvera);
                 $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                 $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                 $priprema->bindParam(':datum', $date, PDO::PARAM_STR);
                 $priprema->execute();
                 if($priprema->rowCount()>0){


                   echo '<script >';
        echo 'alert("Zauzeto je u ovo vreme");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();


                 }

                 $brojj=$intTimeP+$intTimeT;
                 $sqlProvera="SELECT * from suma where idTable=:table and endH4=:startt and datum=:datum";
                 $priprema=  $connection->prepare($sqlProvera);
                 $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                 $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                 $priprema->bindParam(':datum', $date, PDO::PARAM_STR);
                 $priprema->execute();
                 if($priprema->rowCount()>0){


                                   echo '<script >';
        echo 'alert("Zauzeto je u ovo vreme");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();
                 
                 }
                 $brojj=$intTimeP+$intTimeT;
                 $sqlProvera="SELECT * from suma where idTable=:table and endH3=:startt and datum=:datum";
                 $priprema=  $connection->prepare($sqlProvera);
                 $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                 $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                 $priprema->bindParam(':datum', $date, PDO::PARAM_STR);
                 $priprema->execute();
                 if($priprema->rowCount()>0){


                                  echo '<script >';
        echo 'alert("Zauzeto je u ovo vreme");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();
                 
                 
                 }
                 $brojj=$intTimeP+$intTimeT;
                 $sqlProvera="SELECT * from suma where idTable=:table and endH2=:startt and datum=:datum";
                 $priprema=  $connection->prepare($sqlProvera);
                 $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                 $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                 $priprema->bindParam(':datum', $date, PDO::PARAM_STR);
                 $priprema->execute();
                 if($priprema->rowCount()>0){


                                   echo '<script >';
        echo 'alert("Zauzeto je u ovo vreme");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();
                 
                 
                 }
                 $brojj=$intTimeP+$intTimeT;
                 $sqlProvera="SELECT * from suma where idTable=:table and endH1=:startt and datum=:datum";
                 $priprema=  $connection->prepare($sqlProvera);
                 $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                 $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                 $priprema->bindParam(':datum', $date, PDO::PARAM_STR);
                 $priprema->execute();
                 if($priprema->rowCount()>0){


                                  echo '<script >';
        echo 'alert("Zauzeto je u ovo vreme");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();
                 
                 
                 
                 }
                 $brojj=$intTimeP+$intTimeT;
                 $sqlProvera="SELECT * from suma where idTable=:table and endH=:startt and datum=:datum";
                 $priprema=  $connection->prepare($sqlProvera);
                 $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                 $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                 $priprema->bindParam(':datum', $date, PDO::PARAM_STR);
                 $priprema->execute();
                 if($priprema->rowCount()>0){


                                  echo '<script >';
        echo 'alert("Zauzeto je u ovo vreme");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();
                 
                 
                 }



             }
            if($intTimeP && $intTimeT==2){
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH5=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $date, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                                  echo '<script >';
        echo 'alert("Zauzeto je u ovo vreme");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();
                
                }

                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH4=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $date, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                                 echo '<script >';
        echo 'alert("Zauzeto je u ovo vreme");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();
                
                
                }
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH3=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $date, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                                  echo '<script >';
        echo 'alert("Zauzeto je u ovo vreme");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();
                
                
                
                }
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH2=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $date, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                                  echo '<script >';
        echo 'alert("Zauzeto je u ovo vreme");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();
                
                
                }
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH1=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $date, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                                 echo '<script >';
        echo 'alert("Zauzeto je u ovo vreme");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();
                
                
                }
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $date, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                                  echo '<script >';
        echo 'alert("Zauzeto je u ovo vreme");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();
                
                
                }



            }
            if($intTimeP && $intTimeT==3){
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH5=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $date, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                                 echo '<script >';
        echo 'alert("Zauzeto je u ovo vreme");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();
                
                
                }

                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH4=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $date, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                                  echo '<script >';
        echo 'alert("Zauzeto je u ovo vreme");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();
                
                
                }
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH3=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $date, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                                   echo '<script >';
        echo 'alert("Zauzeto je u ovo vreme");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();
                
                
                }
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH2=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $date, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                                  echo '<script >';
        echo 'alert("Zauzeto je u ovo vreme");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();}
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH1=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $date, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                                  echo '<script >';
        echo 'alert("Zauzeto je u ovo vreme");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();
                
                }
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $date, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                                echo '<script >';
        echo 'alert("Zauzeto je u ovo vreme");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();
                
                }



            }
            if($intTimeP && $intTimeT==4){
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH5=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $date, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                                  echo '<script >';
        echo 'alert("Zauzeto je u ovo vreme");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();
                
                
                }

                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH4=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $date, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                                   echo '<script >';
        echo 'alert("Zauzeto je u ovo vreme");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();}
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH3=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $date, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                                 echo '<script >';
        echo 'alert("Zauzeto je u ovo vreme");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();}
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH2=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $date, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                                echo '<script >';
        echo 'alert("Zauzeto je u ovo vreme");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();}
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH1=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $date, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                                  echo '<script >';
        echo 'alert("Zauzeto je u ovo vreme");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();}
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $date, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                                echo '<script >';
        echo 'alert("Zauzeto je u ovo vreme");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();}



            }
            if($intTimeP && $intTimeT==5){
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH5=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $date, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                                 echo '<script >';
        echo 'alert("Zauzeto je u ovo vreme");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();}

                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH4=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $date, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                                echo '<script >';
        echo 'alert("Zauzeto je u ovo vreme");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();}
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH3=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $date, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                                   echo '<script >';
        echo 'alert("Zauzeto je u ovo vreme");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();}
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH2=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $date, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                                  echo '<script >';
        echo 'alert("Zauzeto je u ovo vreme");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();}
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH1=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $date, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                                echo '<script >';
        echo 'alert("Zauzeto je u ovo vreme");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();}
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $date, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                                  echo '<script >';
        echo 'alert("Zauzeto je u ovo vreme");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();}



            }
            if($intTimeP && $intTimeT==6){
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH5=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $date, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                                 echo '<script >';
        echo 'alert("Zauzeto je u ovo vreme");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();}

                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH4=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $date, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                                 echo '<script >';
        echo 'alert("Zauzeto je u ovo vreme");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();}
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH3=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $date, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                                echo '<script >';
        echo 'alert("Zauzeto je u ovo vreme");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();}
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH2=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $date, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                               echo '<script >';
        echo 'alert("Zauzeto je u ovo vreme");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();}
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH1=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $date, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                                  echo '<script >';
        echo 'alert("Zauzeto je u ovo vreme");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();}
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $date, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                                 echo '<script >';
        echo 'alert("Zauzeto je u ovo vreme");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();
                
                }



            }



                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum',$brojj,PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                                 echo '<script >';
        echo 'alert("Zauzeto je u ovo vreme");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();
                
                }

            }







            $sqlProvera="SELECT * from suma where idTable=:table and endH=:startt";
          $priprema=  $connection->prepare($sqlProvera);
          $priprema->bindParam(':table',$table,PDO::PARAM_INT);
            $priprema->bindParam(':startt',$vremeMax,PDO::PARAM_INT);
            $priprema->execute();
            $vremeS=$priprema->fetchColumn(1);
            $ivremeS=(int)$vremeS;
            echo "$ivremeS.vreme s<br>";
            echo "$vremeMax.vrememaxx s<br>";
            $vremeE=$priprema->fetchColumn(2);
            $ivremeE=(int)$vremeE;
            echo"$ivremeE.asd";

            if($priprema->rowCount()  >0  ){
                echo "Termin je zauzet";
            }



          /*  if(($intTimeP<$ivremeS && $intTimeP+$intTimeT<=$ivremeS)   ||  ($intTimeP>$vremeMax && $intTimeP+$intTimeT>=$vremeMax)     ){*/
            else{
            if ($intTimeP>$ivremeE || $intTimeP<$ivremeS){
        echo"tipsn";

    $sql = "INSERT INTO rezervacija(idU,datum,sat,vremenskiPeriod,kod,idS,uk) values (:idU,:datum,:sat,:vremenskiperiod,:kod,:idS,:uk)";
    $stmt = $connection->prepare($sql);
    if (!$stmt) {
        echo '<script language="javascript">';
        echo 'alert("Statemnt problem");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();

    } else {
        $stmt->bindParam(':idU', $idU, PDO::PARAM_INT);
        $stmt->bindParam(':uk', $vremeMax, PDO::PARAM_INT);
        $stmt->bindParam(':datum', $date, PDO::PARAM_STR);
        $stmt->bindParam(':sat', $timeP, PDO::PARAM_INT);
        $stmt->bindParam(':vremenskiperiod', $timeT, PDO::PARAM_INT);
        $stmt->bindParam(':kod', $code, PDO::PARAM_STR);
        $stmt->bindParam(':idS', $table, PDO::PARAM_INT);
        $stmt->execute();

        $sqlsuma="INSERT INTO suma(startH,endH,idTable,endH1,endH2,endH3,endH4,endH5,datum) values (:startH,:endH,:id,:endH1,:endH2,:endH3,:endH4,:endH5,:datum)";
        $q=$connection->prepare($sqlsuma);
        if(!$q){
            echo " greska pri konekciji";
        }
        else{
            if($intTimeT==1){
                $broj1=0;
                $broj2=0;
                $broj3=0;
                $broj4=0;
                $broj5=0;

                $q->bindParam(':startH', $timeP, PDO::PARAM_INT);
                $q->bindParam(':endH', $vremeMax, PDO::PARAM_INT);
                $q->bindParam(':endH1', $broj1, PDO::PARAM_INT);
                $q->bindParam(':endH2', $broj2, PDO::PARAM_INT);
                $q->bindParam(':endH3', $broj3, PDO::PARAM_INT);
                $q->bindParam(':endH4', $broj4, PDO::PARAM_INT);
                $q->bindParam(':endH5', $broj5, PDO::PARAM_INT);
                $q->bindParam(':datum', $date, PDO::PARAM_STR);

                $q->bindParam(':id', $table, PDO::PARAM_INT);
            $q->execute();}
            if($intTimeT==2){
                $broj1=$vremeMax-1;
                $broj2=0;
                $broj3=0;
                $broj4=0;
                $broj5=0;

                $q->bindParam(':startH', $timeP, PDO::PARAM_INT);
                $q->bindParam(':endH', $vremeMax, PDO::PARAM_INT);
                $q->bindParam(':endH1', $broj1, PDO::PARAM_INT);
                $q->bindParam(':endH2', $broj2, PDO::PARAM_INT);
                $q->bindParam(':endH3', $broj3, PDO::PARAM_INT);
                $q->bindParam(':endH4', $broj4, PDO::PARAM_INT);
                $q->bindParam(':endH5', $broj5, PDO::PARAM_INT);
                $q->bindParam(':datum', $date, PDO::PARAM_STR);

                $q->bindParam(':id', $table, PDO::PARAM_INT);
                $q->execute();}
            if($intTimeT==3){
                $broj1=$vremeMax-1;
                $broj2=$vremeMax-2;
                $broj5=0;
                $broj4=0;
                $broj3=0;

                $q->bindParam(':startH', $timeP, PDO::PARAM_INT);
                $q->bindParam(':endH', $vremeMax, PDO::PARAM_INT);
                $q->bindParam(':endH1', $broj1, PDO::PARAM_INT);
                $q->bindParam(':endH2', $broj2, PDO::PARAM_INT);
                $q->bindParam(':endH3', $broj3, PDO::PARAM_INT);
                $q->bindParam(':endH4', $broj4, PDO::PARAM_INT);
                $q->bindParam(':endH5', $broj5, PDO::PARAM_INT);
                $q->bindParam(':datum', $date, PDO::PARAM_STR);
                $q->bindParam(':id', $table, PDO::PARAM_INT);
                $q->execute();

            }
            if($intTimeT==4){
                $broj1=$vremeMax-1;
                $broj2=$vremeMax-2;
                $broj3=$vremeMax-3;
                $broj5=0;
                $broj4=0;

                $q->bindParam(':startH', $timeP, PDO::PARAM_INT);
                $q->bindParam(':endH', $vremeMax, PDO::PARAM_INT);
                $q->bindParam(':endH1', $broj1, PDO::PARAM_INT);
                $q->bindParam(':endH2', $broj2, PDO::PARAM_INT);
                $q->bindParam(':endH3', $broj3, PDO::PARAM_INT);
                $q->bindParam(':endH4', $broj4, PDO::PARAM_INT);
                $q->bindParam(':endH5', $broj5, PDO::PARAM_INT);
                $q->bindParam(':datum', $date, PDO::PARAM_STR);
                $q->bindParam(':id', $table, PDO::PARAM_INT);
                $q->execute();}
            if($intTimeT==5){
                $broj1=$vremeMax-1;
                $broj2=$vremeMax-2;
                $broj3=$vremeMax-3;
                $broj4=$vremeMax-4;
                $broj5=0;



                $q->bindParam(':startH', $timeP, PDO::PARAM_INT);
                $q->bindParam(':endH', $vremeMax, PDO::PARAM_INT);
                $q->bindParam(':endH1', $broj1, PDO::PARAM_INT);
                $q->bindParam(':endH2', $broj2, PDO::PARAM_INT);
                $q->bindParam(':endH3', $broj3, PDO::PARAM_INT);
                $q->bindParam(':endH4', $broj4, PDO::PARAM_INT);
                $q->bindParam(':endH5', $broj5, PDO::PARAM_INT);
                $q->bindParam(':datum', $date, PDO::PARAM_STR);
                $q->bindParam(':id', $table, PDO::PARAM_INT);
                $q->execute();}
            if($intTimeT==6){
                $broj1=$vremeMax-1;
                $broj2=$vremeMax-2;
                $broj3=$vremeMax-3;
                $broj4=$vremeMax-4;
                $broj5=$vremeMax-5;
                $q->bindParam(':startH', $timeP, PDO::PARAM_INT);
                $q->bindParam(':endH', $vremeMax, PDO::PARAM_INT);
                $q->bindParam(':endH1', $broj1, PDO::PARAM_INT);
                $q->bindParam(':endH2', $broj2, PDO::PARAM_INT);
                $q->bindParam(':endH3', $broj3, PDO::PARAM_INT);
                $q->bindParam(':endH4', $broj4, PDO::PARAM_INT);
                $q->bindParam(':endH5', $broj5, PDO::PARAM_INT);
                $q->bindParam(':datum', $date, PDO::PARAM_STR);
                $q->bindParam(':id', $table, PDO::PARAM_INT);
                $q->execute();}


        }


        //Uneti u sumu ispod ove linije
    
     echo '<script language="javascript">';
        echo 'alert("Uspesna rezervacija/ proverite vas mejl");';
        echo 'window.location.href="ls.php";';

        echo '</script>';

    
    	try {


                        
                   


                        $mail = new PHPMailer(true);

                        $mail->setFrom('rezervacijastolovasu@protonmail.com');
                        $mail->addAddress($ekod);
                        $mail->Subject = "Rezervacija stola uspesno kreirana";
                        $mail->isHTML(true);
                        $mail->Body = "
                    <html lang='en'>
                    <head>
                    
                        <title>Verification</title>
                        </head>
                        <body>
                    Postovani,<br>
                    Uspesno ste kreirali rezervaciju<br>
                    Datum rezervacije: $date <br>
                    Vreme od $timeP casova do $vremeMax  casova (trajanje rezervacije $timeT)<br><br>
                    <p>Vas kod je: $code </p>
                    <br>
                    Potrebno je prikazati kod prilikom registracije<br>
                    <p>Srdacan pozdrav, <p/>
                    <p>Rezervacija Stolova Subotica</p>
                    </body>
                    </html>
 
                    ";
                        $mail->send();

                        echo '<script language="javascript">';
                        echo 'alert("Uspesno kreirana rezervacija i poslat mejl sa kodom);';
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


        }}}


}

if(isset($_POST['delete-reservation'])){
    $date = $_POST['date'];
    $timeP = $_POST['vremeP'];
    $idSto=$_POST['sto'];
    $sat=date("H");
    $idUU = $_SESSION['userUid'];
    $dan=date("d");
    $dann=(int)$dan;

    $dan2=$date[8];
    $dan2.=$date[9];
    $dan22=(int)$dan2;

    $mesec=$date[5];
    $mesec.=$date[6];
    $broj=(int)$mesec;

    $mesec2=date("m");
    $mesec22=(int)$mesec2;
    $ss=$sat+4;

        if(empty($date)|| empty($timeP)){
            echo $date."datum".$timeP;
            echo "<br>";
            echo $mesec22;
            echo '<script language="javascript">';
            echo 'alert("You have to choose date, start time and table    to delete your reservations");';
            echo 'window.location.href="ls.php";';
            echo '</script>';
            exit();
        }

        if ($broj<$mesec22){

            echo '<script language="javascript">';
            echo 'alert("Mesec je manji od trenutnog, ne moguce je obrisati rezervaciju");';
            echo 'window.location.href="ls.php";';
            echo '</script>';
            exit();
        }

        else{
                if($mesec22<$broj){
                  /*  if($dann<=$dan22){*/
           /* if($ss<$timeP){*/
                $sql2="DELETE FROM rezervacija where datum=:datum and sat=:sat and idU=:idU";
                $stmt2=$connection->prepare($sql2);
                if (!$stmt2) {
                    echo '<script language="javascript">';
                    echo 'alert("Statemnt problem");';
                    echo 'window.location.href="ls.php";';
                    echo '</script>';
                    exit();

                }
                else{
                    $stmt2->bindParam(':datum', $date, PDO::PARAM_STR);
                    $stmt2->bindParam(':sat', $timeP, PDO::PARAM_INT);
                    $stmt2->bindParam(':idU', $idUU, PDO::PARAM_INT);
                    $stmt2->execute();

                    $sqll="DELETE FROM suma where datum=:datum and startH=:startH  and idTable=:idTable";
                  $ovo= $connection->prepare($sqll);
                    $ovo->bindParam(':datum', $date, PDO::PARAM_STR);
                    $ovo->bindParam(':startH', $timeP, PDO::PARAM_INT);
                    $ovo->bindParam(':idTable', $idSto, PDO::PARAM_INT);
                    $ovo->execute();



                    echo '<script language="javascript">';
                    echo 'alert("Uspesno brisanje rezervacija");';
                    echo 'window.location.href="ls.php";';

                    echo '</script>';
                    exit();
                }



           /* }*//*}*/}
            else{

                if($mesec22==$broj){
                    if($dann<$dan22){
                        $sql2="DELETE FROM rezervacija where datum=:datum and sat=:sat and idU=:idU";
                        $stmt2=$connection->prepare($sql2);
                        if (!$stmt2) {
                            echo '<script language="javascript">';
                            echo 'alert("Statemnt problem");';
                            echo 'window.location.href="ls.php";';
                            echo '</script>';
                            exit();

                        }
                        else{
                            $stmt2->bindParam(':datum', $date, PDO::PARAM_STR);
                            $stmt2->bindParam(':sat', $timeP, PDO::PARAM_INT);
                            $stmt2->bindParam(':idU', $idUU, PDO::PARAM_INT);
                            $stmt2->execute();

                            $sqll="DELETE FROM suma where datum=:datum and startH=:startH  and idTable=:idTable";
                            $ovo= $connection->prepare($sqll);
                            $ovo->bindParam(':datum', $date, PDO::PARAM_STR);
                            $ovo->bindParam(':startH', $timeP, PDO::PARAM_INT);
                            $ovo->bindParam(':idTable', $idSto, PDO::PARAM_INT);
                            $ovo->execute();

                            echo '<script language="javascript">';
                            echo 'alert("Uspesno brisanje rezervacija");';
                            echo 'window.location.href="ls.php";';

                            echo '</script>';
                            exit();
                        }
                    }
                    else{
                        if($dann==$dan22){

                            if($ss<=$timeP){

                                $sql2="DELETE FROM rezervacija where datum=:datum and sat=:sat and idU=:idU";
                                $stmt2=$connection->prepare($sql2);
                                if (!$stmt2) {
                                    echo '<script language="javascript">';
                                    echo 'alert("Statemnt problem");';
                                    echo 'window.location.href="ls.php";';
                                    echo '</script>';
                                    exit();

                                }
                                else{
                                    $stmt2->bindParam(':datum', $date, PDO::PARAM_STR);
                                    $stmt2->bindParam(':sat', $timeP, PDO::PARAM_INT);
                                    $stmt2->bindParam(':idU', $idUU, PDO::PARAM_INT);
                                    $stmt2->execute();


                                    $sqll="DELETE FROM suma where datum=:datum and startH=:startH  and idTable=:idTable";
                                    $ovo= $connection->prepare($sqll);
                                    $ovo->bindParam(':datum', $date, PDO::PARAM_STR);
                                    $ovo->bindParam(':startH', $timeP, PDO::PARAM_INT);
                                    $ovo->bindParam(':idTable', $idSto, PDO::PARAM_INT);
                                    $ovo->execute();

                                    echo '<script language="javascript">';
                                    echo 'alert("Uspesno brisanje rezervacija");';
                                    echo 'window.location.href="ls.php";';

                                    echo '</script>';
                                    exit();
                                }

                            }
                            else{
                                echo '<script language="javascript">';
                                echo 'alert("Greska prilikom brisanje rezervacije! (Najmanje 4 sata pre)");';
                                echo 'window.location.href="ls.php";';

                                echo '</script>';
                                exit();
                            }


                        }
                    }



                }
            }
        }

}

if(isset($_POST['update-reservation'])){

    $dateO = $_POST['date'];
    $dateN = $_POST['date2'];


    $timeP = $_POST['vremeP'];
    $intTimeP=(int)$_POST['newStartTime'];


    $timeN=$_POST['newStartTime'];

    $timeT = $_POST['vremeT'];
    $intTimeT=(int)$timeT;
    $sab=(int)$timeN+(int)$timeT;
    $table = $_POST['sto'];
    $idUUU = $_SESSION['userUid'];

    if(empty($dateN)){

        echo '<script language="javascript">';
        echo 'alert("Greska prilikom updatejtovanje rezervacije!DATEN");';
        echo 'window.location.href="ls.php";';
        echo '</script>';

    }

    elseif (empty($dateO)){
        echo '<script language="javascript">';
        echo 'alert("Greska prilikom updatejtovanje rezervacije! DATE0);';
        echo 'window.location.href="ls.php";';
        echo '</script>';
    }
    elseif (empty($timeP)){
        echo '<script language="javascript">';
        echo 'alert("Greska prilikom updatejtovanje rezervacije! (TIMEP)");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
    }
    elseif (empty($timeN)){
        echo '<script language="javascript">';
        echo 'alert("Greska prilikom updatejtovanje rezervacije! (TIMMEN)");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
    }
    elseif (empty($timeT)){
        echo '<script language="javascript">';
        echo 'alert("Greska prilikom updatejtovanje rezervacije! (TIMET)");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
    }
     elseif (empty($table)){
         echo '<script language="javascript">';
         echo 'alert("Greska prilikom updatejtovanje rezervacije! TABLE");';
         echo 'window.location.href="ls.php";';
         echo '</script>';
    }
    else{


        $query="SELECT * FROM rezervacija where idS=:idS and datum=:datum and sat=:sat";
        $s=$connection->prepare($query);
        $s->bindParam(':idS', $table, PDO::PARAM_INT);
        $s->bindParam(':datum', $dateN, PDO::PARAM_STR);
        $s->bindParam(':sat', $timeN, PDO::PARAM_INT);
        /*  $s->bindParam(':vreme', $timeT, PDO::PARAM_STR);*/
        $s->execute();

        if($s->rowCount()>0){
            $trajanje=$s->fetchColumn(4);
            $itrajanje=(int)$trajanje;
            $itimeP=(int)$timeP;
            $zbir=$itrajanje+$itimeP;

            echo "U ovo vreme rezervacija postoji vec,vreme mora biti vece ili manje  od zavrsenog sata.$zbir. i manje od pocetnog .$timeP ";


        }

        else{

            if($intTimeP && $intTimeT==1){
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from rezervacija where idTable=:table and datum=:datum and idU=:idU";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $dateN, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0) {


                    echo "Zauzeto H5 je popunjeno";
                    exit();

                }


                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH4=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $dateN, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                    echo"Zauzeto H4 je popunjeno";
                    exit();}
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH3=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $dateN, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                    echo"Zauzeto H3 je popunjeno";
                    exit();}
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH2=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $dateN, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                    echo"Zauzeto H2 je popunjeno";
                    exit();}
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH1=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $dateN, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                    echo"Zauzeto H1 je popunjeno";
                    exit();}
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $dateN, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                    echo"Zauzeto H je popunjeno";
                    exit();}

            }
            if($intTimeP && $intTimeT==2){
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH5=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $dateN, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0) {


                    echo "Zauzeto H5 je popunjeno";
                    exit();

                }


                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH4=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $dateN, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                    echo"Zauzeto H4 je popunjeno";
                    exit();}
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH3=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $dateN, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                    echo"Zauzeto H3 je popunjeno";
                    exit();}
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH2=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $dateN, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                    echo"Zauzeto H2 je popunjeno";
                    exit();}
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH1=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $dateN, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                    echo"Zauzeto H1 je popunjeno";
                    exit();}
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $dateN, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                    echo"Zauzeto H je popunjeno";
                    exit();}

            }
            if($intTimeP && $intTimeT==3){
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH5=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $dateN, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0) {


                    echo "Zauzeto H5 je popunjeno";
                    exit();

                }


                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH4=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $dateN, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                    echo"Zauzeto H4 je popunjeno";
                    exit();}
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH3=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $dateN, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                    echo"Zauzeto H3 je popunjeno";
                    exit();}
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH2=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $dateN, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                    echo"Zauzeto H2 je popunjeno";
                    exit();}
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH1=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $dateN, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                    echo"Zauzeto H1 je popunjeno";
                    exit();}
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $dateN, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                    echo"Zauzeto H je popunjeno";
                    exit();}

            }
            if($intTimeP && $intTimeT==4){
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH5=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $dateN, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0) {


                    echo "Zauzeto H5 je popunjeno";
                    exit();

                }


                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH4=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $dateN, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                    echo"Zauzeto H4 je popunjeno";
                    exit();}
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH3=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $dateN, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                    echo"Zauzeto H3 je popunjeno";
                    exit();}
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH2=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $dateN, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                    echo"Zauzeto H2 je popunjeno";
                    exit();}
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH1=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $dateN, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                    echo"Zauzeto H1 je popunjeno";
                    exit();}
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $dateN, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                    echo"Zauzeto H je popunjeno";
                    exit();}

            }
            if($intTimeP && $intTimeT==5){
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH5=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $dateN, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0) {


                    echo "Zauzeto H5 je popunjeno";
                    exit();

                }

                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH4=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $dateN, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                    echo"Zauzeto H4 je popunjeno";
                    exit();}
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH3=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $dateN, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                    echo"Zauzeto H3 je popunjeno";
                    exit();}
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH2=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $dateN, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                    echo"Zauzeto H2 je popunjeno";
                    exit();}
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH1=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $dateN, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                    echo"Zauzeto H1 je popunjeno";
                    exit();}
                $brojj=$intTimeP+$intTimeT;
                $sqlProvera="SELECT * from suma where idTable=:table and endH=:startt and datum=:datum";
                $priprema=  $connection->prepare($sqlProvera);
                $priprema->bindParam(':table',$table,PDO::PARAM_INT);
                $priprema->bindParam(':startt',$brojj,PDO::PARAM_INT);
                $priprema->bindParam(':datum', $dateN, PDO::PARAM_STR);
                $priprema->execute();
                if($priprema->rowCount()>0){


                    echo"Zauzeto H je popunjeno";
                    exit();}

            }
            if($intTimeP && $intTimeT==6) {
                $brojj = $intTimeP + $intTimeT;
                $sqlProvera = "SELECT * from suma where idTable=:table and endH5=:startt and datum=:datum";
                $priprema = $connection->prepare($sqlProvera);
                $priprema->bindParam(':table', $table, PDO::PARAM_INT);
                $priprema->bindParam(':startt', $brojj, PDO::PARAM_INT);
                $priprema->bindParam(':datum', $dateN, PDO::PARAM_STR);
                $priprema->execute();
                if ($priprema->rowCount() > 0) {


                    echo "Zauzeto H5 je popunjeno";
                    exit();

                }


                $brojj = $intTimeP + $intTimeT;
                $sqlProvera = "SELECT * from suma where idTable=:table and endH4=:startt and datum=:datum";
                $priprema = $connection->prepare($sqlProvera);
                $priprema->bindParam(':table', $table, PDO::PARAM_INT);
                $priprema->bindParam(':startt', $brojj, PDO::PARAM_INT);
                $priprema->bindParam(':datum', $dateN, PDO::PARAM_STR);
                $priprema->execute();
                if ($priprema->rowCount() > 0) {


                    echo "Zauzeto H4 je popunjeno";
                    exit();
                }
                $brojj = $intTimeP + $intTimeT;
                $sqlProvera = "SELECT * from suma where idTable=:table and endH3=:startt and datum=:datum";
                $priprema = $connection->prepare($sqlProvera);
                $priprema->bindParam(':table', $table, PDO::PARAM_INT);
                $priprema->bindParam(':startt', $brojj, PDO::PARAM_INT);
                $priprema->bindParam(':datum', $dateN, PDO::PARAM_STR);
                $priprema->execute();
                if ($priprema->rowCount() > 0) {


                    echo "Zauzeto H3 je popunjeno";
                    exit();
                }
                $brojj = $intTimeP + $intTimeT;
                $sqlProvera = "SELECT * from suma where idTable=:table and endH2=:startt and datum=:datum";
                $priprema = $connection->prepare($sqlProvera);
                $priprema->bindParam(':table', $table, PDO::PARAM_INT);
                $priprema->bindParam(':startt', $brojj, PDO::PARAM_INT);
                $priprema->bindParam(':datum', $dateN, PDO::PARAM_STR);
                $priprema->execute();
                if ($priprema->rowCount() > 0) {


                    echo "Zauzeto H2 je popunjeno";
                    exit();
                }
                $brojj = $intTimeP + $intTimeT;
                $sqlProvera = "SELECT * from suma where idTable=:table and endH1=:startt and datum=:datum";
                $priprema = $connection->prepare($sqlProvera);
                $priprema->bindParam(':table', $table, PDO::PARAM_INT);
                $priprema->bindParam(':startt', $brojj, PDO::PARAM_INT);
                $priprema->bindParam(':datum', $dateN, PDO::PARAM_STR);
                $priprema->execute();
                if ($priprema->rowCount() > 0) {


                    echo "Zauzeto H1 je popunjeno";
                    exit();
                }
                $brojj = $intTimeP + $intTimeT;
                $sqlProvera = "SELECT * from suma where idTable=:table and endH=:startt and datum=:datum";
                $priprema = $connection->prepare($sqlProvera);
                $priprema->bindParam(':table', $table, PDO::PARAM_INT);
                $priprema->bindParam(':startt', $brojj, PDO::PARAM_INT);
                $priprema->bindParam(':datum', $dateN, PDO::PARAM_STR);
                $priprema->execute();
                if ($priprema->rowCount() > 0) {


                    echo "Zauzeto H je popunjeno";
                    exit();
                }


            }

            else{


                $sql3="UPDATE rezervacija SET datum=:datum,sat=:sat,vremenskiPeriod=:vremenskiP,idS=:idS,uk=:uk WHERE idU=:idUUU and datum=:datumS and sat=:satS";
                $stmt3=$connection->prepare($sql3);
                if(!$stmt3){
                    echo "greska";
                }
                else{

                    $stmt3->bindParam(':datumS', $dateO, PDO::PARAM_STR);
                    $stmt3->bindParam(':uk', $sab, PDO::PARAM_STR);
                    $stmt3->bindParam(':satS', $timeP, PDO::PARAM_INT);
                    $stmt3->bindParam(':idUUU', $idUUU, PDO::PARAM_INT);

                    $stmt3->bindParam(':datum', $dateN, PDO::PARAM_STR);
                    $stmt3->bindParam(':sat', $timeN, PDO::PARAM_INT);

                    $stmt3->bindParam(':vremenskiP', $timeT, PDO::PARAM_INT);

                    $stmt3->bindParam(':idS', $table, PDO::PARAM_INT);
                    $stmt3->execute();


                    $sql="DELETE FROM suma where datum=:datum and startH=:startH and idTable=idTable";

                    $radi=$connection->prepare($sql);
                    $radi->bindParam(':datum', $date, PDO::PARAM_INT);
                    $radi->bindParam(':startH', $timeP, PDO::PARAM_INT);
                    $radi->bindParam(':idTable', $idSto, PDO::PARAM_INT);
                    $radi->execute();


                    echo '<script language="javascript">';
                    echo 'alert("Uspesna promena rezervacije");';
                    echo 'window.location.href="ls.php";';
                    echo '</script>';
                    exit();
                }


            }


            }

    }


}

if(isset($_POST['show-reservations'])){


header("Location: show_reservations.php");
}

?>