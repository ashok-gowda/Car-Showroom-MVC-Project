<?php
// Create connection
error_reporting(E_PARSE);
$con=mysqli_connect("localhost","root","","car2");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$i=0;
$result = mysqli_query($con,"SELECT Car_Name FROM cars");
while($row=mysqli_fetch_array($result))
{
 if($row[0]==$_POST['element_1'])
{
 $i=1;
 $sql1="DELETE FROM cars where Car_Name='$_POST[element_1]'";
 $result=mysqli_query($con,$sql1);
 echo "<b>"."<font size=10 align='center'>"."Succesful deletion of car"."<font>"."</b>";
 echo "<br><br><br>";
 echo "<a href='staff-car.html'>MAIN PAGE</a>";
 break;
}
}


if($i==0)
{
 echo "<b>"."<font size=10 align='center'>"."Car_name not present.Supply another"."<font>"."</b>";
 echo "<br><br><br>";
 echo "<a href='staff-car-delete.html'>PREVIOUS PAGE</a>";
}


  
mysqli_close($con);
?>