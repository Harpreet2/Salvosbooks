<?php
mysqli_report(MYSQLI_REPORT_STRICT);
try{
	$con = @new mysqli("localhost", "root", "", "SALVOS");
}catch(Exception $e){
	echo "<p>Sorry, there is a problem at our end.";
	echo "<br>We are onto the problem.";
	echo " Please come back and try again later<p>";
	exit(3);
}
?>