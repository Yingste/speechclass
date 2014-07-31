
<!-- saved from url=(0250)http://192.168.1.79/?score1=0&score2=0&score3=4&score4=0&score5=2&score6=3&score7=0&score8=0&score9=1&score10=0&score11=5&score12=0&score13=0&match=2&team=2451&cm1=&cm2=&cm3=how&cm4=&cm5=&cm6=&cm7=&cm8=are&cm9=&cm10=you&cm11=&cm12=&cm13=&cmmain=hello -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"><script>window["_GOOG_TRANS_EXT_VER"] = "1";</script><style type="text/css"></style></head>
<body style="background-color: grey;">
<title>Scouting 2014</title>
<!-- css styling -->
<link href="style.css" rel="stylesheet">
<link href="bootstrap3.min.css" rel="stylesheet">

<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">


<div id="fwindc1">
<center>

<form method="post" >
<center>
<br/>
<div style="height:60px;width:30%">
<input type="number" name="team" class="form-control" />
</div>
</center>
</form>


<?php
$test = "";
$team = "";
foreach ($_POST as $key => $value){
    if ($key == 'team')
		{
		//echo "$value";
		$team = $value;
		
		}
		
}

echo "<center> <h2> $team </h2> </center>";


$con=mysqli_connect("localhost","testuser","testuser","test1"); 


//high goal percents
$sql = "SELECT `team`, `match`, `zone`, `highg`, `highgt`, `shortg`, `shortgt`, `trussg`, `trusst`, `trusshpa`, `trusshpb`, `hloady`, `hloadn`, `dblock`, `dhit`, `assist` FROM `table` WHERE 1";
	
  $result = mysqli_query($con, "SELECT AVG(highg) FROM `scouting-n` WHERE team='$team' and highgt!='0' and zone!='21'");
 while($row = mysqli_fetch_assoc($result)) {
$avghighg = $row['AVG(highg)'];
}

//echo "$avghighg" ;

$result = mysqli_query($con, "SELECT AVG(highgt) FROM `scouting-n` WHERE team='$team' and highgt!='0' and zone!='21'");
 while($row = mysqli_fetch_assoc($result)) {
$avghighgt = $row['AVG(highgt)'];
}

//echo "$avghighgt" ;


if ($avghighgt != 0)
{
$highgpercent = $avghighg / $avghighgt * 100 ;
} else {
$highgpercent = "no data";
};

//echo "<h1> $highgpercent </h1> ";


//short goal percents
$result = mysqli_query($con, "SELECT AVG(shortg) FROM `scouting-n` WHERE team='$team' and shortgt!='0' and zone!='21'");
 while($row = mysqli_fetch_assoc($result)) {
$avgshortg = $row['AVG(shortg)'];
}

//echo "$avghighg" ;

$result = mysqli_query($con, "SELECT AVG(shortgt) FROM `scouting-n` WHERE team='$team' and shortgt!='0' and zone!='21'");
 while($row = mysqli_fetch_assoc($result)) {
$avgshortgt = $row['AVG(shortgt)'];
}

//echo "$avghighgt" ;
if ($avgshortgt != 0)
{
$shortgpercent = $avgshortg / $avgshortgt * 100 ;
} else {
$shortgpercent = "no data";
};

//echo "$shortgpercent";


//truss percents
$result = mysqli_query($con, "SELECT AVG(trussg) FROM `scouting-n` WHERE team='$team' and trussg!='0' and zone!='21'");
 while($row = mysqli_fetch_assoc($result)) {
$avgtrussg = $row['AVG(trussg)'];
}

//echo "<h1> $avgtrussg </h1>" ;

$result = mysqli_query($con, "SELECT AVG(trusst) FROM `scouting-n` WHERE team='$team' and trusst!='0' and zone!='21'");
 while($row = mysqli_fetch_assoc($result)) {
$avgtrusst = $row['AVG(trusst)'];
}

//echo "$avgtrusst" ;
$avgtrusst = $avgtrusst + $avgtrussg;

if ($avgtrusst != 0) 
{
$trussgpercent = $avgtrussg / $avgtrusst * 100 ;
} else {
$trussgpercent = "no data";
};
//echo "$trussgpercent";


//hload percents
$result = mysqli_query($con, "SELECT AVG(hloady) FROM `scouting-n` WHERE team='$team' and hloady!='0' and zone!='21'");
 while($row = mysqli_fetch_assoc($result)) {
$avghloady = $row['AVG(hloady)'];
}

//echo "<h1> $avghloady </h1>" ;

$result = mysqli_query($con, "SELECT AVG(hloadn) FROM `scouting-n` WHERE team='$team' and hloadn!='0' and zone!='21'");
 while($row = mysqli_fetch_assoc($result)) {
$avghloadn = $row['AVG(hloadn)'];
}

//echo "$avghloadn" ;
$avghloadn += $avghloady;

if ($avghloady != 0) 
{
$hloadypercent = $avghloady / $avghloadn * 100 ;
} else {
$hloadypercent = "no data";
};

//echo "$hloadypercent";




echo "<center>
<table class=\" table table-condensed table-striped \" style=\"width:80%\" >
<tr>
<td width=\"25%\"> High Goal Percent </td>
<td width=\"25%\"> Low Goal Percent </td>
<td width=\"25%\"> Truss Percent </td>
<td width=\"25%\"> Human Load Percent </td>
</tr><tr></tr>
<tr>
<td width=\"25%\"> $highgpercent </td>
<td width=\"25%\"> $shortgpercent </td>
<td width=\"25%\"> $trussgpercent </td>
<td width=\"25%\"> $hloadypercent </td>
</tr>



</table>
</center>
";




//high goal zone 1
$sql = "SELECT `team`, `match`, `zone`, `highg`, `highgt`, `shortg`, `shortgt`, `trussg`, `trusst`, `trusshpa`, `trusshpb`, `hloady`, `hloadn`, `dblock`, `dhit`, `assist` FROM `table` WHERE 1";
	
  $result = mysqli_query($con, "SELECT SUM(highg) FROM `scouting-n` WHERE team='$team' and zone='1'");
 while($row = mysqli_fetch_assoc($result)) {
$highg1 = $row['SUM(highg)'];
}

