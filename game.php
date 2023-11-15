
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="game.css">
    <style>
       body{ color: white;
    background: url("pp.jpeg");
    background-repeat: repeat;
    background-size: 100% ;}
    </style>
</head>
<body>
    <div class="container">
<div id="game" class="justify-center flex-column" style="margin-top: -140PX;"> 
    
    <div id="hud">
<div class="hud-item">
    <p id="progressText" class="hud-preflix">
        Question
    </p>
   <div id="progressBar">
<div id="progressBarFull"></div>
   </div> 
</div>

<div class="hud-item">
<p class="hud-prefix">Score</p>
<h1 class="hud-main-text" id="score">0</h1>
</div>
    </div>
    <div class="choice-container" style="background: rgb(0, 162, 255); ">
    
    <h1 id="question" style="font-size: 30px; margin: 30px; ">what is the answer to this question ? </h1>   
    </div>
   <div class="choice-container">
       <p class="choice-prefix">A:</p>
       <p  class="choice-text" data-number="1">choice1</p>
       
   </div>
  
   <div class="choice-container">
    <p class="choice-prefix">B:</p>
    <p  class="choice-text" data-number="2">choice2</p>
    
</div>
<div class="choice-container">
    <p class="choice-prefix">C:</p>
    <p  class="choice-text" data-number="3">choice3</p>
    
</div>
<div class="choice-container">
    <p class="choice-prefix">D:</p>
    <p  class="choice-text" data-number="4">choice4</p>
    
</div>

</div>
<audio controls style="display: none;" src="capo.mp3" loop   id="son"></audio>

    </div>
    <script>
  var son = document.getElementById("son");
  
  setTimeout(
    function()
      { son.play();}, 1);
    </script>
    <script src="game.js"></script>
</body>
</html>