<?php
include("src/header.php");
include("src/config.php");
?>
    <!-- Navbar End -->
    <!-- Top News Slider Start -->
<div class="container-fluid py-3">
<div class="container">
<div class="owl-carousel owl-carousel-2 carousel-item-3 position-relative">        
<?php
$select_post="SELECT * FROM posts";
$post_result=mysqli_query($db,$select_post);
while($post_row=mysqli_fetch_assoc($post_result)){

$post_title=$post_row['p_title'];
$post_img=$post_row['p_thumnail'];
$post_id=$post_row['p_id'];
?>
<div class="d-flex">
    <img src="admin/p_img/<?php echo $post_img;?>" style="width: 80px; height: 80px; object-fit: cover;">
    <div class="d-flex align-items-center bg-light px-3" style="height: 80px;">
        <a class="text-secondary font-weight-semi-bold" href="single.php?p_id=<?php echo $post_id;?>"><?php echo substr($post_title,0,80);?></a>
    </div>
</div>
<?php
}

?>
</div>
</div>
</div>
</div>
    <!-- Top News Slider End -->

    <!-- Main News Slider Start -->
<div class="container-fluid py-3">
   <div class="container">
     <div class="row">
        <div class="col-lg-8">
            <div class="owl-carousel owl-carousel-2 carousel-item-1 position-relative mb-3 mb-lg-0">
                       

<?php
$select_post="SELECT * FROM posts";
$post_result=mysqli_query($db,$select_post);
while($post_row=mysqli_fetch_assoc($post_result)){

$post_title=$post_row['p_title'];
$post_img=$post_row['p_thumnail'];
$post_date=$post_row['p_date'];
$post_id=$post_row['p_id'];
?>
<div class="position-relative overflow-hidden" style="height: 435px;">
        <img class="img-fluid h-100" src="admin/p_img/<?php echo $post_img;?>" style="object-fit: cover;">
        <div class="overlay">
            <div class="mb-1">
                <a class="text-white" href="">Technology</a>
                <span class="px-2 text-white">/</span>
                <a class="text-white" href=""><?php echo $post_date;?></a>
            </div>
            <a class="h2 m-0 text-white font-weight-bold" href="single.php?p_id=<?php echo $post_id;?>"><?php echo substr($post_title,0,50);?></a>
        </div>
    </div>
<?php
}
?>

    </div>
</div>
<!-- category start code here -->
<div class="col-lg-4">
    <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
    <h3 class="m-0">Categories</h3>
    <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
</div>
    <?php
        global $db;
        $select_category_img="SELECT * FROM category WHERE is_sub='0'";
        $select_category_img_result=mysqli_query($db,$select_category_img);
        while($img_row=mysqli_fetch_assoc($select_category_img_result)){
            $category_img=$img_row['c_image']; 
            $category_name=$img_row['c_name'];
            $category_id=$img_row['c_id'];
    ?>
    <div class="position-relative overflow-hidden mb-3 text-left" style="height: 80px;border-radius:10px;">
        <img class="img-fluid mt-4" src="admin/c_img/<?php echo $category_img;?>" style="margin-left:20px; background-size:cover; background-position:center;" width="50px"height="auto">
        <a href="category.php?id=<?php echo $category_id;?>"
            class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
            <?php echo $category_name;?>
        </a>
    </div>
    <?php
    }
    ?>

                </div>
            </div>
        </div>
    </div>
    <!-- Main News Slider End -->


    <!-- Featured News Slider Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                <h3 class="m-0">Featured</h3>
                <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
            </div>
            <div class="owl-carousel owl-carousel-2 carousel-item-4 position-relative">
                
