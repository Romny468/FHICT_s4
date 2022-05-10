<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../media/icon/N.icon (black).png">
  <link rel="stylesheet" href="../other/style.css">
</head>
<body>
<title>Naelys.nl - CVLogs</title>

<div class="logocentered">
  <a href="https://www.naelys.nl/"><img src="../media/logo/Naelys(brush strokes.w).png" alt="naelys.nl logo"></a>
</div><br><br><br><br><br>

<div class="spacing2"> 
<?php
$file = "infofile.txt";
echo "<p><br><br>",file_get_contents($file),"</p>";
?>
</div>