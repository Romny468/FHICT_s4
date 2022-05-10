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

$ip_array = array('213.125.137.254', '10.1.32.70', '10.1.32.71');
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
                <h2>Niels van den Berg <br> <span>Pharmacist/Pharmacy Manager</span></h2>
             </div>
             <div class="contactInfo">
                 <h3 class="title">Contact Info</h3>
                 <ul>
                     <li>
                         <span class="icon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                         <span class="text"> +31 0629135437</span>
                     </li>
                     <li>
                        <span class="icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                        <span class="text"> Dr.Niels0@gmail.com</span>
                    </li>
                    <li>
                        <span class="icon"><i class="fa fa-globe" aria-hidden="true"></i></span>
                        <span class="text"> Eindhoven, Noord Brabant, Netherlands</span>
                    </li>
                    <li>
                        <span class="icon"><i class="fa fa-university" aria-hidden="true"></i></span>
                        <span class="text"> Dutch, English, German </span>
                    </li>
                    <li>
                        <span class="icon"><i class="fa fa-car" aria-hidden="true"></i></span>
                        <span class="text"> B <br> In possession of a car </span>
                    </li>
                 </ul>
             </div>


             <div class="contactInfo education">
                <h2 class="title2">Education</h2>				
				<ul>
                    <li>
                        
                        <h5>2008-2010</h5>
                        <h4>Master Degree in Medical Pharmaceutical Science</h4>
                        <h4>Univeristy of Groningen</h4>
                    </li>
                    <li>
                        <h5>2005-2008</h5>
                        <h4>Bachelor Degree in Pharmacy</h4>
                        <h4>Univeristy of Groningen</h4>
                    </li>
                </ul>
            </div>

        </div> <!--CLoses the left side-->



        <div class="right_Side">
    <div class="about">
        <h2 class="titel2">About me</h2>
        <p>Skilled pharmacist with exceptional organization skills, strong interpersonal communication ability, and extensive knowledge of medications and their use. I place a strong 
        focus on attention to detail. Dedicated professional ensures that all safety protocols and security measures are adhered to in meeting the high standards of the field.<br>
        <br> In my spare time I read a lot and partake in Archery along with my wife, and Tennis along with my two kids.</p>

    </div>

    <div class="about";>
        <h2 class="titel2">Experience</h2>
		<table style="padding-left: 5%">
		<colgroup>
			<col style="width: 173px">
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
	</table>

    <div class="about skills">
        <h2 class="title2">Professional Skills</h2>
<ul>
    <li>Excellent communication and active listening skills to ensure that patients and customers understand their medications and how to take them.</li>
    <li>Extensive education and training to guarantee that I am constantly up to date on the newest research and information regarding medications.</li>
    <li>Ability to hear and understand what others are saying, and oral expression skills that allow me to explain a complicated topic in a simple way that they can understand.</li>
    <li>Strong sensitivity to problems that may arise when issues with prescribers, patients or drug companies are present.</li>
    <li>Intense focus and attention to detail to minimize mistakes and unnecessary expenses for both the drug companies and the pharmacy.</li>
    <li>Exceptional social perception, facilitating the understanding of concerns and issues of both patients and prescribers as they arise.</li>
    <li>Instructing skills that allow me to teach others how to do things better rather than just doing jobs for them.</li>
</ul>
    </div>

    </div> <!--Closes the right side-->
    
    </div><!--Closes the body-->
</body>
</html>

<!--<div class="spacing2">
	<img src="picture.png" alt="Profile Picture.png" width="23%" style="float: right;">
	<h2>Curiculum Vitea</h2>
	<h3>Personalia</h3>
	<table>
	<colgroup>
		<col style="width: 173px">
		<col style="width: 500px">
	</colgroup>
		<tr>
			<td>Name</td>
			<td>Niels van den Berg</td>
		</tr>
		<tr>
			<td>Address</td>
			<td>some street 158</td>
		</tr>
		<tr>
			<td>Phone</td>
			<td>06-12348765</td>
		</tr>
		<tr>
			<td>Date of birth</td>
			<td>August 8, 1991</td>
		</tr>
		<tr>
			<td>Marital status</td>
			<td>single</td>
		</tr>
		<tr>
			<td>Nationality</td>
			<td>Dutch</td>
		</tr>
		<tr>
			<td>Driver licence</td>
			<td>B, In posession of a car</td>
		</tr>
	</table><br>
	
	<h3>General</h3>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et 
	dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex 
	ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat 
	nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit 
	anim id est laborum.</P><br>
	
	<h3>Educations</h3>
	<table>
		<colgroup>
			<col style="width: 173px">
			<col style="width: 500px">
		</colgroup>
		<tr>
			<td>2011 - 2015</td>
			<td>Education 3, HBO</td>
		</tr>
		<tr>
			<td>2008 - 2011</td>
			<td>Education 2, MBO</td>
		</tr>
		<tr>
			<td>2004 - 2008</td>
			<td>Education 1, VMBO</td>
		</tr>
	</table><br>
	
	<h3>Work experience</h3>
	<table>
		<colgroup>
			<col style="width: 173px">
			<col style="width: 500px">
		</colgroup>
		<tr>
			<td>2011 - 2015</td>
			<td>Work 3, smt</td>
		</tr>
		<tr>
			<td>2008 - 2011</td>
			<td>Work 2, smt</td>
		</tr>
		<tr>
			<td>2004 - 2008</td>
			<td>Work 1, smt</td>
		</tr>
	</table><br>
	
	<h3>Other information</h3>
	<table>
		<colgroup>
			<col style="width: 173px">
			<col style="width: 500px">
		</colgroup>
		<tr>
			<td>Characteristics</td>
			<td>Inquisitive, accurate, social, collegial</td>
		</tr>
		<tr>
			<td>Language skills</td>
			<td>Dutch: Mother tongue, fluent orally and in writing<br>
					English: good oral and written</td>
		</tr>
		<tr>
			<td>Knowledge</td>
			<td>Write some experience here.</td>
		</tr>
		<tr>
			<td>Hobbies & interests</td>
			<td>Write some hobbies and interests here.</td>
		</tr>
	</table><br>
</div>-->
