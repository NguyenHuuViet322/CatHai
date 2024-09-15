<?php
    include 'dbconfig.php';
    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    $sql_tieudiem = "SELECT TieuDiem.id as \"id\", TieuDiem.name as \"name\", TieuDiem.description as \"desc\", TieuDiem.idtheloai as \"theloai\",TieuDiem.lat as \"lat\",TieuDiem.lng as \"lng\" FROM `TieuDiem` JOIN `theloai` WHERE theloai.id = TieuDiem.idtheloai ORDER BY rand();";
    
    if (isset($_POST["search"])) {
        $sql_tieudiem = "SELECT TieuDiem.id as \"id\", TieuDiem.name as \"name\", TieuDiem.description as \"desc\", TieuDiem.idtheloai as \"theloai\" FROM `TieuDiem` JOIN `theloai` WHERE theloai.id = TieuDiem.idtheloai AND TieuDiem.name LIKE '%".$_GET["search"]."%' ORDER BY rand();";
    }
    $list_tieudiem = $conn->query($sql_tieudiem);
    
    $sql_theloai = "SELECT * FROM `theloai`;";
    $list_theloai = $conn->query($sql_theloai);
?>

<style>
    #hoclieucontainer {
        padding: 1em;
        border: 1px solid black;
        border-style: dashed;
        border-radius: 10px;
        transition: 0.5s;
    }
    
    #hoclieucontainer:hover {
        background-color: lightblue;
    }
</style>

<script>
    var map = []
</script>

<form class="searchform" action="#portfolio" method="POST">
  <input placeholder="Tìm kiếm" class="input" name="search" type="search" required>
  <i class="fa fa-search searchfa"></i>
  <a  class="searcha" href="javascript:void(0)" id="clear-btn">Clear</a>
  <input style="display: none;" type="submit">
</form>

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
          <div class="col-lg-4 col-md-6 portfolio-item filter-<?=$row['theloai'] ?>"   data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="<?=$row['name']  ?>">
            <div class="portfolio-wrap" >
              <img src="assets/img/TieuDiem/CatHai-<?=$row['id'] ?>.jpg" class="img-fluid" alt="" >
              <div class="portfolio-links">
                <a data-bs-toggle="modal" data-bs-target="#contentModal_<?=$row['id']?>" title="More Details"><i class='bx bx-info-circle'></i></a>
                <a  data-bs-toggle="modal" data-bs-target="#questionHocLieu_<?=$row['id']?>"><i class='bx bx-question-mark' ></i></a>
              </div>
            </div>
          </div>
          
          <div style="z-index:999999" class="modal  modal-xl fade" id="questionHocLieu_<?=$row['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Trắc nghiệm học liệu</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body" style="display:flex;gap:10px; flex-wrap: wrap;justify-content: space-evenly;">
                                <?php 
                                    $sql_cauhoi = "SELECT * FROM `CauHoi` WHERE `idtieudiem` = {$row['id']}";
                                    $list_cauhoi = $conn->query($sql_cauhoi);
                                    if (mysqli_num_rows($list_cauhoi)  == 0) echo "<img style='margin: 1em auto;' src='assets/img/nothing.png'/><h5 style='margin: auto;'>Không có dữ liệu</h5>";
                                    while($row_cauhoi = $list_cauhoi->fetch_assoc()) :
                                ?>
                                    <div id="hoclieucontainer" class="col-md-5">
                                        <p><strong>Câu hỏi:</strong> <?=$row_cauhoi['noidung']?></p>
                                        <?php 
                                            $sql_dapan = "SELECT * FROM `DapAn` WHERE idcauhoi = '{$row_cauhoi['id']}'";
                                            $list_dapan = $conn->query($sql_dapan);
                                            $chr = 65;
                                            
                                            while($row_dapan = $list_dapan->fetch_assoc()) :
                                        ?>
                                            <p><?php echo chr($chr);$chr++; ?>. <?=$row_dapan['noidung']?></p> 
                                        <?php endwhile; ?>
                                    </div>
                                <?php endwhile; ?>
                          </div>
                          <div class="modal-footer">
                            <a type="button" class="btn btn-success" target="_blank" href="excel.php?id=<?=$row['id']?>">Xuất excel</a>

                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                          </div>
                        </div>
                      </div>
                  </div>
          
           <div class="modal modal-xl fade" id="contentModal_<?=$row['id']  ?>" tabindex="-1" style="z-index:9999" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable ">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><strong><?=$row['name']?></strong></h5>
            <button type="button" class="btn-close" data-mdb-ripple-init data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
                <div class="col-md-7">
                                            <?php echo $row["desc"]; ?>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <img src="assets/img/TieuDiem/CatHai-<?=$row['id'] ?>.jpg"/>
                    </div>
                    <div class="row mt-2">
                        <div style="width:100%; height: 450px;    padding-right: calc(var(--bs-gutter-x)* .5);
    padding-left: calc(var(--bs-gutter-x)* .5);" id="map_<?=$row['id']?>"></div>
                    </div>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-mdb-ripple-init data-bs-dismiss="modal">Đóng</button>
          </div>
        </div>
      </div>
    </div>
    
    <script>
        map[<?=$row['id']?>] = L.map('map_<?=$row['id']?>').setView([<?=$row['lat']?> , <?=$row['lng']?>], 13);
        console.log(1);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map[<?=$row['id']?>]);
        var newMarker = new L.marker([<?=$row['lat']?> , <?=$row['lng']?>]).addTo(map[<?=$row['id']?>]);
    
        $("#contentModal_<?=$row['id']?>").hover(function() {
                map[<?=$row['id']?>].invalidateSize();
                console.log(map[<?=$row['id']?>]);
        }) 
    </script>
        <?php endwhile; ?>
    </div>
  </div>
</section>