//echo "<h1> $highg1 </h1>" ;

//high goal zone 2
$sql = "SELECT `team`, `match`, `zone`, `highg`, `highgt`, `shortg`, `shortgt`, `trussg`, `trusst`, `trusshpa`, `trusshpb`, `hloady`, `hloadn`, `dblock`, `dhit`, `assist` FROM `table` WHERE 1";
	
  $result = mysqli_query($con, "SELECT SUM(highg) FROM `scouting-n` WHERE team='$team' and zone='2'");
 while($row = mysqli_fetch_assoc($result)) {
$highg2 = $row['SUM(highg)'];
}

//echo "<h1> $highg1 </h1>" ;

//high goal zone 3
$sql = "SELECT `team`, `match`, `zone`, `highg`, `highgt`, `shortg`, `shortgt`, `trussg`, `trusst`, `trusshpa`, `trusshpb`, `hloady`, `hloadn`, `dblock`, `dhit`, `assist` FROM `table` WHERE 1";
	
  $result = mysqli_query($con, "SELECT SUM(highg) FROM `scouting-n` WHERE team='$team' and zone='3'");
 while($row = mysqli_fetch_assoc($result)) {
$highg3 = $row['SUM(highg)'];
}

//echo "<h1> $highg1 </h1>" ;

//high goal zone 4
$sql = "SELECT `team`, `match`, `zone`, `highg`, `highgt`, `shortg`, `shortgt`, `trussg`, `trusst`, `trusshpa`, `trusshpb`, `hloady`, `hloadn`, `dblock`, `dhit`, `assist` FROM `table` WHERE 1";
	
  $result = mysqli_query($con, "SELECT SUM(highg) FROM `scouting-n` WHERE team='$team' and zone='4'");
 while($row = mysqli_fetch_assoc($result)) {
$highg4 = $row['SUM(highg)'];
}

//echo "<h1> $highg1 </h1>" ;

//high goal zone 5
$sql = "SELECT `team`, `match`, `zone`, `highg`, `highgt`, `shortg`, `shortgt`, `trussg`, `trusst`, `trusshpa`, `trusshpb`, `hloady`, `hloadn`, `dblock`, `dhit`, `assist` FROM `table` WHERE 1";
	
  $result = mysqli_query($con, "SELECT SUM(highg) FROM `scouting-n` WHERE team='$team' and zone='5'");
 while($row = mysqli_fetch_assoc($result)) {
$highg5 = $row['SUM(highg)'];
}

//echo "<h1> $highg1 </h1>" ;

//high goal zone 6
$sql = "SELECT `team`, `match`, `zone`, `highg`, `highgt`, `shortg`, `shortgt`, `trussg`, `trusst`, `trusshpa`, `trusshpb`, `hloady`, `hloadn`, `dblock`, `dhit`, `assist` FROM `table` WHERE 1";
	
  $result = mysqli_query($con, "SELECT SUM(highg) FROM `scouting-n` WHERE team='$team' and zone='6'");
 while($row = mysqli_fetch_assoc($result)) {
$highg6 = $row['SUM(highg)'];
}

//echo "<h1> $highg1 </h1>" ;
//high goal zone 7
$sql = "SELECT `team`, `match`, `zone`, `highg`, `highgt`, `shortg`, `shortgt`, `trussg`, `trusst`, `trusshpa`, `trusshpb`, `hloady`, `hloadn`, `dblock`, `dhit`, `assist` FROM `table` WHERE 1";
	
  $result = mysqli_query($con, "SELECT SUM(highg) FROM `scouting-n` WHERE team='$team' and zone='7'");
 while($row = mysqli_fetch_assoc($result)) {
$highg7 = $row['SUM(highg)'];
}

//echo "<h1> $highg1 </h1>" ;
//high goal zone 8
$sql = "SELECT `team`, `match`, `zone`, `highg`, `highgt`, `shortg`, `shortgt`, `trussg`, `trusst`, `trusshpa`, `trusshpb`, `hloady`, `hloadn`, `dblock`, `dhit`, `assist` FROM `table` WHERE 1";
	
  $result = mysqli_query($con, "SELECT SUM(highg) FROM `scouting-n` WHERE team='$team' and zone='8'");
 while($row = mysqli_fetch_assoc($result)) {
$highg8 = $row['SUM(highg)'];
}

//echo "<h1> $highg1 </h1>" ;
//high goal zone 4
$sql = "SELECT `team`, `match`, `zone`, `highg`, `highgt`, `shortg`, `shortgt`, `trussg`, `trusst`, `trusshpa`, `trusshpb`, `hloady`, `hloadn`, `dblock`, `dhit`, `assist` FROM `table` WHERE 1";
	
  $result = mysqli_query($con, "SELECT SUM(highg) FROM `scouting-n` WHERE team='$team' and zone='9'");
 while($row = mysqli_fetch_assoc($result)) {
$highg9 = $row['SUM(highg)'];
}

//echo "<h1> $highg1 </h1>" ;
//high goal zone 10
$sql = "SELECT `team`, `match`, `zone`, `highg`, `highgt`, `shortg`, `shortgt`, `trussg`, `trusst`, `trusshpa`, `trusshpb`, `hloady`, `hloadn`, `dblock`, `dhit`, `assist` FROM `table` WHERE 1";
	
  $result = mysqli_query($con, "SELECT SUM(highg) FROM `scouting-n` WHERE team='$team' and zone='10'");
 while($row = mysqli_fetch_assoc($result)) {
$highg10 = $row['SUM(highg)'];
}