<?php
$select_post="SELECT * FROM posts ORDER BY p_thumnail";
$post_result=mysqli_query($db,$select_post);
while($post_row=mysqli_fetch_assoc($post_result)){

$post_title=$post_row['p_title'];
$post_img=$post_row['p_thumnail'];
$post_date=$post_row['p_date'];
$post_id=$post_row['p_id'];
?>
<div class="position-relative overflow-hidden" style="height: 300px;">
    <img class="img-fluid w-100 h-100" src="admin/p_img/<?php echo $post_img;?>" style="object-fit: cover;">
    <div class="overlay">
        <div class="mb-1" style="font-size: 13px;">
            <a class="text-white" href="">Technology</a>
            <span class="px-1 text-white">/</span>
            <a class="text-white" href=""><?php echo $post_date;?></a>
        </div>
        <a class="h4 m-0 text-white" href="single.php?p_id=<?php echo $post_id;?>"><?php echo substr($post_title,0,30);?></a>
    </div>
</div>

<?php
}
?>

            </div>
        </div>
    </div>
    </div>
    <!-- Featured News Slider End -->

    <!-- Category News Slider Start -->
<div class="container-fluid">
<div class="container">
    <div class="row">
        <div class="col-lg-6 py-3">
            <div class="bg-light py-2 px-4 mb-3">
                <h3 class="m-0">Business</h3>
            </div>
            <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">

<?php
if(isset($_GET['page4'])){
    $page4=$_GET['page4'];
}else{
    $page4=1;
}
$limit=3;
$offset=($page4-1)*$limit;

$select_post="SELECT * FROM posts ORDER BY p_thumnail LIMIT {$offset},{$limit}";
$post_result=mysqli_query($db,$select_post);
// $total_record4=mysqli_num_rows($post_result);
// $total_pages4=ceil($total_record4/$limit);
while($post_row=mysqli_fetch_assoc($post_result)){
$post_title=$post_row['p_title'];
$post_img=$post_row['p_thumnail'];
$post_date=$post_row['p_date'];
$post_id=$post_row['p_id'];
?>         
<div class="position-relative">
    <img class="img-fluid w-100" src="admin/p_img/<?php echo $post_img;?>" style="object-fit: cover; height:200px; background-size:cover;">
    <div class="overlay position-relative bg-light">
        <div class="mb-2" style="font-size: 13px;">
            <a href="">Technology</a>
            <span class="px-1">/</span>
            <span><?php echo $post_date;?></span>
        </div>
        <a class="h4 m-0" href="single.php?p_id=<?php echo $post_id;?>"><?php echo substr($post_title,0,20);?></a>
    </div>
</div>
        
<?php
}
?>
              
    </div>
</div>

<div class="col-lg-6 py-3">
    <div class="bg-light py-2 px-4 mb-3">
        <h3 class="m-0">Technology</h3>
    </div>
    <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
<?php
if(isset($_GET['page3'])){
    $page3=$_GET['page3'];
}else{
    $page3=1;
}
$limit=3;
$offset=($page3-1)*$limit;

$select_post="SELECT * FROM posts ORDER BY p_thumnail LIMIT {$offset},{$limit}";
$post_result=mysqli_query($db,$select_post);
// $total_record3=mysqli_num_rows($post_result);
// $total_pages3=ceil($total_record3/$limit);
while($post_row=mysqli_fetch_assoc($post_result)){
$post_title=$post_row['p_title'];
$post_img=$post_row['p_thumnail'];
$post_date=$post_row['p_date'];
$post_id=$post_row['p_id'];
?>
<div class="position-relative">
    <img class="img-fluid w-100" src="admin/p_img/<?php echo $post_img;?>" style="object-fit: cover; height:200px; background-size:cover;">
    <div class="overlay position-relative bg-light">
        <div class="mb-2" style="font-size: 13px;">
            <a href="">Technology</a>
            <span class="px-1">/</span>
            <span><?php echo $post_date;?></span>
        </div>
        <a class="h4 m-0" href="single.php?p_id=<?php echo $post_id;?>"><?php echo substr($post_title,0,20);?></a>
    </div>
</div>
<?php
}
?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
       
    <!-- Category News Slider End -->
    <div class="text-center d-flex justify-content-center">
