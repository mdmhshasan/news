<?php
include("config.php");
include("functions.php");
?>
<nav class="navbar navbar-expand-lg bg-light navbar-light py-2 py-lg-0 px-lg-5">
            <a href="" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">News</span>Room</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
           
            <div class="navbar-nav mr-auto py-0">
            <a href="index.php" class="nav-item nav-link active">Home</a>
             <?php
                global $db;
                $select_category="SELECT * FROM category WHERE is_sub='0'";
                $select_result=mysqli_query($db,$select_category);
                if(mysqli_num_rows($select_result) > 0){
                    while($menu_row=mysqli_fetch_assoc($select_result)){
                       $all_menus= $menu_row['c_name'];                       
                       $c_id= $menu_row['c_id'];                       
            ?>
                <a href="category.php?id=<?php echo $c_id;?>" class="nav-item nav-link" style="text-transform:capitalize;"><?php echo $all_menus;?></a>
                
                 <?php
                    }
                }
                ?>
                 <div class="nav-item dropdown">
                    <a href="category.php?id=<?php echo $c_id;?>" class="nav-link dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <?php 
                        sub_menus($c_id);
                        ?>
                    </div>
                </div>                    
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                </div>

<!-- post saerch input here start -->
<form action="search_result.php" method="post">
    <div class="input-group ml-auto" style="width: 100%; max-width: 300px;">
        <input type="text" id="search_box" name="search_box" class="form-control" placeholder="Keyword">
        <div class="input-group-append">
            <button name="submit" id="seach_btn" type="submit" class="input-group-text text-secondary"><i class="fa fa-search"></i></button>
        </div>
    </div>
</form>
 <!-- post saerch input here start -->


            </div>
        </nav>