<?php

$employeeloginid=$_POST["employee_id"];
$login_password=$_POST["password"];

include "dbconfig.php";

if (empty($employeeloginid) && empty($login_password)){
    echo "Login or password cannot be empty";
}
else{




//create connection
    $con=mysqli_connect($hostname, $username, $password, $dbname1);
  

    $query = "SELECT * from EMPLOYEE WHERE login = '$employeeloginid' and password = '$login_password' ";
   // $query = "SELECT * from TECH3740.EMPLOYEE WHERE login  LIKE '%$employeeloginid%' and password LIKE '%$login_password%'";
    $result = mysqli_query($con, $query)  or die(mysqli_error($con));
    $row=mysqli_fetch_array($result);
    if ( ($row['password']!= $login_password) ) {
        echo "Login '$employeeloginid' in the system, but password not matched";
        exit;
    } 
    elseif($row['login']!= $employeeloginid) {
        echo "Login '$employeeloginid' is not in the system";
        exit;
    } 
 
    
  
    else {
        setcookie('login',$employeeloginid,time()+ (86400 * 15));
        setcookie('employee_name',$row['name'],time()+ (86400 * 15));
       

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip= $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip=$_SERVER['REMOTE_ADDR'];
        }
        $IPv4=explode(".", $ip); #split token
        echo"<br>Your IP:$ip\n";
        if ($IPv4[0] . "." .$IPv4[1]=="131.125") {
            echo "<br> You are  from Kean Domain.\n";
        } else {
            echo "<br>You are not from Kean University.\n";
        }
 
        echo'<br>';
        echo '<a href="logout.php">logout</a>';

        echo "<br>Welcome User :" . $row['name'] ;
        echo "<br>Role: " . $row['role'];
        echo "<br>Address: " . $row['Address'];
        echo "<br>Gender: " . $row['gender'];
        echo "<br>Salary: " . $row['salary'];
        echo "<br>";
        echo "<br>";
    
        echo"<a href='add_product.php'>Add Products</a>";
        echo "<br>";
        
        echo "Search product (name ,description)";
        echo '<form  action="display_search_products.php" method="post">
   <input type="text" name="product_name"> <input type="submit" value="Submit">
   </form>';
    }




    mysqli_free_result($result);
    mysqli_close($con);
}

?>