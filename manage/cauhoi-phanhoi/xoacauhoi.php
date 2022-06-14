<?php
include('../../config/config.php');
if (isset($_SESSION['LoginOK'])) {
    include('../../model.php');
    $ps = new Process();
    $mach = $_GET['macauhoi'];
    $query = "DELETE from `cauhoi` WHERE `ma_cauhoi` = '$mach'";
    $isDelete = mysqli_query($conn, $query);
    if ($isDelete) {
        $khongthanhcong = "Xóa câu hỏi thành công!";
        header("location: quanlycauhoi.php?success={$khongthanhcong}");
    } else {
        $khongthanhcong = "Xóa câu hỏi không thành công!";
        header("location: quanlycauhoi.php?success={$khongthanhcong}");
    }
}else{
    header("location: ../../index.php");
}
?>