<!-- bissinees pagintion start -->
        <nav aria-label="Page navigation example" class="mr-4">
            <?php     
            echo ' <ul class="pagination"> ';
            if($page4>1){
                echo '<li class="page-item"><a class="page-link" href="index.php?page4='.($page4 - 1).'">Previous</a></li>';
            }
$select_post="SELECT * FROM posts";
$post_result=mysqli_query($db,$select_post);
$total_record=mysqli_num_rows($post_result);
$total_pages4=ceil($total_record/$limit);
            for($i=0;$i<$total_pages4;$i++){
                echo "<li class='page-item'><a class='page-link' href='index.php?page4={$i}'>{$i}</a></li>";
            }
            if($total_pages4>$page4){
                echo '<li class="page-item"><a class="page-link" href="index.php?page4='.($page4 + 1).'">Next</a></li>';
            }
            echo'</ul>';
            ?>
        </nav>
<!-- bissness pagintion end -->
<!-- technology pagintion start -->
        <nav aria-label="Page navigation example" class="mr-4">
            <?php   
            if($page3>1){
                echo '<li class="page-item"><a class="page-link" href="index.php?page4='.($page3 - 1).'">Previous</a></li>';
            }  
            echo '<ul class="pagination">';
$select_post="SELECT * FROM posts";
$post_result=mysqli_query($db,$select_post);
$total_record=mysqli_num_rows($post_result);
$total_pages3=ceil($total_record/$limit);
            for($i=0;$i<$total_pages3;$i++){
                echo "<li class='page-item'><a class='page-link' href='index.php?page2={$i}'>{$i}</a></li>";
            }
            if($total_pages3>$page3){
                echo '<li class="page-item"><a class="page-link" href="index.php?page4='.($page4 + 1).'">Next</a></li>';
            }
            echo'</ul> ';
            ?>
        </nav>
<!-- technology pagintion end -->
       </div>
    <!-- Category News Slider Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 py-3">
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Entertainment</h3>
                    </div>
                    <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                        
<?php
if(isset($_GET['page2'])){
    $page2=$_GET['page2'];
}else{
    $page2=1;
}
$limit=3;
$offset=($page2-1)*$limit;

$select_post="SELECT * FROM posts ORDER BY p_thumnail LIMIT {$offset},{$limit}";
$post_result=mysqli_query($db,$select_post);
// $total_record2=mysqli_num_rows($post_result);
// $total_pages2=ceil($total_record2/$limit);
if(mysqli_num_rows($post_result)>0){
while($post_row=mysqli_fetch_assoc($post_result)){

$post_title=$post_row['p_title'];
$post_img=$post_row['p_thumnail'];
$post_date=$post_row['p_date'];
$post_id=$post_row['p_id'];
?>        
<div class="position-relative">
    <img class="img-fluid w-100" src="admin/p_img/<?php echo $post_img;?>" style="object-fit: cover; height:200px; background-size:cover;">
    <div class="overlay position-relative bg-light">
        <div class="mb-2" style="font-size: 13px;">
            <a href="">Technology</a>
            <span class="px-1">/</span>
            <span><?php echo $post_date;?></span>
        </div>
        <a class="h4 m-0" href="single.php?p_id=<?php echo $post_id;?>"><?php echo substr($post_title,0,20);?></a>
    </div>
</div>
<?php
}
}
?>
</div>
</div>
<div class="col-lg-6 py-3">
    <div class="bg-light py-2 px-4 mb-3">
        <h3 class="m-0">Sports</h3>
    </div>
    <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                        
<?php

if(isset($_GET['page'])){
    $page=$_GET['page'];
}else{
    $page=1;
}
$limit=3;
$offset=($page-1)*$limit;