//echo "<h1> $highg1 </h1>" ;
//high goal zone 11
$sql = "SELECT `team`, `match`, `zone`, `highg`, `highgt`, `shortg`, `shortgt`, `trussg`, `trusst`, `trusshpa`, `trusshpb`, `hloady`, `hloadn`, `dblock`, `dhit`, `assist` FROM `table` WHERE 1";
	
  $result = mysqli_query($con, "SELECT SUM(highg) FROM `scouting-n` WHERE team='$team' and zone='11'");
 while($row = mysqli_fetch_assoc($result)) {
$highg11 = $row['SUM(highg)'];
}

//echo "<h1> $highg1 </h1>" ;
//high goal zone 12
$sql = "SELECT `team`, `match`, `zone`, `highg`, `highgt`, `shortg`, `shortgt`, `trussg`, `trusst`, `trusshpa`, `trusshpb`, `hloady`, `hloadn`, `dblock`, `dhit`, `assist` FROM `table` WHERE 1";
	
  $result = mysqli_query($con, "SELECT SUM(highg) FROM `scouting-n` WHERE team='$team' and zone='12'");
 while($row = mysqli_fetch_assoc($result)) {
$highg12 = $row['SUM(highg)'];
}

//echo "<h1> $highg1 </h1>" ;
//high goal zone 13
$sql = "SELECT `team`, `match`, `zone`, `highg`, `highgt`, `shortg`, `shortgt`, `trussg`, `trusst`, `trusshpa`, `trusshpb`, `hloady`, `hloadn`, `dblock`, `dhit`, `assist` FROM `table` WHERE 1";
	
  $result = mysqli_query($con, "SELECT SUM(highg) FROM `scouting-n` WHERE team='$team' and zone='13'");
 while($row = mysqli_fetch_assoc($result)) {
$highg13 = $row['SUM(highg)'];
}

//echo "<h1> $highg1 </h1>" ;
//high goal zone 14
$sql = "SELECT `team`, `match`, `zone`, `highg`, `highgt`, `shortg`, `shortgt`, `trussg`, `trusst`, `trusshpa`, `trusshpb`, `hloady`, `hloadn`, `dblock`, `dhit`, `assist` FROM `table` WHERE 1";
	
  $result = mysqli_query($con, "SELECT SUM(highg) FROM `scouting-n` WHERE team='$team' and zone='14'");
 while($row = mysqli_fetch_assoc($result)) {
$highg14 = $row['SUM(highg)'];
}

//echo "<h1> $highg1 </h1>" ;
//high goal zone 15
$sql = "SELECT `team`, `match`, `zone`, `highg`, `highgt`, `shortg`, `shortgt`, `trussg`, `trusst`, `trusshpa`, `trusshpb`, `hloady`, `hloadn`, `dblock`, `dhit`, `assist` FROM `table` WHERE 1";
	
  $result = mysqli_query($con, "SELECT SUM(highg) FROM `scouting-n` WHERE team='$team' and zone='15'");
 while($row = mysqli_fetch_assoc($result)) {
$highg15 = $row['SUM(highg)'];
}

//echo "<h1> $highg1 </h1>" ;

//high goal zone 1
		
 $result = mysqli_query($con, "SELECT SUM(trussg) FROM `scouting-n` WHERE team='$team' and zone='1'");
 while($row = mysqli_fetch_assoc($result)) {
$trussg1 = $row['SUM(trussg)'];
}

//echo "<h1> $trussg1 </h1>" ;

//high goal zone 2
	
  $result = mysqli_query($con, "SELECT SUM(trussg) FROM `scouting-n` WHERE team='$team' and zone='2'");
 while($row = mysqli_fetch_assoc($result)) {
$trussg2 = $row['SUM(trussg)'];
}

//echo "<h1> $trussg1 </h1>" ;

//high goal zone 3
	
  $result = mysqli_query($con, "SELECT SUM(trussg) FROM `scouting-n` WHERE team='$team' and zone='3'");
 while($row = mysqli_fetch_assoc($result)) {
$trussg3 = $row['SUM(trussg)'];
}

//echo "<h1> $trussg1 </h1>" ;

//high goal zone 4
	
  $result = mysqli_query($con, "SELECT SUM(trussg) FROM `scouting-n` WHERE team='$team' and zone='4'");
 while($row = mysqli_fetch_assoc($result)) {
$trussg4 = $row['SUM(trussg)'];
}

//echo "<h1> $trussg1 </h1>" ;

//high goal zone 5
	
  $result = mysqli_query($con, "SELECT SUM(trussg) FROM `scouting-n` WHERE team='$team' and zone='5'");
 while($row = mysqli_fetch_assoc($result)) {
$trussg5 = $row['SUM(trussg)'];
}

//echo "<h1> $trussg1 </h1>" ;

//high goal zone 6
	
  $result = mysqli_query($con, "SELECT SUM(trussg) FROM `scouting-n` WHERE team='$team' and zone='6'");
 while($row = mysqli_fetch_assoc($result)) {
$trussg6 = $row['SUM(trussg)'];
}

//echo "<h1> $trussg1 </h1>" ;
//high goal zone 7
	
  $result = mysqli_query($con, "SELECT SUM(trussg) FROM `scouting-n` WHERE team='$team' and zone='7'");
 while($row = mysqli_fetch_assoc($result)) {
$trussg7 = $row['SUM(trussg)'];
}

//echo "<h1> $trussg1 </h1>" ;
//high goal zone 8
	
  $result = mysqli_query($con, "SELECT SUM(trussg) FROM `scouting-n` WHERE team='$team' and zone='8'");
 while($row = mysqli_fetch_assoc($result)) {
$trussg8 = $row['SUM(trussg)'];
}

//echo "<h1> $trussg1 </h1>" ;
//high goal zone 4
	
  $result = mysqli_query($con, "SELECT SUM(trussg) FROM `scouting-n` WHERE team='$team' and zone='9'");
 while($row = mysqli_fetch_assoc($result)) {
$trussg9 = $row['SUM(trussg)'];
}

