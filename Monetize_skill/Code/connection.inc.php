<?php
$conn=mysqli_connect("localhost","root","","monetizeskill");
$location="http://localhost/Monetize_skill/Code";
if(!$conn)
{
    die("Could not connect to database<br>".mysqli_connect_error($conn));
}
else{ echo "Connected";}

?>