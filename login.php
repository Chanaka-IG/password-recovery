
<?php

require_once('config.php');
include('index.php');

?>


<!DOCTYPE html>

<head>
    <title>Login - CeylonGig</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="header.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
      <script> 
        $(function(){
          $("#includedContent").load("navbar.php"); 
        });
      </script> 


</head>


<body>


    <header>
    <div id="includedContent"></div>

    </header>

   
    <form class="loginform" method="POST" action="index.php">
        <h1>Login</h1>

        <div class="textbox">
            <input type="email" name="email" required>
            <span data-placeholder="email"></span>
        </div>
       
        <div class="textbox">
            <input type="password" name="password" required>
            <span data-placeholder="Password"></span>
        </div>
        
        <input class="loginbutton" type="submit" value="Login" name="login">

        <div class="bottomtext">
            <a href="email_verify.php">Forgot Password?</a><br><br>
            Don't have an account? <a href="">Create one!</a>
        </div>
       
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
