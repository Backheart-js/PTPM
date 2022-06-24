<?php
include('../config/config.php');
if (isset($_SESSION['AdminLoginOK'])) {
    include('../model.php');
    $ps = new Process();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <?php
        include('./header.php');
    ?>

    <main class="container">
        <h2 class="title mt-5 mb-4 text-center">
            Quản lí và phân quyền tài khoản
        </h2>

        <a href="./add.php" class="btn btn-primary mt-3 mb-4">Thêm tài khoản quản lí</a>

        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">Mã</th>
                <th scope="col">Tên đăng nhập</th>
                <th scope="col">Tên người dùng</th>
                <th scope="col">Chức vụ</th>
                <th scope="col">Ngày khởi tạo</th>
                <th scope="col">Phân quyến</th>
                <th scope="col">
                    Sửa thông tin
                </th>
                <th scope="col">
                    Xóa
                </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM taikhoan" ;
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <th scope="row"><?php echo $row['ma_taikhoan']; ?></th>
                            <td><?php echo $row['taikhoan']; ?></td>
                            <td><?php echo $row['hoten']; ?></td>
                            <td><?php echo $row['chucvu']; ?></td>
                            <td><?php echo $row['ngaykhoitao']; ?></td>
                            <td class=""><?php echo $row['capbac']; ?></td>
                            <td>
                                <a href="./modify.php?id=<?php echo $row['ma_taikhoan']; ?>">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </td>
                            <td>
                                <a href="./process/process-delete.php?id=<?php echo $row['ma_taikhoan']; ?>">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                <?php
                        }
                    }
                ?>
            </tbody>
            </table>

    </main>

</body>
<?php
    } else {
        header("location: /BTL_PTPM/login/web/index.php");
    }
?>