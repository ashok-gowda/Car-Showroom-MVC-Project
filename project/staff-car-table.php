<html>
<body >
<?php
$con=mysqli_connect("localhost","root","","car2");
// Check connection
$result = mysqli_query($con,"SELECT Car_Name,Torque,Power,Mileage,Displacement,Selling_Price FROM cars");
echo "<table border='10' width=1350> 
<tr>
<th>Car_Name</th>
<th>Torque</th>
<th>Power</th>
<th>Mileage</th>
<th>Displacement</th>
<th>Selling_Price</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo"<tr>";
echo"<td>".$row['Car_Name']."</td>";
echo"<td>".$row['Torque']."</td>";
echo"<td>".$row['Power']."</td>";
echo"<td>".$row['Mileage']."</td>";
echo"<td>".$row['Displacement']."cc"."</td>";
echo"<td>".$row['Selling_Price']."</td>";

} 
echo"</font></table>";
echo"<a href='staff-car.html' size=20>BACK</a>";
mysqli_close($con);
?>