<?php
session_start();
if(!(isset($_COOKIE['login']) )){
    echo "Please login first!";
}
else{
    include ("dbconfig.php");
        $keyword=$_POST['product_name'];

   //create connection
   $con=mysqli_connect($hostname, $username, $password, $dbname);
   if ($con->connect_error) {
       echo "Failed to connect: " . $con->connect_error;
   } else {
 
       if ($keyword== "*") {
         

       $query= "SELECT Products_patdharn.p_id,Products_patdharn.name,Products_patdharn.description,Products_patdharn.type,Products_patdharn.sell_price,Products_patdharn.cost
      ,Products_patdharn.quantity,EMPLOYEE.Name,VENDOR.NAME FROM TECH3740_2021S1.Products_patdharn
       JOIN TECH3740.EMPLOYEE  ON Products_patdharn.e_id=EMPLOYEE.employee_id 
       JOIN TECH3740.VENDOR ON Products_patdharn.v_id=VENDOR.vendor_id";
           
       } else {

        $query= "SELECT Products_patdharn.p_id,Products_patdharn.name,Products_patdharn.description,Products_patdharn.type,Products_patdharn.sell_price,Products_patdharn.cost
         ,Products_patdharn.quantity,EMPLOYEE.Name,VENDOR.NAME FROM TECH3740_2021S1.Products_patdharn
         JOIN TECH3740.EMPLOYEE  ON Products_patdharn.e_id=EMPLOYEE.employee_id 
        JOIN TECH3740.VENDOR ON Products_patdharn.v_id=VENDOR.vendor_id  WHERE Products_patdharn.name LIKE '%$keyword%' OR Products_patdharn.description LIKE '%$keyword%'" ;
          // $query= "SELECT  * FROM TECH3740_2021S1.Products_patdharn WHERE Products_patdharn.name LIKE '%$keyword%' OR Products_patdharn.description LIKE '%$keyword%' ";
         
       }
    
    
      
       $result = mysqli_query($con, $query)  or die( mysqli_error($con));
     
       echo "<table border='1'>";
       echo "<tr><th>ID</th><th>Name</th><th>Description</th><th>Type</th><th>Cost</th><th>Sell price</th><th>Quantity</th><th>Vendor Name</th><th>Added by Employee</th></tr>";
       $total_profit=0;
       while ($row =mysqli_fetch_array($result)) {
        
        $value= $row['sell_price']-$row['cost'];
        $profit=$value* $row['quantity'];
        $total_profit=$total_profit + $profit;

        $color = "#000000";
           if($row['quantity'] <5 ){
            $color = "#FF0000";
           }
           echo "<tr><td>" . $row['p_id'] . "</td><td>" .$row['name'] .  "</td><td>" .$row['description'] .  "</td><td>" .$row['type'] .
            "</td><td>" .$row['cost'] ."</td><td>" .$row['sell_price'] .  "</td><td> <span style=\"color: $color\">"  .$row['quantity'] .  
     "</span></td><td>" .$row['NAME'] .  "</td><td>" .$row['Name'] . "</td></tr>";
       }
       echo"</table>";
       echo "<br>";
       echo "Total Profit USD $total_profit";
       mysqli_free_result($result);
       mysqli_close($con);
   }
}
?>