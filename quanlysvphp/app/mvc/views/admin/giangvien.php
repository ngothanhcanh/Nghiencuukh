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
                                            <form method="POST" action="<?= URL ?>/AdminGiangVienController/import" enctype="multipart/form-data">
                                                <input type="file" id="excelFile" name="excelFile" accept=".xlsx" onchange="checkFileSelected()">
                                                <button type="submit" name="importgiangvien" id="importButton" disabled>Import</button>
                                            </form>
                                        </li>
                                        <form method="POST" action="<?= URL ?>/AdminGiangVienController/export">
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
                                        <div class="dataTables_filter" id="editable-sample_filter"><label>Search: <input type="text" id="search-input" aria-controls="editable-sample"  class="form-control medium"  placeholder="Tìm theo ID.."></label></div>
                                    </div>
                                </div>
                                <table class="table table-striped table-hover table-bordered dataTable" id="editable-sample" aria-describedby="editable-sample_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="First Name" style="width: 120px;">ID</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending" style="width: 223px;">Tên Giảng Viên</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Points: activate to sort column ascending" style="width: 145px;">MAKH</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Edit: activate to sort column ascending" style="width: 103px;">Edit</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Delete: activate to sort column ascending" style="width: 149px;">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody id="search-results" role="alert" aria-live="polite" aria-relevant="all">
                                        <tr id="new-row" style="display:none;">
                                            <td class="sorting_1" contenteditable="true" id="newId"></td>
                                            <td contenteditable="true" id="newName"></td>
                                            <td contenteditable="true" id="newMAKH">
                                                <select class="makh-select">
                                                <option value="">Không</option>
                                                <?php foreach($result_khoa as $rowkhoa){ ?>
                                                    <option value="<?php echo $rowkhoa['MAKH'] ?>"><?php echo $rowkhoa['MAKH'] ?></option>
                                                    <?php }?>
                                                </select>
                                            </td>
                                            <td><button id="saveButton" class="save">save</button></td>
                                            <td><a class="delete" name="delete" href="<?= URL ?>/AdminGiangVienController/index?delete=">Delete</a></td>
                                          </tr>
                                        <?php if (isset($result) && is_array($result) || is_object($result))
                                         { foreach ($result as $row) {
                                        ?>
                                            <tr class="odd">
                                                <td class="sorting_1 idGV"><?php echo $row['MAGV'] ?></td>
                                                <td class="tenGV"> <?= $row['TENGV'] ?></td>
                                                <td class="maKH"><?= $row['MAKH'] ?></td>
                                                <td class=" "><a class="edit editGiangVien" name="edit" href="#">Edit</a></td>
                                                <td class=" "><a class="delete" name="delete" href="<?= URL ?>/AdminGiangVienController/index?delete=<?= $row['MAGV'] ?>">Delete</a></td>
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
      //tìm kiếm 
      $('#search-input').on('input', function() {
            $('.odd').remove(); //xóa các tr odd đang hiện 
            var searchValue = $(this).val().toLowerCase(); //đưa hết về chữ thường 
            <?php if (isset($result)) {
                foreach ($result as $row) { ?>
                    var name = '<?php echo $row['MAGV']; ?>'.toLowerCase(); //đặt biến name là tên của giá trị name trong bảng người dùng
                    if (name.includes(searchValue)) //so sách giá trị tìm bằng giá trị name
                    {
                        var listItem = '<tr class="odd"><td class="sorting_1 idGV"><?php echo $row['MAGV'] ?></td><td class="tenGV"> <?= $row['TENGV'] ?></td><td class="maKH"><?= $row['MAKH'] ?></td><td class=" "><a class="edit editGiangVien" name="edit" href="#">Edit</a></td><td class=" "><a class="delete" name="delete" href="<?= URL ?>/AdminGiangVienController/index?delete=<?= $row['MAGV'] ?>">Delete</a></td></tr>';
                        $('#search-results').append(listItem);
                    }

            <?php }
            } ?>

        });
     // Xử lý sự kiện khi bấm nút "Add New"
     $('#editable-sample_new').click(function(e) {
         // Lấy dòng mẫu để thêm dữ liệu mới
         var newRow = $('#new-row');
         console.log(newRow);
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
         var id = newRow.find('#newId').text();
         var name = newRow.find('#newName').text();
          var makh = newRow.find('.makh-select').val();
         // Tạo đối tượng dữ liệu để gửi đi
         var data = {
             id: id,
             name: name,
             makh: makh
         };
         // Gửi yêu cầu AJAX để lưu dữ liệu
         $.ajax({
             url: '<?= URL ?>/AdminGiangVienController/save',
             type: 'POST',
             data: data,
             success: function(response) {
                 //thêm đối tượng trả về vào dòng mới tạm thời.
                 var newRow = `
             <tr>
                 <td class="sorting_1">${id}</td>
                 <td>${name}</td>
                 <td>${makh}</td>
                 <td class=""><a class="delete" href="">edit</a></td>
                 <td><a class="edit" name="delete" href="<?= URL ?>/AdminGiangVienController/index?delete=${id}">Delete</a></td>
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

     let defaultValSelect;
     $(document).on('click', '.editGiangVien', function(e) {
         e.preventDefault()
         var newRow = $(this).closest('tr');
        newRow.find('.tenGV').attr("contenteditable", "true")
         $(this).parent("td").html(`<button id="updateButton" class="update">update</button>`)
         defaultValSelect = newRow.find('.maKH').text()
         newRow.find('.maKH').html(`<select class="makh-select">
        <option value="">Không</option>
        <?php foreach($result_khoa as $rowkhoa){ ?>
            <option value="<?php echo $rowkhoa['MAKH'] ?>"><?php echo $rowkhoa['MAKH'] ?></option>
            <?php }?>
        </select>`)
        
     });
     // Xử lý sự kiện click của nút "Edit"
     $(document).on('click', '#updateButton', function() {
         var newRow = $(this).closest('tr'); 
         var id = newRow.find('.idGV').text();
         var name = newRow.find('.tenGV').text().trim();
         var makh = newRow.find('.makh-select').val();
         var data = {
             id: id,
             name: name,
             makh: makh || defaultValSelect
         };
         console.log(defaultValSelect);
         $.ajax({
             url: '<?= URL ?>/AdminGiangVienController/edit',
             type: 'POST',
             data: data,
             success: (response) => {
                 $(this).parent("td").html(`<a class="editGiangVien" href="#">edit</a>`)
                 newRow.find('.tenGV').attr("contenteditable", "false")
                 newRow.find('.idGV').text(id)
                 newRow.find('.tenGV').text(name)
                 newRow.find('.maKH').html(makh || defaultValSelect)
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