//echo "<h1> $trussg1 </h1>" ;
//high goal zone 10
	
  $result = mysqli_query($con, "SELECT SUM(trussg) FROM `scouting-n` WHERE team='$team' and zone='10'");
 while($row = mysqli_fetch_assoc($result)) {
$trussg10 = $row['SUM(trussg)'];
}

//echo "<h1> $trussg1 </h1>" ;
//high goal zone 11
	
  $result = mysqli_query($con, "SELECT SUM(trussg) FROM `scouting-n` WHERE team='$team' and zone='11'");
 while($row = mysqli_fetch_assoc($result)) {
$trussg11 = $row['SUM(trussg)'];
}

//echo "<h1> $trussg1 </h1>" ;
//high goal zone 12
	
  $result = mysqli_query($con, "SELECT SUM(trussg) FROM `scouting-n` WHERE team='$team' and zone='12'");
 while($row = mysqli_fetch_assoc($result)) {
$trussg12 = $row['SUM(trussg)'];
}

//echo "<h1> $trussg1 </h1>" ;
//high goal zone 13
	
  $result = mysqli_query($con, "SELECT SUM(trussg) FROM `scouting-n` WHERE team='$team' and zone='13'");
 while($row = mysqli_fetch_assoc($result)) {
$trussg13 = $row['SUM(trussg)'];
}

//echo "<h1> $trussg1 </h1>" ;
//high goal zone 14
	
  $result = mysqli_query($con, "SELECT SUM(trussg) FROM `scouting-n` WHERE team='$team' and zone='14'");
 while($row = mysqli_fetch_assoc($result)) {
$trussg14 = $row['SUM(trussg)'];
}

//echo "<h1> $trussg1 </h1>" ;
//high goal zone 15
	
  $result = mysqli_query($con, "SELECT SUM(trussg) FROM `scouting-n` WHERE team='$team' and zone='15'");
 while($row = mysqli_fetch_assoc($result)) {
$trussg15 = $row['SUM(trussg)'];
}

//echo "<h1> $trussg1 </h1>" ;




//dhit goal zone 1
		
 $result = mysqli_query($con, "SELECT SUM(dhit) FROM `scouting-n` WHERE team='$team' and zone='1'");
 while($row = mysqli_fetch_assoc($result)) {
$dhit1 = $row['SUM(dhit)'];
}

//echo "<h1> $dhit1 </h1>" ;

//dhit goal zone 2
	
  $result = mysqli_query($con, "SELECT SUM(dhit) FROM `scouting-n` WHERE team='$team' and zone='2'");
 while($row = mysqli_fetch_assoc($result)) {
$dhit2 = $row['SUM(dhit)'];
}

//echo "<h1> $dhit1 </h1>" ;

//dhit goal zone 3
	
  $result = mysqli_query($con, "SELECT SUM(dhit) FROM `scouting-n` WHERE team='$team' and zone='3'");
 while($row = mysqli_fetch_assoc($result)) {
$dhit3 = $row['SUM(dhit)'];
}

//echo "<h1> $dhit1 </h1>" ;

//dhit goal zone 4
	
  $result = mysqli_query($con, "SELECT SUM(dhit) FROM `scouting-n` WHERE team='$team' and zone='4'");
 while($row = mysqli_fetch_assoc($result)) {
$dhit4 = $row['SUM(dhit)'];
}

//echo "<h1> $dhit1 </h1>" ;

//dhit goal zone 5
	
  $result = mysqli_query($con, "SELECT SUM(dhit) FROM `scouting-n` WHERE team='$team' and zone='5'");
 while($row = mysqli_fetch_assoc($result)) {
$dhit5 = $row['SUM(dhit)'];
}

//echo "<h1> $dhit1 </h1>" ;

//dhit goal zone 6
	
  $result = mysqli_query($con, "SELECT SUM(dhit) FROM `scouting-n` WHERE team='$team' and zone='6'");
 while($row = mysqli_fetch_assoc($result)) {
$dhit6 = $row['SUM(dhit)'];
}

//echo "<h1> $dhit1 </h1>" ;
//dhit goal zone 7
	
  $result = mysqli_query($con, "SELECT SUM(dhit) FROM `scouting-n` WHERE team='$team' and zone='7'");
 while($row = mysqli_fetch_assoc($result)) {
$dhit7 = $row['SUM(dhit)'];
}

//echo "<h1> $dhit1 </h1>" ;
//dhit goal zone 8
	
  $result = mysqli_query($con, "SELECT SUM(dhit) FROM `scouting-n` WHERE team='$team' and zone='8'");
 while($row = mysqli_fetch_assoc($result)) {
$dhit8 = $row['SUM(dhit)'];
}

//echo "<h1> $dhit1 </h1>" ;
//dhit goal zone 4
	
  $result = mysqli_query($con, "SELECT SUM(dhit) FROM `scouting-n` WHERE team='$team' and zone='9'");
 while($row = mysqli_fetch_assoc($result)) {
$dhit9 = $row['SUM(dhit)'];
}

//echo "<h1> $dhit1 </h1>" ;
//dhit goal zone 10
	
  $result = mysqli_query($con, "SELECT SUM(dhit) FROM `scouting-n` WHERE team='$team' and zone='10'");
 while($row = mysqli_fetch_assoc($result)) {
$dhit10 = $row['SUM(dhit)'];
}

//echo "<h1> $dhit1 </h1>" ;
//dhit goal zone 11
	
  $result = mysqli_query($con, "SELECT SUM(dhit) FROM `scouting-n` WHERE team='$team' and zone='11'");
 while($row = mysqli_fetch_assoc($result)) {
$dhit11 = $row['SUM(dhit)'];
}

//echo "<h1> $dhit1 </h1>" ;
//dhit goal zone 12
	
  $result = mysqli_query($con, "SELECT SUM(dhit) FROM `scouting-n` WHERE team='$team' and zone='12'");
 while($row = mysqli_fetch_assoc($result)) {
$dhit12 = $row['SUM(dhit)'];
}

