<?php
include('../../config/config.php');
    if (isset($_SESSION['LoginOK'])) {
    if(isset($_POST['loai'])){
        include('../../model.php');
        $ps = new Process();
        if($_POST['loai']=="tamtru"){
            $tamtru = $ps->getThuTucTamTru();
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
        }else{
            $tamvang = $ps->getThuTucTamVang();
            if($tamvang!=false){
            for($i = 0; $i < count($tamvang); $i++){
                $row = $tamvang[$i];
                ?>
                <tr>
                    <th scope="row"><?php echo $i?></th>
                    <th><?php echo $row['ma_dontv'] ?></th>
                    <th><?php echo $row['hoten'] ?></th>
                    <th><?php echo $row['cccd'] ?></th>
                    <th><?php echo $row['diachithuongtru'] ?></th>
                    <th><?php echo $row['phanhoi'] ?></th>
                    <td><a href="chiTiet.php?id=<?php echo $row['ma_dontv'] ?>&type=tamvang">Xem chi tiết</a></td>   
                </tr>
                <?php
            }
        }
        }
    }else{
        header("location: index.php");
    }
}else{
    header("location: ../../index.php");
}
?>