<?php
$link = mysql_connect("localhost","root","") or die("Could not connect now");
mysql_select_db("car2");

$image_caption = $_POST['image_caption'];
$image_username = $_POST['image_username'];
$image_tmpname = $_FILES['image_filename']['name'];
$today = date("Y-m-d");

$imgdir = "blob/uploads/";
$imgname = $imgdir.$image_tmpname;
if(move_uploaded_file($_FILES['image_filename']['tmp_name'], $imgname))
{


$insert = "insert into images (image_caption, image_username, image_date)
   values ('$image_caption','$image_username','$today')";
$insertresults = mysql_query($insert) or die(mysql_error());

$last_pic_id = mysql_insert_id();
$newfilename = $imgdir.$last_pic_id.".jpg";
rename($imgname,$newfilename); 
}
?>