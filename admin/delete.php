<?php
include("src/config.php");
$do=$_GET["do"];
if($do==="delete"){
    $delete_id=$_GET['delete_id'];
    $delete_post_sql="DELETE FROM posts WHERE p_id='$delete_id'";
    // $file_sql="SELECT p_thumnail FROM posts WHERE p_id='$delete_id'";
    // $file_result=mysqli_query($db,$file_sql);
    // $file_row=mysqli_fetch_assoc($file_result);
    // $file_name=$file_row['p_thumnail'];
    // unlink("p_img/".$file_name);
    if(mysqli_query($db,$delete_post_sql)){
        echo "data delete";
        header("Location:http://localhost/a2z.com/admin/post.php");
    }
}

?>