<?php  
include("src/config.php");
global $db;
if(isset($_POST['signup'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $agree=$_POST['agree'];
    if(empty($email) && empty($password && empty($agree))){
        echo "<h1 style='text-align:center;color:red;'>ALL INPUT ARE EMTY SO FARST COMPLITE YOUR ALL DETAILS AFTER LOGIN1</h1>";
    }else{
        $insert_login_info="SELECT * FROM users WHERE u_email='$email' AND u_pass='$password'";
        $result=mysqli_query($db,$insert_login_info);
       if(mysqli_num_rows($result)>0){
        while($show_row=mysqli_fetch_assoc($result)){

            session_start();
             $session_name=$_SESSION["email"]=$show_row['u_email'];
             $session_pass=$_SESSION["password"]=$show_row['u_pass'];
             $session_user_type=$_SESSION["user_type"]=$show_row['u_type'];
             $session_user_id=$_SESSION["user_id"]=$show_row['u_id'];
             $session_username=$_SESSION["username"]=$show_row['u_name'];
            header("Location:http://localhost/a2z.com/admin/post.php?do=show");
        }
       }else{
        echo "email or password are not mathch";
       }
    }
}
?>
