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
                                        <div id="editable-sample_length" class="dataTables_length">
                                            <label>
                                                <select size="1" name="editable-sample_length" aria-controls="editable-sample" class="form-control xsmall">
                                                    <option value="5" selected="selected">5</option>
                                                    <option value="15">15</option>
                                                    <option value="20">20</option>
                                                    <option value="-1">All</option>
                                                </select> records per page</label>
                                        </div>
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
                                            <!-- <th class="sorting_disabled" role="columnheader" rowspan="2" colspan="1" aria-label="First Name" style="width: 100px;">STT</th> -->
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="2" colspan="1" aria-label="Last Name: activate to sort column ascending" style="width: 120px;">MSSV</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="2" colspan="1" aria-label="Points: activate to sort column ascending" style="width: 120px;">MAHP</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="2" colspan="1" aria-label="Points: activate to sort column ascending" style="width: 120px;">CC</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="2" colspan="1" aria-label="Points: activate to sort column ascending" style="width: 120px;">GK</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="2" aria-label="Points: activate to sort column ascending" style="width: 70px;" >Thi CK</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="2" aria-label="Points: activate to sort column ascending" style="width: 70px;">ĐHP</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="2" aria-label="Points: activate to sort column ascending" style="width: 70px;">ĐHP hệ 4</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="2" colspan="1" aria-label="Points: activate to sort column ascending" style="width: 100px;">ĐQĐ</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="2" colspan="1" aria-label="Edit: activate to sort column ascending" style="width: 103px;">Edit</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="2" colspan="1" aria-label="Delete: activate to sort column ascending" style="width: 149px;">Delete</th>
                                        </tr>
                                        <tr role="row">
                                            <th class="sorting">L1</th>
                                            <th class="sorting">L2</th>
                                            <th class="sorting">L1</th>
                                            <th class="sorting">L2</th>
                                            <th class="sorting">L1</th>
                                            <th class="sorting">L2</th>
                                        </tr>
                                    </thead>

                                    <tbody id="search-results" role="alert" aria-live="polite" aria-relevant="all">
                                        <tr id="new-row" style="display:none;">
                                            <!-- <td class="sorting_1"  id="newSTT"></td> -->
                                            <td contenteditable="true" id="newMSSV">
                                            <select class="select-MSSV">
                                                    <?php foreach ($result_SinhVienModel as $rowSinhVienModel) { ?>
                                                        <option value="<?php echo $rowSinhVienModel['MSSV'] ?>"><?php echo $rowSinhVienModel['MSSV'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td contenteditable="true" id="newMAHP">
                                            <select class="select-MAHP">
                                                    <?php foreach ($result_HocPhanModel as $rowHocPhanModel) { ?>
                                                        <option value="<?php echo $rowHocPhanModel['MAHP'] ?>"><?php echo $rowHocPhanModel['MAHP'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td contenteditable="true" id="newCC" ></td>
                                            <td contenteditable="true" id="newGK"></td>
                                            <td contenteditable="true" id="newCK" ></td>
                                            <td contenteditable="false" id="hidden" >x</td>
                                            <td contenteditable="false" id="hidden" >x</td>
                                            <td contenteditable="false" id="hidden" >x</td>
                                            <td contenteditable="false" id="hidden" >x</td>
                                            <td contenteditable="false" id="hidden" >x</td>
                                            <td contenteditable="false" id="hidden" >x</td>
                                            <td><button id="saveButton" class="save">save</button></td>
                                            <td><a class="delete" name="delete" href="<?= URL ?>/AdminKetQuaController/index">Delete</a></td>
                                        </tr>
                                        <?php
                                        if(!isset($result))
                                        {
                                           
                                        }else
                                        {
                                        foreach ($result as $row) {
                                        ?>
                                            <tr class="odd" id="<?= $row['MSSV'] ?>">                                      
                                                <td class="MSSV"><?=$row['MSSV'] ?></td>
                                                <td class="MAHP"> <?= $row['MAHP'] ?></td>
                                                <td class="CC"><?= $row['CC'] ?></td>
                                                <td class="GK"><?= $row['GK'] ?></td>
                                                <td class="CK"><?= $row['CK'] ?></td>
                                                <td class="a"></td>
                                                <td class="DTB"><?= $row['DTB'] ?></td>
                                                <td class="a"></td>
                                                <td class="DIEMHE4"><?= $row['DIEMHE4'] ?></td>
                                                <td class="a"></td>
                                                <td class="DIEMQUYDOI"><?= $row['DIEMQUYDOI'] ?></td>
                                                <td class="edit"><a class="edit-btn" name="edit" href="#">Edit</a></td>
                                                <td class=" "><a class="delete" name="delete" href="<?= URL ?>/AdminKetQuaController/index?delete=<?= $row['MSSV'] ?>">Delete</a></td>
                                            </tr>
                                        <?php
                                        }}
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
        //nút edit
        $(document).on('click', '.edit-btn', function() {
            var row = $(this).closest('tr'); //lấy đoạn tr vừa bấm
            var MSSV = row.attr('id'); // lấy id của đoạn tr
            //lấy gán từng giá tri của từng biến tương ứng
            var MAHP = row.find('.MAHP').text().trim();
            var CC = row.find('.CC').text().trim();
            var GK = row.find('.GK').text().trim();
            var CK = row.find('.CK').text().trim();
            //hiển thị giá trị đoạn trên và chuyển kiểu thành input để sửa
            row.find('.MAHP').html('<select class="editMAHP"><?php foreach ($result_HocPhanModel as $rowHocPhanModel) { ?><option value="<?php echo $rowHocPhanModel['MAHP'] ?>"><?php echo $rowHocPhanModel['MAHP'] ?></option><?php } ?></select>');
            row.find('.CC').html('<input style="width:50px" type="number" min="0" max="10" value="'+CC+'">');
            row.find('.GK').html('<input style="width:50px" type="number" min="0" max="10" value="'+GK+'">');
            row.find('.CK').html('<input style="width:50px"  type="number" min="0" max="10" value="'+CK+'">');
            //thay nut edit thanh update
            row.find('.edit-btn').text('Update');
            row.find('.edit-btn').removeClass('edit-btn').addClass('update-btn');
            row.find('.update-btn').on('click', function() {
                var editedMAHP = row.find('.editMAHP').find('option:selected').val();
                var editedCC = row.find('input').eq(0).val();
                var editedGK = row.find('input').eq(1).val();
                var editedCK = row.find('input').eq(2).val();
                var editDTB = editedCC*0.1+editedGK*0.3+editedCK*0.6;
                var data = {
                    MSSV:MSSV,
                    editedMAHP:editedMAHP,
                    editedCC:editedCC,
                    editedGK:editedGK,
                    editedCK:editedCK,
                    editDTB:editDTB
                };
                $.ajax({
                    url: '<?= URL ?>/AdminKetQuaController/update',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    success: function(response) {
                        row.find('.MAHP').html(response.MAHP);
                        row.find('.CC').html(response.CC);
                        row.find('.GK').html(response.GK);
                        row.find('.CK').html(response.CK);
                        row.find('.DTB').html(response.DTB);
                        row.find('.DIEMH4').html(response.DIEMHE4);
                        row.find('.DIEMQUYDOI').html(response.DIEMQUYDOI);
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
                    var name = '<?php echo $row['MSSV']; ?>'.toLowerCase(); //đặt biến name là tên của giá trị name trong bảng người dùng
                    if (name.includes(searchValue)) //so sách giá trị tìm bằng giá trị name
                    {
                        var listItem = '<tr class="odd" id="<?= $row['MSSV'] ?>"><td class="MSSV"><?=$row['MSSV'] ?></td><td class="MAHP"> <?= $row['MAHP'] ?></td><td class="CC"><?= $row['CC'] ?></td><td class="GK"><?= $row['GK'] ?></td><td class="CK"><?= $row['CK'] ?></td><td class="a"></td><td class="DTB"><?= $row['DTB'] ?></td><td class="a"></td><td class="DIEMHE4"><?= $row['DIEMHE4'] ?></td><td class="a"></td><td class="DIEMQUYDOI"><?= $row['DIEMQUYDOI'] ?></td><td class="edit"><a class="edit-btn" name="edit" href="#">Edit</a></td><td class=" "><a class="delete" name="delete" href="<?= URL ?>/AdminKetQuaController/index?delete=<?= $row['MSSV'] ?>">Delete</a></td></tr>'
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
            // var STT= newRow.find('#newSTT').text();
            var MSSV = newRow.find('.select-MSSV').val();
            var MAHP = newRow.find('.select-MAHP').val();
            var CC = newRow.find('#newCC').text();
            var GK = newRow.find('#newGK').text();
            var CK = newRow.find('#newCK').text();
            var DTB = CC*0.1+GK*0.3+CK*0.6;
            // Tạo đối tượng dữ liệu để gửi đi
            var data = {
               MSSV : MSSV,
               MAHP : MAHP,
               CC:CC,
               GK:GK,
               CK:CK,
               DTB:DTB
            };
            // Gửi yêu cầu AJAX để lưu dữ liệu
            $.ajax({
                url: '<?= URL ?>/AdminKetQuaController/save',
                type: 'POST',
                dataType: 'json',
                data: data,
                success: function(response) {
                    console.log(data);
                    //thêm đối tượng trả về vào dòng mới tạm thời.
                    var newRow = `
                <tr>
                    <td>${response.MSSV}</td>
                    <td>${response.MAHP}</td>
                    <td>${response.CC}</td>
                    <td>${response.GK}</td>
                    <td>${response.CK}</td>
                    <td></td>
                    <td>${response.DTB}</td>
                    <td></td>
                    <td>${response.DIEMHE4}</td>
                    <td></td>
                    <td>${response.DIEMQUYDOI}</td>
                    <td class=" "><a class="delete" href="">edit</a></td>
                    <td><a class="edit" name="delete" href="<?= URL ?>/AdminKetQuaController/index?delete=${response.MSSV}">Delete</a></td>
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
    });
</script>
<!-- main-end -->
<?php include '../quanlysvphp/app/mvc/views/layout/footer.php' ?>