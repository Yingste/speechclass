<?php

$team = "";
$colname = "";
	 $newcolumn = "";
	 $colname = "1";
	 
	 $max = "";
	 $min = "";
	 $max = "10";
	 $min = "0";
$final = "";
$team1 = "";
$count = "1";
$display = "";

$column = "";
$columnname = "";
$con = "";

// Create connection
$con = mysqli_connect("localhost","testuser","testuser","testuser");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to mysqli: " . mysqli_connect_error();
  }
	
	if (!mysqli_connect_errno())
  {
  echo "Connection successful or something" . mysqli_connect_error();
  }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	 
	 

	 
	 
	 
	 
	$teams = array();

$sql = "SELECT DISTINCT team FROM scouting";
	
$result = mysqli_query($con, "SELECT DISTINCT team FROM scouting");
 echo "working";

while($row = mysqli_fetch_assoc($result)) {
   
		
	
		$team1 = $row['team'] ;
		//echo "$team1 <br />";
		
		

array_push($teams, "$team1");
}
		print_r($teams);
		
		foreach ($teams as $value){
		
		if (strlen($value) == 3){
		$value = "0$value";
		}
		
		if (strlen($value) == 2){
		$value = "00$value";
		}
		
		if (strlen($value) == 1){
		$value = "000$value";
		}
		
		//sort the data for the team when ready
	$sql2 = "SELECT data FROM _$value ORDER BY data";
	mysqli_query($con, $sql2);
		
		
	 //find the data per each team
	  $sql = "SELECT data FROM _$value";
		
		$result = mysqli_query($con, $sql) ;
	 
	 
	 while($row = mysqli_fetch_assoc($result)) {
    
		$column .= $row['data'] . "," ;
		//echo "working?";
		
}										
	 //echo "$column";
	 $final = "$value,$column";
echo "final";
echo "<br />";
echo "$final";
$final2 = "";
$final2 =  "\n";
		$column = "";

	 file_put_contents('finaldata.csv',$final, FILE_APPEND);
file_put_contents('finaldata.csv',$final2, FILE_APPEND);

	
	}
	





		
		
		

		
		
		
		
		
		
		
		
		
		
		
		//header('Location: ' . $_SERVER['HTTP_REFERER']);
		exit;