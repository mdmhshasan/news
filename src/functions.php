<?php
include("config.php");


function sub_menus($c_id){
    global $db; 
    $select_sub_menu="SELECT * FROM category WHERE c_status='1'";
    $select_sub_result=mysqli_query($db,$select_sub_menu);
    if(mysqli_num_rows($select_sub_result) > 0){
        while($sub_menu_row=mysqli_fetch_assoc($select_sub_result)){
        $all_sub_menus= $sub_menu_row['c_name'];
        $c_id=$sub_menu_row['c_id'];
    ?>
   <a href="category.php?id=<?php echo $c_id;?>" class="dropdown-item" style="text-transform:capitalize;"><?php echo $all_sub_menus;?></a>
<?php
}
}
}
?> 









