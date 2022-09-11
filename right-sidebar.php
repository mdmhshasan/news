<?php
include("src/config.php");
?>
<div class="col-lg-4 pt-3 pt-lg-0">
                    <!-- Social Follow Start -->
<div class="pb-3">
    <div class="bg-light py-2 px-4 mb-3">
        <h3 class="m-0">Follow Us</h3>
    </div>
    <div class="d-flex mb-3">
        <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2"
            style="background: #39569E;">
            <small class="fab fa-facebook-f mr-2"></small><small>12,345 Fans</small>
        </a>
        <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2"
            style="background: #52AAF4;">
            <small class="fab fa-twitter mr-2"></small><small>12,345 Followers</small>
        </a>
    </div>
    <div class="d-flex mb-3">
        <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2"
            style="background: #0185AE;">
            <small class="fab fa-linkedin-in mr-2"></small><small>12,345 Connects</small>
        </a>
        <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2"
            style="background: #C8359D;">
            <small class="fab fa-instagram mr-2"></small><small>12,345 Followers</small>
        </a>
    </div>
    <div class="d-flex mb-3">
        <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2"
            style="background: #DC472E;">
            <small class="fab fa-youtube mr-2"></small><small>12,345 Subscribers</small>
        </a>
        <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2"
            style="background: #1AB7EA;">
            <small class="fab fa-vimeo-v mr-2"></small><small>12,345 Followers</small>
        </a>
    </div>
</div>
<!-- Social Follow End -->

<!-- Newsletter Start -->
<div class="pb-3">
    <div class="bg-light py-2 px-4 mb-3">
        <h3 class="m-0">Newsletter</h3>
    </div>
    <div class="bg-light text-center p-4 mb-3">
        <p>Aliqu justo et labore at eirmod justo sea erat diam dolor diam vero kasd</p>
        <div class="input-group" style="width: 100%;">
            <input type="text" class="form-control form-control-lg" placeholder="Your Email">
            <div class="input-group-append">
                <button class="btn btn-primary">Sign Up</button>
            </div>
        </div>
        <small>Sit eirmod nonumy kasd eirmod</small>
    </div>
</div>
<!-- Newsletter End -->

                    <!-- Ads Start -->
<div class="mb-3 pb-3">
<?php
$select_post="SELECT * FROM posts ORDER BY P_thumnail LIMIT 1";
$post_result=mysqli_query($db,$select_post);
$post_row=mysqli_fetch_assoc($post_result);
$post_img=$post_row['p_thumnail'];
echo "<a href=''><img class='img-fluid' src='admin/p_img/{$post_img}' ></a>";

?>  
</div>
<!-- Ads End -->
<!-- Popular News Start -->
<div class="pb-3">
    <div class="bg-light py-2 px-4 mb-3">
        <h3 class="m-0">Tranding</h3>
    </div>
<?php
$select_post="SELECT * FROM posts ORDER BY p_id AND P_thumnail LIMIT 5";
$post_result=mysqli_query($db,$select_post);
while($post_row=mysqli_fetch_assoc($post_result)){
$p_id=$post_row['p_id'];
$post_title=$post_row['p_title'];
$post_img=$post_row['p_thumnail'];
$post_date=$post_row['p_date'];
$p_desc=$post_row['p_desc'];
?>
<div class="d-flex mb-3">
    <img src="admin/p_img/<?php echo $post_img;?>"
        style="width: 100px; height: 100px; object-fit: cover; background-size:cover;border-radius:10px;padding-left:5px;">
    <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
        style="height: 100px;">
        <div class="mb-1" style="font-size: 13px;">
            <a href="">Technology</a>
            <span class="px-1">/</span>
            <span><?php echo $post_date;?></span>
        </div>
        <a class="h6 m-0" href="single.php?p_id=<?php echo $p_id;?>"><?php echo substr($p_desc,0,50);?></a>
    </div>
</div> 
      
<?php
}
?>
</div>
<!-- Popular News End -->

<!-- Tags Start -->
<div class="pb-3">
    <div class="bg-light py-2 px-4 mb-3">
        <h3 class="m-0">Tags</h3>
    </div>
    <div class="d-flex flex-wrap m-n1">
        <a href="" class="btn btn-sm btn-outline-secondary m-1">Politics</a>
        <a href="" class="btn btn-sm btn-outline-secondary m-1">Business</a>
        <a href="" class="btn btn-sm btn-outline-secondary m-1">Corporate</a>
        <a href="" class="btn btn-sm btn-outline-secondary m-1">Sports</a>
        <a href="" class="btn btn-sm btn-outline-secondary m-1">Health</a>
        <a href="" class="btn btn-sm btn-outline-secondary m-1">Education</a>
        <a href="" class="btn btn-sm btn-outline-secondary m-1">Science</a>
        <a href="" class="btn btn-sm btn-outline-secondary m-1">Technology</a>
        <a href="" class="btn btn-sm btn-outline-secondary m-1">Foods</a>
        <a href="" class="btn btn-sm btn-outline-secondary m-1">Entertainment</a>
        <a href="" class="btn btn-sm btn-outline-secondary m-1">Travel</a>
        <a href="" class="btn btn-sm btn-outline-secondary m-1">Lifestyle</a>
    </div>
</div>
<!-- Tags End -->
</div>