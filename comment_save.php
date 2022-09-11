<?php
include("src/config.php"); 
global $db;          
if(isset($_POST['cmnt_submit'])){
    $cmnt_name=$_POST['cmnt_name'];
    $cmnt_email=$_POST['cmnt_email'];
    $cmnt_message=$_POST['cmnt_message'];
    $menu_id=$_POST['p_id'];
    $p_status=$_POST['p_status'];

    $insert_comment="INSERT INTO comment(cmnt_user,cmnt_details,cmnt_post,cmnt_date,cmnt_status,cmnt_email)
    VALUES('{$cmnt_name}','{$cmnt_message}','$menu_id',now(),'$p_status','$cmnt_email')";
    $comment_result=mysqli_query($db,$insert_comment);
    if($comment_result){
        echo "<span class='alert alert-success'>Comment Success Send!'</span>";
        header("Location:single.php");
    }  

   
}
    
?>