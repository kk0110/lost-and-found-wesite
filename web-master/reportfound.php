<?php

$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);

if(!$conn)
{
die("failed".mysqli_error() );
}

//echo "successfull connection <br><br>";

//$sql='CREATE DATABASE lostfounddb';
$sql=mysqli_select_db($conn,'lostfounddb');

if(!$sql)
{
die("failed". mysqli_error());
}

//echo "Successfully selected";

//$sql="create table sfound(keyword varchar(20) , category varchar(20), subcategory varchar(20),location varchar(20))";

//$check= mysqli_query($sql, $conn);

//if(!$check)
//{
//die("failed". mysqli_error());
//}

//echo "Successfully created a table<br><br>";
$email=$_POST["email"];
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
    //echo ("user already exist");


$ke =$_POST["keyword"];
$cat=$_POST["Category"];
$subcat=$_POST["SubCategory"];
$loc=$_POST["Location"];

$sql = "insert into found(itemname,email,category,subcategory,location) values('$ke','$email', '$cat', '$subcat' , '$loc')";

$c=mysqli_query($conn,$sql);
$redirec= true;
$redirec_page="report found.html";
header("Location: ".$redirec_page);
}
else
{
                
    echo "<script>var response = confirm('Hey there, do you want to sign in?');</script>";
    $redirec= confirm;
    $redirec_page="signup.html";
    header("Location: ".$redirec_page);                

}


//echo "Successfully inserted  into a table<br><br>";

/*
$sql="select * from found where keyword='$ke' OR category='$cat' OR subcategory='$subcat' OR location='$loc'";
$result=mysqli_query($conn,"$sql"); 
while($row=mysqli_fetch_assoc($result)){
    echo $row['item'];
}
*/


mysqli_close($conn);
?>
