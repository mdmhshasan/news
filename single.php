<?php 
include("src/header.php");
include("src/config.php");

?>

    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="container">
            <nav class="breadcrumb bg-transparent m-0 p-0">
                <!-- <a class="breadcrumb-item" href="#">Home</a>
                <a class="breadcrumb-item" href="#">Category</a>
                <a class="breadcrumb-item" href="#">Technology</a> -->
                <a class="breadcrumb-item active">
                   <?php 
                   $basurl=$_SERVER['PHP_SELF']; 
                  $spliturl= explode('/',$basurl);
                   foreach($spliturl as $value){
                    echo "<a class='m-0 p-0'> / {$value} / </a>";
                    
                   }

                   ?> 
                </a>
                
            </nav>

        </div>
    </div>
    <!-- Breadcrumb End -->
    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">

            <?php
                global $db;
                if(isset($_GET['p_id'])){
                    $menu_id=$_GET['p_id'];
                    $select_post="SELECT * FROM posts WHERE p_id='$menu_id'";
                    $post_result=mysqli_query($db,$select_post);
                    while($row=mysqli_fetch_assoc($post_result)){
                    $thumnail=$row['p_thumnail'];
                    $p_date=$row['p_date'];
                    $p_title=$row['p_title'];
                    $p_desc=$row['p_desc'];
                    $p_id=$row['p_id'];
                    $p_status=$row['p_status'];
                ?>
                 <div class="col-lg-8">
                    <!-- News Detail Start -->
                    <div class="position-relative mb-3">
                        <img class="img-fluid w-100" src="admin/p_img/<?php echo $thumnail;?>" style="object-fit: cover;border-radius:10px;">
                        <div class="overlay position-relative bg-light">
                            <div class="mb-3">
                                <a href="">Technology</a>
                                <span class="px-1">/</span>
                                <span><?php echo $p_date;?></span>
                            </div>
                            <div>
                                <h3 class="mb-3 news-title"><?php echo $p_title;?></h3>

                                <p><?php echo $p_desc;?></p>
                                <p><?php echo $p_desc;?></p>
                                <h4 class="mb-3"><?php echo substr($p_title,0,40);?></h4>
                                <img class="img-fluid w-50 float-left mr-4 mb-2" src="admin/p_img/<?php echo $thumnail;?>" style="object-fit: cover;border-radius:10px;">
                                <p><?php echo $p_desc;?></p>
                                <h5 class="mb-3">Est dolor lorem et ea</h5>
                                <img class="img-fluid w-50 float-right ml-4 mb-2" src="admin/p_img/<?php echo $thumnail;?>" style="object-fit: cover;border-radius:10px;">
                                <p><?php echo $p_desc;?></p>
                            </div>
                        </div>
                    </div>
                    <!-- News Detail End -->

                    <!-- Comment List Start -->
<div class="bg-light mb-3" style="padding: 30px;">
<?php
 global $db;
 $select_comment="SELECT * FROM comment ORDER BY cmnt_user";
 $total_comment="SELECT * FROM comment";
 $comment_result=mysqli_query($db,$select_comment);
 $comment_count=mysqli_query($db,$total_comment);
 $total_comment=mysqli_num_rows($comment_count);
 ?>
 <h3 class="mb-4 btn btn-danger text-light">Comments => (<?php echo $total_comment;?>)</h3>
 <?php
 if(mysqli_num_rows($comment_result)>0){
    while($row=mysqli_fetch_assoc($comment_result)){
        $cmnt_user=$row['cmnt_user'];
        $cmnt_email=$row['cmnt_email'];
        $cmnt_details=$row['cmnt_details'];
        $cmnt_post=$row['cmnt_post'];
        $cmnt_date=$row['cmnt_date'];
        $cmnt_status=$row['cmnt_status'];
?>
<div class="media mb-4 m-0">
    <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
    <div class="media-body">
        <h6 class="badge badge-success" style="color:#000!important;text-transform:capitalize;"><a href="#" style="color:#fff!important;"><?php echo $cmnt_user;?></a> <small><i><?php echo $cmnt_date;?></i></small></h6>
        <p><?php echo $cmnt_details;?></p>
        <button class="btn btn-sm btn-outline-success">Reply</button>
    </div>
</div>

<?php
    }
 }

?>
</div>
<!-- Comment List End -->
<!-- Comment Form Start -->
<div class="bg-light mb-3" style="padding: 30px;">
    <h3 class="mb-4">Leave a comment</h3>
<?php
$comment_success_message='';
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
        $comment_success_message="<span class='alert alert-success'>Comment Success Send!'</span>";
    }  

   
}
?>
<form method="POST" action="">
    <input type="text" value="" hidden name="p_id">
    <input type="text" value="" hidden name="p_status">
    <div class="form-group">
        <label for="name">Name *</label>
        <input type="text" name="cmnt_name" class="form-control" id="name">
    </div>
    <div class="form-group">
        <label for="email">Email *</label>
        <input type="email" name="cmnt_email" class="form-control" id="email">
    </div>
    <div class="form-group">
        <label for="website">Website</label>
        <input type="url" name="cmnt_website" class="form-control" id="website">
    </div>

    <div class="form-group">
        <label for="message">Message *</label>
        <textarea id="message" name="cmnt_message" cols="30" rows="5" class="form-control"></textarea>
    </div>
    <div class="mt-3 mb-3" style="border-radius:5px!important">
        <?php echo $comment_success_message;?>
    </div>
    <!-- comment submit button start -->
    <div class="form-group mb-0">
            <input type="submit" value="submit" name="cmnt_submit"
            class="btn btn-primary font-weight-semi-bold py-2 px-3"> 
    </div>
        <!-- comment submit button end -->
</form>


    </div>
    <!-- Comment Form End -->
</div>
<?php
    }
}
?>
               
<?php
include("right-sidebar.php");
?>
<!-- News With Sidebar End -->
<?php
 include("src/footer.php");
?>