//echo "<h1> $dhit1 </h1>" ;
//dhit goal zone 13
	
  $result = mysqli_query($con, "SELECT SUM(dhit) FROM `scouting-n` WHERE team='$team' and zone='13'");
 while($row = mysqli_fetch_assoc($result)) {
$dhit13 = $row['SUM(dhit)'];
}

//echo "<h1> $dhit1 </h1>" ;
//dhit goal zone 14
	
  $result = mysqli_query($con, "SELECT SUM(dhit) FROM `scouting-n` WHERE team='$team' and zone='14'");
 while($row = mysqli_fetch_assoc($result)) {
$dhit14 = $row['SUM(dhit)'];
}

//echo "<h1> $dhit1 </h1>" ;
//dhit goal zone 15
	
  $result = mysqli_query($con, "SELECT SUM(dhit) FROM `scouting-n` WHERE team='$team' and zone='15'");
 while($row = mysqli_fetch_assoc($result)) {
$dhit15 = $row['SUM(dhit)'];
}

//echo "<h1> $dhit1 </h1>" ;



//assist goal zone 1
		
 $result = mysqli_query($con, "SELECT SUM(assist) FROM `scouting-n` WHERE team='$team' and zone='1'");
 while($row = mysqli_fetch_assoc($result)) {
$assist1 = $row['SUM(assist)'];
}

//echo "<h1> $assist1 </h1>" ;

//assist goal zone 2
	
  $result = mysqli_query($con, "SELECT SUM(assist) FROM `scouting-n` WHERE team='$team' and zone='2'");
 while($row = mysqli_fetch_assoc($result)) {
$assist2 = $row['SUM(assist)'];
}

//echo "<h1> $assist1 </h1>" ;

//assist goal zone 3
	
  $result = mysqli_query($con, "SELECT SUM(assist) FROM `scouting-n` WHERE team='$team' and zone='3'");
 while($row = mysqli_fetch_assoc($result)) {
$assist3 = $row['SUM(assist)'];
}

//echo "<h1> $assist1 </h1>" ;

//assist goal zone 4
	
  $result = mysqli_query($con, "SELECT SUM(assist) FROM `scouting-n` WHERE team='$team' and zone='4'");
 while($row = mysqli_fetch_assoc($result)) {
$assist4 = $row['SUM(assist)'];
}

//echo "<h1> $assist1 </h1>" ;

//assist goal zone 5
	
  $result = mysqli_query($con, "SELECT SUM(assist) FROM `scouting-n` WHERE team='$team' and zone='5'");
 while($row = mysqli_fetch_assoc($result)) {
$assist5 = $row['SUM(assist)'];
}

//echo "<h1> $assist1 </h1>" ;

//assist goal zone 6
	
  $result = mysqli_query($con, "SELECT SUM(assist) FROM `scouting-n` WHERE team='$team' and zone='6'");
 while($row = mysqli_fetch_assoc($result)) {
$assist6 = $row['SUM(assist)'];
}

//echo "<h1> $assist1 </h1>" ;
//assist goal zone 7
	
  $result = mysqli_query($con, "SELECT SUM(assist) FROM `scouting-n` WHERE team='$team' and zone='7'");
 while($row = mysqli_fetch_assoc($result)) {
$assist7 = $row['SUM(assist)'];
}

//echo "<h1> $assist1 </h1>" ;
//assist goal zone 8
	
  $result = mysqli_query($con, "SELECT SUM(assist) FROM `scouting-n` WHERE team='$team' and zone='8'");
 while($row = mysqli_fetch_assoc($result)) {
$assist8 = $row['SUM(assist)'];
}

//echo "<h1> $assist1 </h1>" ;
//assist goal zone 4
	
  $result = mysqli_query($con, "SELECT SUM(assist) FROM `scouting-n` WHERE team='$team' and zone='9'");
 while($row = mysqli_fetch_assoc($result)) {
$assist9 = $row['SUM(assist)'];
}

//echo "<h1> $assist1 </h1>" ;
//assist goal zone 10
	
  $result = mysqli_query($con, "SELECT SUM(assist) FROM `scouting-n` WHERE team='$team' and zone='10'");
 while($row = mysqli_fetch_assoc($result)) {
$assist10 = $row['SUM(assist)'];
}

//echo "<h1> $assist1 </h1>" ;
//assist goal zone 11
	
  $result = mysqli_query($con, "SELECT SUM(assist) FROM `scouting-n` WHERE team='$team' and zone='11'");
 while($row = mysqli_fetch_assoc($result)) {
$assist11 = $row['SUM(assist)'];
}

//echo "<h1> $assist1 </h1>" ;
//assist goal zone 12
	
  $result = mysqli_query($con, "SELECT SUM(assist) FROM `scouting-n` WHERE team='$team' and zone='12'");
 while($row = mysqli_fetch_assoc($result)) {
$assist12 = $row['SUM(assist)'];
}

//echo "<h1> $assist1 </h1>" ;
//assist goal zone 13
	
  $result = mysqli_query($con, "SELECT SUM(assist) FROM `scouting-n` WHERE team='$team' and zone='13'");
 while($row = mysqli_fetch_assoc($result)) {
$assist13 = $row['SUM(assist)'];
}

//echo "<h1> $assist1 </h1>" ;
//assist goal zone 14
	
  $result = mysqli_query($con, "SELECT SUM(assist) FROM `scouting-n` WHERE team='$team' and zone='14'");
 while($row = mysqli_fetch_assoc($result)) {
$assist14 = $row['SUM(assist)'];
}

//echo "<h1> $assist1 </h1>" ;
//assist goal zone 15
	
  $result = mysqli_query($con, "SELECT SUM(assist) FROM `scouting-n` WHERE team='$team' and zone='15'");
 while($row = mysqli_fetch_assoc($result)) {
$assist15 = $row['SUM(assist)'];
}

//echo "<h1> $assist1 </h1>" ;


echo "
<table>
<tr>



