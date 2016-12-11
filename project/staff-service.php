<?php
// Create connection
//error_reporting(E_PARSE);
$con=mysqli_connect("localhost","root","","car2");
$sql="select * from service";
$result= mysqli_query($con,$sql);
$flag=0;
while($row=mysqli_fetch_array($result))
{
 if($row['Service_Id']==$_POST['element_1'])
 {
  $flag=1;
  break;
 }
}
if($flag==1)
echo "<font size=10>SERVICE ID EXISTS.</font><br><a href='staff-service.html' size=10>GO BACK</a>";
else
{
if($_POST['element_2']=="old")
{
$sql="select * from customer";
$result= mysqli_query($con,$sql);
$flag=0;
while($row=mysqli_fetch_array($result))
{
 if($row['Bill_No']==$_POST['element_5'])
 {
  $flag=1;
  $id=$row['Customer_Id'];
  break;
 }
}
if($flag==0)
echo "<BR><BR><font size=10>BILL No. DOESN'T EXIST</FONT><a href='staff-service.html'>BACK</A>";
else
{
$sql="select count(Service_Id) from service group by Customer_Id having Customer_Id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
if($row[0]<3)
$cost1=0;
else
$cost1=350;
$cost2=$_POST['element_6'];
$total=$cost1+$cost2;
$_POST['element_2']=$id;
$_POST['element_3']=$cost2;
$_POST['element_5']=$cost1;
$_POST['element_6']=$total;
$sql="INSERT INTO  `car2`.`service` (
`Customer_Id` ,
`Service_Id` ,
`Accessory_Cost` ,
`Service_Cost` ,
`Total_cost` ,
`Year`
)
VALUES (
'$_POST[element_2]',  '$_POST[element_1]',  '$_POST[element_3]',  '$_POST[element_5]',  '$_POST[element_6]',  '$_POST[element_4]'
)";
 $result=mysqli_query($con,$sql);
 echo "<b>"."<font size=20 align='center'>"."Succesful completion"."<font>"."</b>";
 echo "<br><br><br>";
echo "<a href='staff-main.html'>DONE</a>";
}
}
else
{
$sql="select * from customer";
$result= mysqli_query($con,$sql);
$flag=0;
while($row1=mysqli_fetch_array($result))
{
 if($row1['Customer_Id']==$_POST['element_3'])
 {
  $flag=1;
  break;
 }
}
if($flag==1)
echo "<BR><BR><font size=10>CUSTOMER ID EXISTS IN CUSTOMER TABLE</FONT><BR><BR><a href='staff-service.html'>BACK</A>";
 else
{
$sql="select * from service";
$result= mysqli_query($con,$sql);
$flag=0;
while($row=mysqli_fetch_array($result))
{
 if($row['Customer_Id']==$_POST['element_3'])
 {
  $flag=1;
  break;
 }
}
 if($flag==1)
 echo "<BR><BR><font size=10>CUSTOMER ID EXISTS IN SERVICE TABLE</FONT><a href='staff-service.html'>BACK</A>";
 else
 {
 $cost2=350;
 $cost1=$_POST['element_6'];
 $total=$cost1+$cost2; 
 $_POST['element_2']=$cost2;
$_POST['element_5']=$cost1;
$_POST['element_6']=$total;
$sql="INSERT INTO  `car2`.`service` (
`Customer_Id` ,
`Service_Id` ,
`Accessory_Cost` ,
`Service_Cost` ,
`Total_cost` ,
`Year`
)
VALUES (
'$_POST[element_3]',  '$_POST[element_1]',  '$_POST[element_2]',  '$_POST[element_5]',  '$_POST[element_6]',  '$_POST[element_4]'
)";
 $result=mysqli_query($con,$sql);
 echo "<font size=10>SUCESS!</FONT>";
 echo "<br><br><br>";
echo "<a href='staff-main.html'>DONE</a>";
}
} 
}
}

mysqli_close($con);
?>
