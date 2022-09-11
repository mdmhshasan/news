<?php
include("config.php");
global $db;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Fresh day</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <link rel="icon" type="image/x-icon" href="free-bootstrap-magazine-template.jpg" />
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center bg-light px-lg-5">
            <div class="col-12 col-md-8">
                <div class="d-flex justify-content-between">
                    <div class="bg-primary text-white text-center py-2" style="width: 100px;">Tranding</div>
                    <div class="owl-carousel owl-carousel-1 tranding-carousel position-relative d-inline-flex align-items-center ml-3"
                        style="width: calc(100% - 100px); padding-left: 90px;">
<?php
$select_trand_news="SELECT * FROM posts ORDER BY p_title";
$result=mysqli_query($db,$select_trand_news);
if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_assoc($result)){
    $first_news=$row['p_title'];
?>
<div class="text-truncate">
    <a class="text-secondary" style="text-transform:capitalize;" href=""><?php echo $first_news;?></a>
    </div>
<div class="text-truncate">
    <a class="text-secondary" style="text-transform:capitalize;" href=""><?php echo $first_news;?></a>
</div>

<?php
   }
}
?>

                    </div>
                </div>
            </div>
            <div class="col-md-4 text-right d-none d-md-block">
                <?php
                 echo date("F j, Y, g:i a");
                ?>
            </div>
        </div>
        <div class="row align-items-center py-2 px-lg-5">
            <div class="col-lg-4">
                <a href="index.php" class="navbar-brand d-none d-lg-block">
                    <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">News</span>Room</h1>
                </a>
            </div>
            <div class="col-lg-8 text-center text-lg-right" style="display:none;">
                <img class="img-fluid" src="img/ads-700x70.jpg">
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid p-0 mb-3">
       
       <?php
       include("src/menu.php");
       ?>
    </div>