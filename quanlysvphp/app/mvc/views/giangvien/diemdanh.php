<?php include '../quanlysvphp/app/mvc/views/layout/header-siba-GV.php' ?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Điểm Danh
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                        </span>

                    </header>

                    <div class="panel-body">
                        <div class="adv-table editable-table ">
                            <div class="clearfix">
                                <div class="btn-group">
                                    <button id="editable-sample_new" class="btn btn-primary btn-diemdanh">
                                        Add New <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                                <div id="input-container" style="display: none;">
                                    <input type="date" id="name-input">
                                    <button id="ok-button" class="btn btn-success" onclick="addNewRecord()">OK</button>
                                </div>
                                <div class="btn-group pull-right">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <!-- <form method="POST" action="<?= URL ?>/GiangVienHPBDController/import" enctype="multipart/form-data">
                                                <input type="file" id="excelFile" name="excelFile" accept=".xlsx" onchange="checkFileSelected()">
                                                <button type="submit" name="importhpbd" id="importButton" disabled>Import</button>
                                            </form> -->
                                        </li>
                                        <form method="POST" action="<?= URL ?>/GiangVienHPBDController/export">
                                            <li><button name="exportds">Export to Excel</button></li>
                                        </form>
                                    </ul>
                                </div>
                            </div>
                            <div class="space15"></div>
                            <div id="editable-sample_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div id="editable-sample_length" class="dataTables_length">
                                            <!-- <label>
                                                <select size="1" name="editable-sample_length" aria-controls="editable-sample" class="form-control xsmall">
                                                    <option value="5" selected="selected">5</option>
                                                    <option value="15">15</option>
                                                    <option value="20">20</option>
                                                    <option value="-1">All</option>
                                                </select> records per page</label> -->
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="dataTables_filter" id="editable-sample_filter">
                                            <label>Search: <input id="search-input" type="text" aria-controls="editable-sample" class="form-control medium" placeholder="nhập mã sinh viên để tìm kiếm..."></label>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-striped table-hover table-bordered dataTable" id="editable-sample" aria-describedby="editable-sample_info">
                                    <thead>
                                        <tr role="row">
                                            <!-- <th class="sorting_disabled" role="columnheader" rowspan="2" colspan="1" aria-label="First Name" style="width: 100px;">STT</th> -->
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="2" colspan="1" aria-label="Last Name: activate to sort column ascending" style="width: 120px;">MSSV</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="2" colspan="1" aria-label="Points: activate to sort column ascending" style="width: 120px;">MAHP</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="2" colspan="1" aria-label="Points: activate to sort column ascending" style="width: 120px;">Buổi hôc</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="2" colspan="1" aria-label="Points: activate to sort column ascending" style="width: 120px;">Ngày học</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="2" colspan="1" aria-label="Points: activate to sort column ascending" style="width: 120px;">Status(0/1)</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="2" colspan="1" aria-label="Points: activate to sort column ascending" style="width: 120px;">Ghi Chú</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="2" colspan="1" aria-label="Points: activate to sort column ascending" style="width: 50px;">Edit</th>
                                        </tr>

                                    </thead>

                                    <tbody id="search-results" role="alert" aria-live="polite" aria-relevant="all">

                                        <?php
                                        if (!isset($result)) {
                                        } else {
                                            foreach ($result as $row) {
                                        ?>
                                                <tr class="odd" id="<?= $row['MSSV'] ?>">
                                                    <td class="MSSV"><?= $row['MSSV'] ?></td>
                                                    <td class="MAHP"><?= $row['MAHP'] ?></td>
                                                    <td class="buoi"><?= $row['BUOIHOC'] ?></td>
                                                    <td class="ngay"><?= $row['NGAYHOC'] ?></td>
                                                    <td class="status"><?php if ($row['STATUS'] === '1') {
                                                                            echo 'có';
                                                                        } else {
                                                                            echo 'vắng';
                                                                        } ?></td>
                                                    <td class="ghichu"><?= $row['GHICHU'] ?></td>
                                                    <td class="edit"><a class="edit-btn" name="edit" href="#">Edit</a></td>
                                                </tr>
                                        <?php
                                            }
                                        }
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

        function showInput() {
            // Hiển thị trường input và nút OK
            document.getElementById("input-container").style.display = "block";
        }
        $(document).on('click', '.btn-diemdanh', function() {
            showInput();
        });
    });
    //nút edit
    $(document).on('click', '.edit-btn', function() {
        var row = $(this).closest('tr'); //lấy đoạn tr vừa bấm

        //lấy gán từng giá tri của từng biến tương ứng
        var MSSV = row.find('.MSSV').text().trim();
        var MAHP = row.find('.MAHP').text().trim();
        var BUOIHOC = row.find('.buoi').text().trim();
        var NGAY = row.find('.ngay').text().trim();
        var STATUS = row.find('.status').text().trim();
        var GHICHU = row.find('.ghichu').text().trim();
        //hiển thị giá trị đoạn trên và chuyển kiểu thành input để sửa
        row.find('.status').html('<input style="width:130px"  type="checkbox">');
        row.find('.ghichu').html('<input style="width:130px"  type="text" value="' + GHICHU + '">');
        //thay nut edit thanh update
        row.find('.edit-btn').text('Update');
        row.find('.edit-btn').removeClass('edit-btn').addClass('update-btn');
        row.find('.update-btn').on('click', function() {
            var editedStatus = row.find('input').eq(0).is(':checked') ? 1 : 0;
            var editedGhiChu = row.find('input').eq(1).val();
            var data = {
                MSSV: MSSV,
                MAHP: MAHP,
                BUOIHOC: BUOIHOC,
                NGAY: NGAY,
                editedStatus: editedStatus,
                editedGhiChu: editedGhiChu
            };
            $.ajax({
                url: '<?= URL ?>/GiangVienDiemDanhController/update',
                type: 'POST',
                dataType: 'json',
                data: data,
                success: function(response) {
                    var statuschecked = response.STATUS === '0' ? 'vắng' : 'có';
                    console.log(data);
                    row.find('.status').html(statuschecked);
                    row.find('.ghichu').html(response.GHICHU);
                    row.find('.update-btn').text('Edit');
                    row.find('.update-btn').removeClass('save').addClass('edit-btn');
                },
                error: function(xhr, status, error) {
                    console.log(data);
                    console.log('Lỗi khi gửi yêu cầu AJAX:', error);
                }
            })
        });


    });
    $('#search-input').on('input', function() {
        $('.odd').remove(); //xóa các tr odd đang hiện 
        var searchValue = $(this).val().toLowerCase(); //đưa hết về chữ thường 
        <?php if (isset($result)) {
            foreach ($result as $row) { ?>
                var name = '<?php echo $row['MSSV']; ?>'.toLowerCase(); //đặt biến name là tên của giá trị name trong bảng người dùng
                if (name.includes(searchValue)) //so sách giá trị tìm bằng giá trị name
                {
                    var listItem = ' <tr class="odd" id="<?= $row['MSSV'] ?>"><td class="MSSV"><?= $row['MSSV'] ?></td><td class="MAHP"><?= $row['MAHP'] ?></td><td class="buoi"><?= $row['BUOIHOC'] ?></td><td class="ngay"><?= $row['NGAYHOC'] ?></td><td class="status"><?= $row['STATUS'] ?></td><td class="ghichu"><?= $row['GHICHU'] ?></td><td class="edit"><a class="edit-btn" name="edit" href="#">Edit</a></td></tr>'
                    $('#search-results').append(listItem);
                }

        <?php }
        } ?>

    });

    function addNewRecord() {
        // Lấy giá trị nhập vào từ trường input
        var diemdanhnagy = document.getElementById("name-input").value;
        console.log(diemdanhnagy);
        var data = {
            diemdanhnagy: diemdanhnagy
        };
        $.ajax({
            url: '<?= URL ?>/GiangVienDiemDanhController/diemdanh',
            type: 'POST',
            dataType: 'html',
            data: data,
            success: function(response) {
                $('#editable-sample').html(response);
            },
            error: function(xhr, status, error) {
                console.log('Lỗi khi gửi yêu cầu AJAX:', error);
            }
        })
        document.getElementById("input-container").style.display = "none";
        // Xóa giá trị trong trường input
        document.getElementById("name-input").value = "";
    };


    var result = <?php echo json_encode($result); ?>; // Chuyển đổi $result thành một đối tượng JavaScript

    // Kiểm tra nếu result không có dữ liệu, vô hiệu hóa nút và thêm lớp CSS 'disabled'
    if (result.length === 0) {
        var addButton = document.getElementById("editable-sample_new");
        addButton.disabled = true;
        addButton.classList.add("disabled");
    }
</script>
<!-- main-end -->
<?php include '../quanlysvphp/app/mvc/views/layout/footerGV.php' ?>