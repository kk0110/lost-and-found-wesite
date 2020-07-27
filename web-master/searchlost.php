<body style="height:133px;background-image:url(tx1.jpg);background-repeat: no-repeat;background-size:cover;opacity:0.9;"> 
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

@$ke =$_POST["keyword"];
@$cat=$_POST["Category"];
@$subcat=$_POST["SubCategory"];
@$loc=$_POST["Location"];


//echo "Successfully inserted  into a table<br><br>";


$sql="select * from lost join users using(email) where itemname='$ke' OR category='$cat' OR subcategory='$subcat' OR location='$loc'";
$result=mysqli_query($conn,$sql); 
echo "<font color='blue'><h2>Reporter detatils are:</h2></font><br>";
?><table border="2" align="center" width="60%" bgcolor="#f2f2f2" align-content="center">
	<tr> 
		<td height="50" align="center" ><b><font size="5" color= "blue" ><b>Email:</b> </td>
		<td height="50" align="center" ><b><font size="5" color= "blue"><b>Phone no</b></td> 
		<td height="50" align="center" ><b><font size="5" color= "blue"><b>Item</b> </td>
		<td height="50" align="center" ><b><font size="5" color= "blue"><b>Location</b></td> 
    </tr>;
    <?php
while($row=mysqli_fetch_assoc($result)){
 //   echo "<font color= 'blue'>". $row['email']."</font>"." "."<font color= 'blue' size='3'>".$row['phone']."</font>"." "."<font ///color='blue' size='3'>".$row['itemname']."</font>"." "."<font color= 'blue' size='3'>".$row['location']."</font>"."<br>";
 ?>
 <tr> 
 <td height="50" align="center" ><b><font size="4" color= "green"><?php  echo $row['email'];?></font></td>
 <td height="50" align="center" ><b><font size="4" color= "black"><?php  echo $row['phone'];?></font></td>
 <td height="50" align="center" ><b><font size="4" color= "green"><?php  echo $row['itemname'];?></font></td>
 <td height="50" align="center" ><b><font size="4" color= "black"><?php  echo $row['location'];?></font></td>
 </tr>
 <?php
}
?>
</table>
<?php

                
mysqli_close($conn);
?>
</body>
