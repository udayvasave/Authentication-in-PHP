<?php
session_start();
if (isset($_SESSION['seller_id'])) {
     header('location:./');   
 } 
?> 
<!doctype html>
<html lang="en">

<head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Login</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="images/favicon.ico" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="css/typography.css">
      <!-- Style CSS -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="css/responsive.css">
   </head>
   <body>
      <!-- loader Start -->
     <!--  <div id="loading">
         <div id="loading-center">
         </div>
      </div> -->
      <!-- loader END -->
        <!-- Sign in Start -->
        <section class="sign-in-page">
            <div class="container bg-white mt-5 p-0">
                <div class="row no-gutters">
                    <div class="col-sm-6 align-self-center">
                        <div class="sign-in-from">
                            <h1 class="mb-0 dark-signin">Sign in</h1>
                            <p>Enter your email address and password to access admin panel.</p>
                            
                                <div class="form-group">
                                   
                                    <input type="email" class="form-control mb-0 username" id="exampleInputEmail1" placeholder="Enter Mobile or Email">
                                </div>
                                <div class="form-group">
                                   
                                    
                                    <input type="password" class="form-control mb-0 password" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="d-inline-block w-100">
                                    <a href="#" class="float-right">Forgot password?</a>
                                    <button type="submit" class="btn btn-primary login_btn">Sign in</button>
                                </div>
                              
                           
                        </div>
                    </div>
                    <div class="col-sm-6 text-center">
                        <div class="sign-in-detail text-white">
                            <a class="sign-in-logo mb-5" href="#">
                              <!-- <img src="images/logo-white.png" class="img-fluid" alt="logo"> -->
                            </a>
                            <!-- <div class="slick-slider11" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true" data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1" data-items-mobile-sm="1" data-margin="0">
                                <div class="item">
                                    <img src="images/login/1.png" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">Manage your orders</h4>
                                    <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                                </div>
                                <div class="item">
                                    <img src="images/login/1.png" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">Manage your orders</h4>
                                    <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                                </div>
                                <div class="item">
                                    <img src="images/login/1.png" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">Manage your orders</h4>
                                    <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <script type="text/javascript">
    $(document).ready(function() {
        $('.login_btn').click(function() {
            var username = $('.username').val();
            var password = $('.password').val();
            if (username == '') {
                alert("Enter Email or Mobile Number");
            } else if (password == '') {
                alert("Enter Password");
            } else {
                $.ajax({
                    url: 'backend/Login.php',
                    method: 'POST',
                    data: {
                        user_email: username,
                        user_password: password
                    },
                    success: function(data) {
                        alert(data);
                        if (data == '1') {
                            alert("Login successful!");
                            window.location.href = './';
                        } else if (data == '2') {
                            alert("Wrong Password");
                        } else if (data == '5') {
                            alert("Wrong Username Or Password");
                        } else {
                            alert("Something went wrong!");
                        }
                    }
                });
            }
        });
    });
</script>






        <!-- Sign in END -->
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- Appear JavaScript -->
      <script src="js/jquery.appear.js"></script>
      <!-- Countdown JavaScript -->
      <script src="js/countdown.min.js"></script>
      <!-- Counterup JavaScript -->
      <script src="js/waypoints.min.js"></script>
      <script src="js/jquery.counterup.min.js"></script>
      <!-- Wow JavaScript -->
      <script src="js/wow.min.js"></script>
      <!-- Apexcharts JavaScript -->
      <script src="js/apexcharts.js"></script>
      <!-- Slick JavaScript -->
      <script src="js/slick.min.js"></script>
      <!-- Select2 JavaScript -->
      <script src="js/select2.min.js"></script>
      <!-- Owl Carousel JavaScript -->
      <script src="js/owl.carousel.min.js"></script>
      <!-- Magnific Popup JavaScript -->
      <script src="js/jquery.magnific-popup.min.js"></script>
      <!-- Smooth Scrollbar JavaScript -->
      <script src="js/smooth-scrollbar.js"></script>
      <!-- Chart Custom JavaScript -->
      <script src="js/chart-custom.js"></script>
      <!-- Custom JavaScript -->
      <script src="js/custom.js"></script>
   </body>

</html>
<script type="text/javascript">
    $('.login_btn').click(function(){
        var username = $('.username').val();
        var password = $('.password').val();
        if (username == '') {
            alert("Enter Email or Mobile Number");
        }
        else if (password == '') {
            alert("Enter Password");
        }
        else{
        $.ajax({
            url:'backend/login.php',
            method:'POST',
            data:{user_email:username, user_password:password},
            success:function(data){
                //alert(data);
                if (data == '5') {
                    alert("Wrong Username Or Password");
                }
                else if (data == '4') {
                    alert("Your account is disabled, Contact Master");
                }
                else if (data == '3') {
                    alert("Your account is still not verified.");
                }
                else if (data == '2') {
                    alert("Wrong Password");
                }
                else if (data == '1') {
                    location.reload();
                }
                else{
                    alert("Something went wrong!");
                }
            }
        })
       }
    })
</script>