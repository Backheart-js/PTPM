<?php
include('../../config/config.php');
if (isset($_SESSION['LoginOK'])) {
if(isset($_POST['btnSubmit'])){
    include('../../model.php');
    require_once("../../send_email.php");
    $ps = new Process();
    $id = $_POST['id'];
    $email = $_POST['email'];
    $type = $_POST['phanloai'];
    $pheduyet = $_POST['pheduyet'];
    $ngaybatdau = date("Y-m-d");
    $canbopheduyet = $_SESSION['LoginOK'][1];
    $ph = "";
    if($pheduyet=="yes"){
        $xacnhan = 1;
        $ph = "đã được phê duyệt.";
        $content = "Thủ tục tạm trú của bạn đã được chúng tôi thông qua. Mời bạn nhấn vào <a href='localhost/BTL_PTPM/taixuong.php'>đây</a> và nhập mã thủ tục để xem thông tin chi tiết";
    }else{
        $xacnhan = 2;
        $ph = "đã bị từ chối.";
        $content = "Thủ tục tạm trú của bạn đã không được chúng tôi thông qua. Mời bạn nhấn vào <a href='localhost/BTL_PTPM/taixuong.php'>đây</a> và nhập mã thủ tục để xem thông tin chi tiết";
    }
    if($type=="Thủ tục tạm vắng"){
        if($xacnhan==1){
            $query = "UPDATE `tamvang` SET `xacnhan`='{$xacnhan}', ngaybatdau = '{$ngaybatdau}' WHERE `ma_dontv` = '{$id}'";
            $query2 = "INSERT INTO `taikhoan_tamvang`(`ma_taikhoan`, `ma_dontv`) VALUES ('{$canbopheduyet}', '{$id}')";
            $isTV = mysqli_query($conn, $query);
            $isInsertCBPD = mysqli_query($conn, $query2);
            $loai = "Phê duyệt";
        }else{
            $query = "UPDATE `tamvang` SET `xacnhan`='{$xacnhan}' WHERE `ma_dontv` = '{$id}'";
            $query2 = "INSERT INTO `taikhoan_tamvang`(`ma_taikhoan`, `ma_dontv`) VALUES ('{$canbopheduyet}', '{$id}')";
            $isTV = mysqli_query($conn, $query);
            $isInsertCBPD = mysqli_query($conn, $query2);
            $loai = "Từ chối";
        }
        if($isTV && $isInsertCBPD){
            $subject = "[Quận Hoàn Kiếm] Thủ tục tạm vắng ".$id." ".$ph;
            $body = $content;
            sendemailforAccount($email, $subject, $body);
            $done = $loai." thành công!";
            header("location: index.php?success=$done");
        }else{
            $done = $loai." không thành công!";
            header("location: index.php?success=$done");
        }
    }else{
        if($xacnhan==1){
            $query = "UPDATE `tamtru` SET `xacnhan`='{$xacnhan}', ngaybatdau = '{$ngaybatdau}' WHERE `ma_dontt` = '{$id}'";
            $query2 = "INSERT INTO `taikhoan_tamtru`(`ma_taikhoan`, `ma_dontt`) VALUES ('{$canbopheduyet}', '{$id}')";
            $isTT = mysqli_query($conn, $query);
            $isInsertCBPD = mysqli_query($conn, $query2);
            $loai = "Phê duyệt";
        }else{
            $query = "UPDATE `tamtru` SET `xacnhan`='{$xacnhan}' WHERE `ma_dontt` = '{$id}'";
            $query2 = "INSERT INTO `taikhoan_tamtru`(`ma_taikhoan`, `ma_dontt`) VALUES ('{$canbopheduyet}', '{$id}')";
            $isTT = mysqli_query($conn, $query);
            $isInsertCBPD = mysqli_query($conn, $query2);
            $loai = "Từ chối";
        }
        if($isTT && $isInsertCBPD){
            $subject = "[Quận Hoàn Kiếm] Thủ tục tạm trú ".$id." ".$ph;
            $body = $content;
            sendemailforAccount($email, $subject, $body);
            $done = $loai." thành công!";
            header("location: index.php?success=$done");
        }else{
            $done = $loai." không thành công!";
            header("location: index.php?success=$done");
        }
    }
}else{
    header("location: ../index.php");
}
}else{
    header("location: ../../index.php");
}
?>