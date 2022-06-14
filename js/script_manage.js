//xem chi tiết câu hỏi
$(document).ready(function(){
    $(".xemchitiet").click(function(){
        var macauhoi = this.id;
        if(macauhoi!=""){
            let form_datas = new FormData();
            form_datas.append('ma_cauhoi',macauhoi);
            $.ajax({
                url: '../cauhoi-phanhoi/ajax-xemchitiet.php', // gửi đến file upload.php 
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_datas,
                type: 'post',
                success: function(res) {
                    $("#infoquestion").html(res);
                }
            });
            return false;
        }else{
            
        }
    })
})
/*
//xem chi tiết phản hồi
$(document).ready(function(){
    $(".xemphanhoi").click(function(){
        var macauhoi = this.id;
        if(macauhoi!=""){
            let form_datas = new FormData();
            form_datas.append('ma_cauhoi',macauhoi);
            $.ajax({
                url: 'index.php?controller=PhanHoi&action=xemchitietphanhoi', // gửi đến file upload.php 
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_datas,
                type: 'post',
                success: function(res) {
                    $("#infoquestion").html(res);
                }
            });
            return false;
        }else{
            
        }
    })
})
*/
//tìm kiếm câu hỏi
$(document).ready(function(){
    $("#searchCH").click(function(){
        var cauhoi = $("#cauhoi").val();
        if(cauhoi!=""){
            let form_datas = new FormData();
            form_datas.append('cauhoi',cauhoi);
            $.ajax({
                url: '../cauhoi-phanhoi/search-cauhoi.php', // gửi đến file upload.php 
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_datas,
                type: 'post',
                success: function(res) {
                    $("#cauHoiCanGiaiDap").html(res);
                }
            });
            return false;
        }else{
            
        }
    })
})
/*
//tìm kiếm yêu cầu chuyển khẩu
$(document).ready(function(){
    $("#seachCK").click(function(){
        var chuyenkhau = $("#chuyenkhau").val();
        if(chuyenkhau!=""){
            let form_datas = new FormData();
            form_datas.append('chuyenkhau',chuyenkhau);
            $.ajax({
                url: 'index.php?controller=PhanHoi&action=timkiemchuyenkhau', // gửi đến file upload.php 
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_datas,
                type: 'post',
                success: function(res) {
                    $("#chuyenKhauCanGiaiDap").html(res);
                }
            });
            return false;
        }else{
            
        }
    })
})
//tìm kiếm lưu trữ
$(document).ready(function(){
    $("#searchLuuTru").click(function(){
        var luutru = $("#luutru").val();
        if(luutru!=""){
            let form_datas = new FormData();
            form_datas.append('luutru',luutru);
            $.ajax({
                url: 'index.php?controller=PhanHoi&action=timkiemluutru', // gửi đến file upload.php 
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_datas,
                type: 'post',
                success: function(res) {
                    $("#luuTruThongTin").html(res);
                }
            });
            return false;
        }else{
            
        }
    })
})
*/
$(document).ready(function(){
    $('#type-input').change(function() {
        var value = $(this).val();
        if(value!=""){
            let form_datas = new FormData();
            form_datas.append('loai',value);
            $.ajax({
                url: '../phanHoiThuTuc/ajax-chuyenThuTuc.php', // gửi đến file upload.php 
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_datas,
                type: 'post',
                success: function(res) {
                    $("#search-table__content").html(res);
                }
            });
            return false;
        }else{

        }
    })
})