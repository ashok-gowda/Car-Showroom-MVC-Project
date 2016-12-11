<?php
// Create connection
//error_reporting(E_PARSE);
$con=mysqli_connect("localhost","root","","car2");
$sql="select * from customer";
$result= mysqli_query($con,$sql);
$flag=0;
while($row=mysqli_fetch_array($result))
{
 if($row['Customer_Id']==$_POST['element_1']||$row['Phone_Customer']==$_POST['element_8'])
 {
  if($row['Phone_Customer']==$_POST['element_8'])
  $flag=1;
  if($row['Customer_Id']==$_POST['element_1'])
  $flag=2;
  break;
 }
}
if($flag==0)
{
$sql="INSERT INTO  `car2`.`customer` (
`Customer_Id` ,
`FirstName` ,
`SecondName` ,
`LastName` ,
`Street` ,
`City` ,
`State` ,
`Phone_Customer` ,
`Year`
)
VALUES (
'$_POST[element_1]',  '$_POST[element_2]',  '$_POST[element_3]',  '$_POST[element_4]',  '$_POST[element_5]',  '$_POST[element_6]',  '$_POST[element_7]',  '$_POST[element_8]', '$_POST[element_9]')";
$result=mysqli_query($con,$sql);
echo "<b>"."<font size=20 align='center'>"."Succesful completion of customer form"."<font>"."</b>";
echo "<br><br><br>";
echo "<a href='staff-registration.html'>NEXT</a>";
}
else if($flag==2)
{
 echo "<font size=10>Customer id already present. Supply another.<br></font><br><a href='staff-customer.html' size=10>GO BACK</a>";
}
else
echo "<font size=10>Customer phone number should be unique.<br></font><br><a href='staff-customer.html' size=10>GO BACK</a>";
mysqli_close($con);
?>
