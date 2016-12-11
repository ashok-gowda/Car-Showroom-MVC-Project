<html>
<body>
<?php
$con=mysqli_connect("localhost","root","","car2");
// Check connection
$result = mysqli_query($con,"SELECT * FROM images");
echo "<table border='10' width=1350> 
<tr>
<th>image_id</th>
<th>image_caption</th>
<th>image_username</th>
<th>image_date</th>





</tr>";
$i=0;
while($row = mysqli_fetch_array($result))
{
echo"<tr>";


echo"<td>".$row['image_id']."</td>";
echo"<td>".$row['image_caption']."</td>";
echo"<td>".$row['image_username']."</td>";
echo"<td>".$row['image_date']."</td>";
$ext=".jpg";
$t1=$row['image_id'];

$t2="blob/uploads/".$t1.$ext;
echo"<img src='$t2' align='center'>";

echo"</tr>";
$i++;
} 
echo"</font></table>";
echo"<a href='C:\wamp\www\car_showroom\starting page\start.html'>back</a>";
mysqli_close($con);
?>