<td width=\"50%\">
<center>
<h2> High Goal Zone Stats </h2>
<table style=\"width:467px; height:215px\" class=\" table table-condensed table-striped \" style=\"width:80%\">
<tr class=\"active\">
<td width=\"16.66%\"><center><h2> $highg1 </h2></center></td>
<td width=\"16.66%\"><center><h2> $highg2 </h2></center></td>
<td width=\"33.33%\"><center><h2> $highg3 </h2></center></td>
<td width=\"16.66%\"><center><h2> $highg4 </h2></center></td>
<td width=\"16.66%\"><center><h2> $highg5 </h2></center></td>
</tr>
<tr class=\"active\">
<td width=\"16.66%\"><center><h2> $highg6 </h2></center></td>
<td width=\"16.66%\"><center><h2> $highg7 </h2></center></td>
<td width=\"33.33%\"><center><h2> $highg8 </h2></center></td>
<td width=\"16.66%\"><center><h2> $highg9 </h2></center></td>
<td width=\"16.66%\"><center><h2> $highg10 </h2></center></td>
</tr>
<tr class=\"active\">
<td width=\"16.66%\"><center><h2> $highg11 </h2></center></td>
<td width=\"16.66%\"><center><h2> $highg12 </h2></center></td>
<td width=\"33.33%\"><center><h2> $highg13 </h2></center></td>
<td width=\"16.66%\"><center><h2> $highg14 </h2></center></td>
<td width=\"16.66%\"><center><h2> $highg15 </h2></center></td>
</tr>
</table>
</center>
</td>

<td width=\"5%\"></td>

<td width=\"50%\">
<center>
<h2> Truss Zone Stats </h2>
<table style=\"width:467px; height:215px\" class=\" table table-condensed table-striped \" style=\"width:80%\">
<tr class=\"active\">
<td width=\"16.66%\"><center><h2> $trussg1 </h2></center></td>
<td width=\"16.66%\"><center><h2> $trussg2 </h2></center></td>
<td width=\"33.33%\"><center><h2> $trussg3 </h2></center></td>
<td width=\"16.66%\"><center><h2> $trussg4 </h2></center></td>
<td width=\"16.66%\"><center><h2> $trussg5 </h2></center></td>
</tr>
<tr class=\"active\">
<td width=\"16.66%\"><center><h2> $trussg6 </h2></center></td>
<td width=\"16.66%\"><center><h2> $trussg7 </h2></center></td>
<td width=\"33.33%\"><center><h2> $trussg8 </h2></center></td>
<td width=\"16.66%\"><center><h2> $trussg9 </h2></center></td>
<td width=\"16.66%\"><center><h2> $trussg10 </h2></center></td>
</tr>
<tr class=\"active\">
<td width=\"16.66%\"><center><h2> $trussg11 </h2></center></td>
<td width=\"16.66%\"><center><h2> $trussg12 </h2></center></td>
<td width=\"33.33%\"><center><h2> $trussg13 </h2></center></td>
<td width=\"16.66%\"><center><h2> $trussg14 </h2></center></td>
<td width=\"16.66%\"><center><h2> $trussg15 </h2></center></td>
</tr>
</table>
</center>

</td>
<tr>
<td>
<center>
<h2> Defensive Hit Zone Stats </h2>
<table style=\"width:467px; height:215px\" class=\" table table-condensed table-striped \" style=\"width:80%\">
<tr class=\"active\">
<td width=\"16.66%\"><center><h2> $dhit1 </h2></center></td>
<td width=\"16.66%\"><center><h2> $dhit2 </h2></center></td>
<td width=\"33.33%\"><center><h2> $dhit3 </h2></center></td>
<td width=\"16.66%\"><center><h2> $dhit4 </h2></center></td>
<td width=\"16.66%\"><center><h2> $dhit5 </h2></center></td>
</tr>
<tr class=\"active\">
<td width=\"16.66%\"><center><h2> $dhit6 </h2></center></td>
<td width=\"16.66%\"><center><h2> $dhit7 </h2></center></td>
<td width=\"33.33%\"><center><h2> $dhit8 </h2></center></td>
<td width=\"16.66%\"><center><h2> $dhit9 </h2></center></td>
<td width=\"16.66%\"><center><h2> $dhit10 </h2></center></td>
</tr>
<tr class=\"active\">
<td width=\"16.66%\"><center><h2> $dhit11 </h2></center></td>
<td width=\"16.66%\"><center><h2> $dhit12 </h2></center></td>
<td width=\"33.33%\"><center><h2> $dhit13 </h2></center></td>
<td width=\"16.66%\"><center><h2> $dhit14 </h2></center></td>
<td width=\"16.66%\"><center><h2> $dhit15 </h2></center></td>
</tr>
</table>
</center>
</td>

<td></td>

<td>
<center>
<h2> Assist Zone Stats </h2>
<table style=\"width:467px; height:215px\" class=\" table table-condensed table-striped \" style=\"width:80%\">
<tr class=\"active\">
<td width=\"16.66%\"><center><h2> $assist1 </h2></center></td>
<td width=\"16.66%\"><center><h2> $assist2 </h2></center></td>
<td width=\"33.33%\"><center><h2> $assist3 </h2></center></td>
<td width=\"16.66%\"><center><h2> $assist4 </h2></center></td>
<td width=\"16.66%\"><center><h2> $assist5 </h2></center></td>
</tr>
<tr class=\"active\">
<td width=\"16.66%\"><center><h2> $assist6 </h2></center></td>
<td width=\"16.66%\"><center><h2> $assist7 </h2></center></td>
<td width=\"33.33%\"><center><h2> $assist8 </h2></center></td>
<td width=\"16.66%\"><center><h2> $assist9 </h2></center></td>
<td width=\"16.66%\"><center><h2> $assist10 </h2></center></td>
</tr>
<tr class=\"active\">
<td width=\"16.66%\"><center><h2> $assist11 </h2></center></td>
<td width=\"16.66%\"><center><h2> $assist12 </h2></center></td>
<td width=\"33.33%\"><center><h2> $assist13 </h2></center></td>
<td width=\"16.66%\"><center><h2> $assist14 </h2></center></td>
<td width=\"16.66%\"><center><h2> $assist15 </h2></center></td>
</tr>
</table>
</center>
</td>
</tr>

