


<?php

session_start();

?>



<?php
    require 'config.php';

    if(isset($_POST['send'])){

        $email=$_POST['email'];
        $query = "SELECT email FROM staff WHERE email='$email'";
   
        $result = mysqli_query($conn, $query);
   
        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
        
                   $_SESSION['email'] = $row["email"];
                  
               }
        }   
      
        $query="SELECT email FROM staff WHERE email='$email'";
        $result=mysqli_query($conn,$query);
       
        if(mysqli_num_rows($result)>0){
            $_SESSION['email'] = $email;
            $token=rand(100000,999999);
            $query="INSERT INTO tokens (email,token) VALUES ('$email','$token')";
            $insert_result=mysqli_query($conn,$query);
            
            //send token to the email
            $to=$email;
            $subject="Password reset token";
            $message=" Here is your token to reset your password. Its valid only for a one time! 
                        Token :: $token";

            

            $send_result=mail($to,$subject,$message);
            if($send_result){
                echo"<script> alert('token for reset password send to your email') </script>";
                echo"<script> location.href='previous.php' </script>";
            }
           
            
            else
            echo"<script> alert('Cannot send email') </script>";
        }
        else 

        echo"<script> alert('The entered email is not a registerd email address!Please try with a valid email address.') </script>";
        
    }

?>





<!DOCTYPE html>

<head>
    <title>Login - CeylonGig</title>
    <link rel="stylesheet" href="email_verify.css">
    <link rel="stylesheet" href="header.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>




</head>


<body>


    <header>


    </header>

   
    <form class="loginform" method="POST" action="#">
        <h1>Reset Password</h1>

       
        <div class="textbox">
            <input type="email" name="email" required>
            <span data-placeholder="Email"></span>
        </div>
        
        <input class= "loginbutton" type="submit" name="send" value="send">

       
    </form>

    <script type="text/javascript">
        $(".textbox input").on("focus",function(){
            $(this).addClass("focus");
        });

        $(".textbox input").on("blur",function(){
            if($(this).val() == "")
            $(this).removeClass("focus");
        });
    </script>

</body>

</html>