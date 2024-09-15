<?php
   session_start();
  
   if (isset($_SESSION['admin'])) {
        header("Location: admin.php");
   }
   
   if (isset($_POST['login'])) {
       if ($_POST["acc"] == "admin" && $_POST["pass"] = "123") {
           $_SESSION['admin'] = 1;
           header("Location: admin.php");
       }
   }
?>


<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Cát Hải - NCKH</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
      
  <!-- MDB -->
  <link  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.css"  rel="stylesheet"/>

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>

  <!-- Google Fonts -->
  <link  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"  rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<section class="vh-100" style="background: url(../assets/img/cathai-bg.jpg) top center;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Đăng nhập quản trị</h3>

            <form method = "post" action="#">
                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="text" id="typeEmailX-2" name="acc" class="form-control" />
                  <label class="form-label"  for="typeEmailX-2">Tài khoản quản trị</label>
                </div>
    
                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="password" name="pass"  id="typePasswordX-2" class="form-control" />
                  <label class="form-label" for="typePasswordX-2">Mật khẩu</label>
                </div>
    
                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block" name="login" type="submit">Đăng nhập</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>