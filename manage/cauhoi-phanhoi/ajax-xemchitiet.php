<?php
include('../../config/config.php');
if (isset($_SESSION['LoginOK'])) {
if (isset($_POST['ma_cauhoi'])) {
    $ma_cauhoi = $_POST['ma_cauhoi'];
    include('../../model.php');
    $ps = new Process();
    $cauHoi = $ps->getCB($ma_cauhoi, 'ma_cauhoi', 'cauhoi');
    $hoten = $cauHoi['hoten'];
    $email = $cauHoi['email'];
    $sdt = $cauHoi['sdt'];
    $lydo = $cauHoi['lydo'];
    $ngayhoi = $cauHoi['ngayhoi'];
    $trangthai = $cauHoi['trangthai'];
    $loaicauhoi = $cauHoi['loaicauhoi'];
    if ($trangthai == 0) {
        $tt = "Đang chờ xử lý";
    } else if ($trangthai == 2) {
        $tt = "Đang xử lý";
    } else {
        $tt = "Hoàn tất";
    }
    if ($loaicauhoi == 1) {
?>
        <div class="row">
            <div class="col-md-12 chitet d-flex justify-content-between mb-3">
                <span class="fw-bold fs-5">Mã câu hỏi: </span><span class="fs-5"><?php echo isset($ma_cauhoi) ? $ma_cauhoi : '' ?></span>
            </div>
            <div class="col-md-12 d-flex chitet justify-content-between mb-3">
                <span class="fw-bold fs-5">Họ và tên: </span><span class="fs-5"><?php echo isset($hoten) ? $hoten : '' ?></span>
            </div>
            <div class="col-md-12 d-flex chitet justify-content-between mb-3">
                <span class="fw-bold fs-5">Email: </span><span class="fs-5"><?php echo isset($email) ? $email : '' ?></span>
            </div>
            <div class="col-md-12 d-flex chitet justify-content-between mb-3">
                <span class="fw-bold fs-5">Số điện thoại: </span><span class="fs-5"><?php echo isset($sdt) ? $sdt : '' ?></span>
            </div>
            <div class="col-md-12 chitet mb-3">
                <span class="fw-bold fs-5">Lý do gửi câu hỏi: </span><span class="fs-5"><?php echo isset($lydo) ? $lydo : '' ?></span>
            </div>
            <div class="col-md-12 chitet d-flex justify-content-between mb-3">
                <span class="fw-bold fs-5">Ngày hỏi: </span><span class="fs-5"><?php echo isset($ngayhoi) ? $ps->getDate($ngayhoi) : '' ?></span>
            </div>
            <div class="col-md-12 d-flex justify-content-between mb-3">
                <span class="fw-bold fs-5">Trạng thái: </span><span class="fs-5"><?php echo isset($tt) ? $tt : '' ?></span>
            </div>
        </div>
    <?php
    } else {
        $link = "uploads/" . $lydo;
    ?>
        <div class="row">
            <div class="col-md-12 chitet d-flex justify-content-between mb-3">
                <span class="fw-bold fs-5">Mã câu hỏi: </span><span class="fs-5"><?php echo isset($ma_cauhoi) ? $ma_cauhoi : '' ?></span>
            </div>
            <div class="col-md-12 d-flex chitet justify-content-between mb-3">
                <span class="fw-bold fs-5">Họ và tên: </span><span class="fs-5"><?php echo isset($hoten) ? $hoten : '' ?></span>
            </div>
            <div class="col-md-12 d-flex chitet justify-content-between mb-3">
                <span class="fw-bold fs-5">Email: </span><span class="fs-5"><?php echo isset($email) ? $email : '' ?></span>
            </div>
            <div class="col-md-12 d-flex chitet justify-content-between mb-3">
                <span class="fw-bold fs-5">Số điện thoại: </span><span class="fs-5"><?php echo isset($sdt) ? $sdt : '' ?></span>
            </div>
            <div class="col-md-12 chitet mb-3">
                <span class="fw-bold fs-5">File yêu cầu chuyển khẩu: </span><a class="text-decoration-none fs-5" href="<?php echo $link ?>">Nhấn vào đây để tải xuống!</a>
            </div>
            <div class="col-md-12 d-flex chitet justify-content-between mb-3">
                <span class="fw-bold fs-5">Ngày hỏi: </span><span class="fs-5"><?php echo isset($ngayhoi) ? $ps->getDate($ngayhoi) : '' ?></span>
            </div>
            <div class="col-md-12 d-flex justify-content-between mb-3">
                <span class="fw-bold fs-5">Trạng thái: </span><span class="fs-5"><?php echo isset($tt) ? $tt : '' ?></span>
            </div>
        </div>
    <?php
    }
}else{
    header("location: quanlycauhoi.php");
}
}else{
    header("location: ../../index.php");
}
?>