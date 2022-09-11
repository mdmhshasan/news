<?php include 'src/header.php'; ?>
<?php include 'src/config.php'; ?>
<?php include 'src/functions.php'; ?>
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Category Pages</h3>
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                      <a class="dropdown-item" href="#">January - March</a>
                      <a class="dropdown-item" href="#">March - June</a>
                      <a class="dropdown-item" href="#">June - August</a>
                      <a class="dropdown-item" href="#">August - November</a>
                    </div>
                  </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
      
          <div class="row">

          <!-- dsljflksdjfdsjklfjsdklfjlkdsajflksdajfs -->
<?php
global $db;
if(isset($_GET['e_id'])){
  $e_id=$_GET['e_id'];
  $update_select="SELECT * FROM category WHERE c_id='$e_id'";
  $update_result=mysqli_query($db,$update_select);
  while($update_row=mysqli_fetch_assoc($update_result)){
    $c_name=$update_row['c_name'];
    $c_images=$update_row['c_image'];
    $is_sub=$update_row['is_sub'];
    $c_status=$update_row['c_status'];
  }
  ?>
  <!-- update category code start here  -->

<div class="col-md-5 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Update Category</h4>

      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    
      <div class="form-group">
      <input type="text" name="category_name_update" value="<?php echo $c_name;?>" class="form-control form-control-lg" placeholder="category name" aria-label="Username">
      </div>

      <div class="form-group">
        <label for="exampleFormControlSelect2" class="text-success" >Select Parent Category</label>
        <select class="form-control" id="exampleFormControlSelect2" name="update_category_name">
          <!-- <option selected>select parent</option> -->
<?php
global $db;
$select_parent="SELECT * FROM category WHERE is_sub='0'";
$parent_result=mysqli_query($db,$select_parent);
    while($parent_row=mysqli_fetch_assoc($parent_result)){
      $is_sub_math=$parent_row['is_sub'];
      $id=$parent_row['c_id'];
?>
<option value="<?php echo $id;?>" <?php if($is_sub==$id){echo "selected"; }?>><?php echo $parent_row['c_name'];?></option>
<?php
}
?>
        </select>
      </div>

      <div class="form-group">
        <label for="exampleFormControlSelect3">Small select</label>
        <select class="form-control form-control-sm" name="update_status" id="exampleFormControlSelect3">
          <option value="1" <?php if($c_status=='1') echo "selected";?>>Active</option>
          <option value="0" <?php if($c_status=='0') echo "selected";?>>InActive</option>
        </select>
      </div>

      <div class="form-group">
      <input type="file" name="update_image" class="form-control form-control-lg" placeholder="category name" aria-label="Username">
      </div>
      <?php
      global $db;
      $select_image="SELECT * FROM category";
      $image_result=mysqli_query($db,$select_image);
      $sigle_image=mysqli_fetch_assoc($image_result);
      $single_img=$sigle_image['c_image'];
      if(empty(!$c_images)){
       ?>
       <img src="c_img/<?php echo $c_images;?>" width='100'/>
      <?php
      }
      ?>

      <div class="from-group">
      <button type="submit" name="update_btn" class="btn btn-success mr-2">Submit</button>
      <button class="btn btn-light">Cancel</button>
      </div>
    </form>
    <?php
     global $db;
if(isset($_POST['update_btn'])){
  $update_id=$_GET['e_id'];
  echo "hello how are you babay";
  $category_name_update=$_POST['category_name_update'];
  $update_category_name=$_POST['update_category_name'];
  $update_status=$_POST['update_status'];
  // files code start here
  $update_image=$_FILES['update_image'];

  // $file_name=$_FILES['update_image']['name'];
  // $tmp_name=$_FILES['update_image']['tmp_name'];
  // $file_type=$_FILES['update_image']['type'];
  // $file_size=$_FILES['update_image']['size'];

  // $file_extention=explode('.',$file_name);
  // $file_end=end($file_extention);
  // $file_case=strtoupper($file_end);
  // $new_file_name=rand().$file_name;
  
  // move_uploaded_file($tmp_name,"c_img/$new_file_name");
  // files code start here
  // if(empty($file_name)){
      $update_category="UPDATE SET c_name='{category_name_update}',c_image='img.png',is_sub='{$update_category_name}',c_status='{$update_status}' WHERE c_id='$update_id'";
      $update_c_result=mysqli_query($db,$update_category);
      if($update_c_result){
        echo "update successfull";
      }else{
        die("data not updated".mysqli_connect_error());
      }
  // }

}
?>
    </div>
  </div>
</div>

<?php
}else{
?>
<div class="col-md-5 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add Category</h4>
        <!------------------------------- insert query starthere---------- -->
        <!------------------------------- insert query starthere---------- -->
        <!------------------------------- insert query starthere---------- -->
        
        <?php
        $error_message="";
        strtoupper($error_message);
if(isset($_POST['submite_btn'])){
  $category_name=$_POST['category_name'];
  $parent_name=$_POST['parent_name'];
  $category_status=$_POST['category_status'];

    $file_name=$_FILES['category_img']['name'];
    $tmp_name=$_FILES['category_img']['tmp_name'];
    $file_type=$_FILES['category_img']['type'];
    $file_size=$_FILES['category_img']['size'];

      $file_extention=explode('.',$file_name);
      $file_end=end($file_extention);
      $file_case=strtoupper($file_end);
      $new_file_name=rand().$file_name;
      $file_extention_type=array('jpg','png','gif','jpeg','mp4');
      // if(in_array($new_file_name,$file_extention_type)){
      move_uploaded_file($tmp_name,"c_img/$new_file_name");
      $sql="INSERT INTO category(c_name,c_image,c_status,is_sub) 
      VALUES ('{$category_name}','$new_file_name','{$category_status}','{$parent_name}')";
      if(mysqli_query($db,$sql)){
        $error_message="insert successfull";
      }
      // }else{
      //   $error_message="this file type is in currect";
      // }
}

?>
<!------------------------------- insert query starthere---------- -->
<!------------------------------- insert query starthere---------- -->
<!------------------------------- insert query starthere---------- -->

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
        <input type="text" name="category_name" class="form-control form-control-lg" placeholder="category name" aria-label="Username">
        </div>

        <div class="form-group">
          <label for="exampleFormControlSelect2" class="text-success" >Select Parent Category</label>
          <select class="form-control" id="exampleFormControlSelect2" name="parent_name">
            <option selected>select parent</option>
<?php
parent_sub_category();
?>
          </select>
        </div>

        <div class="form-group">
          <label for="exampleFormControlSelect3">Small select</label>
          <select class="form-control form-control-sm" name="category_status" id="exampleFormControlSelect3">
            <option value="0">InActive</option>
            <option value="1" selected>Active</option>
          </select>
        </div>

        <div class="form-group">
        <!-- <input type="file" placeholder="category name"> -->
        <input type='file' id="readUrl" name="category_img" class="form-control form-control-lg"  aria-label="Username">
        <img style="width:300px; height:300px" id="uploadedImage" src="#" alt="Uploaded Image" style="display:none;">
      <div class="error_message alert alert-danger text-red" role="alert" style="font-size:20px;"><?php echo strtoupper($error_message); ?></div>
      </div>

        <div class="from-group">
        <button type="submit" name="submite_btn" class="btn btn-primary mr-2">Submit</button>
        <button class="btn btn-light">Cancel</button>
        </div>
    </form>
      </div>
    </div>
  </div>
<?php
}
?>
<!-- ---------------------------table start here------------------------------->
<!-- ---------------------------table start here------------------------------->
<!-- ---------------------------table start here------------------------------->
<div class="col-lg-7 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Category Table</h4>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>
                id
              </th>
              <th>
                name
              </th>
              <th>
                img
              </th>
              <th>
                is_sub
              </th>
              <th>
                status
              </th>
              <th>
                Action
              </th>
            </tr>
          </thead>
          <tbody>
