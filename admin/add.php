<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm tài khoản</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?php
        include('./header.php');
    ?>

    <main class="container">
        
        <form action="./process/process-add.php" method="POST" class="form mt-5 ps-5 pe-5 pt-5 pb-5 container" id="form-1">
            <h3 class="heading text-center mb-5">Thêm tài khoản cho cán bộ quản lí</h3>

            <div class="form-content">
                <div class="row">
                    <div class="form-group mb-4 col-lg-12">
                        <label for="username" class="form-label">Tên người dùng</label>
                        <input id="username" name="username" type="text" class="form-control">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group mb-2 col-lg-12">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input id="password" name="password" type="password" class="form-control">
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group mb-2 col-lg-12">
                        <label for="classify" class="form-label">Nhập lại mật khẩu</label>
                        <input id="re-password" name="re-password" type="password" class="form-control">
                        <span class="form-message"></span>
                    </div>
                </div>

                <h5 class="heading-content mt-5">THÔNG TIN NGƯỜI DÙNG</h5>
                <hr class="mb-3 line-space">
                <div class="row">
                    <div class="form-group mb-2 col-lg-12">
                        <label for="fullname" class="form-label">Họ tên</label>
                        <input id="fullname" name="fullname" type="text" class="form-control">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group mb-2 col-lg-12">
                        <label for="position" class="form-label">Chức vụ</label>
                        <input id="position" name="position" type="text" class="form-control">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group mb-2 col-lg-12">
                        <label for="condition" class="form-label">Tình trạng làm việc</label>
                        <input id="condition" name="condition" value="Còn làm việc" type="text" readonly class="form-control">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group mt-4 mb-2 col-lg-12">
                        <label for="classify" class="form-label col-lg-12">Phân loại tài khoản</label>
                        <select name="classify" class="form-control classify">
                            <option value="employee">Tài khoản cho nhân viên phường</option>
                            <option value="admin">Tài khoản quản trị hệ thống</option>
                        </select>
                        <span class="form-message"></span>
                    </div>
                </div>
                

                <button type="submit" class="form-submit btn btn-primary mt-5 col-lg-12" name="btnSubmit">Tạo tài khoản</button>

            </div>
        </form>
    </main>
</body>
</html>