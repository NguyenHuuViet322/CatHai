<?php 
    require_once 'dbconfig.php';
    session_start();

    if (isset($_POST['add_submit'])) {
        $id = $_POST['id'];
        $content = $_POST['noidung'];
        
        $sql = "INSERT INTO `CauHoi`(`idtieudiem`, `noidung`, `note`) VALUES ('{$_POST['id']}','{$_POST['noidung']}','')";
    }
    
    if (isset($_POST['update_submit'])) {
        $idch = $_POST['idch'];
        $id = $_POST['id'];
        $content = $_POST['noidung'];
        
        $sql = "UPDATE `CauHoi` SET `idtieudiem`='{$id}',`noidung`='{$content}' WHERE `id` = '{$idch}'";
    }
    
    if (isset($_POST['delete_submit'])) {
        $id = $_POST['id'];
        
        $sql = "DELETE FROM `CauHoi` WHERE id = '{$id}'";
    }

    if ($result = $mysqli->query($sql)) {
        $_SESSION['status'] = "success";
        $_SESSION['message'] = "Thao tác thành công";

        if (isset($_POST['add_submit'])) {
            $list_dapan = $_POST['dapan'];
            $list_status = $_POST['status'];
            $idch = $mysqli->insert_id;
            
            for($i = 0; $i < count($list_dapan);$i++) {
                $sql = "INSERT INTO `DapAn`(`idcauhoi`, `noidung`, `status`) VALUES ('{$idch}','{$list_dapan[$i]}','{$list_status[$i+1]}')";
                if ($mysqli->query($sql)) {
                    $_SESSION['status'] = "success";
                    $_SESSION['message'] = "Thao tác thành công";
                } else {
                    $_SESSION['status'] = "error";
                    $_SESSION['message'] = "Có lỗi xảy ra";
                }
            }
        }
        
        if (isset($_POST['update_submit'])) {
            $list_id = $_POST['idstatus'];
            $list_dapan = $_POST['dapan'];
            $list_status = $_POST['status_'.$_POST['idch']."_"];

            for($i = 0; $i < count($list_dapan);$i++) {
                $sql = "UPDATE `DapAn` SET `idcauhoi`='{$_POST['idch']}',`noidung`='{$list_dapan[$i]}',`status`='{$list_status[$i+1]}' WHERE `id` = {$list_id[$i]}";
                if ($mysqli->query($sql)) {
                    $_SESSION['status'] = "success";
                    $_SESSION['message'] = "Thao tác thành công";
                } else {
                    $_SESSION['status'] = "error";
                    $_SESSION['message'] = "Có lỗi xảy ra";
                }
            }
        }
        
        if (isset($_POST['delete_submit'])) {
            $sql = "DELETE FROM `DapAn` WHERE idcauhoi = '{$_POST['id']}'";
            if ($mysqli->query($sql)) {
                $_SESSION['status'] = "success";
                $_SESSION['message'] = "Thao tác thành công";
            } else {
                $_SESSION['status'] = "error";
                $_SESSION['message'] = "Có lỗi xảy ra";
            }
        }
    } else {
        $_SESSION['status'] = "error";
        $_SESSION['message'] = $mysqli->error();
    }
    
    header("Location: https://cathai-nckh032.000webhostapp.com/admin_question.php?idtieudiem={$_POST['id']}");
?>