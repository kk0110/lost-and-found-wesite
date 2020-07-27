<!Doctype html>
<html>
<body>
<script language="javascript" link="test/javascript">
</script>
<?php

         
            $email= $_POST["uname"];
            $psw= $_POST["psw"];
            $conn=mysqli_connect("localhost","root");
            if(!$conn)
                echo("could not connect");
            else 
                echo("connected" ."<br>");
            $s=mysqli_select_db($conn,"lostfounddb");

            $q="SELECT email,pwd FROM users";
            $ex=mysqli_query($conn,$q);
            $index=false;
            while($row= mysqli_fetch_array($ex,MYSQLI_ASSOC))
         {
                
                if(($row['email']== $email) and ($row['pwd']== $psw))
                    {
                        
                        $index=true;
                        break;  
                    }
                    
            }
            
            if($index==true)
            {?>
                <script>
            
                    alert("You are successfully logged in!\nWelcome <?php echo $email;?>");
                    window.location.href="newedit2.html";
                    </script>
                    <?php
            }
            else 
            {  ?>
                <script>
                alert("invalid user name or password");
                </script>
                <?php
                $redirec= true;
                $redirec_page="login.html";
                header("Location: ".$redirec_page);
            }
            
            
            ?>
</body>
</html>
