

<?php

session_start();

?>


<?php
  
    
  require 'config.php';

  if(isset($_POST['reset'])){

        $email=$_SESSION['email']; 
        $token_new=$_POST['token'];
          $ret_query="SELECT token FROM tokens WHERE email='$email'";
          $ret_result=mysqli_query($conn,$ret_query);


          if(mysqli_num_rows($ret_result)>0){
            $ret_array=mysqli_fetch_assoc($ret_result);

            if(mysqli_affected_rows($conn)>0){
                $token1=$ret_array['token'];
                if($token1===$token_new) {
                    $delete_query="DELETE FROM tokens WHERE token='$token1'";
                    $delete_result=mysqli_query($conn,$delete_query);
                    echo"<script> alert('token matched') </script>";
                    echo"<script> location.href='password_reset.php.' </script>";
                   
                }
                else{
                    
              echo"<script> alert('Tokens are not matched.') </script>";
                }

            }
            else{

                echo"<script> alert('Access Denided!Token has used before.') </script>";

            }
          }
         
             



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


    <form class="loginform" method="POST" action="#">
        <h1>Reset Password</h1>

       
        <div class="textbox">
            <input type="text" name="token" required>
            <span data-placeholder="Enter the token number here"></span>
        </div>
        
        <input class= "loginbutton" type="submit" name="reset" value="send">

       
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