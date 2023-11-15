<?php 
    $connection =new mysqli('localhost','root','','jeux') ;
    //$connection =new mysqli('mysql-promotion.alwaysdata.net','promotion_jeux','papa@2303','promotion_jeux') ;

    $req =" SELECT * FROM classement ORDER BY SCORE DESC";
    $rs=mysqli_query($connection,$req);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="highscores.css">
</head>
<body style="background: url('pp.jpeg'); ">
    <div style="margin-top:50px;">
        <div id="highScores" class="flex-center flex-column">
            <h1 id="finalScore">CLASSEMENT</h1>
            <table style="margin-bottom:20px;" >
            <tr >
                <td colspan="2" style="    font-size: 24px;">NOM</li>
                <td style="    font-size: 24px; padding-left:40px;">SCORE</li>
            </tr>
            <?php while($client = mysqli_fetch_row($rs)):?>
            <tr id="highScoresList">
                <td colspan="2" style="    font-size: 24px;"><?= $client['1']?></li>
                <td  style="    font-size: 24px; padding-left:40px;"><?= $client['2']?> pts</li>
            </tr>
            <?php endwhile ?>
            </table>
            <a href="index.php" class="btn">Menu principale</a>
        </div>
    </div>
    

</body>
</html>