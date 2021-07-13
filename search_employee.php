<?php
include("dbconfig.php");
  $search_value=$_POST["searchvalue"];

if ($search_value == null) {
    echo "The search field is empty";
} else{




    $con=mysqli_connect($hostname, $username, $password, $dbname1);
    if ($con->connect_error) {
        echo "Failed to connect: " . $con->connect_error;
    } else {
  
    
        if ($search_value == "*") {
        
            $query= "SELECT  * FROM TECH3740.EMPLOYEE";
        } else {
            $query= "SELECT  * FROM TECH3740.EMPLOYEE WHERE EMPLOYEE.Address LIKE '%$search_value%'";
             
        
        }
     
       
       
        $result = mysqli_query($con, $query);

        $count = mysqli_num_rows($result);
        if($count == 0){
            echo "No records in the database for the keyword:  $search_value ";
          }
          else{
            echo "There are <b>$count</b> employee are in the database that the
            address contains the search keyword <b>$search_value</b>";
            echo "<table border='1'>";
            echo"<tr> <th>ID</th><th>Login</th><th>Password</th><th>Employee Name</th><th>Role</th><th>Salary</th><th>Gender</th><th>Address</th></tr>";
            $total_salary=0;
            while ($row =mysqli_fetch_array($result)) {
                echo "<tr><td>" . $row['employee_id'] . "</td><td>" .$row['login'] .  "</td><td>" .$row['password'] .
          "</td><td>" .$row['name'] . "</td><td>" .$row['role'] .  "</td><td>" .$row['salary'] .  "</td><td>" .$row['gender'] .  "</td><td>" .$row['Address'] . "</td></tr>";
          $total_salary=  $total_salary + $row['salary'];    
        }
            echo"</table>";
            echo "<br>";
            $average_salary=$total_salary/$count;
            echo "Average salary is  $average_salary";
            
          }
      
      
        mysqli_free_result($result);
        mysqli_close($con);
    }
    //}
}

?>