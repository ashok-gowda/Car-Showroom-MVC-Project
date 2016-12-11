<?php
// Create connection
$con=mysqli_connect("localhost","root","","car2");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$sql="select * from registration";
$result= mysqli_query($con,$sql);
$flag=0;
while($row=mysqli_fetch_array($result))
{
 if($row['Registration_Id']==$_POST['element_1'])
 {
  $flag=1;
  break;
 }
}
if($flag==0)
{
$sql="INSERT INTO registration(Registration_Id, Date,Rto_Street,Rto_City,Rto_State)VALUES
('$_POST[element_1]','$_POST[element_2]','$_POST[element_3]','$_POST[element_4]','$_POST[element_5]')";

mysqli_query($con,$sql);
echo "<b>"."<font size=20 align='center'>"."Succesful completion of registration form"."<font>"."</b>";
echo "<br><br><br>";
echo "<a href='staff-insurance.html'>NEXT</a>";
}
else
{
echo "<font size=10>Registration id already present.</font><br><a href='staff-registration.html' size=10>GO BACK</a>";
}



mysqli_close($con);
?>