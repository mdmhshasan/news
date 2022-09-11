<?php
include("src/config.php");
include("src/header.php");
?>
<?php
$do = $_GET['do'];
global $db;
if ($do === 'show') { 
    $select_users="SELECT * FROM users";
    $select_result=mysqli_query($db,$select_users);
    ?>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h3 class="card-title">Users Table</h3>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gander</th>
                        <th>BioData</th>
                        <th>Post</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
<?php
if(mysqli_num_rows($select_result) > 0){
    while($row=mysqli_fetch_assoc($select_result)){
        $u_id        =$row['u_id'];
        $u_name      =$row['u_name'];
        $u_email     =$row['u_email'];
        $u_phone     =$row['u_phone'];
        $u_gender    =$row['u_gender'];
        $u_biodata   =$row['u_biodata'];
        $u_post      =$row['u_post'];
        $u_thumnail  =$row['u_thumnail'];
        $u_type      =$row['u_type'];
        $u_status    =$row['u_status'];
?>
                <tr>
                    <td><?php echo $u_id;?></td>
                    <td class="py-1">
                    <img src="u_img/<?php echo $u_thumnail;?>" alt="image">
                    </td>
                    <td><?php echo $u_name;?></td>
                    <td><?php echo $u_email;?></td>
                    <td><?php echo $u_phone;?></td>
                    <td><?php if($u_gender==='1') echo 'Mail';else{echo 'female';};?></td>
                    <td><?php echo substr($u_biodata,0,5).'.....';?></td>
                    <td><?php echo $u_post;?></td>
                    <td>
                        <?php 
                           switch($u_type){
                            case '0':
                                echo "Normal";
                             break;
                            case '1':
                                echo "subcriber";
                                break;
                            case '2':
                                echo "<span class='badge bg-primary text-light'>Admin</span>";
                                break;
                                default;
                           }
                        ?>
                     </td>
                    <td><?php if($u_status==='1') echo '<span class="badge bg-success">Active</span>';else echo'<span class="badge bg-danger">InActive</span>';?></td>
                    <td>
                        <a class="btn btn-primary p-2" href="users.php?e_id=<?php echo $u_id;?>&do=edite" style='font-size:18px; font-weight:900;'><ion-icon name="create-sharp"></ion-icon></a>
                        <a class="btn btn-primary p-2" href="delete_user.php?d_id=<?php echo $u_id;?>" style='font-size:18px; font-weight:900;'><ion-icon name="trash-sharp"></ion-icon></a>
                    </td>
                </tr>
        <?php 
        } 
        }
        ?>
                 
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>

<?php

}
if ($do === 'add') {
    if(isset($_POST['submit_btn'])){
        $username=$_POST['username'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $Gender=$_POST['Gender'];
        $Bio_data=$_POST['Bio_data'];
        $password=$_POST['password'];
        
        $image_name=$_FILES['files']['name'];
        $image_tmp=$_FILES['files']['tmp_name'];
        
        $insert_sql="INSERT INTO users(u_name,u_email,u_phone,u_gender,u_biodata,u_thumnail,u_pass) 
                         VALUES('{$username}','{$email}','{$phone}','{$Gender}','{$Bio_data}','{$image_name}','{$password}')";
        $insert_result=mysqli_query($db,$insert_sql);
        if($insert_result){
            move_uploaded_file($image_tmp,"u_img/".$image_name);
        }
    }
?>
<div class="row">
  <div class="col-md-10 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
        <h4 class="card-title">ADD NEW USERS</h4>
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>username</label>
            <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" aria-label="Username">
        </div>

        <div class="form-group">
            <label>user Email</label>
            <input type="text" name="email" class="form-control form-control-lg" placeholder="Username" aria-label="Username">
        </div>

        <div class="form-group">
            <label>user phone</label>
            <input type="text" name="phone" class="form-control form-control-lg" placeholder="Username" aria-label="Username">
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect2">Select Your Gender</label>
            <select name="Gender" class="form-control" id="exampleFormControlSelect2">
                <option value="1">Male</option>
                <option value="0">Female</option>
            </select>
        </div>
        <div class="form-group">
            <label>user password</label>
            <input type="password" name="password" class="form-control form-control-lg" placeholder="Username" aria-label="Username">
        </div>
        <div class="form-group">
            <label for="exampleTextarea1"> Type BioData</label>
            <textarea class="form-control" name="Bio_data" id="exampleTextarea1" rows="4"></textarea>
        </div>
        <div class="form-group">
            <label for="readUrl" class="">File upload</label>
            <input type="file" id="readUrl" name="files" class="form-control btn btn-success"/>
            <img id="uploadedImage" src="#" alt="Uploaded Image" accept="image/png, image/jpeg" style="display:none;">
        </div>
        <button type="submit" name="submit_btn" class="btn btn-primary mr-2">Submit</button>
        <button class="btn btn-light">Cancel</button>
        </form>
    </div>
    </div>
</div>
<?php
}
global $db;
if ($do === 'edite') {
    $e_id=$_GET['e_id'];
    $show_users_sql="SELECT * FROM users WHERE u_id='$e_id'";
    $show_result=mysqli_query($db,$show_users_sql);
    while($show_row=mysqli_fetch_assoc($show_result)){
        $u_id        =$show_row['u_id'];
        $u_name      =$show_row['u_name'];
        $u_email     =$show_row['u_email'];
        $u_phone     =$show_row['u_phone'];
        $u_gender    =$show_row['u_gender'];
        $u_biodata   =$show_row['u_biodata'];
        $u_post      =$show_row['u_post'];
        $u_thumnail  =$show_row['u_thumnail'];
        $u_type      =$show_row['u_type'];
        $u_status    =$show_row['u_status'];
    }
?>
<div class="row">
  <div class="col-md-10 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
        <h4 class="card-title">Update USERS Info</h4>
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>username</label>
                <input type="text" value="<?php echo $u_name;?>" name="username" class="form-control form-control-lg" placeholder="Username" aria-label="Username">
            </div>

            <div class="form-group">
                <label>user Email</label>
                <input type="text" value="<?php echo $u_email;?>"  name="email" class="form-control form-control-lg" placeholder="Username" aria-label="Username">
            </div>

            <div class="form-group">
                <label>user phone</label>
                <input type="text" value="<?php echo $u_phone;?>"  name="phone" class="form-control form-control-lg" placeholder="Username" aria-label="Username">
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect2">Select Your Gender</label>
                <select name="Gender" class="form-control" id="exampleFormControlSelect2">
                    <option value="1" <?php if($u_gender==='1')echo "selected";?>>Male</option>
                    <option value="0" <?php if($u_gender==='0')echo "selected";?>>Female</option>
                </select>
            </div>

            <div class="form-group">
                <label hidden>user password</label>
                <input type="password" hidden value="<?php echo $password;?>"   name="password" class="form-control form-control-lg" placeholder="Username" aria-label="Username">
            </div>

            <div class="form-group">
                <label for="exampleTextarea1"> Type BioData</label>
                <textarea class="form-control" name="Bio_data" id="exampleTextarea1" rows="4"><?php echo $u_biodata;?></textarea>
            </div>

            <div class="form-group">
                <label for="readUrl" class="">File upload</label>
                <input type="file" id="readUrl" name="files" class="form-control btn btn-success"/>
                <img id="uploadedImage" class="mt-3" src="u_img/<?php echo $u_thumnail;?>" alt="Uploaded Image" style="display:block; width:200px;">
            </div>

            <button type="submit" name="Update_btn" class="btn btn-primary mr-2">Submit</button>
            <button class="btn btn-light">Cancel</button>

        </form>
<?php
global $db;
if(isset($_POST['Update_btn'])){
    $e_id=$_GET['e_id'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $Gender=$_POST['Gender'];
    $Bio_data=$_POST['Bio_data'];
    
    $image_name=$_FILES['files']['name'];
    $image_tmp=$_FILES['files']['tmp_name'];
    
    $update_sql="UPDATE users SET u_name='{$username}',u_email='{$email}',u_phone='{$phone}',u_gender='{$Gender}',u_biodata='{$Bio_data}',u_thumnail='{$image_name}' WHERE u_id='$e_id'";
    
    $insert_result=mysqli_query($db,$update_sql);
    if($insert_result){
        move_uploaded_file($image_tmp,"u_img/".$image_name);
    }
}


?>


     </div>
    </div>
</div>
<?php
ob_start();
}

if ($do === 'delete') {
    echo 'delete user informations';
}
ob_end_flush();
?>
<?php
include("src/footer.php");
?>