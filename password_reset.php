

<?php

session_start();

?>
<?php
  
    
    require 'config.php';

    if(isset($_POST['reset'])){
        
        $email2=$_SESSION['email'];

        $password=$_POST['password'];
        $hash_password = md5($password);
        $re_password=$_POST['re_password'];
        $email=$_POST['email'];

        if($email2==$email){

            $query="SELECT email FROM staff WHERE email='$email'";
            $result1=mysqli_query($conn,$query);
            $ret_array=mysqli_fetch_assoc($result1);
            $email1=$ret_array['email'];
    
            if($email1==$email){
                if($password==$re_password){
                   
                    $update_query1="UPDATE loginuser SET password='$hash_password' WHERE email='$email' ";
                    $update_result1=mysqli_query($conn,$update_query1);
    
                    $update_query="UPDATE `staff` SET `password`='$hash_password',`repassword`='$hash_password' WHERE email='$email' ";
    
                 
                    $update_result=mysqli_query($conn,$update_query);
                    if(mysqli_affected_rows($conn)>0){
                        echo"<script> alert('Password resset successfully') </script>";
                       
                        echo"<script> location.href='login.php.' </script>";
                        
                    }
                    else
                    echo"<script> alert('Failed to reset the password.Please try again.') </script>";
                       
    
                }
                echo"<script> alert('Password does not matched.') </script>";
            }
    
            else{
    
                echo"<script> alert('Email does not valid. Please enter correct email.') </script>";
            }
       
            
        }

        else{
            echo"<script> alert('This is not the email you entered before. Please input your correct email') </script>";
        }
      
        }
   

       
    
?>


<!DOCTYPE html>

<head>
    <title>Login - CeylonGig</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="header.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>




</head>


<body>


    <header>


    </header>

   
    <form class="loginform" method="POST" action="">
        <h1>Login</h1>

        <div class="textbox">
            <input type="password" name="password" required>
            <span data-placeholder="Password"></span>
        </div>
       
        <div class="textbox">
            <input type="password" name="re_password" required>
            <span data-placeholder="Re enter password"></span>
        </div>

        <div class="textbox">
            <input type="email" name="email" required>
            <span data-placeholder="Enter email"></span>
        </div>
        <input class="loginbutton" type="submit" name="reset" value="Reset">



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