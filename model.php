<?php
const DB_HOST = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'qlnk';
class Process{
    public function connectDb() {
        $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        if (!$connection) {
            die("Không thể kết nối. Lỗi: " .mysqli_connect_error());
        }
        return $connection;
    }
    public function closeDb($connection = null) {
        mysqli_close($connection);
    }
    function getALL($code, $type, $table){
        $conn = $this->connectDb();
        $querySelect = "SELECT * FROM ".$table." WHERE ".$type."='{$code}'";
        $resultService = mysqli_query($conn, $querySelect);
        $SEDArr = [];
        if(mysqli_num_rows($resultService)>0){
            $SEDArr = mysqli_fetch_all($resultService, MYSQLI_ASSOC);
            return $SEDArr;
        }else{
            return false;
        }
    }
    function getALLElements($table){
        $conn = $this->connectDb();
        $querySelect = "SELECT * FROM ".$table."";
        $resultService = mysqli_query($conn, $querySelect);
        $SEDArr = [];
        if(mysqli_num_rows($resultService)>0){
            $SEDArr = mysqli_fetch_all($resultService, MYSQLI_ASSOC);
            return $SEDArr;
        }else{
            return false;
        }
    }
    function getCB($code, $type, $table){
        $conn = $this->connectDb();
        $querySelect = "SELECT * FROM ".$table." WHERE ".$type."='{$code}'";
        $resultService = mysqli_query($conn, $querySelect);
        $SEDArr = [];
        if(mysqli_num_rows($resultService)>0){
            $bds = mysqli_fetch_all($resultService, MYSQLI_ASSOC);
            $SEDArr = $bds[0];
            return $SEDArr;
        }else{
            return false;
        }
    }
    function getDate($date){
        if($date!=''){
            $string = explode("-", $date);
            return $string[2].'/'.$string[1].'/'.$string[0];
        }else{
            return '';
        }
    }
    public function getCauHoiDangXuLy(){
        $conn = $this->connectDb();
        $querySelect = "SELECT* from cauhoi where trangthai = 2 and loaicauhoi = 1";
        $resultService = mysqli_query($conn, $querySelect);
        if(mysqli_num_rows($resultService)>0){
            $row = mysqli_fetch_assoc($resultService);
            return $row['ma_cauhoi'];
        }else{
            return false;
        }
    }
    public function searchCH($ch){
        $conn = $this->connectDb();
        $querySelect = "SELECT* from cauhoi where ( trangthai = 0 or trangthai = 2) and loaicauhoi = 1 and ( email = '{$ch}' or sdt = '{$ch}' or ma_cauhoi = '{$ch}' )";
        $resultService = mysqli_query($conn, $querySelect);
        $SEDArr = [];
        if(mysqli_num_rows($resultService)>0){
            $bds = mysqli_fetch_all($resultService, MYSQLI_ASSOC);
            $SEDArr = $bds;
            return $SEDArr;
        }else{
            return false;
        }
    }
    //Bắt đầu SQL về phản hồi thủ tục
    public function getThuTucTamTru(){
        $conn = $this->connectDb();
        $querySelect = "SELECT * FROM tamtru where xacnhan = 0";
        $resultService = mysqli_query($conn, $querySelect);
        $SEDArr = [];
        if(mysqli_num_rows($resultService)>0){
            $bds = mysqli_fetch_all($resultService, MYSQLI_ASSOC);
            $SEDArr = $bds;
            return $SEDArr;
        }else{
            return false;
        }
    }
    public function getThuTucTamVang(){
        $conn = $this->connectDb();
        $querySelect = "SELECT * FROM tamvang where xacnhan = 0";
        $resultService = mysqli_query($conn, $querySelect);
        $SEDArr = [];
        if(mysqli_num_rows($resultService)>0){
            $bds = mysqli_fetch_all($resultService, MYSQLI_ASSOC);
            $SEDArr = $bds;
            return $SEDArr;
        }else{
            return false;
        }
    }
    public function getChiTietTamTru($matt){
        $conn = $this->connectDb();
        $querySelect = "SELECT * FROM tamtru where ma_dontt = '{$matt}'";
        $resultService = mysqli_query($conn, $querySelect);
        $SEDArr = [];
        if(mysqli_num_rows($resultService)>0){
            $bds = mysqli_fetch_all($resultService, MYSQLI_ASSOC);
            $SEDArr = $bds[0];
            return $SEDArr;
        }else{
            return false;
        }
    }
    public function getChiTietTamVang($matv){
        $conn = $this->connectDb();
        $querySelect = "SELECT * FROM tamvang where ma_dontv = '{$matv}'";
        $resultService = mysqli_query($conn, $querySelect);
        $SEDArr = [];
        if(mysqli_num_rows($resultService)>0){
            $bds = mysqli_fetch_all($resultService, MYSQLI_ASSOC);
            $SEDArr = $bds[0];
            return $SEDArr;
        }else{
            return false;
        }
    }
    //Kết thúc SQL về phản hồi thủ tục
}
?>