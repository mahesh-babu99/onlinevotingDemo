<?php
include('connect.php');
$username=$_POST['username'];
$mobile=$_POST['mobile'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$image=$_FILES['photo']['name'];
$tmp_name=$_FILES['photo']['tmp_name'];
$std=$_POST['std'];
if ($password!=$confirm_password) {
   /* echo'<script>
    alert("passwords did not match");
    window.location=../paritals/registration.php";
    </script>';*/
   echo "Password is mismatched.";
    //header("Location: http://localhost/onlinevote/paritals/registration.php"); // Corrected URL and encoded spaces
    exit(); // Ensure to exit after redirection
}
else{
    move_uploaded_file($tmp_name,"..uploads/$image");
    $sql="insert into `userdata` (username,mobile,password,photo,standard,status,votes) values('$username','$mobile','$password','$image','$std',0,0)";
    $result=mysqli_query($con,$sql);
    if($result){
        echo "Registration sucessfull";
    header("Location: http://localhost/onlinevote/paritals/index.php"); // Corrected URL and encoded spaces
  exit(); // Ensure to exit after redirection
    }
    else{
        die(mysqli_error($con));
    }

    }

?>


