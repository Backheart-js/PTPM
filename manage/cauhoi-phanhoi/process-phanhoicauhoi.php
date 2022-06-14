<?php
include('../../config/config.php');
if (isset($_SESSION['LoginOK'])) {
    include('../../model.php');
    require_once("../../send_email.php");
    if (isset($_POST['btnSubmitCH'])) {
        $noidung = $_POST['noiDungPhanHoi'];
        $ma_cauhoi = $_POST['macauhoi'];
        $ps = new Process();

        $cauHoi = $ps->getCB($ma_cauhoi, 'ma_cauhoi', 'cauhoi');
        $email = $cauHoi['email'];
        $ngayphanhoi = date("Y-m-d");
        $ma_phanhoi = strtoupper(substr(md5(rand()), 0, 9));

        $query1 = "INSERT INTO `phanhoi`(`ma_phanhoi`, `phanhoi`, `ngayphanhoi`, `ma_cauhoi`) 
        VALUES ('{$ma_phanhoi}','{$noidung}','{$ngayphanhoi}','{$ma_cauhoi}')";
        $isInsertPHCH = mysqli_query($conn, $query1);

        $query2 = "UPDATE `cauhoi` SET `trangthai`= 1 WHERE `ma_cauhoi` = '$ma_cauhoi'";
        $isUpdatePHCH = mysqli_query($conn, $query2);

        if ($isInsertPHCH && $isUpdatePHCH) {
            $success = "Phản hồi của bạn đã được gửi đi thành công và câu hỏi đã được hoàn tất!";
            $subject = "[Quận Hoàn Kiếm] Phản hồi câu hỏi " . $ma_cauhoi;
            $body = "<h2>Chào bạn!</h2><br>
            <h3>Chúng tôi đã xử lý câu hỏi của bạn và đây là phản hồi của chúng tôi:</h3><br>
            " . $noidung;
            sendemailforAccount($email, $subject, $body);
            header("location: quanlycauhoi.php?success=$success");
        } else {
            $success = "Phản hồi của bạn chưa được gửi đi và câu hỏi chưa được hoàn tất!";
            header("location: index.php?controller=PhanHoi&action=homthu&success=$success");
        }
    }
    else{
        header("location: quanlycauhoi.php");
    }
}else{
    header("location: ../../index.php");
}
?>