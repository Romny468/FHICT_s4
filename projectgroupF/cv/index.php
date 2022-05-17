<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../media/icon/N.icon (black).png">
</head>
<body>
<title>Naelys.nl - CV</title>

<?php
$rawdata = $_SERVER["HTTP_USER_AGENT"];
$isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"));
if ($isMob) {
	$mob = "devicetype: mobile <br>";
} else {$mob = "devicetype: laptop/desktop <br>";}


if (strpos(strtolower($rawdata), "iphone")) {
	$mob = $mob . "device: iPhone<br>";
} elseif (strpos(strtolower($rawdata), "ipad")) {
	$mob = $mob . "device: iPad<br>";
} elseif (strpos(strtolower($rawdata), "samsung")) {
	$mob = $mob . "device: Samsung<br>";
} elseif (strpos(strtolower($rawdata), "pixel")) {
	$mob = $mob . "device: Google phone<br>";
} elseif (strpos(strtolower($rawdata), "sm-g")) {
	$mob = $mob . "device: Samsung Galaxy phone<br>";
} elseif (strpos(strtolower($rawdata), "sm-t")) {
	$mob = $mob . "device: Samsung tablet<br>";
} elseif (strpos(strtolower($rawdata), "sm-a")) {
	$mob = $mob . "device: Samsung Galaxy A-series<br>";
}


//get info
$ip = "ip-address: " . $_SERVER['HTTP_X_FORWARDED_FOR'] . "<br>";
$time = date('H:i:s');
$date = date('d-m-Y');

$browser = get_browser(null, true);
print_r($browser);

//this part is from https://stackoverflow.com/questions/8754080/how-to-get-exact-browser-name-and-version to determine the exact browser and version. The code has been modified.
function getBrowser() { 
  $u_agent = $_SERVER['HTTP_USER_AGENT'];
  $bname = 'Unknown';
  $platform = 'Unknown';
  $version= "";

  //get platform
  if (preg_match('/linux/i', $u_agent)) {
    $platform = 'Linux';
		if (preg_match('/linux/i', $u_agent)) {
			$platform = $platform . ", Android";
		}
  }elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
    $platform = 'Mac';
  }elseif (preg_match('/windows|win32/i', $u_agent)) {
    $platform = 'Windows';
  }

  //get name of useragent
  if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)){
    $bname = 'Internet Explorer';
    $ub = "MSIE";
  }elseif(preg_match('/Firefox/i',$u_agent)){
    $bname = 'Mozilla Firefox';
    $ub = "Firefox";
  }elseif(preg_match('/OPR/i',$u_agent)){
    $bname = 'Opera';
    $ub = "Opera";
  }elseif(preg_match('/Chrome/i',$u_agent) && !preg_match('/Edge/i',$u_agent)){
    $bname = 'Google Chrome';
    $ub = "Chrome";
  }elseif(preg_match('/Safari/i',$u_agent) && !preg_match('/Edge/i',$u_agent)){
    $bname = 'Apple Safari';
    $ub = "Safari";
  }elseif(preg_match('/Netscape/i',$u_agent)){
    $bname = 'Netscape';
    $ub = "Netscape";
  }elseif(preg_match('/Edge/i',$u_agent)){
    $bname = 'Edge';
    $ub = "Edge";
  }elseif(preg_match('/Trident/i',$u_agent)){
    $bname = 'Internet Explorer';
    $ub = "MSIE";
  }

  //get version number
  $known = array('Version', $ub, 'other');
  $pattern = '#(?<browser>' . join('|', $known) .')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
  if (!preg_match_all($pattern, $u_agent, $matches)) {// we have no matching number just continue
	}
  //see how many we have
  $i = count($matches['browser']);
  if ($i != 1) {
    //we will have two since we are not using 'other' argument yet
    //see if version is before or after the name
    if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){$version= $matches['version'][0];}else {$version= $matches['version'][1];}}else {$version= $matches['version'][0];}

  // check if we have a number
  if ($version==null || $version=="") {$version="?";}

  return array(
    'userAgent' => $u_agent,
    'name'      => $bname,
    'version'   => $version,
    'platform'  => $platform,
    'pattern'    => $pattern
  );
} 

// now try it
$ua=getBrowser();
$yourbrowser= "Your browser: " . $ua['name'] . " " . $ua['version'] . " on " .$ua['platform'];
$platform = "platform: " .$ua['platform'] . "<br>";
$browser = "browser: " . $ua['name'] . "<br>";

// create log with information
$log = "$date $time <br> $platform $browser $ip $mob <br>raw data: $rawdata<br><br><br><br>";
//echo "<br>",$log; // test