$select_post="SELECT * FROM posts ORDER BY p_thumnail LIMIT {$offset},{$limit}";
$post_result=mysqli_query($db,$select_post);
// $total_record=mysqli_num_rows($post_result);
// $total_pages=ceil($total_record/$limit);
while($post_row=mysqli_fetch_assoc($post_result)){

$post_title=$post_row['p_title'];
$post_img=$post_row['p_thumnail'];
$post_date=$post_row['p_date'];
$post_id=$post_row['p_id'];
?>            
<div class="position-relative">
    <img class="img-fluid w-100" src="admin/p_img/<?php echo $post_img;?>" style="object-fit: cover; height:200px; background-size:cover;">
    <div class="overlay position-relative bg-light">
        <div class="mb-2" style="font-size: 13px;">
            <a href="">Technology</a>
            <span class="px-1">/</span>
            <span><?php echo $post_date;?></span>
        </div>
        <a class="h4 m-0" href="single.php?p_id=<?php echo $post_id;?>"><?php echo substr($post_title,0,20);?></a>
    </div>
</div>

<?php
}
?>
                  

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
        
    <!-- Category News Slider End -->
    <div class="text-center d-flex justify-content-center">
<!-- entertainment pagintions -->
        <nav aria-label="Page navigation example" class="mr-4">
            <?php
             if($page2>1){
                echo '<li class="page-item"><a class="page-link" href="index.php?page4='.($page2 - 1).'">Previous</a></li>';
            }     
            echo ' <ul class="pagination">';
$select_post="SELECT * FROM posts";
$post_result=mysqli_query($db,$select_post);
$total_record=mysqli_num_rows($post_result);
$total_pages2=ceil($total_record/$limit);
            for($i=0;$i<$total_pages2;$i++){
                echo "<li class='page-item'><a class='page-link' href='index.php?page2={$i}'>{$i}</a></li>";
            }
            if($total_pages2>$page2){
                echo '<li class="page-item"><a class="page-link" href="index.php?page4='.($page2 + 1).'">Next</a></li>';
            }
            echo'</ul>';
            ?>
        </nav>
<!-- entertainment pagintions end -->
<!-- sports pagintions start -->
        <nav aria-label="Page navigation example" class="mr-4">
            <?php 
                if($page>1){
                    echo '<li class="page-item"><a class="page-link" href="index.php?page4='.($page - 1).'">Previous</a></li>';
                }
            echo ' <ul class="pagination"> ';
$select_post="SELECT * FROM posts";
$post_result=mysqli_query($db,$select_post);
$total_record=mysqli_num_rows($post_result);
$total_pages1=ceil($total_record/$limit);
            for($i=0;$i<$total_pages1;$i++){
                echo "<li class='page-item'><a class='page-link' href='index.php?page={$i}'>{$i}</a></li>";
            }
            if($total_pages1>$page){
                echo '<li class="page-item"><a class="page-link" href="index.php?page4='.($page + 1).'">Next</a></li>';
            }
            echo'</ul>';
            ?>
            </nav>
            
<!-- sports pagintions end -->
       </div>

    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">Popular</h3>
                                <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                            </div>
                        </div>
<div class="col-lg-6">
 <?php
$select_post="SELECT * FROM posts ORDER BY p_id AND P_thumnail LIMIT 1";
$post_result=mysqli_query($db,$select_post);
while($post_row=mysqli_fetch_assoc($post_result)){

$post_title=$post_row['p_title'];
$post_img=$post_row['p_thumnail'];
$post_date=$post_row['p_date'];
$p_desc=$post_row['p_desc'];
$post_id=$post_row['p_id'];
?>
<div class="position-relative mb-3">
<img class="img-fluid w-100" src="admin/p_img/<?php echo $post_img;?>" style="object-fit: cover;height:200px; background-size:cover;">
<div class="overlay position-relative bg-light">
    <div class="mb-2" style="font-size: 14px;">
        <a href="">Technology</a>
        <span class="px-1">/</span>
        <span><?php echo $post_date;?></span>
    </div>
    <a class="h4" href="single.php?p_id=<?php echo $post_id;?>"><?php echo substr($post_title,0,50);?></a>
    <p class="m-0"><?php echo substr($p_desc,0,100);?></p>
</div>
</div>    
<?php
}
?>
<?php
$select_post="SELECT * FROM posts ORDER BY p_id AND P_thumnail LIMIT 2";
$post_result=mysqli_query($db,$select_post);
while($post_row=mysqli_fetch_assoc($post_result)){

$post_title=$post_row['p_title'];
$post_img=$post_row['p_thumnail'];
$post_date=$post_row['p_date'];
$p_desc=$post_row['p_desc'];
$post_id=$post_row['p_id'];
?>
<div class="d-flex mb-3">
    <img src="admin/p_img/<?php echo $post_img;?>"
        style="width: 100px; height: 100px; object-fit: cover; background-size:cover;">
    <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
        style="height: 100px;">
        <div class="mb-1" style="font-size: 13px;">
            <a href="">Technology</a>
            <span class="px-1">/</span>
            <span><?php echo $post_date;?></span>
        </div>
        <a class="h6 m-0" href="single.php?p_id=<?php echo $post_id;?>"><?php echo substr($p_desc,0,80);?></a>
    </div>
</div> 
      
<?php
}
?>
                