<!-- php select code start here -->
<?php
// $db = mysqli_connect("localhost","root","","fresh_day");
global $db;
$select_categrory="SELECT * FROM category WHERE is_sub='0'";
$c_result=mysqli_query($db,$select_categrory);
    while($c_row=mysqli_fetch_assoc($c_result)){
      $c_id=$c_row['c_id'];
      $c_name=$c_row['c_name'];
      $c_image=$c_row['c_image'];
      $c_status=$c_row['c_status'];
      $is_sub=$c_row['is_sub'];
?>
<!-- php select code start here -->
<!-- php select code start here -->
        <tr>
          <td><?php echo $c_id; ?></td>
          <td><?php echo $c_name; ?></td>
          <td class="py-1">
            <img src="c_img/<?php echo $c_image; ?>" alt="image">
          </td>
          <td><?php echo $is_sub; ?></td>
          <td>
            <?php
            if($c_status=='1'){
              echo "<span class='btn btn-success p-1'>Active</span>";
            }else{ echo "<span class='btn btn-danger p-1'>InActive</span>";}
            ?>
          </td>
          <td>
            <span>
              <a href="category.php?e_id=<?php echo $c_id; ?>" class="btn btn-success p-1"><ion-icon name="pencil"></ion-icon></a>
              <a href="category.php?d_id=<?php echo $c_id; ?>" class="btn btn-danger p-1"><ion-icon name="trash"></ion-icon></a>
            </span>
          </td>
<?php
sub_category($c_id);
  }
?>    
</tr>
<!-- select category ending here -->
<!-- delete category item code start here -->
<?php
$conn=mysqli_connect("localhost","root","","fresh_day");
if(isset($_GET['d_id'])){
  $delete_id=$_GET['d_id'];

  $delete_query="DELETE FROM category WHERE c_id='$delete_id'";
    if(mysqli_query($conn,$delete_query)){
      echo "data delete successfully";

    }
  }
  
  ?>
<!-- delete category item code end here -->
<!-- select category ending here -->
                        

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
           
          </div>
         
<?php include 'src/footer.php'; ?>
