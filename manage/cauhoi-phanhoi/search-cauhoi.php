<?php
include('../../config/config.php');
if (isset($_SESSION['LoginOK'])) {
if (isset($_POST['cauhoi'])) {
    $cauHoi = $_POST['cauhoi'];
    include('../../model.php');
    $ps = new Process();
    $result = $ps->searchCH($cauHoi);
    $isDangXuLy = $ps->getCauHoiDangXuLy();
    if ($result != false) {
        for ($i = 0; $i < count($result); $i++) {
            $row = $result[$i];
            $classCH = $row['ma_cauhoi'];
            if ($row['trangthai'] == 0) {
                $trangthai = "Đang chờ xử lý";
            } else if ($row['trangthai'] == 2) {
                $trangthai = "Đang xử lý";
            }
    ?>
            <div class="row border-start border-top border-end mb-4">
                <div class="col-md-12 mt-1 mb-1 cauhoi p-2">
                    <span class="text-uppercase"><i class="bi bi-envelope icon-email"></i>EMAIL: <?php echo $row['email'] ?></span>
                </div>
                <div class="col-md-12 mt-1 mb-1 cauhoi p-2">
                    <span class="text-uppercase"><i class="bi bi-code-slash icon-email"></i>Mã: <?php echo $row['ma_cauhoi'] ?></span>
                </div>

                <div class="col-md-12 mt-1 mb-1 cauhoi p-2">
                    <span class="text-uppercase"><i class="bi bi-code-slash icon-email"></i>Trạng thái: <?php echo $trangthai ?></span>
                </div>

                <div class="col-md-12 mb-1 cauhoi p-2">
                    <?php
                    $p = $row['lydo'];
                    $text = substr($p, 0, 100);
                    $text = $text . ' . . .';
                    ?>
                    <h5 class="text-uppercase">Nội dung</h5>
                    <span><?php echo $text ?></span>
                </div>
                <div class="col-md-12 mb-1 cauhoi p-2">
                    <h5 class="text-uppercase">Thao tác</h5>
                    <a data-bs-toggle="modal" id="<?php echo $classCH ?>" data-bs-target="#exampleModal" class="xemchitiet text-decoration-none" role="button"><span class="thaotac"><i class="bi bi-eye"></i> CHI TIẾT</span></a>
                    <?php
                        if($trangthai=="Đang xử lý"){
                    ?>
                    <a href="phanhoicauhoi.php?macauhoi=<?php echo $row['ma_cauhoi'] ?>" class="text-decoration-none"><span class="thaotac"><i class="bi bi-reply-fill"></i> PHẢN HỒI</span></a>
                    <?php
                        }
                    ?>
                    <?php
                        if($isDangXuLy==false){
                    ?>
                    <a href="chuyentrangthai.php?macauhoi=<?php echo $row['ma_cauhoi'] ?>" class="text-decoration-none"><span class="thaotac"><i class="bi bi-toggle-on"></i></i> CHUYỂN TRẠNG THÁI</span></a>
                    <?php
                    }
                    ?>
                    <a href="xoacauhoi.php?macauhoi=<?php echo $row['ma_cauhoi'] ?>" onclick="return confirm('Bạn chắc chắn muốn xóa câu hỏi này?')" class="text-decoration-none"><span class="thaotac"><i class="bi bi-trash"></i> XÓA</span></a>
                </div>
            </div>
            <hr>
        <?php
        }
        ?>
        <script src="../../js/jquery-3.6.0.min.js"></script>
        <script src="../../js/Validator.js"></script>
        <script src="../../js/script.js"></script>
        <script src="../../js/script_manage.js"></script>
        <?php
    }else{
        echo "<h4>Không tìm thấy câu hỏi!</h4>";
    }
}else{
    header("location: quanlycauhoi.php");
}
}else{
    header("location: ../../index.php");
}
?>