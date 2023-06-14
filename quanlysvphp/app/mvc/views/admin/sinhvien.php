<?php include '../quanlysvphp/app/mvc/views/layout/header-siba.php' ?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Editable Table
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                        </span>
                        <p><?php if (isset($_SESSION['import_error'])) {
                            $error=$_SESSION['import_error'];
                            echo 'lỗi ở các mã sinh viên: ';
                               foreach($error as $er)
                               {
                                echo " $er;";
                               }
                               unset($_SESSION['import_error']);
                            }
                             ?></p>
                    </header>
                    <div class="panel-body">
                        <div class="adv-table editable-table ">
                            <div class="clearfix">
                                <div class="btn-group">
                                    <button id="editable-sample_new" class="btn btn-primary">
                                        Add New <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                                <div class="btn-group pull-right">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <form method="POST" action="<?= URL ?>/AdminSinhVienController/import" enctype="multipart/form-data">
                                                <input type="file" id="excelFile" name="excelFile" accept=".xlsx" onchange="checkFileSelected()">
                                                <button type="submit" name="importSinhVien" id="importButton" disabled>Import</button>
                                            </form>
                                        </li>
                                        <form method="POST" action="<?= URL ?>/AdminSinhVienController/export">
                                            <li><button name="exportdssv">Export to Excel</button></li>
                                        </form>
                                    </ul>
                                </div>
                            </div>
                            <div class="space15"></div>
                            <div id="editable-sample_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <!-- <div id="editable-sample_length" class="dataTables_length">
                                            <label>
                                                <select size="1" name="editable-sample_length" aria-controls="editable-sample" class="form-control xsmall">
                                                    <option value="5" selected="selected">5</option>
                                                    <option value="15">15</option>
                                                    <option value="20">20</option>
                                                    <option value="-1">All</option>
                                                </select> records per page</label>
                                        </div> -->
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="dataTables_filter" id="editable-sample_filter">
                                            <label>Search: <input id="search-input" type="text" aria-controls="editable-sample" class="form-control medium"></label>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-striped table-hover table-bordered dataTable" id="editable-sample" aria-describedby="editable-sample_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="First Name" style="width: 120px;">MSSV</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending" style="width: 223px;">Tên Sinh Viên</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Points: activate to sort column ascending" style="width: 145px;">Giới Tính</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Points: activate to sort column ascending" style="width: 145px;">Ngày Sinh</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Points: activate to sort column ascending" style="width: 145px;">Địa Chỉ</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Points: activate to sort column ascending" style="width: 145px;">Mã khóa học</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Points: activate to sort column ascending" style="width: 145px;">Mã Lớp</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Points: activate to sort column ascending" style="width: 145px;">Mã Khoa</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Points: activate to sort column ascending" style="width: 145px;">MAPH</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Edit: activate to sort column ascending" style="width: 103px;">Edit</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Delete: activate to sort column ascending" style="width: 149px;">Delete</th>
                                        </tr>
                                    </thead>

                                    <tbody id="search-results" role="alert" aria-live="polite" aria-relevant="all">
                                        <tr id="new-row" style="display:none;">
                                            <td class="sorting_1" contenteditable="true" id="newId"></td>
                                            <td contenteditable="true" id="newName"></td>
                                            <td contenteditable="true" id="newGioitinh">
                                                <select class="select-gioitinh">
                                                    <option value="0">Nam</option>
                                                    <option value="1">Nữ</option>
                                                </select>
                                            </td>
                                            <td id="newNgaysinh"><input type="date" style="height: 20px; width: 70px" /></td>
                                            <td contenteditable="true" id="newDiachi"></td>
                                            <td contenteditable="true" id="newKhoa">
                                                <select class="select-khoa">
                                                    <?php foreach ($result_KhoasModel as $rowKhoahocModel) { ?>
                                                        <option value="<?php echo $rowKhoahocModel['ID'] ?>"><?php echo $rowKhoahocModel['ID'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td contenteditable="true" id="newMalop">
                                                <select class="select-malop">
                                                    <?php foreach ($result_LopModel as $rowLopModel) { ?>
                                                        <option value="<?php echo $rowLopModel['MALOP'] ?>"><?php echo $rowLopModel['MALOP'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td contenteditable="true" id="newMakh">
                                                <select class="select-makh">
                                                    <?php foreach ($result_KhoaModel as $rowKhoaModel) { ?>
                                                        <option value="<?php echo $rowKhoaModel['MAKH'] ?>"><?php echo $rowKhoaModel['MAKH'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td contenteditable="true" id="newMaph">
                                                <select class="select-mamaph">
                                                    <?php foreach ($result_PhuHuynhModel as $rowPhuHuynhModel) { ?>
                                                        <option value="<?php echo $rowPhuHuynhModel['CCCD'] ?>"><?php echo $rowPhuHuynhModel['CCCD'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td><button id="saveButton" class="save">save</button></td>
                                            <td><a class="delete" name="delete" href="<?= URL ?>/AdminSinhVienController/index?delete=">Delete</a></td>
                                        </tr>
                                        <?php foreach ($result as $row) {
                                        ?>
                                            <tr class="odd" id="<?= $row['MSSV'] ?>">
                                                <td class="sorting_1"><?php echo $row['MSSV'] ?></td>
                                                <td class="name"> <?= $row['TENSV'] ?></td>
                                                <td class="gioitinh"><?= $row['GIOITINH'] ?></td>
                                                <td class="ngaysinh"><?= $row['NGAYSINH'] ?></td>
                                                <td class="diachi"><?= $row['DIACHI'] ?></td>
                                                <td class="khoas"><?= $row['IDKHOAS'] ?></td>
                                                <td class="malop"><?= $row['MALOP'] ?></td>
                                                <td class="makh"><?= $row['MAKH'] ?></td>
                                                <td class="maph"><?= $row['MAPH'] ?></td>
                                                <td class="edit"><a class="edit-btn" name="edit" href="#">Edit</a></td>
                                                <td class=" "><a class="delete" name="delete" href="<?= URL ?>/AdminSinhVienController/index?delete=<?= $row['MSSV'] ?>">Delete</a></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <div class="row">
                                    <!-- <div class="col-lg-6">
                                        <div class="dataTables_info" id="editable-sample_info">Showing 1 to 5 of 28 entries</div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="dataTables_paginate paging_bootstrap pagination">
                                            <ul>
                                                <li class="prev disabled"><a href="#">← Prev</a></li>
                                                <li class="active"><a href="#">1</a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#">4</a></li>
                                                <li><a href="#">5</a></li>
                                                <li class="next"><a href="#">Next → </a></li>
                                            </ul>
                                        </div>
                                    </div> -->
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
      
        //nút edit
        $(document).on('click', '.edit-btn', function() {
            var row = $(this).closest('tr'); //lấy đoạn tr vừa bấm
            var id = row.attr('id'); // lấy id của đoạn tr
            //lấy gán từng giá tri của từng biến tương ứng
            var name = row.find('.name').text().trim();
            var gioitinh = row.find('.gioitinh').text().trim();
            var diachi = row.find('.diachi').text().trim();
            //hiển thị giá trị đoạn trên và chuyển kiểu thành input để sửa
            row.find('.name').html('<input type="text" value="' + name + '">');
            row.find('.gioitinh').html('<input type="text" value="' + gioitinh + '">')
            row.find('.ngaysinh').html('<input type="date">');
            row.find('.diachi').html('<input type="text" value="' + diachi + '">');
            row.find('.khoas').html('<select class="editkhoas"><?php foreach ($result_KhoasModel as $rowKhoahocModel) { ?><option value="<?php echo $rowKhoahocModel['ID'] ?>"><?php echo $rowKhoahocModel['ID'] ?></option><?php } ?></select>');
            row.find('.malop').html('<select class="editmalop"><?php foreach ($result_LopModel as $rowLopModel) { ?><option value="<?php echo $rowLopModel['MALOP'] ?>"><?php echo $rowLopModel['MALOP'] ?></option><?php } ?></select>');
            row.find('.makh').html(' <select class="editmakh"><?php foreach ($result_KhoaModel as $rowKhoaModel) { ?><option value="<?php echo $rowKhoaModel['MAKH'] ?>"><?php echo $rowKhoaModel['MAKH'] ?></option><?php } ?></select>');
            row.find('.maph').html('<select class="editmamaph"><?php foreach ($result_PhuHuynhModel as $rowPhuHuynhModel) { ?><option value="<?php echo $rowPhuHuynhModel['CCCD'] ?>"><?php echo $rowPhuHuynhModel['CCCD'] ?></option><?php } ?></select>');
            //thay nút edit thành update
            row.find('.edit-btn').text('Update');
            row.find('.edit-btn').removeClass('edit-btn').addClass('update-btn');
            row.find('.update-btn').on('click', function() {
                var editedName = row.find('input').eq(0).val();
                var editedGioitinh = row.find('input').eq(1).val();
                var editedNgaysinh = row.find('input').eq(2).val();
                var editedDiachi = row.find('input').eq(3).val();
                var editedKhoas = row.find('.editkhoas').find('option:selected').val();
                var editedMalop = row.find('.editmalop').find('option:selected').val();
                var editedMakh = row.find('.editmakh').find('option:selected').val();
                var editedMaph = row.find('.editmamaph').find('option:selected').val();
                var data = {
                    id: id,
                    editedName: editedName,
                    editedGioitinh: editedGioitinh,
                    editedNgaysinh: editedNgaysinh,
                    editedDiachi: editedDiachi,
                    editedKhoas: editedKhoas,
                    editedMalop: editedMalop,
                    editedMakh: editedMakh,
                    editedMaph: editedMaph
                };
                $.ajax({
                    url: '<?= URL ?>/AdminSinhVienController/update',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    success: function(response) {

                        row.find('.name').html(editedName);
                        row.find('.gioitinh').html(editedGioitinh);
                        row.find('.ngaysinh').html(editedNgaysinh);
                        row.find('.diachi').html(editedDiachi);
                        row.find('.khoas').html(editedKhoas);
                        row.find('.malop').html(editedMalop);
                        row.find('.makh').html(editedMakh);
                        row.find('.maph').html(editedMaph);
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
        // Gắn sự kiện click cho nút "Add New"
        $(document).on('click', '#editable-sample_new', function() {
            // Lấy dòng mẫu để thêm dữ liệu mới
            var newRow = $('#new-row');
            // Sao chép dòng mẫu và thêm vào bảng
            var tableBody = $('#editable-sample tbody');
            var cloneRow = newRow.clone();
            cloneRow.removeAttr('style'); // Hiển thị dòng mới
            tableBody.append(cloneRow);
        });
        //tìm kiếm 
        $('#search-input').on('input', function() {
            $('.odd').remove(); //xóa các tr odd đang hiện 
            var searchValue = $(this).val().toLowerCase(); //đưa hết về chữ thường 
            <?php if (isset($result)) {
                foreach ($result as $row) { ?>
                    var name = '<?php echo $row['TENSV']; ?>'.toLowerCase(); //đặt biến name là tên của giá trị name trong bảng người dùng
                    if (name.includes(searchValue)) //so sách giá trị tìm bằng giá trị name
                    {
                        var listItem = '<tr class="odd" id="<?= $row['MSSV'] ?>"><td class="sorting_1"><?php echo $row['MSSV'] ?></td><td class="name"> <?= $row['TENSV'] ?></td><td class="gioitinh"><?= $row['GIOITINH'] ?></td><td class="ngaysinh"><?= $row['NGAYSINH'] ?></td><td class="diachi"><?= $row['DIACHI'] ?></td><td class="khoas"><?= $row['IDKHOAS'] ?></td><td class="malop"><?= $row['MALOP'] ?></td><td class="makh"><?= $row['MAKH'] ?></td><td class="maph"><?= $row['MAPH'] ?></td><td class=" "><a class="edit" href="">Edit</a></td><td class=" "><a class="delete" name="delete" href="<?= URL ?>/AdminSinhVienController/index?delete=<?= $row['MSSV'] ?>">Delete</a></td></tr>'
                        $('#search-results').append(listItem);
                    }

            <?php }
            } ?>

        });
        // Xử lý sự kiện click của nút "Save"
        $(document).on('click', '.save', function(e) {
            e.preventDefault();
            var newRow = $(this).closest('tr'); // Dòng mới được thêm    
            // Lấy giá trị từ các ô input
            var id = newRow.find('#newId').text();
            var name = newRow.find('#newName').text();
            var gioitinh = newRow.find('.select-gioitinh').val();
            var ngaysinh = newRow.find('#newNgaysinh input').val();
            var diachi = newRow.find('#newDiachi').text();
            var khoas = newRow.find('.select-khoa').val();
            var malop = newRow.find('.select-malop').val();
            var makh = newRow.find('.select-makh').val();
            var maph = newRow.find('.select-mamaph').val();
            // Tạo đối tượng dữ liệu để gửi đi
            var data = {
                id: id,
                name: name,
                gioitinh: gioitinh,
                ngaysinh: ngaysinh,
                diachi: diachi,
                khoas: khoas,
                malop: malop,
                makh: makh,
                maph: maph
            };
            // Gửi yêu cầu AJAX để lưu dữ liệu
            $.ajax({
                url: '<?= URL ?>/AdminSinhVienController/save',
                type: 'POST',
                dataType: 'json',
                data: data,
                success: function(response) {
                    console.log(data);
                    //thêm đối tượng trả về vào dòng mới tạm thời.
                    var newRow = `
                <tr>
                    <td class="sorting_1">${id}</td>
                    <td>${response.name}</td>
                    <td>${response.gioitinh}</td>
                    <td>${response.ngaysinh}</td>
                    <td>${response.diachi}</td>
                    <td>${response.khoas}</td>
                    <td>${response.malop}</td>
                    <td>${response.makh}</td>
                    <td>${response.maph}</td>
                    <td class=" "><a class="delete" href="">edit</a></td>
                    <td><a class="edit" name="delete" href="<?= URL ?>/AdminSinhVienController/index?delete=${response.id}">Delete</a></td>
                </tr>
                  `;
                    $("#editable-sample tbody").append(newRow);
                },
                error: function(xhr, status, error) {
                    console.log(data);
                    // Xử lý lỗi khi gửi yêu cầu AJAX
                    console.error(xhr.responseText);
                }
            });
            newRow.css('display', 'none');
            // setTimeout(() => {
            //     location.reload();
            // }, 500);
        });
        //set time tại 500ml giây
        //khi có file mới có thể submit
        
    });
</script>
<!-- main-end -->
<?php include '../quanlysvphp/app/mvc/views/layout/footer.php' ?>