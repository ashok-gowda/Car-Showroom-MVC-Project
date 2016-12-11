<?php
error_reporting(E_PARSE);
$con=mysqli_connect("localhost","root","","car2");
$result = mysqli_query($con,"SELECT First_Name FROM staff WHERE Staff_Id='$_POST[pwd]'");
$row=mysqli_fetch_array($result);
if($row[0]!=$_POST["name"])
{
 echo "<font size=20 align='center' color='red'><B>Wrong password or staff name</B></font><br><br><br>";
 echo "<a href='staff-login.html'><FONT SIZE=40>BACK</FONT></A>";
}
else
{
echo "<font size=20>" . "You have successfully logged in!" . "</font>";
echo "<br><br><br>";

echo "<a href='staff-main.html'><FONT SIZE=20 align='center'>GO</FONT></A>";
}

mysqli_close($con);
?>
