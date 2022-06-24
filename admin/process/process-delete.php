<?php
    $id = $_GET['id'];
    include('../../config/config.php');

    $sql = "DELETE From taikhoan where ma_taikhoan='$id' ";
    $result = mysqli_query($conn,$sql);

    if ($result) {
        header("Location: /BTL_PTPM/admin/index.php");
    }
    else {
        echo "Lỗi truy vấn!";
    }
?>