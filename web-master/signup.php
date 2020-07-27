<!Doctype html>
<html>
<body>
<?php

$email=$_POST["email"];
$phn=$_POST["phn"];
$psw=$_POST["psw"];
$conn=mysqli_connect("localhost","root");
//if($conn)
//echo  "connected";
//$q="create database lostfounddb";
//$ex=mysql_query($conn,$q);
$ex=mysqli_select_db($conn,"lostfounddb");
if(!$ex)
echo "couldn't connect to database";
$q="SELECT email FROM users";
$ex=mysqli_query($conn,$q);
$index=false;
while($row= mysqli_fetch_array($ex,MYSQLI_ASSOC))
{
    
    if($row['email']== $email)
        {
            
            $index=true;
            break;  
        }
        
}
if($index==true)
{
    echo ("user already exist");
}
else
{
    $q="insert into users(email,phone,pwd) values('$email','$phn','$psw')";
    $ex=mysqli_query($conn,$q);
    $redirect= true;
    $redirect_page="newedit3.php";
    ?>
    <script>

        alert("Welcome <?php echo $email;?>");
        window.location.href="newedit2.html";
        </script>
       <?php
}
?>
</body>
</html>
