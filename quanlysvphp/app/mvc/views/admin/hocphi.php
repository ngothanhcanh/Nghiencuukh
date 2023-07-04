<?php include '../quanlysvphp/app/mvc/views/layout/header-siba.php' ?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Học phí
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
                                            <form method="POST" action="<?= URL ?>/AdminHocPhiController/import" enctype="multipart/form-data">
                                                <input type="file" id="excelFile" name="excelFile" accept=".xlsx" onchange="checkFileSelected()">
                                                <button type="submit" name="importhocphi" id="importButton" disabled>Import</button>
                                            </form>
                                        </li>
                                        <form method="POST" action="<?= URL ?>/AdminHocPhiController/export">
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
                                        <div class="dataTables_filter" id="editable-sample_filter"><label>Search: <input type="text" id="search-input" aria-controls="editable-sample" class="form-control medium"  placeholder="nhập mã sinh viên để tìm kiếm.."></label></div>
                                    </div>
                                </div>
                                <table class="table table-striped table-hover table-bordered dataTable" id="editable-sample" aria-describedby="editable-sample_info">
                                    <thead>
                                        <tr role="row">
                                            <!-- <th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="First Name" style="width: 120px;">ID</th> -->
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending" style="width: 223px;">Mã Sinh Viên</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Points: activate to sort column ascending" style="width: 145px;">Năm Học</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Points: activate to sort column ascending" style="width: 100px;">Học kỳ</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Points: activate to sort column ascending" style="width: 100px;">Status</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Points: activate to sort column ascending" style="width: 100px;">Ghi Chú</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Edit: activate to sort column ascending" style="width: 103px;">Edit</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Delete: activate to sort column ascending" style="width: 149px;">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody id="search-results" role="alert" aria-live="polite" aria-relevant="all">
                                        <tr id="new-row" style="display:none;">
                                            <td contenteditable="true" id="newMSSV">
                                                <select class="masv-select">
                                                    <option value="">Không</option>
                                                    <?php if (isset($result_sv) && is_array($result_sv) || is_object($result_sv)) {
                                                        foreach ($result_sv as $rowsv) { ?>
                                                            <option value="<?php echo $rowsv['MSSV'] ?>"><?php echo $rowsv['MSSV'] ?></option>
                                                    <?php }
                                                    } ?>
                                                </select>
                                            </td>
                                            <td contenteditable="true" id="newNAMHOC"></td>
                                            <td contenteditable="true" id="newHOCKY"></td>
                                            <td contenteditable="true" id="newSTATUS"><input class="newSTATUS" type="checkbox"/></td>
                                            <td contenteditable="true" id="newGHICHU"></td>
                                            <td><button id="saveButton" class="save">save</button></td>
                                            <td><a class="delete" name="delete" href="<?= URL ?>/AdminHocPhiController/index?delete=">Delete</a></td>
                                        </tr>
                                        <?php if (isset($result) && is_array($result) || is_object($result)) {
                                            foreach ($result as $row) {
                                        ?>
                                                <tr class="odd" id=<?=$row['MSSV'] ?>>
                                                    <td class="maSV"><?= $row['MSSV'] ?></td>
                                                    <td class="namhoc"><?= $row['NAMHOC'] ?></td>
                                                    <td class="hocky"><?= $row['HOCKY'] ?></td>
                                                    <td class="status"><?php if($row['STATUS']==="0"){echo 'chưa đóng';}else{echo 'đã đóng';} ?></td>
                                                    <td class="ghichu"><?= $row['GHICHU'] ?></td>
                                                    <td class=" "><a class="edit editHocPhi" name="edit" href="#">Edit</a></td>
                                                    <td class=" "><a class="delete" name="delete" href="<?= URL ?>/AdminHocPhiController/index?delete_SV=<?= $row['MSSV'] ?>&delete_NH=<?= $row['NAMHOC'] ?>&delete_HK=<?= $row['HOCKY'] ?>">Delete</a></td>
                                                </tr>
                                        <?php
                                            }
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
        // Xử lý sự kiện khi bấm nút "Add New"
        $('#editable-sample_new').click(function(e) {
            // Lấy dòng mẫu để thêm dữ liệu mới
            var newRow = $('#new-row');
            // Sao chép dòng mẫu và thêm vào bảng
            var tableBody = $('#editable-sample tbody');
            var cloneRow = newRow.clone();
            cloneRow.removeAttr('style'); // Hiển thị dòng mới
            tableBody.prepend(cloneRow);
        });

        // Xử lý sự kiện click của nút "Save"
        $(document).on('click', '.save', function() {
            var newRow = $(this).closest('tr'); // Dòng mới được thêm    
            // Lấy giá trị từ các ô input
            var masv = newRow.find('.masv-select').val();
            var namhoc=newRow.find('#newNAMHOC').text();
            var hocky=newRow.find('#newHOCKY').text();
            var status=newRow.find('.newSTATUS').is(':checked')? 1:0;
            var ghichu=newRow.find('#newGHICHU').text();
            // Tạo đối tượng dữ liệu để gửi đi
            var data = {
                masv:masv,
                namhoc:namhoc,
                hocky:hocky,
                status:status,
                ghichu:ghichu
            };
            console.log(data);
            // Gửi yêu cầu AJAX để lưu dữ liệu
            $.ajax({
                url: '<?= URL ?>/AdminHocPhiController/save',
                dataType: 'json',
                type: 'POST',
                data: data,
                success: function(response) {
                    //thêm đối tượng trả về vào dòng mới tạm thời.
                    var statusText = response.STATUS === '0' ? 'chưa đóng' : 'đã đóng';
                    var newRow = `
                <tr>
                    <td >${response.MSSV}</td>
                    <td >${response.NAMHOC}</td>
                    <td >${response.HOCKY}</td>
                    <td >${statusText}</td>
                    <td >${response.GHICHU}</td>
                    <td class=""><a class="delete editHocPhi" href="">edit</a></td>
                    <td class=" "><a class="delete" name="delete" href="<?= URL ?>/AdminHocPhiController/index?delete_SV=${response.MSSV}&delete_NH=${response.NAMHOC}&delete_HK=${response.HOCKY}">Delete</a></td>
                </tr>
               `;

                    $("#editable-sample tbody").prepend(newRow);
                },
                error: function(xhr, status, error) {
                    // Xử lý lỗi khi gửi yêu cầu AJAX
                    console.error(error);
                }
            });
            newRow.css('display', 'none');
        });
        $(document).on('click', '.editHocPhi', function(e) {
            e.preventDefault()
            var newRow = $(this).closest('tr');
            $(this).parent("td").html(`<button id="updateButton" class="update">update</button>`)
            newRow.find('.status').html('<input style="width:50px"  type="checkbox">');
            newRow.find('.ghichu').attr("contenteditable", "true");
        });
        // Xử lý sự kiện click của nút "Edit"
        $(document).on('click', '#updateButton', function() {
            var newRow = $(this).closest('tr');
            var masv = newRow.find('.maSV').text().trim();
            var Namhoc = newRow.find('.namhoc').text().trim();
            var Hocky = newRow.find('.hocky').text().trim();
            var Status = newRow.find('.status').is(':checked')?1:0;
            var Ghichu =newRow.find('.ghichu').text().trim();
            var data = {
                masv,
                Namhoc,
                Hocky,
                Status,
                Ghichu
            };
            $.ajax({
                url: '<?= URL ?>/AdminHocPhiController/edit',
                type: 'POST',
                data: data,
                success: (response) => {
                    var statusText = Status === 0 ? 'chưa đóng' : 'đã đóng';
                    $(this).parent("td").html(`<a class="editHocPhi" href="#">edit</a>`)
                    newRow.find('.hocky').text(Hocky);
                    newRow.find('.status').text(statusText);
                    newRow.find('.ghichu').text(Ghichu);

                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
            //  newRow.css('display', 'none');
        });
           //tìm kiếm 
           $('#search-input').on('input', function() {
             //ẩn các tr odd đang hiện 
            var searchValue = $(this).val().toLowerCase(); //đưa hết về chữ thường 
            <?php if (isset($result)) {
                foreach ($result as $row) { ?>
                    var name = '<?php echo $row['MSSV']; ?>'.toLowerCase(); //đặt biến name là tên của giá trị name trong bảng người dùng
                    if (name.includes(searchValue)) //so sách giá trị tìm bằng giá trị name
                    {     
                        $('.odd').hide();                 
                        $('#<?= $row['MSSV'] ?>').show();
                    }
                    if(searchValue =="")
                    {
                     $('.odd').show();
                     }
            <?php }

            } ?>

        });
    });
</script>
<!-- main-end -->
<?php include '../quanlysvphp/app/mvc/views/layout/footer.php' ?>