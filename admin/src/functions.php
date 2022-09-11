<?php
function sub_category($c_id){
$db = mysqli_connect("localhost","root","","fresh_day");
$select_categrory="SELECT * FROM category WHERE is_sub='$c_id'";
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
    <td><?php echo "--".$c_name; ?></td>
    <td class="py-1">
    <img src="c_img/<?php echo $c_image; ?>" alt="image">
    </td>
    <td><?php echo "--".$is_sub; ?></td>
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
}
?>
</tr>
<?php
}
?>


<?php
function parent_sub_category(){
    global $db;
    $select_parent1="SELECT * FROM category WHERE is_sub='0' AND c_status='1'";
    $parent_result1=mysqli_query($db,$select_parent1);
        while($parent_row1=mysqli_fetch_assoc($parent_result1)){
            $category_id=$parent_row1['c_id'];
    ?>
    <option value="<?php echo $category_id; ?>"><?php echo $parent_row1['c_name']; ?></option>
    <?php
}
}
?>
<!-- delete category item -->
<!-- delete category item -->
<?php
// function deleteCategory($c_id,$delete_id){
//     global $db;
//     echo $delete_id;
//     $delete_query="DELETE FROM category WHERE $c_id='{$delete_id}'";
//     if(mysqli_query($db,$delete_query)){
//         echo "data delete successfully";
//     }
// }
?>
<!-- delete category item -->
<!-- delete category item -->




<?php
// global $db;
// function delete_file($delete_id,$file_path){
//     $file_sql="SELECT p_thumnail FROM posts WHERE p_id='$delete_id'";
//     $file_result=mysqli_query($db,$file_sql);
//     $file_row=mysqli_fetch_assoc($file_result);
//     $file_name=$file_row['p_thumnail'];
//     unlink($file_path.$file_name);
// }
?>