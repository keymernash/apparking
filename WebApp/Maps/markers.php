<?php 
header('Content-Type: text/xml'); 
echo '<markers>';
include ("conexion.php");
$sql=$con->query("SELECT * FROM reg ORDER BY Id");
while($row=$sql->fetch_array())
{
	echo "<marker id ='".$row['Id']."' lat='".$row['Lat']."' lng='".$row['Lng']."'>\n";
	echo "</marker>\n";
}
$con->close();
echo "</markers>\n";
?>