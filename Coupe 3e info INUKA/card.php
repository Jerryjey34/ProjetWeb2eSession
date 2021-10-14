<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Projet tournoie Inuka - Index</title>
</head>
<body>
   <?php
      include "header.php";
   ?>

    <div class="imagePrincipale">

    <h1 class="JeuxOlympiquesH1">Jeux Olympiques Qatar 2021</h1>
    
    <Canvas id="mycanvas2" width="800" height="280" >
    </Canvas>
    
    <script>
        
        var testcanva = document.getElementById("mycanvas2")
        var contexte = testcanva.getContext("2d");
        contexte.beginPath();
        contexte.lineWidth = "6";
        contexte.strokeStyle = "rgb(0, 0, 253)";
        contexte.arc(100, 100, 30, 0 ,2 * Math.PI);
        contexte.stroke();

        contexte.beginPath();
        contexte.lineWidth = "6";
        contexte.strokeStyle = "rgb(253, 253, 0)";
        contexte.arc(135, 135, 30, 0 ,2 * Math.PI);
        contexte.stroke();

        contexte.beginPath();
        contexte.lineWidth = "6";
        contexte.strokeStyle = "rgb(0, 0, 0)";
        contexte.arc(170, 100, 30, 0 ,2 * Math.PI);
        contexte.stroke();

        contexte.beginPath();
        contexte.lineWidth = "6";
        contexte.strokeStyle = "rgb(0, 128, 0)";
        contexte.arc(205, 135, 30, 0 ,2 * Math.PI);
        contexte.stroke();

        contexte.beginPath();
        contexte.lineWidth = "6";
        contexte.strokeStyle = "rgb(255, 0, 0)";
        contexte.arc(240, 100, 30, 0 ,2 * Math.PI);
        contexte.stroke();


    </script>


<table class="content-table">
  <thead>
    <tr>
      <th>Lot#1</th>
      <th>Lot#2</th>
      <th>Lot#3</th>
      <th>Lot#4</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Bresil</td>
      <td>France</td>
      <td>Espagne</td>
      <td>Portugal</td>
    </tr>
    <tr class="active-row">
      <td>Argentine</td>
      <td>Allemagne</td>
      <td>Italie</td>
      <td>Haiti</td>
    </tr>
  </tbody>
</table>

    </div>
</body>
</html>