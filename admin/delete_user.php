<?php
include("src/config.php");
if(isset($_GET['d_id'])){
    $d_id=$_GET['d_id'];
    $delete_sql="DELETE FROM users WHERE u_id='$d_id'";
    $delete_result=mysqli_query($db,$delete_sql);
    if($delete_result){
        header("Location: http://localhost/a2z.com/admin/users.php?do=show");
    } 
    }

?>