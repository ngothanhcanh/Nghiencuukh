<?php include '../quanlysvphp/app/mvc/views/layout/header-siba.php' ?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Phụ Huynh 
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
                                    <!-- <ul class="dropdown-menu pull-right">
                                        <li><a href="#">Print</a></li>
                                        <li><a href="#">Save as PDF</a></li>
                                        <li><a href="#">Export to Excel</a></li>
                                    </ul> -->
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
                                    <!-- <div class="col-lg-6">
                                        <div class="dataTables_filter" id="editable-sample_filter"><label>Search: <input type="text" aria-controls="editable-sample" class="form-control medium"></label></div>
                                    </div> -->
                                </div>
                                <table class="table table-striped table-hover table-bordered dataTable" id="editable-sample" aria-describedby="editable-sample_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="First Name" style="width: 120px;">CCCD</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending" style="width: 223px;">Mật Khẩu</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Edit: activate to sort column ascending" style="width: 103px;">Edit</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Delete: activate to sort column ascending" style="width: 149px;">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                                        <tr id="new-row" style="display: none;">
                                            <td class="sorting_1" contenteditable="true" id="newCCCD"></td>
                                            <td contenteditable="true" id="newMK"></td>
                                            <td><button id="saveButton" class="save">save</button></td>
                                            <td><a class="edit" name="delete" href="<?= URL ?>/AdminPhuHuynhController/index?delete=">Delete</a></td>
                                        </tr>
                                        <?php if (isset($result)) {foreach ($result as $row) {
                                        ?>
                                            <tr class="odd">
                                                <td class="sorting_1 cccdPhuHuynh"><?php echo $row['CCCD'] ?></td>
                                                <td class="mkPhuHuynh"> <?= $row['MK'] ?></td>
                                                <td class=" "><a data-id="<?= $row['CCCD'] ?>" class="editPhuHuynh" href="#">edit</a></td>
                                                <td class=" "><a class="delete" name="delete" href="<?= URL ?>/AdminPhuHuynhController/index?delete=<?= $row['CCCD'] ?>">Delete</a></td>
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
        // Xử lý sự kiện khi bấm nút "Add New"
        $('#editable-sample_new').click(function() {
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
            
            var newRow = $(this).closest('tr');  // Dòng mới được thêm    
            // Lấy giá trị từ các ô input
            var cccd = newRow.find('#newCCCD').text();
            var mk = newRow.find('#newMK').text();

            // Tạo đối tượng dữ liệu để gửi đi
            var data = {
                cccd: cccd,
                mk: mk
            };
            // Gửi yêu cầu AJAX để lưu dữ liệu
            $.ajax({
                url: '<?= URL ?>/AdminPhuHuynhController/save',
                type: 'POST',
                data: data,
                success: function(response) {
                    var newRow = `
                <tr>
                    <td class="sorting_1 cccdPhuHuynh">${cccd}</td>
                    <td class="mkPhuHuynh">${mk}</td>
                    <td class=""><a data-cccd="${cccd}" class="editPhuHuynh" href="#">edit</a></td>
                    <td><a class="delete" name="delete" href="<?=URL?>/AdminPhuHuynhController/index?delete=${cccd}">Delete</a></td>
                </tr>
            `;
            
            $("#editable-sample tbody").prepend(newRow);
           
           
                },
                error: function(xhr, status, error) {
                    // Xử lý lỗi khi gửi yêu cầu AJAX
                    console.error(xhr.responseText);
                }
            });
            newRow.css('display', 'none');
        });

        //* update
        $(document).on('click', '.editPhuHuynh', function(e) {
            e.preventDefault()
            console.log($(this));
            var newRow = $(this).closest('tr');  // Dòng mới được thêm    
            // Lấy giá trị từ các ô input
            newRow.find('.mkPhuHuynh').attr("contenteditable", "true")
            $(this).parent("td").html(`<button id="updateButton" class="update">update</button>`)
            
        });
        $(document).on('click', '#updateButton', function(e) {
                e.preventDefault()
                var newRow = $(this).closest('tr');  // Dòng mới được thêm   
                // Lấy giá trị từ các ô input
                var cccd = newRow.find('.cccdPhuHuynh').text();
                var mk = newRow.find('.mkPhuHuynh').text();

                // Tạo đối tượng dữ liệu để gửi đi
                
                var data = {
                    cccd: cccd,
                    mk: mk
                };

                // Gửi yêu cầu AJAX để lưu dữ liệu
                $.ajax({
                    url: '<?= URL ?>/AdminPhuHuynhController/edit',
                    type: 'POST',
                    data: data,
                    success: (response) => {
                        $(this).parent("td").html(`<a class="editPhuHuynh" href="#">edit</a>`)
                        newRow.find('.mkPhuHuynh').attr("contenteditable", "false")
                        newRow.find('.cccdPhuHuynh').text(cccd)
                        newRow.find('.mkPhuHuynh').text(mk)
                    },
                    error: (xhr, status, error) => {
                        // Xử lý khi yêu cầu thất bại
                        console.log(error); // In ra thông báo lỗi trong console
                    }
                });
            }
        )});
</script>
<!-- main-end -->
<?php include '../quanlysvphp/app/mvc/views/layout/footer.php' ?>