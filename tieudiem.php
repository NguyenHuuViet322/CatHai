<?php
    include 'dbconfig.php';
    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    $sql_tieudiem = "SELECT TieuDiem.id as \"id\", TieuDiem.name as \"name\", TieuDiem.description as \"desc\", TieuDiem.idtheloai as \"theloai\" FROM `TieuDiem` JOIN `theloai` WHERE theloai.id = TieuDiem.idtheloai ORDER BY rand();";
    $list_tieudiem = $conn->query($sql_tieudiem);
    
    $sql_theloai = "SELECT * FROM `theloai`;";
    $list_theloai = $conn->query($sql_theloai);
?>

<section id="portfolio" class="portfolio section-bg">
  <div class="container">

    <div class="section-title">
      <h2>Một thoáng Cát Hải</h2>
      <p>Giữa đại dương mênh mông, vô tận có một hòn đảo hoang sơ và đẹp tuyệt vời mang tên Cát Hải – niềm tự hào của “thành phố hoa phượng đỏ” Hải Phòng.</p>
    </div>

    <div class="row" data-aos="fade-up">
      <div class="col-lg-12 d-flex justify-content-center">
        <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">All</li>
                <?php while($row = $list_theloai->fetch_assoc()) : ?>
                    <li data-filter=".filter-<?=$row['id'] ?>"><?=$row['name'] ?></li>
                <?php endwhile; ?>
        </ul>
      </div>
    </div>

    <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">
        <?php while($row = $list_tieudiem->fetch_assoc()) : ?>
          <div class="col-lg-4 col-md-6 portfolio-item filter-<?=$row['theloai'] ?>">
            <div class="portfolio-wrap">
              <img src="assets/img/TieuDiem/CatHai-<?=$row['id'] ?>.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/TieuDiem/CatHai-<?=$row['id'] ?>.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?=$row['name'] ?>"><i class="bx bx-plus"></i></a>
                <a href="<?=$row['desc'] ?>" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
    </div>
  </div>
</section>