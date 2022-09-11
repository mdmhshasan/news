<?php
include("src/header.php");
include("src/config.php");
?>

 <div class="main-panel">
    <div class="content-wrapper">

<?php
if(isset($_GET["do"])){
    $do=$_GET["do"];
}else{
   $do="show";
}
if($do==='show'){
?>
<div class="row">
  <div class="col-lg-12 col-md-12 grid-margin stretch-card">
    <div class="card">
    <div class="card-body">
        <h4 class="card-title">post Table</h4>
        <p class="card-description">
        </p>
        <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Thumnail</th>
                <th>Porgress</th>
                <th>Pesc</th>
                <th>Pategory</th>
                <th>Author</th>
                <th>Tags</th>
                <th>Status</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                <?php
                global $db;
                $show_post_sql="SELECT * FROM posts";
                $post_result=mysqli_query($db,$show_post_sql);
                while($post_row=mysqli_fetch_assoc($post_result)){
                    
                   $p_id=$post_row['p_id'];
                   $p_author=$post_row['p_author'];
                   $p_title=$post_row['p_title'];
                   $p_thumnail=$post_row['p_thumnail'];
                   $p_desc=$post_row['p_desc'];
                   $p_date=$post_row['p_date'];
                   $p_comment=$post_row['p_comment'];
                   $p_category=$post_row['p_category'];
                   $p_tags=$post_row['p_tags'];
                   $p_status=$post_row['p_status'];
                ?>
            <tr>
                <td><?php echo $p_id;?></td>
                <td><?php echo substr($p_title,0,10)."<br>";?></td>
                <td class="py-1"><img src="p_img/<?php echo $p_thumnail;?>" alt="image"></td>
                <td>
                <div class="progress">
                    <style>
                        .progress-bar{ width:100%;animation:progressBar 1s; }
                        @keyframes progressBar {0%{width:0%;}100%{width:90%;}}
                    </style>
                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                </td>
                <td><?php echo substr($p_desc,0,10)."<br>";?></td>
                <td>
                <?php
                  $category_select="SELECT c_name FROM category WHERE c_id='$p_category'";
                  $category_select_result=mysqli_query($db,$category_select);
                  $category_select_row=mysqli_fetch_assoc($category_select_result);
                  echo $category_select_row['c_name'];
                ?></td>
                <td>
                <?php 
                   $users_select="SELECT u_name FROM users WHERE u_id='$p_author'";
                   $users_select_result=mysqli_query($db,$users_select);
                   $users_select_row=mysqli_fetch_assoc($users_select_result);
                   echo $users_select_row['u_name'];
                ?>
                </td>
                <td>
                <?php 
                    $split_tags=explode(',',$p_tags);
                    foreach($split_tags as $tags){
                    ?>
                    <span class="badge bg-info p-2 text-light"><?php echo $tags;?></span>
                    <?php
                    }
                ?>
                </td>
                <td>
                <?php 
                if($p_status=='1'){
                    echo "<span class='btn btn-success p-2 text-light'>Active</span>";
                }else{
                    echo "<span class='btn btn-danger p-2 text-light'>InActive</span>";
                }
                ?>
                </td>
                <td><?php echo $p_date;?></td>
                <td>
                  <a href="post.php?do=edit&edit_id=<?php echo $p_id;?>" class="btn btn-success p-2 text-dark"><ion-icon name="create"></ion-icon></a>
                  <a href="delete.php?do=delete&delete_id=<?php echo $p_id;?>" class="btn btn-danger p-2 text-dark"><ion-icon name="trash"></ion-icon></a>
            </td>
            </tr>
            <?php
                }
            ?>
            </tbody>
        </table>
        </div>
    </div>
    </div>
   </div>
</div>
</div>
<?php
}
if($do==="add"){
?>
<div class="row">
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
    <h4 class="card-title">Basic form elements</h4>
    <p class="card-description">
    Basic form elements
    </p>
    <form class="forms-sample" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleInputName1">Title</label>
        <input type="text" class="form-control" id="exampleInputName1" name="post_title" placeholder="post Title">
    </div>
    <div class="form-group">
        <label for="exampleTextarea1">Descriptions</label>
        <textarea class="form-control" name="descriptions" id="exampleTextarea1" rows="4"></textarea>
    </div>
    <div class="form-group">
    <label for="exampleInputName1">select parent category</label>
        <select class="form-control" name="post_category" id="exampleSelectGender">
<?php
global $db;
$select_parent="SELECT * FROM category WHERE is_sub='0'";
$parent_result=mysqli_query($db,$select_parent);
    while($parent_row=mysqli_fetch_assoc($parent_result)){
      $is_sub_math=$parent_row['is_sub'];
      $id=$parent_row['c_id'];
?>
<option value="<?php echo $id;?>"><?php echo $parent_row['c_name'];?></option>
<?php
}
?>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword4">post tags</label>
        <input type="text" id="tag_input1" class="form-control" name="post_tags" placeholder="add tags">
    </div>
  
    <div class="form-group">
    <label for="exampleInputName1">post status</label>
        <select class="form-control" name="post_status" id="exampleSelectGender">
            <option value="1">Acitve</option>
            <option value="0">InActive</option>
        </select>
    </div>
    <div class="form-group">
        <label for="readUrl" class="file-upload-browse btn btn-primary">File upload</label><br>
        <input type="file" id="readUrl" name="post_image" hidden id="upload">
        <img id="uploadedImage" src="#" alt="Uploaded Image" accept="image/png, image/jpeg" style="display:none;">
        </div>
    </div>
    <button type="submit" name="post_btn" class="btn btn-primary mr-2">Submit</button>
    <button class="btn btn-light">Cancel</button>
    </form>

    <?php
    if(isset($_POST['post_btn'])){
        $post_title=$_POST['post_title'];
        $descriptions=$_POST['descriptions'];
        $post_category=$_POST['post_category'];
        $post_tags=$_POST['post_tags'];
        $post_status=$_POST['post_status'];
    
        $file_name=$_FILES['post_image']['name'];
        $tmp_name=$_FILES['post_image']['tmp_name'];
        $file_type=$_FILES['post_image']['type'];
       $file_size=$_FILES['post_image']['size'];
    
        $file_extention=explode('.',$file_name);
        $file_end=end($file_extention);
        $file_case=strtoupper($file_end);
        $new_file_name=rand().$file_name;
        $file_extention_type=array('jpg','png','gif','jpeg','mp4');
        // if(in_array($new_file_name,$file_extention_type)){
        
          if(empty($post_title) || empty($descriptions) || empty($post_category) || empty($post_tags)){
            echo "<span class='badge bg-danger'>please insert information!</span>";
         }else{
            move_uploaded_file($tmp_name,"p_img/$new_file_name");
            $sql="INSERT INTO posts(p_title,p_thumnail,p_desc,p_date,p_tags,p_category,p_author,p_status) VALUES('{$post_title}','{$new_file_name}','{$descriptions}',now(),'{$post_tags}','{$post_category}','1','{$post_status}')";
            if(mysqli_query($db,$sql)){
                echo "data insarted";
            }
         }        
    }
    ?>

</div>
</div>
</div>
</div>
<?php

}
?>
   </div>
