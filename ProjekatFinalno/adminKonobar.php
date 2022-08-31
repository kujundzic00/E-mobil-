<?php session_start()?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Admin/konobar</title>
        <link href="adminKonobar.css" rel="stylesheet">
        <script src="admin-form.js"></script>
        <script src="admin-form2.js"></script>
        <script src="konobar-form.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    </head>
    <body>
    <main class="container-fluid">
        <section   class="banner row " id="banner">
            <div class="content col">
    <?php

    if(isset($_SESSION['idK'])  || isset($_SESSION['idA'])){

        if(isset($_SESSION['idK'])){

            echo"<h4 style='font-size: 30px; color: white'>Uspesno ste ulogovani kao konobar</h4><br>";

            echo '<form method="post" action="proveraR.php"  id="konobarProvera" style="margin-left: 50px">
                                <input type="text" id="rezervacija" name="kod-rezervacije" placeholder="kod rezervacije"style="width: 200px;margin-left: 20px"><br><br>
                                <span id="rezervacijaE"></span>
                                <select name="dane" id="dane" style="margin-left: 90px"><br>
                                        <option value="">...</option>
                                        <option value="1">1</option>
                                        <option value="1">0</option>
                                        
                                        </select><span id="daneE"></span><br><br>
                                <input type="text" id="komentar" name="komentar" placeholder="komentar"><span id="komentarE"></span><br>
                                <button type="submit" name="potvrdi-rezervaciju" style="font-size: 0.7em;
     color:#fff;
    background-color: #ff0158;
    padding: 10px 30px;
    margin-top: 20px;
    margin-left: 50px;
    text-decoration: none;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: 0.5s;">Confirm</button><br>
                            </form>';

            echo '
                    <form method="post" action="logout.php" >
                                 <button type="submit" name="logout-submit" style="font-size: 0.7em;
     color:#fff;
    background-color: #ff0158;
    padding: 10px 30px;
    margin-top: 20px;
    margin-left: 105px;
    text-decoration: none;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: 0.5s;">Logout</button><br>
                            </form>';


        }
        if(isset($_SESSION['idA'])){

            $dateee=date("Y-m-d");
            echo'<h4 style="color: white">Klikni ukoliko zelis da vidis prikaz svih rezervacija</h4>';
            echo '<form method="post" action="adminPage.php">';
            echo '  <button type="submit" name="showReservations" style="font-size: 0.7em;
     color:#fff;
    background-color: #ff0158;
    padding: 10px 30px;
    margin-top: 20px;
    margin-left: 105px;
    text-decoration: none;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: 0.5s;">Prikazi rezervacije</button>';
            echo '</form><br>';
            echo '<h4 style="color: white">Izaberi datum i prikazi rezervacije po tom datumu</h4>
                    <form method="post" action="adminReservationsDate.php">
                    <input type="date"  name="adminDatum" min='.$dateee.' style="margin-top: 10px;margin-left: 100px"><br>
                    <button type="submit" name="show-reservations-sorted-by-date" style="font-size: 0.7em;
     color:#fff;
    background-color: #ff0158;
    padding: 10px 30px;
    margin-top: 20px;

    text-decoration: none;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: 0.5s;">Prikazi rezervacije  po odredjenom datum</button>
                </form><br>';
            echo'
                    <h4 style="color: white; margin-left: 30px">Dodovanje, brisanje, azuriranje konobara</h4>
                        <form method="post" action="adminChangeKon.php" id="admin-form2">
                <label for="user" style="color: white">Korisnicko ime konobara cije informacije zelimo da menjamo:</label><br> 
                <input type="text" id="user" name="userKon" style="width: 200px"><br><span id="userE"></span>
                <label for="pw" style="color: white">Nova lozinka</label><br><input type="password" id="pw" name="pwKon" style="width: 200px"><br><span id="pwE"></span>
              
                <label for="ime" style="color: white">Ime</label><br><input type="text" id="ime" name="imeKon" style="width: 200px"><br><span id="imeE"></span>
                <label for="prezime" style="color: white">Prezime</label><br><input type="text" id="prezime" name="prezimeKon" style="width: 200px"><br><span id="prezimeE"></span>
                <button type="submit" name="admin-change-kon" style="font-size: 0.7em;
     color:#fff;
    background-color: #ff0158;
    padding: 10px 30px;
    margin-top: 20px;

    text-decoration: none;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: 0.5s;">Promeni informacije konobara</button><br>
                <button type="submit" name="admin-create-kon" style="font-size: 0.7em;
     color:#fff;
    background-color: #ff0158;
    padding: 10px 30px;
    margin-top: 20px;
    margin-left: 70px;
    text-decoration: none;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: 0.5s;">Napravi konobara</button><br>
                <button type="submit" name="admin-delete-kon" style="font-size: 0.7em;
     color:#fff;
    background-color: #ff0158;
    padding: 10px 30px;
    margin-top: 20px;
    margin-left: 81px;
    text-decoration: none;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: 0.5s;">Obrisi  konobara</button>
                
                </form><br>';

            echo '<h4 style="color: greenyellow">Dodavanje, brisanje i azuriranje stolova</h4>';
            echo '<form method="post" action="adminChangeTable.php" id="admin-form"> ';
            echo '<label for="idStola" style="color: white">Izaberite id stola ukoliko zelite da ga obrisite ili azurirate</label><br>';
            echo '<select name="id-sto" style="margin-left: 165px">';
                    require_once "db_config.php";
                $sql="Select * from sto ";
                $stmt=$connection->prepare($sql);
                if(!$stmt){
                    echo "greska prilikom konekcije";
                }
                else{
                    $stmt->execute();
                    while ($row=$stmt->fetch()){
                        $nesto=$row['id'];
                    echo ' <option value = "'.$nesto.' ">  '.$nesto.' </option>';

    }
                }
                echo '</select><br>';
                echo '<label for="inputM" style="color: white">Broj mesta:</label><br><input type="text" id="inputM" name="numberS" ><span id="inputME"></span><br>';
            echo '<label for="textA" style="color: white">Opis</label><br><textarea name="opis" id="textA"></textarea><span id="textAE"></span><br>';
            echo '<label for="smoke" style="color: white">Pusacki ne pusacki deo: </label><select name="smoking" id="smoke">
                <option value="1">Da</option>
                <option value="0">Ne</option>
            </select><span id="smokeE"></span><br><br>';
                echo '<button type="submit" name="add-table" style="font-size: 0.7em;
     color:#fff;
    background-color: #ff0158;
    padding: 10px 30px;
    text-decoration: none;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: 0.5s;">Dodaj sto</button>';
            echo '<button name="update-table" type="submit" style="font-size: 0.7em;
     color:#fff;
    background-color: #ff0158;
    padding: 10px 30px;
    margin-left: 5px;
    text-decoration: none;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: 0.5s;">Azuriraj sto</button>';
            echo '<button type="submit" name="delete-table" style="font-size: 0.7em;
     color:#fff;
    background-color: #ff0158;
    padding: 10px 30px;
    margin-left: 5px;
    text-decoration: none;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: 0.5s;">Obrisi sto</button>';

                echo'</form>';



            echo '<br>
                    <form method="post" action="logout2.php" >
                                 <button type="submit" name="logout-submit" style="font-size: 0.7em;
     color:#fff;
    background-color: #ff0158;
    padding: 10px 30px;
    margin-left: 110px;
    text-decoration: none;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: 0.5s;">Logout</button>
                            </form>';
        }


    }

    else{

        echo '
  <form method="post"  action="login-konobar.php">
  <br><br><br>
    <h1 style="margin-left: 80px;font-size: 30px;color: white">KONOBAR</h1><br>
  <label for="userK" style="color: white">Korisnicko ime i lozinka za konobara</label> <br> <br>
  <input type="text" placeholder="usernameKonobar" id="userK" name="usernameK" style="width: 200px;margin-left: 50px"><br><br>
   <input type="password" placeholder="passwordKonobar" id="pwK" name="passwordK"style="width: 200px;margin-left: 50px" ><br>
    <button type="submit"  style="font-size: 0.5em;
    color:#fff;
    background-color: #ff0158;
    padding: 10px 30px;
    margin-top: 20px;
    margin-left: 80px;
    text-decoration: none;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: 0.5s;" name="submit-konobar">Potvrdi</button>
</form>


<br>
<h1 style="margin-left: 90px;font-size: 30px;color: white">ADMIN</h1><br>
<form method="post" action="login-admin.php">
 <label for="adminU" style=" color: white">Korisnicko ime i lozinka za admina</label> <br> <br>
    <input type="text" placeholder="usernameAdmin" id="adminU" name="usernameA"style="width: 200px; margin-left: 50px" ><br><br>
    <input type="password" placeholder="passwordAdmin" name="passwordA" style="width: 200px;margin-left: 50px"><br>
    <button type="submit" style="font-size: 0.5em;
    color:#fff;
    background-color: #ff0158;
    padding: 10px 30px;
    margin-top: 20px;
    margin-left: 80px;
    text-decoration: none;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: 0.5s;" name="submit-admin">Potvrdi</button><br><br>
    
    
  
    
</form>';}


    ?>
            </div></section>
    </main>
    </body>
    </html>

<?php

