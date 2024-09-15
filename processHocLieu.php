<?php 
    require_once 'dbconfig.php';
    session_start();

    if (isset($_POST['add_submit'])) {
        $name = $_POST['name'];
        $category_id = $_POST['theloai'];
        $content = $_POST['hiddeninput']; 
        $latitude = $_POST['lat'];
        $longitude = $_POST['lng'];
        $note = $_POST['note'];
        
        $sql = "INSERT INTO `TieuDiem`(`name`, `idtheloai`, `description`, `lat`, `lng`, `note`) VALUES ('{$name}','{$category_id}','{$content}','{$latitude}','{$longitude}','{$note}')";
    }
    
    if (isset($_POST['update_submit'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $category_id = $_POST['theloai'];
        $content = $_POST['hiddeninput_'.$id]; 
        $latitude = $_POST['lat_'.$id];
        $longitude = $_POST['lng_'.$id];
        $note = $_POST['note'];
        
        $sql = "UPDATE `TieuDiem` SET `name`='{$name}',`idtheloai`='{$category_id}',`description`='{$content}',`lat`={$latitude},`lng`={$longitude},`note`='{$note}' WHERE `id`='{$id}'";
    }
    
    if (isset($_POST['delete_submit'])) {
        $id = $_POST['id'];
        
        $sql = "DELETE FROM `TieuDiem` WHERE id = '{$id}'";
    }

    if ($result = $mysqli->query($sql)) {
        $_SESSION['status'] = "success";
        $_SESSION['message'] = "Thao tác thành công";
        
        $target_dir = "assets/img/TieuDiem/CatHai-{$mysqli->insert_id}.jpg";
        $target_file = $target_dir;
        $uploadOk = 1;

        if(isset($_FILES["image"])) {
          if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
              $_SESSION['message'] = "thành công";
          } else {
            $_SESSION['status'] = "error";
            $_SESSION['message'] = "Upload ảnh thất bại";
          }    
        }
    } else {
        $_SESSION['status'] = "error";
        $_SESSION['message'] = $mysqli->error();
    }
    
    header("Location: https://cathai-nckh032.000webhostapp.com/admin.php#list");
?>