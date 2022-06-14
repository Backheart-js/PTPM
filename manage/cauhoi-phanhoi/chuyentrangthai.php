<?php
include('../../config/config.php');
if (isset($_SESSION['LoginOK'])) {
    include('../../model.php');
    $ps = new Process();
    if (isset($_GET['macauhoi'])) {
        $mach = $_GET['macauhoi'];
        $query = "UPDATE `cauhoi` SET `trangthai`= 2 WHERE `ma_cauhoi` = '$mach'";
        $isInsertPHCH = mysqli_query($conn, $query);
        if ($isInsertPHCH) {
            header("location: quanlycauhoi.php");
        } else {
            $khongthanhcong = "Chuyển trạng thái không thành công!";
            header("location: quanlycauhoi.php?success={$khongthanhcong}");
        }
    }
}else{
    header("location: ../../index.php");
}
?>