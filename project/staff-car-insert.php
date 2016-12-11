<?php
// Create connection
//error_reporting(E_PARSE);
$con=mysqli_connect("localhost","root","","car2");
$sql="select * from cars";
$result=mysqli_query($con,$sql);
$flag=1;
while($row = mysqli_fetch_array($result))
{
if($row['Car_Name']==$_POST['element_1'])
{
 $flag=0;
 break;
}

} 
if($flag==0)
{
 echo "<font size=20 align='center'><B>Car Name should be unique</B></FONT>"."<br><BR><BR>";
 echo '<a href="staff-car-insert.html">Go back to the previous page</a>';
}
else
{
$sql="INSERT INTO  `car2`.`cars` (
`Car_Name` ,
`Torque` ,
`Mileage` ,
`Displacement` ,
`Power` ,
`Buying_Price` ,
`Selling_Price` 
)
VALUES (
'$_POST[element_1]',  '$_POST[element_2]',  '$_POST[element_3]',  '$_POST[element_4]',  '$_POST[element_5]',  '$_POST[element_6]',  '$_POST[element_7]'
)";
$result=mysqli_query($con,$sql);
echo "<b>"."<font size=20 align='center'>"."Succesful completion of car entry"."<font>"."</b>";
echo "<br><br><br>";
echo "<a href='staff-car.html'>DONE</a>";
}

mysqli_close($con);
?>