</div>
<div class="col-lg-6">
<?php
$select_post="SELECT * FROM posts ORDER BY p_id AND P_thumnail LIMIT 1";
$post_result=mysqli_query($db,$select_post);
while($post_row=mysqli_fetch_assoc($post_result)){

$post_title=$post_row['p_title'];
$post_img=$post_row['p_thumnail'];
$post_date=$post_row['p_date'];
$p_desc=$post_row['p_desc'];
$post_id=$post_row['p_id'];
?>
<div class="position-relative mb-3">
<img class="img-fluid w-100" src="admin/p_img/<?php echo $post_img;?>" style="object-fit: cover;height:200px; background-size:cover;">
<div class="overlay position-relative bg-light">
    <div class="mb-2" style="font-size: 14px;">
        <a href="">Technology</a>
        <span class="px-1">/</span>
        <span><?php echo $post_date;?></span>
    </div>
    <a class="h4" href="single.php?p_id=<?php echo $post_id;?>"><?php echo substr($post_title,0,50);?></a>
    <p class="m-0"><?php echo substr($p_desc,0,100);?></p>
</div>
</div>    
<?php
}
?>
<?php
$select_post="SELECT * FROM posts ORDER BY p_id AND P_thumnail LIMIT 2";
$post_result=mysqli_query($db,$select_post);
while($post_row=mysqli_fetch_assoc($post_result)){

$post_title=$post_row['p_title'];
$post_img=$post_row['p_thumnail'];
$post_date=$post_row['p_date'];
$p_desc=$post_row['p_desc'];
$post_id=$post_row['p_id'];
?>
<div class="d-flex mb-3">
    <img src="admin/p_img/<?php echo $post_img;?>"
        style="width: 100px; height: 100px; object-fit: cover; background-size:cover;">
    <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
        style="height: 100px;">
        <div class="mb-1" style="font-size: 13px;">
            <a href="">Technology</a>
            <span class="px-1">/</span>
            <span><?php echo $post_date;?></span>
        </div>
        <a class="h6 m-0" href="single.php?p_id=<?php echo $post_id;?>"><?php echo substr($p_desc,0,80);?></a>
    </div>
</div> 
      
<?php
}
?>
</div>
</div>
<div class="row">
<div class="col-12">
    <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
        <h3 class="m-0">Latest</h3>
        <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
    </div>
