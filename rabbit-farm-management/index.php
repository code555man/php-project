<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>เข้าสู่ระบบ - ฟาร์มกระต่าย</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/logo.ico"> 
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/style.css">

    <style>

      @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap');

      body{
        font-family: 'Kanit', sans-serif;
      }

    </style>

</head> 

<body class="app app-login p-0">   
    <div class="row g-0 app-auth-wrapper">
        <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
            <div class="d-flex flex-column align-content-end">
                <div class="app-auth-body mx-auto">	
                    <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/images/logo.png" alt="logo"></a></div>
                    <h2 class="auth-heading text-center mb-5">เข้าสู่ระบบ - ฟาร์มกระต่าย</h2>
                    <div class="auth-form-container text-start">
                        <?php if(isset($_SESSION['error'])) { ?>
                            <div class="alert alert-danger text-center" role="alert">
                                <?php 
                                    echo $_SESSION['error'];
                                    unset($_SESSION['error']);
                                ?>
                            </div>
                        <?php } ?>
                        <?php if(isset($_SESSION['success'])) { ?>
                            <div class="alert alert-success text-center" role="alert">
                                <?php 
                                    echo $_SESSION['success'];
                                    unset($_SESSION['success']);
                                ?>
                            </div>
                        <?php } ?>
						<form class="auth-form login-form" action="login.php" method="post">         
							<div class="email mb-3">
								<label class="sr-only" for="signin-email">ชื่อผู้ใช้</label>
								<input id="signin-email" name="username" type="text" class="form-control signin-email" placeholder="ชื่อผู้ใช้..." required="required">
							</div><!--//form-group-->
							<div class="password mb-3">
								<label class="sr-only" for="signin-password">รหัสผ่าน</label>
								<input id="signin-password" name="password" type="password" class="form-control signin-password" placeholder="รหัสผ่าน..." required="required">
							</div><!--//form-group-->
							<div class="text-center">
								<button type="submit" name="login" class="btn app-btn-primary w-100 theme-btn mx-auto">เข้าสู่ระบบ</button>
							</div>
						</form>
                    </div><!--//auth-form-container-->	
                </div><!--//auth-body-->
                <?php include_once('template/footer.php'); ?>	
            </div><!--//flex-column-->   
        </div><!--//auth-main-col-->
        <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
            <div class="auth-background-holder" style="background-image: url('assets/images/bg_login.jpg');">
            </div>
            <div class="auth-background-mask"></div>
            <div class="auth-background-overlay p-3 p-lg-5">
                <div class="d-flex flex-column align-content-end h-100">
                    <div class="h-100"></div>
                    <!-- <div class="overlay-content p-3 p-lg-4 rounded">
                        <h5 class="mb-3 overlay-title">Explore Portal Admin Template</h5>
                        <div>Portal is a free Bootstrap 5 admin dashboard template. You can download and view the template license <a href="https://themes.3rdwavemedia.com/bootstrap-templates/admin-dashboard/portal-free-bootstrap-admin-dashboard-template-for-developers/">here</a>.</div>
                    </div> -->
                </div>
            </div><!--//auth-background-overlay-->
        </div><!--//auth-background-col-->
    </div><!--//row-->
</body>
</html> 
