<?php include '../quanlysvphp/app/mvc/views/layout/header-siba-GV.php' ?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Lịch Dạy Của Giảng Viên
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                        </span>
                        <p><?php if (isset($_SESSION['import_error'])) {
                                $error = $_SESSION['import_error'];
                                echo 'lỗi ở các mã: ';
                                foreach ($error as $er) {
                                    echo " $er;";
                                }
                                unset($_SESSION['import_error']);
                            }
                            ?></p>
                    </header>
                    <div class="panel-body">
                        <div class="adv-table editable-table ">
                            <div class="clearfix">                      
                                <div class="btn-group pull-right">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <form method="POST" action="<?= URL ?>/GiangVienThoiKhoaBieuController/export">
                                            <li><button name="exportds">Export to Excel</button></li>
                                        </form>
                                    </ul>
                                </div>
                            </div>
                            <div class="space15"></div>
                            <div id="editable-sample_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                <div class="row">
                                    <div class="col-lg-6 thoat">
                                       
                                    </div>
                                    <!-- <div class="col-lg-6">
                                        <div class="dataTables_filter" id="editable-sample_filter"><label>Search: <input type="text" id="search-input" aria-controls="editable-sample"  class="form-control medium"></label></div>
                                    </div> -->
                                </div>
                                <table class="table table-striped table-hover table-bordered dataTable" id="editable-sample" aria-describedby="editable-sample_info">
                                <thead>
                                    <tr role="row" style="text-align: center;">                                      
                                        <th colspan="3" style="text-align: center;">Buổi 1</th>
                                        <th colspan="3" style="text-align: center;">Buổi 2</th>
                                        <th class="sorting" rowspan="2" style="width: 120px;">B.đầu</th>
                                        <th class="sorting" rowspan="2" style="width: 120px;">K.thúc</th>
                                        <th class="sorting" rowspan="2" style="width: 103px;">G.chú</th>
                                        <th class="sorting" rowspan="2" style="width: 103px;">Lớp</th>
                                        <th class="sorting" rowspan="2" style="width: 103px;">Môn học</th>
                                        <th class="sorting" rowspan="2" style="width: 103px;">G.viên</th>                                      
                                    </tr>
                                    <tr role="row">
                                        <th class="sorting" style="width: 70px;">Thứ</th>
                                        <th class="sorting" style="width: 70px;">Tiết</th>
                                        <th class="sorting" style="width: 70px;">Phòng</th>
                                        <th class="sorting" style="width: 70px;">Thứ</th>
                                        <th class="sorting" style="width: 70px;">Tiết</th>
                                        <th class="sorting" style="width: 70px;">Phòng</th>
                                    </tr>
                                </thead>
                               
                                    <tbody id="search-results" role="alert" aria-live="polite" aria-relevant="all">                                   
                                        <?php if (isset($result) && is_array($result) || is_object($result))
                                         { foreach ($result as $row) {
                                        ?>
                                            <tr class="odd">                                              
                                                <td class="b1_thu"><?= $row['BUOI1_THU'] ?></td>
                                                <td class="b1_tiet"><?= $row['BUOI1_TIET'] ?></td>
                                                <td class="b1_phong"><?= $row['BUOI1_PHONG'] ?></td>
                                                <td class="b2_thu"><?= $row['BUOI2_TIET'] ?></td>
                                                <td class="b2_tiet"><?= $row['BUOI2_THU'] ?></td>
                                                <td class="b2_phong"><?= $row['BUOI2_PHONG'] ?></td>
                                                <td class="n_bd"><?= $row['NGAYBATDAU'] ?></td>
                                                <td class="n_kt"><?= $row['NGAYKETTHUC'] ?></td>
                                                <td class="ghichu"><?= $row['GHICHU'] ?></td>
                                                <td class="lop"><button class="btn-lop" value="<?= $row['LOP'] ?>"><i class="fa fa-list-alt"> <?= $row['LOP'] ?></i></button></td>
                                                <td class="mh"><?= $row['MONHOC'] ?></td>
                                                <td class="gv"><?= $row['GIANGVIEN'] ?></td>                                  
                                            </tr>
                                        <?php
                                        }}
                                        ?>
                                    </tbody>
                                </table>
                                <div class="row">
                                    <!-- <div class="col-lg-6">
                                        <div class="dataTables_info" id="editable-sample_info">Showing 1 to 5 of 28 entries</div>
                                    </div> -->
                                    <div class="col-lg-6">
                                        <div class="dataTables_paginate paging_bootstrap pagination">
                                            <!-- <ul>
                                                <li class="prev disabled"><a href="#">← Prev</a></li>
                                                <li class="active"><a href="#">1</a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#">4</a></li>
                                                <li><a href="#">5</a></li>
                                                <li class="next"><a href="#">Next → </a></li>
                                            </ul> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
        $(document).ready(function() {
            $('#excelFile').change(function() {
            var fileInput = document.getElementById('excelFile');
            var importButton = document.getElementById('importButton');

            if (fileInput.files.length > 0) {
                importButton.disabled = false;
            } else {
                importButton.disabled = true;
            }
        });
        $(document).on('click','.btn-lop',function(){
        var selectmalop = $(this).val();
       var data = {
        selectmalop:selectmalop
       };
       $.ajax({
        url:'<?= URL ?>/GiangVienSVLopController/index',
        type: 'POST',
        dataType: 'html',
        data:data,
        success:function(response)
        { 
          $('.thoat').html('<a href="<?=URL?>/GiangVienThoiKhoaBieuController/index"><i class="fa fa-chevron-circle-left"> Trở về</i></a>');
          $('.table').html(response);
        }, 
        error: function(xhr, status, error) {
        console.log('Lỗi khi gửi yêu cầu AJAX:', error);
        }
       })
    })
 });
</script>
<!-- main-end -->
<?php include '../quanlysvphp/app/mvc/views/layout/footerGV.php' ?>