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
                                            <!-- <th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="First Name" style="width: 120px;">ID</th> -->
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending" style="width: 223px;">Mã Khoa</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Points: activate to sort column ascending" style="width: 145px;">Mã Sinh Viên</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Points: activate to sort column ascending" style="width: 100px;">T.Thái</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Edit: activate to sort column ascending" style="width: 103px;">Edit</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Delete: activate to sort column ascending" style="width: 149px;">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody id="search-results" role="alert" aria-live="polite" aria-relevant="all">
                                        <tr id="new-row" style="display:none;">
                                            <td contenteditable="true" id="newMaKH">
                                                <select class="makh-select">
                                                <option value="">Không</option>
                                                <?php if (isset($result_kh) && is_array($result_kh) || is_object($result_kh))
                                                    { foreach($result_kh as $rowkh){ ?>
                                                    <option value="<?php echo $rowkh['MAKH'] ?>"><?php echo $rowkh['MAKH'] ?></option>
                                                    <?php }}?>
                                                </select>
                                            </td>
                                            <td contenteditable="true" id="newMSSV">
                                                <select class="masv-select">
                                                <option value="">Không</option>
                                                <?php if (isset($result_sv) && is_array($result_sv) || is_object($result_sv))
                                                    {  foreach($result_sv as $rowsv){ ?>
                                                    <option value="<?php echo $rowsv['MSSV'] ?>"><?php echo $rowsv['MSSV'] ?></option>
                                                    <?php }}?>
                                                </select>
                                            </td>
                                            <td contenteditable="true" id="newTRANGTHAI"></td>
                                            <td><button id="saveButton" class="save">save</button></td>
                                            <td><a class="delete" name="delete" href="<?= URL ?>/AdminHocPhiController/index?delete=">Delete</a></td>
                                          </tr>
                                        <?php if (isset($result) && is_array($result) || is_object($result))
                                         { foreach ($result as $row) {
                                        ?>
                                            <tr class="odd">
                                                <td class="maKH"> <?= $row['MAKH'] ?></td>
                                                <td class="maSV"><?= $row['MSSV'] ?></td>
                                                <td class="trangthai"><?= $row['TRANGTHAI'] ?></td>
                                                <td class=" "><a class="edit editHocPhi" name="edit" href="#">Edit</a></td>
                                                <td class=" "><a class="delete" name="delete" href="<?= URL ?>/AdminHocPhiController/index?delete_kh=<?= $row['MAKH'] ?>&delete_sv=<?= $row['MSSV'] ?>">Delete</a></td>
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
     
     // Xử lý sự kiện khi bấm nút "Add New"
     $('#editable-sample_new').click(function(e) {
         // Lấy dòng mẫu để thêm dữ liệu mới
         var newRow = $('#new-row');
         console.log(newRow);
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
         var makh = newRow.find('.makh-select').val();
          var masv = newRow.find('.masv-select').val();
          const tt = newRow.find("#newTRANGTHAI").text().trim()
         // Tạo đối tượng dữ liệu để gửi đi
         var data = {
            makh,
            masv,
            tt
         };
         console.log(data);
         // Gửi yêu cầu AJAX để lưu dữ liệu
         $.ajax({
             url: '<?= URL ?>/AdminHocPhiController/save',
             type: 'POST',
             data: data,
             success: function(response) {
                console.log(response);
                 //thêm đối tượng trả về vào dòng mới tạm thời.
                 var newRow = `
                <tr>
                    <td class="maGV">${makh}</td>
                    <td class="maLOP">${masv}</td>
                    <td class="trangthai">${tt}</td>
                    <td class=""><a class="delete editHocPhi" href="">edit</a></td>
                    <td><a class="edit" name="delete" href="<?= URL ?>/AdminHocPhiController/index??delete_kh=${makh}&delete_sv=${masv}">Delete</a></td>
                </tr>
         `;

                 $("#editable-sample tbody").append(newRow);


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
        newRow.find('.trangthai').attr("contenteditable", "true")
     });
     // Xử lý sự kiện click của nút "Edit"
     $(document).on('click', '#updateButton', function() {
         var newRow = $(this).closest('tr'); 
         var makh = newRow.find('.maKH').text().trim();
         var masv = newRow.find('.maSV').text().trim();
         var tt = newRow.find('.trangthai').text().trim();
         var data = {
            makh,
            masv,
            tt
         };
         $.ajax({
             url: '<?= URL ?>/AdminHocPhiController/edit',
             type: 'POST',
             data: data,
             success: (response) => {
                console.log(response);
                 $(this).parent("td").html(`<a class="editHocPhi" href="#">edit</a>`)
                 newRow.find('.trangthai').text(tt)
             },
             error: function(xhr, status, error) {
                 console.error(error);
             }
         });
        //  newRow.css('display', 'none');
     });
 });
</script>
<!-- main-end -->
<?php include '../quanlysvphp/app/mvc/views/layout/footer.php' ?>