$ip_array = array('213.125.137.254', '10.1.32.70', '10.1.32.71', '10.1.32.108');
$file = "../logs/infofile.txt";
$ip2 = $_SERVER['HTTP_X_FORWARDED_FOR'];
if (!in_array($ip2, $ip_array)) {
	if (file_exists($file) == FALSE) {echo "The file does not exist";} else {
		$myfile = fopen($file, "a") or die("Unable to open file!");
		fwrite($myfile, $log."\n");
		fclose($myfile);
	}
} else { echo "<p style='padding-left: 17%'><mark>The data will not be saved as this is a test IP address</mark></p>"; }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" 
    integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
	<div class="container">
		<div class="left_Side">
			<div class="profileText">
				<div class="imgBx">
					<img src="Persona pic.png">
				</div>
				<br><h2 style="font-size:140%">Niels van den Berg <br><span style="font-size:80%">Pharmacist</span></h2>
			</div>
		  <div class="contactInfo">
				<h3 class="title">Personalia</h3>
				<table style="padding-left: 5%;">
					<colgroup>
						<col style="width: 127px">
						<col style="width: 500px">
					</colgroup>
					<tr valign="top">
						<td><span class="icon"><i class="fa fa-phone" aria-hidden="true"></i></span></td>
						<td style="padding-left:2%;">+31 6 29135437</td>
					</tr>
					<tr valign="top">
						<td><span class="icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span></td>
						<td style="padding-left:2%;">Dr.Niels0@gmail.com</td>
					</tr>
					<tr valign="top">
						<td><span class="icon"><i class="fa fa-globe" aria-hidden="true"></i></span></td>
						<td style="padding-left:2%;">Eindhoven, Noord Brabant, Netherlands</td>
					</tr>
					<tr valign="top">
						<td><span class="icon"><i class="fa fa-university" aria-hidden="true"></i></span></td>
						<td style="padding-left:2%;">Dutch, English, German</td>
					</tr>
					<tr valign="top">
						<td><span class="icon"><i class="fa fa-car" aria-hidden="true"></i></span></td>
						<td style="padding-left:2%;">B, in possession of a car</td>
					</tr>
				</table>
				<h3 class="title">Talents & characteristics</h3>
				<ul style="color: #eee";>
					<li>Team leader</li>
					<li>Motivated</li>
					<li>Independent</li>
					<li>Eager to learn</li>
				</ul>
			</div>
		</div> <!--CLoses the left side-->
	

		<div class="right_Side">
			<div class="about"><br>
				<h2 class="title2">About me</h2>
				<p>Skilled pharmacist with exceptional organization skills, strong interpersonal communication ability, and extensive knowledge of medications and their use. I place a strong 
				focus on attention to detail. Dedicated professional ensures that all safety protocols and security measures are adhered to in meeting the high standards of the field.<br>
				<br> In my spare time I read a lot and partake in Archery along with my wife, and Tennis along with my two kids.</p>
				<br>
								
				<h2 class="title2">Education</h2>
				<table style="padding-left: 5%">
					<colgroup>
						<col style="width: 127px">
						<col style="width: 500px">
					</colgroup>
					<tr valign="top">
						<td>2008-2010</td>
						<td>Master Degree in Medical Pharmaceutical Science<br>Univeristy of Groningen</td>
					</tr>
					<tr valign="top">
						<td>2005-2008</td>
						<td>Bachelor Degree in Pharmacy<br>Univeristy of Groningen</td>
					</tr>
				</table><br>
				
				<h2 class="title2">Experience</h2>
				<table style="padding-left: 5%">
					<colgroup>
						<col style="width: 150px">
						<col style="width: 500px">
					</colgroup>
					<tr valign="top">
						<td>2016 - 2022</td>
						<td>Univeristy Medical Center Groningen<br>Pharmacist</td>
					</tr>
					<tr valign="top">
						<td>2013 - 2016</td>
						<td>Univeristy Medical Center Groningen<br>Pharmacist</td>
					</tr>
					<tr valign="top">
						<td>2012 - 2013</td>
						<td>Univeristy Medical Center Groningen<br>Pharmacy Aide</td>
					</tr>
				</table><br>

				<h2 class="title2">Professional Skills</h2>
				<ul>
						<li>Excellent communication and active listening skills to ensure that patients and customers understand their medications and how to take them.</li>
						<li>Extensive education and training to guarantee that I am constantly up to date on the newest research and information regarding medications.</li>
						<li>Ability to hear and understand what others are saying, and oral expression skills that allow me to explain a complicated topic in a simple way that they can understand.</li>
						<li>Strong sensitivity to problems that may arise when issues with prescribers, patients or drug companies are present.</li>
						<li>Intense focus and attention to detail to minimize mistakes and unnecessary expenses for both the drug companies and the pharmacy.</li>
						<li>Exceptional social perception, facilitating the understanding of concerns and issues of both patients and prescribers as they arise.</li>
						<li>Instructing skills that allow me to teach others how to do things better rather than just doing jobs for them.</li>
				</ul><br>
			</div> <!--Closes the right side-->
		</div>
	</div>
</body><!--Closes the body-->
</html>