<?php
    include('../../config/config.php');

    $id = $_POST['id'];
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $position = $_POST['position'];
    $condition = $_POST['condition'];

    if ($_POST['classify'] == 'admin') {
        $classify = '1';
    }
    else {
        $classify = '2';
    }

    $sql = "UPDATE taikhoan 
            SET taikhoan='$username',hoten='$fullname',chucvu='$position',conlamviec='$condition',capbac='$classify'
            where ma_taikhoan='$id' ";
    $result = mysqli_query($conn,$sql);

    if ($result) {
        header("Location: /BTL_PTPM/admin");
    }
    else {
        echo "Lỗi truy vấn!";
    }
?>