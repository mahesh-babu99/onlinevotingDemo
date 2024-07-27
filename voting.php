<?php
session_start();
include('connect.php');


$votes=$_POST['groupvotes'];
$totalvotes=$votes+1;


$gid=$_POST['groupid'];
$uid=$_SESSION['id'];

$updatedvotes=mysqli_query($con,"update `userdata` set votes='$totalvotes' where id='$gid'");

$updatedstatus=mysqli_query($con,"update `userdata` set status='1' where id='$uid'");

if($updatedvotes and $updatedstatus){

    $getgroups=mysqli_query($con,"Select username,photo,votes,id from `userdata` where standard='group'");
    $groups=mysqli_fetch_all($getgroups,MYSQLI_ASSOC);
    $SESSION['groups']=$groups;
    $SESSION['status']=1;
    echo'<script>
    alert("voting Sucessful!!");
    window.location="../paritals/dashboard.php";
    </script>';


}else{
    echo'<script>
    alert("Techincal error !!");
    window.location="../paritals/dashboard.php";
    </script>';
    //echo"Techincal error try again later";
}




?>