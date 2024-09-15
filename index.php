<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Cát Hải - NCKH</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
      
  <!-- MDB -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
  <script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
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
<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>
  <a href="admin.php" data-bs-toggle="tooltip" data-bs-placement="top" title="Admin" class="floatCreate d-flex align-items-center justify-content-center"><i class="bi bi-person-workspace"></i></a>

  <!-- ======= Header ======= -->
  <?php 
    include 'header.php';
  ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
      <h1>Cát Hải</h1>
      <p><span class="typed" data-typed-items="Đề tài nghiên cứu khoa học, Đại học Hải Phòng"></span></p>
    </div>
  </section>
  <!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <?php 
        include 'about.php';
    ?>

    <!-- ======= Facts Section ======= -->
    <?php 
        include 'generalInfo.php';
    ?>
    <!-- End Facts Section -->

    <!-- ======= History Section ======= -->
    <?php 
        include 'history.php';
    ?>
    <!-- End Resume Section -->

    <!-- ======= Tieu Diem Section ======= -->
    <?php
        include "tieudiem.php";
    ?>
    <!-- End Tieu Diem Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">
        <div class="section-title">
          <h2>Cây cầu vượt biển dài nhất Việt Nam</h2>
          <p>Kể từ khi, cây cầu vượt biển dài nhất Việt Nam thông xe, chặng đường từ Hải Phòng ra Cát Bà đã ngắn đi rất nhiều. Giờ chỉ còn duy nhất một chuyến phà. Khách qua phà đông, người dân cũng vui hơn vì được gần hơn với đất liền tổ quốc. Bởi lẽ đó cây cầu là mơ ước của biết bao thế hệ người dân đảo. Đây có thể nói là công trình thế kỷ của huyện Cát Hải cũng như thành phố Hải Phòng.</p>
          <br>
          <p>Bao nhiêu năm phải lênh đênh trên những chuyến phà vượt biển, người dân huyện Cát Hải lần đầu tiên được kết nối với thành phố Hải Phòng bằng một cây cầu. Cầu vượt biển Tân Vũ - Lạch Huyện được thông xe và đưa vào sử dụng đúng dịp kỷ niệm 72 năm Cách mạng tháng Tám và Quốc khánh 2/9.</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up">
            <div class="icon"><i class="bi bi-car-front-fill"></i></div>
            <h4 class="title"><a href="">Rút ngắn khoảng cách</a></h4>
            <p class="description">Trước đây, để đến huyện đảo Cát Hải, phải đi phà Đình Vũ trong 1 giờ (chỉ có 2 chuyến đi, về trong ngày). Nhờ cầu vượt biển, giờ đây sẽ chỉ mất chưa đầy 30 phút.</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
            <div class="icon"><i class="bi bi-building-fill"></i></div>
            <h4 class="title"><a href="">Tương lai vững trãi</a></h4>
            <p class="description">Phần cầu có chiều dài 5,44km; phần đường dẫn dài 10,19km. Cầu Tân Vũ - Lạch Huyện được thiết kế vĩnh cửu bằng bê tông cốt thép dự ứng lực, mặt cầu rộng 16m. </p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
            <div class="icon"><i class="bi bi-bezier"></i></div>
            <h4 class="title"><a href="">Nền tảng mai sau</a></h4>
            <p class="description">Cây cầu này góp phần đưa Hải Phòng trở thành đầu mối giao thông quan trọng và cửa chính ra biển của các tỉnh phía Bắc, kết nối vùng, với khu vực và quốc tế.</p>
          </div>
        </div>
        <img src="assets/img/CatHai-cauvuot.jpg" data-aos="fade-up" style="margin-left: auto;margin-right: auto;display: block;box-shadow: rgba(0, 0, 0, 0.17) 0px -23px 25px 0px inset, rgba(0, 0, 0, 0.15) 0px -36px 30px 0px inset, rgba(0, 0, 0, 0.1) 0px -79px 40px 0px inset, rgba(0, 0, 0, 0.06) 0px 2px 1px, rgba(0, 0, 0, 0.09) 0px 4px 2px, rgba(0, 0, 0, 0.09) 0px 8px 4px, rgba(0, 0, 0, 0.09) 0px 16px 8px, rgba(0, 0, 0, 0.09) 0px 32px 16px;" class="img-fluid" alt="">
      </div>
    </section><!-- End Services Section -->

    

    <!-- ======= Thơ ca Section ======= -->
        <?php 
            include 'poem.php';
        ?>
    <!-- End Thơ ca Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      
      <div class="credits">
  
       
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="https://cdn.jsdelivr.net/npm/@floating-ui/core@1.6.0"></script>
  <script src="https://cdn.jsdelivr.net/npm/@floating-ui/dom@1.6.3"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.umd.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
</html>

<?php 
    include "hanhchinhModal.php";
?>


