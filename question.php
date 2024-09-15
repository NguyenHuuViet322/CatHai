<?php
    require_once 'dbconfig.php';
    error_reporting(E_ERROR | E_PARSE);

    
    $list_query = "SELECT * FROM CauHoi WHERE idtieudiem = '{$_GET['idtieudiem']}'";
    $result = $mysqli->query($list_query);

    $stt = 1;
?>
     <a href="#" class="floatCreate d-flex align-items-center justify-content-center"  data-bs-toggle="modal" data-bs-target="#createCauHoi""><i class="bi bi-plus"></i></a>

<script>
    var map = [];
    var quill = [];
</script>

<style>
    .ql-container {
        height: 60%;
    }
    
    .btnicon {
        color: green;
        transition: 0.5s;
    }
    
    .btnicon:hover {
        color: lightgreen;
    }
</style>

<section id="queslist" class="about"  style="padding: 2em 1em">
      <div class="container">
        <div class="section-title">
          <h2>Danh mục câu hỏi<i></i></h2>
        </div>
        <?php if (mysqli_num_rows( $result ) == 0) echo "<div style='display: flex;flex-direction: column;'><img style='margin: 1em auto;' src='assets/img/nothing.png'/><h5 style='margin: auto;'>Không có dữ liệu</h5></div>"; ?>
          <table <?php if (mysqli_num_rows( $result ) == 0) echo "style='display:none';"; ?> class="table table-striped table-hover">
              <thead>
                <tr>
                  <th scope="col">STT</th>
                  <th scope="col">Nội dung câu hỏi</th>
                  <th scope="col">Thao tác</th>
                </tr>
              </thead>
              <tbody class="table-group-divider">
                
                <?php while($row = $result->fetch_assoc()) : ?>

                    <tr>
                      <th scope="row"><?php echo $stt; $stt++; ?></th>
                      <td><?=$row['noidung'] ?></td>
                      <td>
                          <a href="#"  data-bs-toggle="modal" data-bs-target="#updateCauHoi_<?=$row['id'] ?>"> <i class="fas fa-edit"></i></a>
                          <a href="#"  data-bs-toggle="modal" data-bs-target="#detailsCauHoi_<?=$row['id'] ?>"> <i class="fas fa-eye"></i></a>
                          <a href="#" data-bs-toggle="modal" data-bs-target="#deleteCauHoi_<?=$row['id'] ?>"> <i class="fas fa-trash-alt"></i></a>
                      </td>
                    </tr>
                    
                    <div style="z-index:999999" class="modal fade" id="deleteCauHoi_<?=$row['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Bạn có chắc muốn xóa học liệu?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form method="post" id="delete_form_<?=$row['id'] ?>" " enctype="multipart/form-data" action="processCauHoi.php">
                                <input type="hidden" name = "id" value="<?=$row['id'] ?>">
                            </form>
                          </div>
                          <div class="modal-footer">
                          <div style="display:none" id="spinner3" class="spinner-border text-primary" role="status">
                              <span class="visually-hidden">Loading...</span>
                            </div>  
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-danger" type="submit" form="delete_form_<?=$row['id'] ?>" name="delete_submit" onclick="document.querySelector('#spinner3').style.display = 'block';">Xóa</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div style="z-index:999999" class="modal fade" id="updateCauHoi_<?=$row['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Chỉnh sửa câu hỏi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form method="post" id="update_form_<?=$row['id'] ?>"  enctype="multipart/form-data" action="processCauHoi.php">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="noidung"><strong>Nội dung câu hỏi</strong></label>
                                        <textarea name="noidung" class="form-control"><?=$row['noidung']?></textarea>
                                    </div>
                                    <input name="id" type="hidden" value="<?=$_GET['idtieudiem'] ?>"/>
                                    <input name="idch" type="hidden" value="<?=$row['id'] ?>"/>
                                </div>
                                                        

                                <div class="row dapanlist mt-3">
                                    <label ><strong>Danh sách đáp án</strong></label>
                                    <?php 
                                        $num = 1;
                                        $dapan = "SELECT * FROM DapAn WHERE idcauhoi = '{$row['id']}'";
                                        $dapan_result = $mysqli->query($dapan);
                                        while($row_dapan = $dapan_result->fetch_assoc()) : ?>
                                        
                                        <div class="col-md-8 mt-2">
                                            <input type="hidden" name="idstatus[]" value="<?=$row_dapan['id']?>"/>
                                            <input type="text" name="dapan[]" value="<?=$row_dapan['noidung']?>" placeholder="Nhập nội dung đáp án" class="form-control">
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                  <input type="radio" class="btn-check" name="status_<?=$row['id']?>_[<?php echo $num; ?>]" id="status_<?=$row['id']?>_[<?php echo $num; ?>]" autocomplete="off" value="1"  <?php if($row_dapan['status']) echo "checked"; ?>>
                                                  <label class="btn btn-outline-success" for="status_<?=$row['id']?>_[<?php echo $num; ?>]">Đúng</label>
                                                  <input type="radio" class="btn-check" name="status_<?=$row['id']?>_[<?php echo $num; ?>]" id="statusfalse_<?=$row['id']?>_[<?php echo $num; ?>]" autocomplete="off"  value="0" <?php if(!$row_dapan['status']) echo "checked"; ?>>
                                                  <label class="btn btn-outline-danger" for="statusfalse_<?=$row['id']?>_[<?php echo $num;$num++; ?>]">Sai</label>
                                            </div>
                                        
                                        <?php endwhile; ?>
                                </div>
                            </form>
                      </div>
                      <div class="modal-footer">
                        <div style="display:none" id="spinner1" class="spinner-border text-primary" role="status">
                          <span class="visually-hidden">Loading...</span>
                        </div>  
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button  onclick="document.querySelector('#spinner1').style.display = 'block';" class="btn btn-success" type="submit" form="update_form_<?=$row['id'] ?>" name="update_submit">Cập nhật</button>
                      </div>
                    </div>
                  </div>
              </div>
                  
                  <div style="z-index:999999" class="modal fade" id="detailsCauHoi_<?=$row['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Chi tiết câu hỏi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="noidung"><strong>Nội dung câu hỏi</strong></label>
                                        <textarea name="noidung" class="form-control" disabled><?=$row['noidung']?></textarea>
                                    </div>
                                    <input name="id" type="hidden" value="<?=$_GET['idtieudiem'] ?>" disabled/>
                                    <input name="idch" type="hidden" value="<?=$row['id'] ?>" disabled/>
                                </div>
                                                        

                                <div class="row dapanlist mt-3">
                                    <label ><strong>Danh sách đáp án</strong></label>
                                    <?php 
                                        $num = 1;
                                        $dapan = "SELECT * FROM DapAn WHERE idcauhoi = '{$row['id']}'";
                                        $dapan_result = $mysqli->query($dapan);
                                        while($row_dapan = $dapan_result->fetch_assoc()) : ?>
                                        
                                        <div class="col-md-8 mt-2">
                                            <input type="hidden" name="idstatus[]" value="<?=$row_dapan['id']?>"/>
                                            <input type="text" name="dapan[]" value="<?=$row_dapan['noidung']?>" placeholder="Nhập nội dung đáp án" class="form-control" disabled/>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                  <input type="radio" class="btn-check" autocomplete="off" value="1"  <?php if($row_dapan['status']) echo "checked"; ?> readonly>
                                                  <label class="btn btn-outline-success">Đúng</label>
                                                  <input type="radio" class="btn-check"  autocomplete="off"  value="0" <?php if(!$row_dapan['status']) echo "checked"; ?> readonly>
                                                  <label class="btn btn-outline-danger">Sai</label>
                                            </div>
                                        
                                        <?php endwhile; ?>
                                </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                      </div>
                    </div>
                  </div>
              </div>
            <?php endwhile; ?>
                
              </tbody>
            </table>
        

      </div>
    </section><!-- End About Section -->
    
    <div style="z-index:999999" class="modal fade" id="createCauHoi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Tạo câu hỏi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" style="min-height: 30vw">
            <form method="post" id="add_form"  enctype="multipart/form-data" action="processCauHoi.php">
                <div class="row">
                    <div class="col-md-12">
                        <label for="noidung"><strong>Nội dung câu hỏi</strong></label>
                        <textarea name="noidung" class="form-control"></textarea>
                    </div>
                    <input name="id" type="hidden" value="<?=$_GET['idtieudiem'] ?>"/>
                </div>
                

                <div class="row dapanlist mt-3">
                    <a class="btn_icon" style="float:right"><i class="fa-solid fa-square-plus fa-2x"></i></a>
                </div>
            </form>
            
            
            
          </div>
          <div class="modal-footer">
            <div style="display:none" id="spinner2"  class="spinner-border text-primary" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>  
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button onclick="document.querySelector('#spinner2').style.display = 'block';" class="btn btn-success" type="submit" form="add_form" name="add_submit">Thêm mới</button>
          </div>
        </div>
      </div>
      
<script>
    $(document).on("click", ".btn_icon", function() {
        $(this).parent().append(`<div class="col-md-8 mt-2">
            <input type="text" name="dapan[]" placeholder="Nhập nội dung đáp án" class="form-control"/>
            </div>
            <div class="col-md-4 mt-2">
                  <input type="radio" class="btn-check" name="status[`+(($(this).parent().children().length+1)/2)+`]" id="status[`+(($(this).parent().children().length+1)/2)+`]" autocomplete="off" value="1">
                  <label class="btn btn-outline-success" for="status[`+(($(this).parent().children().length+1)/2)+`]">Đúng</label>
                  <input type="radio" class="btn-check" name="status[`+(($(this).parent().children().length+1)/2)+`]" id="statusfalse[`+(($(this).parent().children().length+1)/2)+`]" autocomplete="off"  value="0" checked>
                  <label class="btn btn-outline-danger" for="statusfalse[`+(($(this).parent().children().length+1)/2)+`]">Sai</label>
            </div>`);
    })
</script>

