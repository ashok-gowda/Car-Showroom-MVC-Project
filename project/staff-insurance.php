<?php
// Create connection
error_reporting(E_PARSE);
$con=mysqli_connect("localhost","root","","car2");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$sql="select * from customer";
$result= mysqli_query($con,$sql);
$flag=0;
while($row=mysqli_fetch_array($result))
{
 if($row['Customer_Id']==$_POST['element_2'])
 {
  $flag=1;
  break;
 }
}
if($flag==0)
{
 echo "<font size=10>Customer Id not present in car table. Supply another.</font><br><a href='staff-insurance.html' size=10>GO BACK</a>";
}
else
{
$sql="select * from insurance";
$result= mysqli_query($con,$sql);
$flag=0;
while($row=mysqli_fetch_array($result))
{
 if($row['Customer_Id']==$_POST['element_2'])
 {
  $flag=1;
  break;
 }
}
 if($flag==1)
 echo "<font size=10>Customer Id already present in this table.</font><br><a href='staff-insurance.html' size=10>GO BACK</a>";
else
{
$sql="INSERT INTO insurance(Agency_Name, Customer_Id,Amount,Start_Date,End_Date)VALUES
('$_POST[element_1]','$_POST[element_2]','$_POST[element_3]','$_POST[element_4]','$_POST[element_5]')";
mysqli_query($con,$sql);
echo "<font size=10>SUCCESS!</font><br>";
echo "<br><br><br>";
echo "<a href='staff-main.html'>DONE</a>";
}
}
mysqli_close($con);
?>