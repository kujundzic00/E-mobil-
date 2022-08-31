<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="index.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Home</title>
    <script src="lsCheck.js"></script>
    <script src="logKCheck.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Restaraunt<span style="color: red">.</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ls.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="adminKonobar.php">Admin/konobar</a>
            </li>


        </ul>

    </div>
</nav>
<main class="container-fluid">
    <section class="banner row " id="banner">
        <div class="content  col">

        <br>


            <?php
            if(isset($_SESSION['userUid'])){
                $name=$_SESSION['userId'];
                $dateee=date("Y-m-d");




                echo '<p class="login-status " style="color: gold; font-size: 20px; margin-left: 50px;
                   "> Welcome '.$name.'</p>';
                echo '   <form method="post" action="insert.php" >
                                <label style="color: white; font-size: 20px; margin-left: 30px;">Make your reservation</label><br><br> 
                                <label for="start" style="color:black;font-size: 18px;">Select date if you are creating reservation  </label>&nbsp;&nbsp;&nbsp;

                            <input type="date" id="start" name="date" min='.$dateee.' ><br>
                            
                              <label for="start1" style="color:black;font-size: 18px;">Select date if you are updating reservation</label>&nbsp;&nbsp;&nbsp;

                            <input type="date" id="start1" name="date2" min='.$dateee.' ><br>
                            
                            
                             <label for="vremeP" style=" font-size: 18px; color: black">Start hour(if you are creating reservation)  </label>  
                              <select name="vremeP" id="vremeP"><br>
                                        
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
 
                                </select><br>
                                 <label for="vremeP" style=" font-size: 18px; color: black">New Start hour (if you are updating reservation)</label>  
                                    <select name="newStartTime" ><br>
                                    
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
 
                                </select>
                                <br>
                        <label   style="color: black;font-size: 18px;">How long do you want to be in the restaraunt?  ( min 1h, max 6h ) </label><br>
                                <select name="vremeT" id="vremeT" style="margin-left: 100px">
                              
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                </select><br>
                              
                                
                                
                              <br>   <label for="sto" style="margin-left: 70px; color: black;font-size: 18px" >Choose table</label><br>
                               
                                 ';


                echo '<select name="sto" id="vremeT" style="margin-left: 100px">';
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



                                 
                            echo'  
<button type="submit" name="submit-reservation" style="font-size: 0.7em;

    color:#fff;
    background-color: #ff0158;
    padding: 10px 30px;
    margin-top: 20px;
    text-decoration: none;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: 0.5s;"> Create reservation</button>
                                <button type="submit" name="delete-reservation"style="font-size: 0.7em;

    color:#fff;
    background-color: #ff0158;
    padding: 10px 30px;
    margin-top: 20px;
    text-decoration: none;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: 0.5s;">Delete reservation </button><br>
                                <button type="submit" name="update-reservation" style="font-size: 0.7em;

    color:#fff;
    background-color: #ff0158;
    padding: 10px 30px;
    margin-top: 20px;
    text-decoration: none;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: 0.5s;">Update reservation </button>
                                <button type="submit" name="show-reservations" style="font-size: 0.7em;

    color:#fff;
    background-color: #ff0158;
    padding: 10px 30px;
    margin-top: 20px;

    text-decoration: none;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: 0.5s;">Show reservations</button>
                               
                                
                                
                                
                                <br>
                                <br><br>
                               
                            </form>
                            <form method="post" action="changeInfos.php"  id="changeInfos" >
                                                

                                            <input type="text" name="change-name" placeholder="Name" id="changeN" style="width: 150px;margin-left: 50px"><span id="changeNE"></span><br><br>
                                            <input type="text" name="change-lastname" placeholder="Lastname" id="changeL" style="width: 150px;margin-left: 50px"<span id="changeLE"></span><br><br>
                                             
                                            <input type="text" name="change-number" placeholder="Mobile Phone" id="changeMP" style="width: 150px;margin-left: 50px"><span id="changeMPE"></span><br><br>
                                            <input type="password" name="change-pwd" placeholder="Password" id="changeP" style="width: 150px;margin-left: 50px"> <span id="changePE"></span><br><br>
                                             <input type="password" name="change-pwd-repeat" placeholder="Repeat Password" id="changePP" style="width: 150px;margin-left: 50px"><span id="changePPE"></span><br>
                                             <button type="submit" name="change-update"  style="font-size: 0.7em;

    color:#fff;
    background-color: #ff0158;
    padding: 10px 30px;
    margin-top: 20px;
    width: 213px;
    margin-left: 10px;
    text-decoration: none;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: 0.5s;">Update informations</button>
                                             
                                            </form>
                            
                            
                            
                            
                        
                            <form method="post" action="logout.php">
                                 <button type="submit" name="logout-submit" style="font-size: 0.7em;

    color:#fff;
    background-color: #ff0158;
    padding: 10px 30px;
    margin-top: 20px;
    margin-left: 60px;
    text-decoration: none;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: 0.5s;">Logout</button>
                            </form>
                            
                            
                            
                            ';



                            require_once "db_config.php";

            }
            else{
                echo '
    
  
        
        
 <h1 class="singup1" style="color: #ff0158" >Log in</h1> <form method="post" action="login.php" class="singup2 col" id="logK" ">
            <input type="text" name="mailuid" placeholder="Email"  id="emailL"><span id="emailL_error"></span><br><br>
            <input type="password" name="pwd" placeholder="Password" id="passL"><span id="passL_error"></span><br>
            <button type="submit" name="login-submit" class="btn2" style="font-size: 1em;
    color:#fff;
    background-color: #ff0158;
    padding: 10px 30px;
    margin-top: 20px;
    margin-left: 30px;
    text-decoration: none;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: 0.5s;" >Login</button>
        </form>
     
        ';
                if(isset($_GET['newpwd'])){
                    if($_GET['newpwd']=="passwordupdated"){
                        echo'<p style="color: #0f0"> Your password has been reset!</p>';
                    }
                }
        
    echo'    <a href="resetpw.php" >Forgot your password?</a>
        ';
                    echo'
        <br>
        <h1 class="singup1 " style="color: #ff0158" >Sign up</h1>
       
          <form method="post" action="signup.php" class="singup2 " id="signupJS" >';



                    echo '
                    <br>
                <input type="text" name="uid"   placeholder="Name" id="name"> <span id="name_error"></span><br><br>
                <input type="text" name="ulastname" placeholder="Lastname" id="last_name"><span id="last_name_error"></span><br><br>
                <input type="text" name="mail" placeholder="Email" id="email"><span id="email_error"></span><br><br>
                <input type="text" name="unumber" placeholder="Mobile Phone" id="phone"><span id="phone_error"></span><br><br>
                <input type="password" name="pwd" placeholder="Password" id="pw"> <span id="pw_error"></span><br><br>
                <input type="password" name="pwd-repeat" placeholder="Repeat Password" id="pww"><span id="pww_error"></span><br>

                <button type="submit" name="signup-submit" class="btn2" style="font-size: 1em;
    color:#fff;
    background-color: #ff0158;
    padding: 10px 30px;
    margin-top: 20px;
    margin-left: 30px;
    text-decoration: none;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: 0.5s;">
                    Sign up
                </button>

            </form>
          

        
    
        '

                ;
            }
            ?>

        </div></section>



</main>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>
