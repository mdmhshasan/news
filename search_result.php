<?php
include("src/config.php");
include("src/header.php");
?>


    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">SEARCH RESULT HERE</h3>
                                <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                            </div>
                        </div>
<?php
 
if(isset($_POST['submit'])){
global $db; 
$search_box=$_POST['search_box'];

$select_post="SELECT * FROM posts WHERE p_title LIKE'%$search_box%'";
$post_result=mysqli_query($db,$select_post);
while($row=mysqli_fetch_assoc($post_result)){
    $thumnail=$row['p_thumnail'];
    $p_date=$row['p_date'];
    $p_title=$row['p_title'];
    $p_desc=$row['p_desc'];


?>
<div class="col-lg-6">
    <div class="position-relative mb-3">
        <img class="img-fluid" style="height:200px;width:100%;" src="admin/p_img/<?php echo $thumnail;?>" style="object-fit: cover;">
        <div class="overlay position-relative bg-light">
            <div class="mb-2" style="font-size: 14px;">
                <a href="">Technology</a>
                <span class="px-1">/</span>
                <span><?php echo $p_date;?></span>
            </div>
            <a class="h4" href=""><?php echo substr($p_title,0,60);?></a>
            <p class="m-0"><?php echo substr($p_desc,0,100);?></p>
        </div>
    </div>
</div>
<?php
 }   

}
?>
                        
                    </div>
                    <!-- pagintion code here start here -->
                    <div class="row">
                        <div class="col-12">
                            <nav aria-label="Page navigation">
                              <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                  <a class="page-link" href="#" aria-label="Previous">
                                    <span class="fa fa-angle-double-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                  </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                  <a class="page-link" href="#" aria-label="Next">
                                    <span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                  </a>
                                </li>
                              </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- pagintion code here end here -->
                </div>
<?php
include("right-sidebar.php");
?>
               
            </div>
        </div>
    </div>
    </div>
    <!-- News With Sidebar End -->

<?php
include("src/footer.php");
?>