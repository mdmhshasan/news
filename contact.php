<?php include("src/header.php");?>
<?php include("src/config.php");?>


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="container">
            <nav class="breadcrumb bg-transparent m-0 p-0">
                <a class="breadcrumb-item" href="#">Home</a>
                <span class="breadcrumb-item active">Contact</span>
            </nav>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <!-- Contact Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="bg-light py-2 px-4 mb-3">
                <h3 class="m-0">Contact Us For Any Queries</h3>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="bg-light mb-3" style="padding: 30px;">
                        <h6 class="font-weight-bold">Get in touch</h6>
                        <p>Labore ipsum ipsum rebum erat amet nonumy, nonumy erat justo sit dolor ipsum sed, kasd lorem sit et duo dolore justo lorem stet labore, diam dolor et diam dolor eos magna, at vero lorem elitr</p>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fa fa-2x fa-map-marker-alt text-primary mr-3"></i>
                            <div class="d-flex flex-column">
                                <h6 class="font-weight-bold">Our Office</h6>
                                <p class="m-0">123 Street, New York, USA</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fa fa-2x fa-envelope-open text-primary mr-3"></i>
                            <div class="d-flex flex-column">
                                <h6 class="font-weight-bold">Email Us</h6>
                                <p class="m-0">info@example.com</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-2x fa-phone-alt text-primary mr-3"></i>
                            <div class="d-flex flex-column">
                                <h6 class="font-weight-bold">Call Us</h6>
                                <p class="m-0">+012 345 6789</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="contact-form bg-light mb-3" style="padding: 30px;">
                        <div id="success"></div>
<?php
$success_message='';
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];

$insert_contct_info="INSERT INTO contact(name,email,subject,message) 
                                VALUES('{$username}','{$email}','{$subject}','{$message}')";
$contact_result=mysqli_query($db,$insert_contct_info);
if($contact_result){
   $success_message="<span class='alert alert-success mb-2' style='text-transform:capitalize;'>your message send success!</span>";
} 
}

echo $success_message;
echo "<br><br>";
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <div class="form-row">
        <div class="col-md-6">
            <div class="control-group">
                <input type="text" name="username" class="form-control p-4" id="name" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name" />
                <p class="help-block text-danger"></p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="control-group">
                <input type="email" name="email" class="form-control p-4" id="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" />
                <p class="help-block text-danger"></p>
            </div>
        </div>
    </div>
    <div class="control-group">
        <input type="text" name="subject" class="form-control p-4" id="subject" placeholder="Subject" required="required" data-validation-required-message="Please enter a subject" />
        <p class="help-block text-danger"></p>
    </div>
    <div class="control-group">
        <textarea style="resize:none;border-radius:5px;" class="form-control" name="message" rows="4" id="message" placeholder="Message" required="required" data-validation-required-message="Please enter your message"></textarea>
        <p class="help-block text-danger"></p>
    </div>
    <div>
        <button name="submit" type="submit" style="text-transform:capitalize;letter-spacing: 3px;border-radius:5px;" class="btn btn-primary font-weight-semi-bold px-4" >send</button>
    </div>
</form>






                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <?php include("src/footer.php");?>