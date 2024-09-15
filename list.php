<?php
    require_once 'dbconfig.php';
    error_reporting(E_ERROR | E_PARSE);

    
    $list_query = "SELECT TieuDiem.id as \"id\", TieuDiem.name as \"name\", TieuDiem.description as \"desc\", TieuDiem.idtheloai as \"theloai\", theloai.name as \"nametheloai\", TieuDiem.lat as \"lat\", TieuDiem.lng as \"lng\" FROM `TieuDiem` JOIN `theloai` WHERE theloai.id = TieuDiem.idtheloai";
    $result = $mysqli->query($list_query);

    $stt = 1;
?>
     <a href="#" class="floatCreate d-flex align-items-center justify-content-center"  data-bs-toggle="modal" data-bs-target="#createHocLieu""><i class="bi bi-plus"></i></a>

<script>
    var map = [];
    var quill = [];
</script>

<style>
    .ql-container {
        height: 60%;
    }
</style>

<section id="list" class="about"  style="padding: 2em 1em">
      <div class="container">
        <div class="section-title">
          <h2>Danh sách học liệu<i></i></h2>
        </div>
      
          <table  class="table table-striped table-hover">
              <thead>
                <tr>
                  <th scope="col">STT</th>
                  <th scope="col">Tên học liệu</th>
                  <th scope="col">Thể loại</th>
                  <th scope="col">Thao tác</th>
                </tr>
              </thead>
              <tbody class="table-group-divider">
                <?php while($row = $result->fetch_assoc()) : ?>

                    <tr>
                      <th scope="row"><?php echo $stt; $stt++; ?></th>
                      <td><?=$row['name'] ?></td>
                      <td><?=$row['nametheloai'] ?></td>
                      <td>
                          <a href="admin_question.php?idtieudiem=<?=$row['id']?>#queslist"> <i class="fa-solid fa-question"></i></a>
                          <a href="#"  data-bs-toggle="modal" data-bs-target="#updateHocLieu_<?=$row['id'] ?>"> <i class="fas fa-edit"></i></a>
                          <a href="#" data-bs-toggle="modal" data-bs-target="#deleteHocLieu_<?=$row['id'] ?>"> <i class="fas fa-trash-alt"></i></a>
                      </td>
                    </tr>
                    
                    <div style="z-index:999999" class="modal fade" id="deleteHocLieu_<?=$row['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Bạn có chắc muốn xóa học liệu?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form method="post" id="delete_form_<?=$row['id'] ?>" " enctype="multipart/form-data" action="processHocLieu.php">
                                <input type="hidden" name = "id" value="<?=$row['id'] ?>">
                            </form>
                          </div>
                          <div class="modal-footer">
                          <div style="display:none" class="spinner-border text-primary" role="status">
                              <span class="visually-hidden">Loading...</span>
                            </div>  
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-danger" type="submit" form="delete_form_<?=$row['id'] ?>" name="delete_submit" onclick="document.querySelector('.spinner-border').style.display = 'block';">Xóa</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div style="z-index:999999" class="modal  modal-xl fade" id="updateHocLieu_<?=$row['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Chỉnh sửa học liệu</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body" style="min-height: 30vw">
                            <form method="post" id="update_form_<?=$row['id'] ?>"  enctype="multipart/form-data" action="processHocLieu.php">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name">Tên học liệu</label>
                                    <input name="name" id="name" value="<?=$row['name'] ?>" type="text" class="form-control"/>
                                    <input type="hidden" name = "id" value="<?=$row['id'] ?>">

                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="theloai">Thế loại</label>
                                    <select class="form-control" id="theloai" name="theloai">
                                      <option value="1" <?php $row["idtheloai"]==1?"selected":"" ?>>Ẩm thực</option>
                                      <option value="2" <?php $row["idtheloai"]==2?"selected":"" ?>>Di tích</option>
                                      <option value="3" <?php $row["idtheloai"]==3?"selected":"" ?>>Nghề làm mắm</option>
                                      <option value="4" <?php $row["idtheloai"]==4?"selected":"" ?>>Du lịch</option>
                                      <option value="5" <?php $row["idtheloai"]==5?"selected":"" ?>>Lễ hội</option>
                                    </select>
                                  </div>
                                </div>
                            </div>
                            
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="editor">Nội dung</label>
                                    <div id="editor_<?=$row['id'] ?>"></div>
                                    <input type="hidden" class="form-control" name="hiddeninput_<?=$row['id'] ?>" id="hiddeninput_<?=$row['id'] ?>">
                
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="editor">Tọa độ   <span class="text-warning" id="latText_<?=$row['id'] ?>"><?=$row['lat']?></span> - <span class="text-warning" id="lngText_<?=$row['id'] ?>"><?=$row['lat']?></span></label>
                                    <div class="row">
                                        <div id="map_<?=$row['id'] ?>" style="width: 95%;height: 280px;"></div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input type="hidden" value="<?=$row['lat'] ?>" class="form-control" name="lat_<?=$row['id'] ?>" id="lat_<?=$row['id'] ?>">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="hidden" value="<?=$row['lng'] ?>" class="form-control" name="lng_<?=$row['id'] ?>" id="lng_<?=$row['id'] ?>">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label for="name">Ghi chú</label>
                                        <input name="note" id="note" type="text" class="form-control" value='<?=$row['note'] ?>'/>
                                    </div>
                                </div>
                                
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label for="formFile" class="form-label">Hình ảnh</label>
                                        <input class="form-control" name="image_<?=$row['id'] ?>" type="file" id="formFile">
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                        
                        
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-success" type="submit" form="update_form_<?=$row['id'] ?>" name="update_submit">Cập nhật</button>
                      </div>
                    </div>
                  </div>
                  
                  <script>
                      document.addEventListener("DOMContentLoaded", function (event) {
                      quill[<?=$row['id'] ?>] = new Quill("#editor_<?=$row['id'] ?>", {
                        theme: 'snow',
                        class: 'form-control',
                      });
                      var hiddenInput = document.querySelector('#hiddeninput_<?=$row['id'] ?>');
                      quill[<?=$row['id'] ?>].root.innerHTML = `<?=$row['desc'] ?>`;
                      
                      
                      document.getElementById("update_form_<?=$row['id'] ?>").addEventListener('submit', function(e){
                        hiddenInput.value = quill[<?=$row['id'] ?>].root.innerHTML;
                      });
                    });
                        

                    </script>
                    
                    <script>
                        map[<?=$row['id'] ?>] = L.map('map_<?=$row['id'] ?>').setView([<?=$row['lat'] ?> , <?=$row['lng'] ?>], 15);
                    
                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                        }).addTo(map[<?=$row['id'] ?>]);
                        var newMarker = new L.marker([<?=$row['lat']?> , <?=$row['lng']?>]).addTo(map[<?=$row['id']?>]);

                    
                        function onMapClick(e) {
                            if (marker) {
                                map[<?=$row['id'] ?>].removeLayer(marker);
                            }
                            marker = new L.Marker(e.latlng).addTo(map[<?=$row['id'] ?>]);
                            document.getElementById("lat_<?=$row['id'] ?>").value = e.latlng.lat;
                            document.getElementById("lng_<?=$row['id'] ?>").value = e.latlng.lng;
                            document.getElementById("latText_<?=$row['id'] ?>").innerText = e.latlng.lat;
                            document.getElementById("lngText_<?=$row['id'] ?>").innerText = e.latlng.lng;
                            console.log(e.latlng.lat, " ", e.latlng.lng);
                            map[<?=$row['id'] ?>].invalidateSize();
                        }
                    
                        map[<?=$row['id'] ?>].on('click', onMapClick);
                        
                        $("#updateHocLieu_<?=$row['id'] ?>").hover(function() {
                                map[<?=$row['id'] ?>].invalidateSize();
                                console.log(map[<?=$row['id'] ?>]);
                        }) 
                    </script>


                    
                <?php endwhile; ?>
                
              </tbody>
            </table>
        

      </div>
    </section><!-- End About Section -->
    
    <div style="z-index:999999" class="modal  modal-xl fade" id="createHocLieu" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Tạo học liệu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" style="min-height: 30vw">
            <form method="post" id="add_form"  enctype="multipart/form-data" action="processHocLieu.php">
            <div class="row">
                <div class="col-md-6">
                    <label for="name">Tên học liệu</label>
                    <input name="name" id="name" type="text" class="form-control"/>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="theloai">Thế loại</label>
                    <select class="form-control" id="theloai" name="theloai">
                      <option value="1">Ẩm thực</option>
                      <option value="2">Di tích</option>
                      <option value="3">Nghề làm mắm</option>
                      <option value="4">Du lịch</option>
                      <option value="5">Lễ hội</option>
                    </select>
                  </div>
                </div>
            </div>
            
            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="editor">Nội dung</label>
                    <div id="editor"></div>
                    <input type="hidden" class="form-control" name="hiddeninput" id="hiddeninput">
                </div>
                
                <div class="col-md-6">
                    <label for="editor">Tọa độ   <span class="text-warning" id="latText">x</span> - <span class="text-warning" id="lngText">y</span></label>
                    <div class="row">
                        <div id="map" style="width: 95%;height: 280px;"></div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-3">
                            <input type="hidden" value="0" class="form-control" name="lat" id="lat">
                        </div>
                        <div class="col-md-3">
                            <input type="hidden" value="0" class="form-control" name="lng" id="lng">
                        </div>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label for="name">Ghi chú</label>
                        <input name="note" id="note" value="<?=$row["note"]?> "type="text" class="form-control"/>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label for="formFile" class="form-label">Hình ảnh</label>
                        <input class="form-control" name="image" type="file" id="formFile">
                    </div>
                </div>
            </div>
            </form>
            
            
            
          </div>
          <div class="modal-footer">
            <div style="display:none" class="spinner-border text-primary" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>  
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-success" type="submit" form="add_form" name="add_submit">Thêm mới</button>
          </div>
        </div>
      </div>
      
   
    
 
      
  <script>
      document.addEventListener("DOMContentLoaded", function (event) {
      quill[0] = new Quill("#editor", {
        theme: 'snow',
        class: 'form-control',
      });
    });
    
      var hiddenInput = document.querySelector('#hiddeninput');
    
      document.getElementById("add_form").addEventListener('submit', function(e){
        hiddenInput.value = quill[0].root.innerHTML;
        alert(hiddenInput.value);
      });
    </script>
    
    <script>
        map[0] = L.map('map').setView([20.802464967746943 , 106.99649956351772], 11);
    
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map[0]);
        var marker;
    
        function onMapClick(e) {
            if (marker) {
                map[0].removeLayer(marker);
            }
            marker = new L.Marker(e.latlng).addTo(map[0]);
            document.getElementById("lat_<?=$row['id'] ?>").value = e.latlng.lat;
            document.getElementById("lng_<?=$row['id'] ?>").value = e.latlng.lng;
            document.getElementById("latText_<?=$row['id'] ?>").innerText = e.latlng.lat;
            document.getElementById("lngText_<?=$row['id'] ?>").innerText = e.latlng.lng;
            console.log(e.latlng.lat, " ", e.latlng.lng);
            map[0].invalidateSize();
        }
    
        map[0].on('click', onMapClick);
        
        $("#createHocLieu").hover(function() {
                map[0].invalidateSize();
                console.log(map[0]);
        }) 
    </script>

