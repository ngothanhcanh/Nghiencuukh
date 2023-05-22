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
                                        <li><a href="#">Print</a></li>
                                        <li><a href="#">Save as PDF</a></li>
                                        <li><a href="#">Export to Excel</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="space15"></div>
                            <div id="editable-sample_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div id="editable-sample_length" class="dataTables_length"><label><select size="1" name="editable-sample_length" aria-controls="editable-sample" class="form-control xsmall">
                                                    <option value="5" selected="selected">5</option>
                                                    <option value="15">15</option>
                                                    <option value="20">20</option>
                                                    <option value="-1">All</option>
                                                </select> records per page</label></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="dataTables_filter" id="editable-sample_filter"><label>Search: <input type="text" id="search-input" aria-controls="editable-sample"  class="form-control medium"></label></div>
                                    </div>
                                </div>
                                <table class="table table-striped table-hover table-bordered dataTable" id="editable-sample" aria-describedby="editable-sample_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="First Name" style="width: 120px;">ID</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending" style="width: 223px;">Tên Người Dùng</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Points: activate to sort column ascending" style="width: 145px;">Mật Khẩu</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Points: activate to sort column ascending" style="width: 145px;">Quyền</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Points: activate to sort column ascending" style="width: 145px;">Status</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Points: activate to sort column ascending" style="width: 145px;">MASSV</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Points: activate to sort column ascending" style="width: 145px;">MAGV</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Edit: activate to sort column ascending" style="width: 103px;">Edit</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Delete: activate to sort column ascending" style="width: 149px;">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody id="search-results" role="alert" aria-live="polite" aria-relevant="all">
                                        <tr id="new-row" style="display:none;">
                                            <td class="sorting_1" contenteditable="true" id="newId"></td>
                                            <td contenteditable="true" id="newName"></td>
                                            <td contenteditable="true" id="newPassword"></td>
                                            <td contenteditable="true" id="newUserType">
                                            <select class="select-usertype">
                                                        <option value="admin">admin</option>
                                                        <option value="nguoidung">nguoidung</option>
                                                </select>
                                            </td>
                                            <td contenteditable="true" id="newStatus">
                                            <select class="select-status">
                                                        <option value="enable">enable</option>
                                                        <option value="disable">disable</option>
                                                </select>
                                            </td>
                                            <td contenteditable="true" id="newMSSV">
                                                <select class="mssv-select">
                                                    <option value="">Không</option>
                                                <?php foreach($result_sinhvien as $rowsinhvien){ ?>
                                                    <option value="<?php echo $rowsinhvien['MSSV'] ?>"><?php echo $rowsinhvien['TENSV'] ?></option>
                                                    <?php }?>
                                                     
                                                </select>
                                            </td>
                                            <td contenteditable="true" id="newMAGV">
                                                <select class="magv-select">
                                                <option value="">Không</option>
                                                <?php foreach($result_giaovien as $rowgiaovien){ ?>
                                                    <option value="<?php echo $rowgiaovien['MAGV'] ?>"><?php echo $rowgiaovien['TENGV'] ?></option>
                                                    <?php }?>
                                                </select>
                                            </td>
                                            <td><button id="saveButton" class="save">save</button></td>
                                            <td><a class="delete" name="delete" href="<?= URL ?>/UserController/index?delete=">Delete</a></td>
                                          </tr>
                                        <?php foreach ($result as $row) {
                                        ?>
                                            <tr class="odd">
                                                <td class="  sorting_1"><?php echo $row['ID'] ?></td>
                                                <td class=" "> <?= $row['name'] ?></td>
                                                <td class=" "><?= $row['password'] ?></td>
                                                <td class="center "><?= $row['user_type'] ?></td>
                                                <td class="center "><?= $row['status'] ?></td>
                                                <td class="center "><?= $row['MSSV'] ?></td>
                                                <td class="center "><?= $row['MAGV'] ?></td>
                                                <td class=" "><a class="edit" name="edit" href="<?= URL ?>/UserController/index?edit=<?= $row['ID'] ?>">Edit</a></td>
                                                <td class=" "><a class="delete" name="delete" href="<?= URL ?>/UserController/index?delete=<?= $row['ID'] ?>">Delete</a></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-lg-6">
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
     
  
        //tìm kiếm 
        $('#search-input').on('input', function() {
        $('.odd').remove();//xóa đoạn các đoạn tr trong bảng
        var searchValue = $(this).val().toLowerCase(); //đưa hết về chữ thường 
        $('#search-results').empty();//đoạn tbody được để trống 
        <?php foreach($result as $row) { ?>
            var name = '<?php echo $row['name']; ?>'.toLowerCase();//đặt biến name là tên của giá trị name trong bảng người dùng
            if(name.includes(searchValue))//so sách giá trị tìm bằng giá trị name
             {
                var listItem = '<tr class="odd"><td class="  sorting_1"><?php echo $row['ID'] ?></td><td class=" "> <?= $row['name'] ?></td> <td class=" "><?= $row['password'] ?></td><td class="center "><?= $row['user_type'] ?></td><td class="center "><?= $row['status'] ?></td><td class="center "><?= $row['MSSV'] ?></td><td class="center "><?= $row['MAGV'] ?></td><td class=" "><a class="edit" name="edit" href="<?= URL ?>/UserController/index?edit=<?= $row['ID'] ?>">Edit</a></td><td class=" "><a class="delete" name="delete" href="<?= URL ?>/UserController/index?delete=<?= $row['ID'] ?>">Delete</a></td></tr>';
                $('#search-results').append(listItem);
            }
        <?php } ?>
    });
        // Xử lý sự kiện khi bấm nút "Add New"
        $('#editable-sample_new').click(function() {
            // Lấy dòng mẫu để thêm dữ liệu mới
            var newRow = $('#new-row');

            // Sao chép dòng mẫu và thêm vào bảng
            var tableBody = $('#editable-sample tbody');
            var cloneRow = newRow.clone();
            cloneRow.removeAttr('style'); // Hiển thị dòng mới
            tableBody.append(cloneRow);
        });

        // Xử lý sự kiện click của nút "Save"
        $(document).on('click', '.save', function() {
            var newRow = $(this).closest('tr'); // Dòng mới được thêm    
            // Lấy giá trị từ các ô input
            var id = newRow.find('#newId').text();
            var name = newRow.find('#newName').text();
            var password = newRow.find('#newPassword').text();
            var userType = newRow.find('.select-usertype').val();
            var status = newRow.find('.select-status').val();
            var mssv = newRow.find('.mssv-select').val();
             var magv = newRow.find('.magv-select').val();
            // Tạo đối tượng dữ liệu để gửi đi
            var data = {
                id: id,
                name: name,
                password: password,
                userType: userType,
                status: status,
                mssv: mssv,
                magv: magv
            };

            // Gửi yêu cầu AJAX để lưu dữ liệu
            $.ajax({
                url: '<?= URL ?>/UserController/save',
                type: 'POST',
                dataType: 'json',
                data: data,
                success: function(response) {
                    //thêm đối tượng trả về vào dòng mới tạm thời.
                    var newRow = `
                <tr>
                    <td class="sorting_1">${id}</td>
                    <td>${name}</td>
                    <td>${password}</td>
                    <td>${userType}</td>
                    <td>${status}</td>
                    <td>${mssv}</td>
                    <td>${magv}</td>
                    <td class=" "><a class="delete" href="">edit</a></td>
                    <td><a class="edit" name="delete" href="<?= URL ?>/UserController/index?delete=${id}">Delete</a></td>
                </tr>
            `;

                    $("#editable-sample tbody").append(newRow);


                },
                error: function(xhr, status, error) {
                    // Xử lý lỗi khi gửi yêu cầu AJAX
                    console.error(xhr.responseText);
                }
            });
            newRow.css('display', 'none');
        });


        $(document).on('click', '.editUser', function(e) {
            e.preventDefault()
            var newRow = $(this).closest('tr');
            $(this).parent("td").html(`<button id="updateButton" class="update">update</button>`)
            
        });
        // Xử lý sự kiện click của nút "Edit"
        $(document).on('click', '#updateButton', function() {
            var newRow = $(this).closest('tr'); // Dòng mới được thêm    
            // Lấy giá trị từ các ô input
            var id = newRow.find('#newId').text();
            var name = newRow.find('#newName').text();
            var password = newRow.find('#newPassword').text();
            var userType = newRow.find('.select-usertype').val();
            var status = newRow.find('.select-status').val();
            var mssv = newRow.find('.mssv-select').val();
             var magv = newRow.find('.magv-select').val();
            // Tạo đối tượng dữ liệu để gửi đi
            var data = {
                id: id,
                name: name,
                password: password,
                userType: userType,
                status: status,
                mssv: mssv,
                magv: magv
            };

            // Gửi yêu cầu AJAX để lưu dữ liệu
            $.ajax({
                url: '<?= URL ?>/UserController/edit',
                type: 'POST',
                data: data,
                success: function(response) {
                    //thêm đối tượng trả về vào dòng mới tạm thời.
                    var newRow = `
                <tr>
                    <td class="sorting_1">${id}</td>
                    <td>${name}</td>
                    <td>${password}</td>
                    <td>${userType}</td>
                    <td>${status}</td>
                    <td>${mssv}</td>
                    <td>${magv}</td>
                    <td class=" "><a class="delete" href="">edit</a></td>
                    <td><a class="edit" name="delete" href="<?= URL ?>/UserController/index?delete=${id}">Delete</a></td>
                </tr>
            `;

                    $("#editable-sample tbody").append(newRow);


                },
                error: function(xhr, status, error) {
                    // Xử lý lỗi khi gửi yêu cầu AJAX
                    console.error(xhr.responseText);
                }
            });
            newRow.css('display', 'none');
        });
    });
</script>
<!-- main-end -->
<?php include '../quanlysvphp/app/mvc/views/layout/footer.php' ?>