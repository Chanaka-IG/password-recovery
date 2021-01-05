
<?php

session_start();

?>


<?php

require_once ('config.php');


if(isset($_POST["login"])) {
    $email =  mysqli_real_escape_string($conn,  $_POST["email"] );
    $password = mysqli_real_escape_string($conn,  $_POST["password"] );
    $hash_password = md5($password);

    $query = "SELECT * FROM loginuser WHERE email = '$email' AND
     password = '$hash_password'";

     $result = mysqli_query($conn, $query);

     if(mysqli_num_rows($result) > 0){
         while ($row = mysqli_fetch_assoc($result)){
            if($row["role"] == "Admin"){
               

                header('Location: admin/admin_home.php');
                $query1 = "SELECT * FROM staff WHERE email = '$email' AND
                password = '$hash_password'";
           
                $result1 = mysqli_query($conn, $query1);  
                $row1 = mysqli_fetch_assoc($result1);

                $_SESSION['name'] = $row1["name"];
                $_SESSION['email'] = $row1["email"];
                $_SESSION['userid'] = $row1["userid"];
                $_SESSION['address'] = $row1["address"];
                $_SESSION['gender'] = $row1["gender"];
                $_SESSION['role'] = $row1["role"];
               
            }
            else{

                header ('Location:staff/staff_home.php');

                $query2 = "SELECT * FROM staff WHERE email = '$email' AND
                password = '$hash_password'";
           
                $result2 = mysqli_query($conn, $query2);  
                $row2 = mysqli_fetch_assoc($result2);

                $_SESSION['name'] = $row2["name"];
                $_SESSION['email'] = $row2["email"];
                $_SESSION['userid'] = $row2["userid"];
                $_SESSION['address'] = $row2["address"];
                $_SESSION['gender'] = $row2["gender"];
                $_SESSION['role'] = $row2["role"];
               
            }
         }
        
     }
     else{
        
         
        echo"<script> alert('UserId or password is incorrect') </script>";
        echo"<script> location.href='login.php' </script>";
        
     }
}


?>
