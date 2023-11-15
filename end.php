<?php
session_start();
$connection =new mysqli('localhost','root','','jeux') ;
//$connection =new mysqli('mysql-promotion.alwaysdata.net','promotion_jeux','papa@2303','promotion_jeux') ;
    if(isset($_POST['btn'])){
$nom = $_SESSION['nom'];
$score = $_POST['finalScore'];
$requete = "UPDATE classement SET  SCORE = $score where NOM = '$nom' ";
mysqli_query($connection,$requete);
header('location:highscores.php');
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body style="background: url('aplo1.gif');">
    <div class="container" style="margin-top:130px ;">
        <div class="flex-center flex-column" >
            <img src="aplo.gif" alt="">
            <audio controls style="display: none;" src="aplo.ogg" loop   id="son"></audio>
<form action="" method="POST" class="end-from-container">
            <center><h2 style="color:white;display:inline; ">Félicitation <?php echo "Mr(Mlle)"." ".$_SESSION['nom'] ?> !!<br> Vous avez terminé le jeu avec</h2></center>
            
           <center> <textarea style="display:inline ;" readonly name="finalScore" id="finalScore" cols="5" rows="1">0</textarea> <h2 style="color:white; ">pts</h2> </center>    
           <center><button  name="btn" class="btn">classement</button> </center>       
                
            </form>  
                  
        </div>
    </div>
    <script src="end.js"></script>
    <script>
  var son = document.getElementById("son");
  
  setTimeout(
    function()
      { son.play();}, 1);
    </script>
</body>
</html>