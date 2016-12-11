<html>
<body>
<?php
$image1 = $_POST['element_1'];
$con=mysqli_connect("localhost","root","","car2");
// Check connection
$result = mysqli_query($con,"SELECT * FROM images");



$flag=0;



while($row = mysqli_fetch_array($result))
{

if($row['image_caption']!=$image1)
continue;

$t1=$row['image_id'];
$ext=".jpg";
$t2="blob/uploads/".$t1.$ext;
echo"<img src='$t2' align='center'>";
$flag=1;
break;

}
if($flag==0)
{
 echo"<font size=20>car image not found.Select another car.</font><br><a href='guest-image.html' size=10>BACK</A>" ;
echo"</font></table>";
}
else
echo"<a href='guest.html'><font size=20 align='center'>back</font></a>";
mysqli_close($con);
?>
</body>
</html>