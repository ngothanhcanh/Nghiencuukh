<?php include '../quanlysvphp/app/mvc/views/layout/header-siba-GV.php' ?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Danh Sách Học Phần Đang dạy
                        <!-- <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                        </span> -->
                    </header>
                    <div class="panel-body">
                        <div class="adv-table editable-table ">
                            <div class="clearfix">
                                <div class="btn-group pull-right">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                    <form method="POST" action="<?= URL ?>/GiangVienHocPhanController/export">
                                            <li><button name="exportds">Export to Excel</button></li>
                                        </form>
                                    </ul>
                                </div>
                            </div>
                            <div class="space15"></div>
                            <div id="editable-sample_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <!-- <div id="editable-sample_length" class="dataTables_length"><label><select size="1" name="editable-sample_length" aria-controls="editable-sample" class="form-control xsmall">
                                                    <option value="5" selected="selected">5</option>
                                                    <option value="15">15</option>
                                                    <option value="20">20</option>
                                                    <option value="-1">All</option>
                                                </select> records per page</label></div> -->
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="dataTables_filter" id="editable-sample_filter"><label>Search: <input type="text" id="search-input" aria-controls="editable-sample" class="form-control medium"></label></div>
                                    </div>
                                </div>
                                <table class="table table-striped table-hover table-bordered dataTable" id="editable-sample" aria-describedby="editable-sample_info">
                                    <thead>
                                        <tr role="row">
                                             <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending" style="width: 223px;">STT</th>
                                            <th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="First Name" style="width: 120px;">Mã học phần</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending" style="width: 223px;">Tên học phần</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Points: activate to sort column ascending" style="width: 223px;">Số TC</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Points: activate to sort column ascending" style="width: 223px;">Giáo viên phụ trách</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Points: activate to sort column ascending" style="width: 223px;">Nhập Điểm Các Sinh Viên</th>                      
                                        </tr>
                                    </thead>
                                    <form method="POST" action="<?=URL ?>/GiangVienHPBDController/index">
                                    <tbody id="search-results" role="alert" aria-live="polite" aria-relevant="all">
                                        <?php 
                                        $stt=0;
                                        if(!isset($result))
                                        {

                                        }else{
                                        foreach ($result as $row) {
                                        ?>
                                            <tr class="odd" id="<?= $row['MAHP'] ?>">
                                                <td><?= ++$stt ?></td>
                                                <td class="sorting_1"><?php echo $row['MAHP'] ?></td>
                                                <td class="name"> <?= $row['TENHP'] ?></td>
                                                <td class="password"><?= $row['SOTC'] ?></td>
                                                <td class="giangvien"><?= $row['GVPT'] ?></td>
                                                <td class="DSsinhvien"><button name="mahp-dssv" value="<?php echo $row['MAHP'] ?>" ><i class="fa fa-list-alt"></i></button></td>
                                            </tr>
                                        <?php
                                        }}
                                        ?>
                                    </tbody>
                                    </form>
                                </table>
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
        //tìm kiếm 
        $('#search-input').on('input', function() {
            $('.odd').remove(); //xóa các tr odd đang hiện 
            var searchValue = $(this).val().toLowerCase(); //đưa hết về chữ thường 
            <?php if (isset($result)) {
                foreach ($result as $row) { ?>
                    var name = '<?php echo $row['TENHP']; ?>'.toLowerCase(); //đặt biến name là tên của giá trị name trong bảng người dùng
                    if (name.includes(searchValue)) //so sách giá trị tìm bằng giá trị name
                    {
                        var listItem = ' <tr class="odd" id="<?= $row['MAHP'] ?>"><td><?= ++$stt ?></td><td class="sorting_1"><?php echo $row['MAHP'] ?></td><td class="name"> <?= $row['TENHP'] ?></td><td class="password"><?= $row['SOTC'] ?></td><td class="giangvien"><?= $row['GVPT'] ?></td><td class="DSsinhvien"><button name="mahp-dssv" value="<?php echo $row['MAHP'] ?>" ><i class="fa fa-list-alt"></i></button></td></tr>';
                        $('#search-results').append(listItem);
                    }

            <?php }
            } ?>

        });
    });
</script>
<!-- main-end -->
<?php include '../quanlysvphp/app/mvc/views/layout/footerGV.php' ?>