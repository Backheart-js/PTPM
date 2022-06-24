<?php
    include('../../config/config.php');

    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $fullname = $_POST['fullname'];
    $position = $_POST['position'];
    $condition = '1';

    $date = date("Y/m/d");

    if ($_POST['classify'] == 'admin') {
        $classify = '1';
    }
    else {
        $classify = '2';
    }

    $sql = "INSERT INTO taikhoan (taikhoan,matkhau,hoten,chucvu,conlamviec,ngaykhoitao,capbac)
            VALUES ('$username','$password','$fullname','$position','$condition','$date','$classify')";
    $result = mysqli_query($conn,$sql);

    if ($result) {
        header("Location: /BTL_PTPM/admin/add.php");
    }
    else {
        echo "Lỗi truy vấn!";
    }
?>