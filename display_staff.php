<?php
//$hostname = "imc.kean.edu";
//$username ="patdharn";
//$password = "1109736";
//$dbname = "dreamhome";
//include "dbconfig.php";


//create connection
$con=mysqli_connect($hostname,$username, $password,$dbname2);

$query = "SELECT * from dreamhome.Staff" ;
$result = mysqli_query($con,$query);
echo "<table>";

while($row =mysqli_fetch_array($result)){
    echo "<tr><td>" . $row['staffNo'] . "</td><td>" .$row['fName'] .  "</td><td>" .$row['lName'] .  "</td><td>" .$row['position'] . "</td><td>" .$row['sex'] .  "</td><td>" .$row['DOB'] .  "</td><td>" .$row['salary'] .  "</td><td>" .$row['branchNo'] . "</td></tr>";
    }
echo"</table>";
mysqli_free_result($result);
mysqli_close($con);
?>