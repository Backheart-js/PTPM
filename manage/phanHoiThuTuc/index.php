<?php
include('../../config/config.php');
if (isset($_SESSION['LoginOK'])) {
require("../partials-front/header.php");
include('../../model.php');
$ps = new Process();
$tamtru = $ps->getThuTucTamTru();
?>
    <head>
        <title>Phê duyệt thủ tục hành chính</title>
    </head>
    <main id="content" style="background-color: #f0f0f0;">
        <div class="container mt-5">
            <div class="mt-2 mb-2">
                    <a href="../index.php" class="text-decoration-none d-flex align-items-center">
                        <i class="bi bi-arrow-left-circle"></i>
                        <span> Quay lại</span> </a>
            </div>
            <div class="mb-2">
                <?php
                if(isset($_GET['success'])){
                ?>
                <h5 class="mt-2 mb-2"><?php echo $_GET['success'] ?></h5>
                <?php
                }
                ?>
            </div>
            <div class="row">
                <h1 class="text-center text-uppercase">Phê duyệt thủ tục</h1>

                <h3 class="title">Vui lòng chọn loại thủ tục</h3>
                <hr class="mb-3 line-space">

                <select name="" id="type-input" style="height: 36px;">
                    <option value="tamtru" selected>Thủ tục tạm trú</option>
                    <option value="tamvang">Thủ tục tạm vắng</option>
                </select>

                <div class="infor-table mt-5">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Mã Thủ Tục</th>
                            <th scope="col">Họ Tên</th>
                            <th scope="col">CCCD/CMND</th>
                            <th scope="col">Địa Chỉ</th>
                            <th scope="col">Hình Thức Phản Hồi</th>
                            <th scope="col">Chi Tiết</th>
                          </tr>
                        </thead>
                        <tbody id="search-table__content">
                            <?php
                            if($tamtru!=false){
                            for($i = 0; $i < count($tamtru); $i++){
                            $row = $tamtru[$i];
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i?></th>
                            <th><?php echo $row['ma_dontt'] ?></th>
                            <th><?php echo $row['hoten'] ?></th>
                            <th><?php echo $row['cccd'] ?></th>
                            <th><?php echo $row['diachithuongtru'] ?></th>
                            <th><?php echo $row['phanhoi'] ?></th>
                            <td><a href="chiTiet.php?id=<?php echo $row['ma_dontt'] ?>&type=tamtru">Xem chi tiết</a></td>   
                        </tr>
                        <?php
                            }
                    }
                    ?>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </main>
<?php
require("../partials-front/footer.php");
}else{
    header("location: ../../index.php");
}

?>