</table>
";




//highgt goal zone 1
		
 $result = mysqli_query($con, "SELECT SUM(highgt) FROM `scouting-n` WHERE team='$team' and zone='1'");
 while($row = mysqli_fetch_assoc($result)) {
$highgt1 = $row['SUM(highgt)'];
}

//echo "<h1> $highgt1 </h1>" ;

//highgt goal zone 2
	
  $result = mysqli_query($con, "SELECT SUM(highgt) FROM `scouting-n` WHERE team='$team' and zone='2'");
 while($row = mysqli_fetch_assoc($result)) {
$highgt2 = $row['SUM(highgt)'];
}

//echo "<h1> $highgt1 </h1>" ;

//highgt goal zone 3
	
  $result = mysqli_query($con, "SELECT SUM(highgt) FROM `scouting-n` WHERE team='$team' and zone='3'");
 while($row = mysqli_fetch_assoc($result)) {
$highgt3 = $row['SUM(highgt)'];
}

//echo "<h1> $highgt1 </h1>" ;

//highgt goal zone 4
	
  $result = mysqli_query($con, "SELECT SUM(highgt) FROM `scouting-n` WHERE team='$team' and zone='4'");
 while($row = mysqli_fetch_assoc($result)) {
$highgt4 = $row['SUM(highgt)'];
}

//echo "<h1> $highgt1 </h1>" ;

//highgt goal zone 5
	
  $result = mysqli_query($con, "SELECT SUM(highgt) FROM `scouting-n` WHERE team='$team' and zone='5'");
 while($row = mysqli_fetch_assoc($result)) {
$highgt5 = $row['SUM(highgt)'];
}

//echo "<h1> $highgt1 </h1>" ;

//highgt goal zone 6
	
  $result = mysqli_query($con, "SELECT SUM(highgt) FROM `scouting-n` WHERE team='$team' and zone='6'");
 while($row = mysqli_fetch_assoc($result)) {
$highgt6 = $row['SUM(highgt)'];
}

//echo "<h1> $highgt1 </h1>" ;
//highgt goal zone 7
	
  $result = mysqli_query($con, "SELECT SUM(highgt) FROM `scouting-n` WHERE team='$team' and zone='7'");
 while($row = mysqli_fetch_assoc($result)) {
$highgt7 = $row['SUM(highgt)'];
}

//echo "<h1> $highgt1 </h1>" ;
//highgt goal zone 8
	
  $result = mysqli_query($con, "SELECT SUM(highgt) FROM `scouting-n` WHERE team='$team' and zone='8'");
 while($row = mysqli_fetch_assoc($result)) {
$highgt8 = $row['SUM(highgt)'];
}

//echo "<h1> $highgt1 </h1>" ;
//highgt goal zone 4
	
  $result = mysqli_query($con, "SELECT SUM(highgt) FROM `scouting-n` WHERE team='$team' and zone='9'");
 while($row = mysqli_fetch_assoc($result)) {
$highgt9 = $row['SUM(highgt)'];
}

//echo "<h1> $highgt1 </h1>" ;
//highgt goal zone 10
	
  $result = mysqli_query($con, "SELECT SUM(highgt) FROM `scouting-n` WHERE team='$team' and zone='10'");
 while($row = mysqli_fetch_assoc($result)) {
$highgt10 = $row['SUM(highgt)'];
}

//echo "<h1> $highgt1 </h1>" ;
//highgt goal zone 11
	
  $result = mysqli_query($con, "SELECT SUM(highgt) FROM `scouting-n` WHERE team='$team' and zone='11'");
 while($row = mysqli_fetch_assoc($result)) {
$highgt11 = $row['SUM(highgt)'];
}

//echo "<h1> $highgt1 </h1>" ;
//highgt goal zone 12
	
  $result = mysqli_query($con, "SELECT SUM(highgt) FROM `scouting-n` WHERE team='$team' and zone='12'");
 while($row = mysqli_fetch_assoc($result)) {
$highgt12 = $row['SUM(highgt)'];
}

//echo "<h1> $highgt1 </h1>" ;
//highgt goal zone 13
	
  $result = mysqli_query($con, "SELECT SUM(highgt) FROM `scouting-n` WHERE team='$team' and zone='13'");
 while($row = mysqli_fetch_assoc($result)) {
$highgt13 = $row['SUM(highgt)'];
}

//echo "<h1> $highgt1 </h1>" ;
//highgt goal zone 14
	
  $result = mysqli_query($con, "SELECT SUM(highgt) FROM `scouting-n` WHERE team='$team' and zone='14'");
 while($row = mysqli_fetch_assoc($result)) {
$highgt14 = $row['SUM(highgt)'];
}

//echo "<h1> $highgt1 </h1>" ;
//highgt goal zone 15
	
  $result = mysqli_query($con, "SELECT SUM(highgt) FROM `scouting-n` WHERE team='$team' and zone='15'");
 while($row = mysqli_fetch_assoc($result)) {
$highgt15 = $row['SUM(highgt)'];
}

//echo "<h1> $highgt1 </h1>" ;

//trusst goal zone 1
		
 $result = mysqli_query($con, "SELECT SUM(trusst) FROM `scouting-n` WHERE team='$team' and zone='1'");
 while($row = mysqli_fetch_assoc($result)) {
$trusst1 = $row['SUM(trusst)'];
}

//echo "<h1> $trusst1 </h1>" ;

//trusst goal zone 2
	
  $result = mysqli_query($con, "SELECT SUM(trusst) FROM `scouting-n` WHERE team='$team' and zone='2'");
 while($row = mysqli_fetch_assoc($result)) {
$trusst2 = $row['SUM(trusst)'];
}

//echo "<h1> $trusst1 </h1>" ;