</div>
<?php
ob_start();
// if($do==="update"){}
global $db;
if($do==="edit"){
$edite_id=$_GET['edit_id'];

$post_sql="SELECT * FROM posts WHERE p_id='$edite_id'";
$post_result=mysqli_query($db,$post_sql);
while($post_row=mysqli_fetch_assoc($post_result)){
    $post_id      =$post_row['p_id'];
    $post_author  =$post_row['p_author'];
    $post_title   =$post_row['p_title'];
    $post_img     =$post_row['p_thumnail'];
    $post_desc    =$post_row['p_desc'];
    $post_comment =$post_row['p_comment'];
    $post_tags    =$post_row['p_tags'];
    $post_status  =$post_row['p_status'];
    $post_date    =$post_row['p_date'];
    $post_category=$post_row['p_category'];
 
}
?>
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edite Post information</h4>
            
            <form class="forms-sample" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputName1">Post Name</label>
                <input type="text" class="form-control" name="post_title" value="<?php echo $post_title;?>" id="exampleInputName1" placeholder="Name">
            </div>
           
            <div class="form-group">
                <label for="exampleTextarea1">Post Desciptions</label>
                <textarea class="form-control" name="post_desc" id="exampleTextarea1" rows="4"><?php echo $post_desc;?></textarea>
            </div>
            <div class="form-group">
             <label for="exampleInputName1">Select parent category</label>
        <select class="form-control" name="post_category" id="exampleSelectGender">
<?php
global $db;
$select_parent="SELECT * FROM category WHERE is_sub='0'";
$parent_result=mysqli_query($db,$select_parent);
    while($parent_row=mysqli_fetch_assoc($parent_result)){
      $is_sub_math=$parent_row['is_sub'];
      $id=$parent_row['c_id'];
?>
<option value="<?php echo $id;?>" <?php if($post_category===$id)echo "selected";?>><?php echo $parent_row['c_name'];?></option>
<?php
}
?>
        </select>
    </div>
            <div class="form-group">
                <label for="exampleInputPassword4">Post Tags</label>
                <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags;?>"  id="exampleInputPassword4" placeholder="add new tags">
            </div>
           
            <div class="form-group">
                <label for="exampleSelectGender">Post Status</label>
                <select class="form-control" name="post_status" id="exampleSelectGender">
                    <option value="<?php $post_id;?>" <?php if($post_status=='1')echo "selected";?>>Active</option>
                    <option value="<?php $post_id;?>" <?php if($post_status=='0')echo "selected";?>>InActive</option>
                </select>
            </div>
            <div class="form-group">
                <label for="readUrl" class="file-upload-browse btn btn-primary">File upload</label><br>
                <input type="file" id="readUrl" name="post_image" hidden id="upload">
                <img id="uploadedImage" src="p_img/<?php echo $post_img;?>" alt="Uploaded Image" accept="image/png, image/jpeg" style="display:block;">
            </div>
            <input type="number" value="<?php echo $edite_id;?>" hidden/>
            <button type="submit" name="update_save_btn" class="btn btn-primary mr-2">Update</button>
            <button class="btn btn-light">Cancel</button>
            </form>

<?php

if(isset($_POST['update_save_btn'])){
        $edite_id;
        $post_title     =$_POST['post_title'];
        $post_desc      =$_POST['post_desc'];
        $post_category  =$_POST['post_category'];
        $post_tags      =$_POST['post_tags'];
        $post_status    =$_POST['post_status'];
        $image_name     =$_FILES['post_image']['name'];
        $tmp_name       =$_FILES['post_image']['tmp_name'];
        // if(empty($image_name)){
        $update_sql="UPDATE posts SET p_title='{$post_title}', p_thumnail='{$image_name}', p_desc='{$post_desc}', p_tags='{$post_tags}', p_category='{$post_category}', p_status='{$post_status}' WHERE p_id='{$edite_id}' ";
       if(mysqli_query($db,$update_sql)){
        header("Location:http://localhost/a2z.com/admin/post.php");
        move_uploaded_file($tmp_name,"p_img/".$image_name);
       }
    // }
        

    // database name list

    // p_author
    // p_title
    // p_thumnail
    // p_desc
    // p_date
    // p_comment
    // p_category
    // p_tags
    // p_status






}
   





?>





        </div>
        </div>
    </div>

<?php
}  
include("src/footer.php");
ob_end_flush();
?>