</div>
<div class="col-lg-6">
<?php
$select_post="SELECT * FROM posts ORDER BY p_id AND P_thumnail LIMIT 1";
$post_result=mysqli_query($db,$select_post);
while($post_row=mysqli_fetch_assoc($post_result)){

$post_title=$post_row['p_title'];
$post_img=$post_row['p_thumnail'];
$post_date=$post_row['p_date'];
$p_desc=$post_row['p_desc'];
$post_id=$post_row['p_id'];
?>
<div class="position-relative mb-3">
<img class="img-fluid w-100" src="admin/p_img/<?php echo $post_img;?>" style="object-fit: cover;height:200px; background-size:cover;">
<div class="overlay position-relative bg-light">
    <div class="mb-2" style="font-size: 14px;">
        <a href="">Technology</a>
        <span class="px-1">/</span>
        <span><?php echo $post_date;?></span>
    </div>
    <a class="h4" href="single.php?p_id=<?php echo $post_id;?>"><?php echo substr($post_title,0,50);?></a>
    <p class="m-0"><?php echo substr($p_desc,0,100);?></p>
</div>
</div>    
<?php
}
?>
<?php
$select_post="SELECT * FROM posts ORDER BY p_id AND P_thumnail LIMIT 2";
$post_result=mysqli_query($db,$select_post);
while($post_row=mysqli_fetch_assoc($post_result)){

$post_title=$post_row['p_title'];
$post_img=$post_row['p_thumnail'];
$post_date=$post_row['p_date'];
$p_desc=$post_row['p_desc'];
$post_id=$post_row['p_id'];
?>
<div class="d-flex mb-3">
    <img src="admin/p_img/<?php echo $post_img;?>"
        style="width: 100px; height: 100px; object-fit: cover; background-size:cover;">
    <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
        style="height: 100px;">
        <div class="mb-1" style="font-size: 13px;">
            <a href="">Technology</a>
            <span class="px-1">/</span>
            <span><?php echo $post_date;?></span>
        </div>
        <a class="h6 m-0" href="single.php?p_id=<?php echo $post_id;?>"><?php echo substr($p_desc,0,80);?></a>
    </div>
</div> 
      
<?php
}
?>
</div>

<div class="col-lg-6">
<?php
$select_post="SELECT * FROM posts ORDER BY p_id AND P_thumnail LIMIT 1";
$post_result=mysqli_query($db,$select_post);
while($post_row=mysqli_fetch_assoc($post_result)){

$post_title=$post_row['p_title'];
$post_img=$post_row['p_thumnail'];
$post_date=$post_row['p_date'];
$p_desc=$post_row['p_desc'];
$post_id=$post_row['p_id'];
?>
<div class="position-relative mb-3">
<img class="img-fluid w-100" src="admin/p_img/<?php echo $post_img;?>" style="object-fit: cover;height:200px; background-size:cover;">
<div class="overlay position-relative bg-light">
    <div class="mb-2" style="font-size: 14px;">
        <a href="">Technology</a>
        <span class="px-1">/</span>
        <span><?php echo $post_date;?></span>
    </div>
    <a class="h4" href="single.php?p_id=<?php echo $post_id;?>"><?php echo substr($post_title,0,50);?></a>
    <p class="m-0"><?php echo substr($p_desc,0,100);?></p>
</div>
</div>    
<?php
}
?>
<?php
$select_post="SELECT * FROM posts ORDER BY p_id AND P_thumnail LIMIT 2";
$post_result=mysqli_query($db,$select_post);
while($post_row=mysqli_fetch_assoc($post_result)){

$post_title=$post_row['p_title'];
$post_img=$post_row['p_thumnail'];
$post_date=$post_row['p_date'];
$p_desc=$post_row['p_desc'];
$post_id=$post_row['p_id'];
?>
<div class="d-flex mb-3">
    <img src="admin/p_img/<?php echo $post_img;?>"
        style="width: 100px; height: 100px; object-fit: cover; background-size:cover;">
    <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
        style="height: 100px;">
        <div class="mb-1" style="font-size: 13px;">
            <a href="">Technology</a>
            <span class="px-1">/</span>
            <span><?php echo $post_date;?></span>
        </div>
        <a class="h6 m-0" href="single.php?p_id=<?php echo $post_id;?>"><?php echo substr($p_desc,0,80);?></a>
    </div>
</div> 
      
<?php
}
?>

        </div>
    </div>
</div>
<?php include("right-sidebar.php");?>
</div>
</div>
</div>
</div>
    <!-- News With Sidebar End -->
<?php
include("src/footer.php");
?>