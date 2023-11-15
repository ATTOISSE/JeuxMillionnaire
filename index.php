<?php
session_start();
   $connection =new mysqli('localhost','root','','jeux') ;
    //$connection =new mysqli('mysql-promotion.alwaysdata.net','promotion_jeux','papa@2303','promotion_jeux') ;
    if(isset($_POST['btn'])){
        $name = $_POST['name'];
        $requete = "INSERT INTO classement(NOM) VALUES ('$name') ";
        $rs=mysqli_query($connection,$requete);
        $user =  mysqli_fetch_assoc($rs);
        $_SESSION['profile']=$user;
        $_SESSION['nom'] = $name;
        header("location:game.php");
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="index.css">
    <title>Document</title>
</head>
<body>
    <center>
    <div class="logo">
        <img src="logo.png" alt="" >
    </div>
</center>
<center><h2 style="color:white" id="finalScore">Êtes-vous prêt(e) ?</h2></center>

    <div >
            <form action="" method="POST" class="end-from-container">
                <input type="text" name="name" id="username" required placeholder="entrer votre nom">
                <button style="margin-bottom:20px" name="btn">JOUER</button>
            </form>
            
        </div>

    <div >
        <center>
       <a href="highscores.php"> <button>CLASSEMENT</button></a>
    </center>
    </div>
</body>
</html>