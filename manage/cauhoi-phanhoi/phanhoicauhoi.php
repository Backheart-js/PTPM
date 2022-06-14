<?php
include('../../config/config.php');
if (isset($_SESSION['LoginOK'])) {
    if(isset($_GET['macauhoi'])){
        include('../../model.php');

        $ps = new Process();
        $ma_cauhoi = $_GET['macauhoi'];
        $cauHoi = $ps->getCB($ma_cauhoi, 'ma_cauhoi', 'cauhoi');
        $hoten = $cauHoi['hoten'];
        $email = $cauHoi['email'];
        $sdt = $cauHoi['sdt'];
        $lydo = $cauHoi['lydo'];
        $ngayhoi = $cauHoi['ngayhoi'];
        $trangthai = $cauHoi['trangthai'];
        $loaicauhoi = $cauHoi['loaicauhoi'];
        if($trangthai !=1 && $loaicauhoi==1){
        include("../partials-front/header.php");
        $canbodangky = $_SESSION['LoginOK'][1];
        $conganxa = $ps->getCB($canbodangky, 'ma_taikhoan', 'taikhoan');
?>
<head>
    <title>Phản hồi câu hỏi</title>
</head>
    <main style="background-color: #f0f0f0;">
        <div class="container">
            <div class="mt-2 mb-2">
                <a href="quanlycauhoi.php" class="text-decoration-none d-flex align-items-center"><span class="material-icons">
                        arrow_back
                    </span> <span>Quay lại</span> </a>
            </div>
            <h3 class="text-uppercase text-center">PHẢN HỒI THẮC MẮC</h3>
            <h5 class="text-uppercase text-center">Cán Bộ: <?php echo $conganxa['hoten'] ?></h5>
            <div class="row">
                <div class="col-md-6 p-2 me-5 border rounded background-fff">
                    <h4 class="text-uppercase text-center">Gửi phản hồi câu hỏi</h4>
                    <form action="process-phanhoicauhoi.php" method="POST">
                        <div class="form-floating">
                            <textarea class="form-control" name="noiDungPhanHoi" placeholder="Leave a comment here" id="floatingTextarea" style="height: 400px;" required></textarea>
                            <label for="floatingTextarea">NỘI DUNG PHẢN HỒI</label>
                            <input type="text" name="macauhoi" style="display:none;" value="<?php echo $ma_cauhoi ?>">
                        </div>
                        <div class="col-md mt-2 d-flex justify-content-center">
                            <button name="btnSubmitCH" type="submit" class="btn btn-primary">GỬI PHẢN HỒI</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 p-2 border rounded background-fff">
                    <h4 class="text-uppercase text-center">Chi tiết câu hỏi</h4>
                    <div class="row p-2">
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
                        <div class="col-md-12 d-flex justify-content-between mb-3">
                            <span class="fw-bold fs-5">Ngày hỏi: </span><span class="fs-5"><?php echo isset($ngayhoi) ? $ps->getDate($ngayhoi) : '' ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php
require_once("../partials-front/footer.php");
    }
}else{
    header("location: quanlycauhoi.php");
}
}else{
    header("location: ../../index.php");
}
?>