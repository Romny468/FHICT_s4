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
</div><br><br>

<div class="spacing2"><br><br><br>

<?php
$filename = "infofile.txt";
$file = fopen($filename, "r");
$content = htmlspecialchars(fread($file,filesize($filename)), ENT_COMPAT);
$content2 = nl2br($content);
//echo $content2; //test echo before makeing it humanly readable
//echo "<br><br><br><br><br><br>"; //spacing for test echo and result

// make it look humanly readable
$content3 = str_replace("///", "<br>", $content2);
$content3 = str_replace("??", "<b>", $content3);
echo str_replace("!!", "</b>", $content3);
?>
</div>