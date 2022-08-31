<?php

    require_once "db_config.php";

    $sql="SELECT * FROM rezervacija";
    $stmt=$connection->prepare($sql);
    $stmt->execute();
       /* $arr=$stmt->fetchAll();*/
    while ($row = $stmt->fetch()) {


        echo  "Id rezervacije :". $row['id'];
        echo "&nbsp";
        echo  "Id korisnika:".$row['idU'];
        echo "&nbsp";
        echo  "Datum rezervacije: ".$row['datum'];
        echo "&nbsp";
        echo "Pocetni sat rezervacije: ".$row['sat'];
        echo "&nbsp";
        echo  "Kod rezervacije: ".$row['kod'];
        echo "&nbsp";
        echo "Id stola: ".$row['idS'];
        echo "&nbsp";
        echo "Ukupno pocetni sat+vremenski period-vreme trajanja: ".$row['uk'];
        echo "&nbsp";
        echo "<br>";
        echo "<br>";


}
echo "<a href='adminKonobar.php'>Vrati me nazad</a>";
