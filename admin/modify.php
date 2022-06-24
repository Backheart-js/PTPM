<?php
    $ma_taikhoan = $_GET['id'];
    include '../config/config.php';
    $sql = "SELECT * FROM taikhoan where ma_taikhoan = '$ma_taikhoan' " ;
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin</title>
</head>
<body>
    <?php
        include('./header.php');
    ?>

    <main class="container">
        <form action="./process/process-modify.php" method="POST" class="form mt-5 ps-5 pe-5 pt-5 pb-5 container" id="form-1">
            <h3 class="heading text-center mb-5">Sửa thông tin của tài khoản</h3>

            <div class="form-content">
                <div class="row">
                    <div class="form-group mb-4 col-lg-12">
                        <label for="id" class="form-label">Mã tài khoản</label>
                        <input id="id" name="id" value="<?php echo $row['ma_taikhoan']; ?>" type="text" readonly class="form-control">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group mb-4 col-lg-12">
                        <label for="username" class="form-label">Tên người dùng</label>
                        <input id="username" name="username" value="<?php echo $row['taikhoan']; ?>" type="text" class="form-control">
                        <span class="form-message"></span>
                    </div>
                </div>

                <h5 class="heading-content mt-5">THÔNG TIN NGƯỜI DÙNG</h5>
                <hr class="mb-3 line-space">
                <div class="row">
                    <div class="form-group mb-2 col-lg-12">
                        <label for="fullname" class="form-label">Họ tên</label>
                        <input id="fullname" name="fullname" value="<?php echo $row['hoten']; ?>" type="text" class="form-control">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group mb-2 col-lg-12">
                        <label for="position" class="form-label">Chức vụ</label>
                        <input id="position" name="position" value="<?php echo $row['chucvu']; ?>" type="text" class="form-control">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group mb-2 col-lg-12">
                        <label for="condition" class="form-label">Tình trạng làm việc</label>
                        <input id="condition" name="condition" value="<?php echo $row['conlamviec']; ?>" type="text" class="form-control">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group mt-4 mb-2 col-lg-12">
                        <label for="classify" class="form-label col-lg-12">Phân loại tài khoản</label>
                        <select name="classify" class="form-control classify">
                            <?php
                                if ($row['capbac']==1) {
                                    ?>
                                        <option value="admin">Tài khoản quản trị hệ thống</option>
                                        <option value="employee">Tài khoản cho nhân viên phường</option>
                                    <?php
                                }
                                else {
                                    ?>
                                        <option value="employee">Tài khoản cho nhân viên phường</option>
                                        <option value="admin">Tài khoản quản trị hệ thống</option>
                                    <?php
                                }
                            ?>
                        </select>
                        <span class="form-message"></span>
                    </div>
                </div>
                

                <button type="submit" class="form-submit btn btn-primary mt-5 col-lg-12" name="btnSubmit">Cập nhật</button>

            </div>
        </form>
    </main>
</body>
</html>

<?php
}
?>