//trusst goal zone 3
	
  $result = mysqli_query($con, "SELECT SUM(trusst) FROM `scouting-n` WHERE team='$team' and zone='3'");
 while($row = mysqli_fetch_assoc($result)) {
$trusst3 = $row['SUM(trusst)'];
}

//echo "<h1> $trusst1 </h1>" ;

//trusst goal zone 4
	
  $result = mysqli_query($con, "SELECT SUM(trusst) FROM `scouting-n` WHERE team='$team' and zone='4'");
 while($row = mysqli_fetch_assoc($result)) {
$trusst4 = $row['SUM(trusst)'];
}

//echo "<h1> $trusst1 </h1>" ;

//trusst goal zone 5
	
  $result = mysqli_query($con, "SELECT SUM(trusst) FROM `scouting-n` WHERE team='$team' and zone='5'");
 while($row = mysqli_fetch_assoc($result)) {
$trusst5 = $row['SUM(trusst)'];
}

//echo "<h1> $trusst1 </h1>" ;

//trusst goal zone 6
	
  $result = mysqli_query($con, "SELECT SUM(trusst) FROM `scouting-n` WHERE team='$team' and zone='6'");
 while($row = mysqli_fetch_assoc($result)) {
$trusst6 = $row['SUM(trusst)'];
}

//echo "<h1> $trusst1 </h1>" ;
//trusst goal zone 7
	
  $result = mysqli_query($con, "SELECT SUM(trusst) FROM `scouting-n` WHERE team='$team' and zone='7'");
 while($row = mysqli_fetch_assoc($result)) {
$trusst7 = $row['SUM(trusst)'];
}

//echo "<h1> $trusst1 </h1>" ;
//trusst goal zone 8
	
  $result = mysqli_query($con, "SELECT SUM(trusst) FROM `scouting-n` WHERE team='$team' and zone='8'");
 while($row = mysqli_fetch_assoc($result)) {
$trusst8 = $row['SUM(trusst)'];
}

//echo "<h1> $trusst1 </h1>" ;
//trusst goal zone 4
	
  $result = mysqli_query($con, "SELECT SUM(trusst) FROM `scouting-n` WHERE team='$team' and zone='9'");
 while($row = mysqli_fetch_assoc($result)) {
$trusst9 = $row['SUM(trusst)'];
}

//echo "<h1> $trusst1 </h1>" ;
//trusst goal zone 10
	
  $result = mysqli_query($con, "SELECT SUM(trusst) FROM `scouting-n` WHERE team='$team' and zone='10'");
 while($row = mysqli_fetch_assoc($result)) {
$trusst10 = $row['SUM(trusst)'];
}

//echo "<h1> $trusst1 </h1>" ;
//trusst goal zone 11
	
  $result = mysqli_query($con, "SELECT SUM(trusst) FROM `scouting-n` WHERE team='$team' and zone='11'");
 while($row = mysqli_fetch_assoc($result)) {
$trusst11 = $row['SUM(trusst)'];
}

//echo "<h1> $trusst1 </h1>" ;
//trusst goal zone 12
	
  $result = mysqli_query($con, "SELECT SUM(trusst) FROM `scouting-n` WHERE team='$team' and zone='12'");
 while($row = mysqli_fetch_assoc($result)) {
$trusst12 = $row['SUM(trusst)'];
}

//echo "<h1> $trusst1 </h1>" ;
//trusst goal zone 13
	
  $result = mysqli_query($con, "SELECT SUM(trusst) FROM `scouting-n` WHERE team='$team' and zone='13'");
 while($row = mysqli_fetch_assoc($result)) {
$trusst13 = $row['SUM(trusst)'];
}

//echo "<h1> $trusst1 </h1>" ;
//trusst goal zone 14
	
  $result = mysqli_query($con, "SELECT SUM(trusst) FROM `scouting-n` WHERE team='$team' and zone='14'");
 while($row = mysqli_fetch_assoc($result)) {
$trusst14 = $row['SUM(trusst)'];
}

//echo "<h1> $trusst1 </h1>" ;
//trusst goal zone 15
	
  $result = mysqli_query($con, "SELECT SUM(trusst) FROM `scouting-n` WHERE team='$team' and zone='15'");
 while($row = mysqli_fetch_assoc($result)) {
$trusst15 = $row['SUM(trusst)'];
}

//echo "<h1> $trusst1 </h1>" ;



$highghits = $highg1 + $highg2 + $highg3 + $highg4 + $highg5 + $highg6 + $highg7 + $highg8 + $highg9 + $highg10 + $highg11 + $highg12 + $highg13 + $highg14 + $highg15;
$highgtotal = $highgt1 + $highgt2 + $highgt3 + $highgt4 + $highgt5 + $highgt6 + $highgt7 + $highgt8 + $highgt9 + $highgt10 + $highgt11 + $highgt12 + $highgt13 + $highgt14 + $highgt15;
$trusshits = $trussg1 + $trussg2 + $trussg3 + $trussg4 + $trussg5 + $trussg6 + $trussg7 + $trussg8 + $trussg9 + $trussg10 + $trussg11 + $trussg12 + $trussg13 + $trussg14 + $trussg15;
$trusstotal = $trusshits + $trusst1 + $trusst2 + $trusst3 + $trusst4 + $trusst5 + $trusst6 + $trusst7 + $trusst8 + $trusst9 + $trusst10 + $trusst11 + $trusst12 + $trusst13 + $trusst14 + $trusst15;



echo "<center>
<table class=\" table table-condensed table-striped \" style=\"width:80%\" >
<tr>
<td width=\"25%\"> High Goal Hits </td>
<td width=\"25%\"> High Goal Tries </td>
<td width=\"25%\"> Trusses </td>
<td width=\"25%\"> Truss Tries </td>
</tr><tr></tr>
<tr>
<td width=\"25%\"> $highghits </td>
<td width=\"25%\"> $highgtotal </td>
<td width=\"25%\"> $trusshits </td>
<td width=\"25%\"> $trusstotal </td>
</tr>



</table>
</center>
";












?>


















































































</body></html>



