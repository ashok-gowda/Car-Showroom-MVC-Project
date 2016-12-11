<?php
// Create connection
//error_reporting(E_PARSE);
$con=mysqli_connect("localhost","root","","car2");
$sql="select * from cars";
$result= mysqli_query($con,$sql);
$flag=0;
while($row=mysqli_fetch_array($result))
{
 if($row['Car_Name']==$_POST['element_1'])
 {
  $flag=1;
  break;
 }
}
if($flag==0)
echo "<font size=10>INVALID CAR NAME</font><br><a href='staff-car-update.html' size=10>GO BACK</a>";
else
{
$sql="UPDATE  `car2`.`cars` SET  `Torque` =  '$_POST[element_2]',
`Mileage` =  '$_POST[element_3]',
`Displacement` =  '$_POST[element_4]',
`Power` =  '$_POST[element_5]',
`Buying_Price` =  '$_POST[element_6]',
`Selling_Price` =  '$_POST[element_7]'
 WHERE  `cars`.`Car_Name` ='$_POST[element_1]'";
$result=mysqli_query($con,$sql);
echo "<b>"."<font size=20 align='center'>"."Succesful updation of car entry"."</font>"."</b>";
echo "<br><br><br>";
echo "<a href='staff-car.html' size=10>DONE</a>";
}

mysqli_close($con);
?>
