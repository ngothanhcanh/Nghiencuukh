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
                                    <tr role="row" style="text-align: center;">
                                        <th class="sorting" rowspan="2" style="width: 60px;">ID</th>
                                        <th colspan="3" style="text-align: center;">Buổi 1</th>
                                        <th colspan="3" style="text-align: center;">Buổi 2</th>
                                        <th class="sorting" rowspan="2" style="width: 120px;">B.đầu</th>
                                        <th class="sorting" rowspan="2" style="width: 120px;">K.thúc</th>
                                        <th class="sorting" rowspan="2" style="width: 103px;">G.chú</th>
                                        <th class="sorting" rowspan="2" style="width: 103px;">Lớp</th>
                                        <th class="sorting" rowspan="2" style="width: 103px;">Môn học</th>
                                        <th class="sorting" rowspan="2" style="width: 103px;">G.viên</th>
                                        <th class="sorting" rowspan="2" style="width: 103px;">Edit</th>
                                        <th class="sorting" rowspan="2" style="width: 149px;">Delete</th>
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
                                        <tr id="new-row" style="display:none;">
                                            <td contenteditable="true" id="newID"></td>
                                            <td contenteditable="true" id="newB1_thu"></td>
                                            <td contenteditable="true" id="newB1_tiet"></td>    
                                            <td contenteditable="true" id="newB1_phong"></td>
                                            <td contenteditable="true" id="newB2_thu"></td>
                                            <td contenteditable="true" id="newB2_tiet"></td>
                                            <td contenteditable="true" id="newB2_phong"></td>
                                            <td id="newN_bd"><input type="date" style="height: 20px; width: 70px"/></td>
                                            <td id="newN_kt"><input type="date" style="height: 20px; width: 70px"/></td>
                                            <td contenteditable="true" id="newGhichu"></td>
                                            <td id="newLop">
                                                <select class="malop-select">
                                                <option value="">Không</option>
                                                <?php if (isset($result_lop) && is_array($result_lop) || is_object($result_lop))
                                                    { foreach($result_lop as $rowlop){ ?>
                                                    <option value="<?php echo $rowlop['MALOP'] ?>"><?php echo $rowlop['MALOP'] ?></option>
                                                    <?php }}?>
                                                </select>
                                            </td>
                                            <td id="newHp">
                                                <select class="mahp-select">
                                                <option value="">Không</option>
                                                <?php if (isset($result_hp) && is_array($result_hp) || is_object($result_hp))
                                                    {  foreach($result_hp as $rowhp){ ?>
                                                    <option value="<?php echo $rowhp['MAHP'] ?>"><?php echo $rowhp['MAHP'] ?></option>
                                                    <?php }}?>
                                                </select>
                                            </td>
                                            <td id="newGv">
                                                <select class="magv-select">
                                                <option value="">Không</option>
                                                <?php if (isset($result_gv) && is_array($result_gv) || is_object($result_gv))
                                                    {  foreach($result_gv as $rowgv){ ?>
                                                    <option value="<?php echo $rowgv['MAGV'] ?>"><?php echo $rowgv['MAGV'] ?></option>
                                                    <?php }}?>
                                                </select>
                                            </td>
                                            <td><button id="saveButton" class="save">save</button></td>
                                            <td><a class="delete" name="delete" href="<?= URL ?>/AdminThoiKhoaBieuController/index?delete=">Delete</a></td>
                                          </tr>
                                        <?php if (isset($result) && is_array($result) || is_object($result))
                                         { foreach ($result as $row) {
                                        ?>
                                            <tr class="odd">
                                                <td class="id"> <?= $row['ID'] ?></td>
                                                <td class="b1_thu"><?= $row['BUOI1_THU'] ?></td>
                                                <td class="b1_tiet"><?= $row['BUOI1_TIET'] ?></td>
                                                <td class="b1_phong"><?= $row['BUOI1_PHONG'] ?></td>
                                                <td class="b2_thu"><?= $row['BUOI2_TIET'] ?></td>
                                                <td class="b2_tiet"><?= $row['BUOI2_THU'] ?></td>
                                                <td class="b2_phong"><?= $row['BUOI2_PHONG'] ?></td>
                                                <td class="n_bd"><?= $row['NGAYBATDAU'] ?></td>
                                                <td class="n_kt"><?= $row['NGAYKETTHUC'] ?></td>
                                                <td class="ghichu"><?= $row['GHICHU'] ?></td>
                                                <td class="lop"><?= $row['LOP'] ?></td>
                                                <td class="mh"><?= $row['MONHOC'] ?></td>
                                                <td class="gv"><?= $row['GIANGVIEN'] ?></td>
                                                <td class=" "><a class="edit editThoiKhoaBieu" name="edit" href="#">Edit</a></td>
                                                <td class=" "><a class="delete" name="delete" href="<?= URL ?>/AdminThoiKhoaBieuController/index?delete=<?= $row['ID'] ?>">Delete</a></td>
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
         let id = newRow.find("#newID").text()
         let b1_thu = newRow.find("#newB1_thu").text()
         let b1_tiet = newRow.find("#newB1_tiet").text()
         let b1_phong = newRow.find("#newB1_phong").text()
         let b2_thu = newRow.find("#newB2_thu").text()
         let b2_tiet = newRow.find("#newB2_tiet").text()
         let b2_phong = newRow.find("#newB2_phong").text()
         let ngay_bd = newRow.find("#newN_bd input").val()
         let ngay_kt = newRow.find("#newN_kt input").val()
         let ghichu = newRow.find("#newGhichu").text()
         var lop = newRow.find('.malop-select').val();
         var monhoc = newRow.find('.mahp-select').val();
         var giangvien = newRow.find('.magv-select').val();
         // Tạo đối tượng dữ liệu để gửi đi
         var data = {
            id,
            b1_tiet,
            b1_thu,
            b1_phong,
            b2_tiet,
            b2_thu,
            b2_phong,
            ngay_bd,
            ngay_kt,
            ghichu,
            lop,
            monhoc,
            giangvien
         };
         console.log(data);
         // Gửi yêu cầu AJAX để lưu dữ liệu
         $.ajax({
             url: '<?= URL ?>/AdminThoiKhoaBieuController/save',
             type: 'POST',
             data: data,
             success: function(response) {
                console.log(response);
                 //thêm đối tượng trả về vào dòng mới tạm thời.
                 var newRow = `
                <tr>
                    <td class="id">${id}</td>
                    <td class="b1_thu">${b1_thu}</td>
                    <td class="b1_tiet">${b1_tiet}</td>
                    <td class="b1_phong">${b1_phong}</td>
                    <td class="b2_thu">${b2_thu}</td>
                    <td class="b2_tiet">${b2_tiet}</td>
                    <td class="b2_phong">${b2_phong}</td>
                    <td class="n_bd">${ngay_bd}</td>
                    <td class="n_kt">${ngay_kt}</td>
                    <td class="ghichu">${ghichu}</td>
                    <td class="lop">${lop}</td>
                    <td class="mh">${monhoc}</td>
                    <td class="gv">${giangvien}</td>
                    <td class=" "><a class="edit editThoiKhoaBieu" name="edit" href="#">Edit</a></td>
                    <td><a class="edit" name="delete" href="<?= URL ?>/AdminThoiKhoaBieuController/index?delete=${id}">Delete</a></td>
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

     let defaultValue, arr;
     $(document).on('click', '.editThoiKhoaBieu', function(e) {
         e.preventDefault()
         var newRow = $(this).closest('tr');
         $(this).parent("td").html(`<button id="updateButton" class="update">update</button>`)
         arr = [newRow.find(".b1_thu"), newRow.find(".b1_tiet"), newRow.find(".b1_phong"), newRow.find(".b2_thu"), newRow.find(".b2_tiet"), newRow.find(".b2_phong"), newRow.find(".ghichu")]
         defaultb1_thu = newRow.find(".b1_thu").text()
         defaultb1_tiet = newRow.find(".b1_tiet").text()
         defaultb1_phong = newRow.find(".b1_phong").text()
         defaultb2_thu = newRow.find(".b2_thu").text()
         defaultb2_tiet = newRow.find(".b2_tiet").text()
         defaultb2_phong = newRow.find(".b2_phong").text()
         defaultn_bd = newRow.find(".n_bd").text()
         defaultn_kt = newRow.find(".n_kt").text()
         default_gc = newRow.find(".ghichu").text()
         default_lop = newRow.find(".lop").text()
         default_mh = newRow.find(".mh").text()
         default_gv = newRow.find(".gv").text()
        defaultValue = {
            defaultb1_thu,
            defaultb1_tiet,
            defaultb1_phong,
            defaultb2_thu,
            defaultb2_tiet,
            defaultb2_phong,
            defaultn_bd,
            defaultn_kt,
            default_gc,
            default_lop,
            default_mh,
            default_gv
        }
         arr.forEach(el => {
            el.attr("contenteditable", "true")
         });
         newRow.find(".n_bd").html(`<input type="date" style="height: 20px; width: 70px"/>`)
         newRow.find(".n_kt").html(`<input type="date" style="height: 20px; width: 70px"/>`)


        newRow.find('.mh').html(`<select class="mahp-select">
        <option value="">Không</option>
        <?php if (isset($result_hp) && is_array($result_hp) || is_object($result_hp))
            {  foreach($result_hp as $rowhp){ ?>
            <option value="<?php echo $rowhp['MAHP'] ?>"><?php echo $rowhp['MAHP'] ?></option>
            <?php }}?>
        </select>`)
        newRow.find('.lop').html(`<select class="malop-select">
        <option value="">Không</option>
        <?php if (isset($result_lop) && is_array($result_lop) || is_object($result_lop))
            {  foreach($result_lop as $rowlop){ ?>
            <option value="<?php echo $rowlop['MALOP'] ?>"><?php echo $rowlop['MALOP'] ?></option>
            <?php }}?>
        </select>`)
        newRow.find('.gv').html(`<select class="magv-select">
        <option value="">Không</option>
        <?php if (isset($result_gv) && is_array($result_gv) || is_object($result_gv))
            {  foreach($result_gv as $rowgv){ ?>
            <option value="<?php echo $rowgv['MAGV'] ?>"><?php echo $rowgv['MAGV'] ?></option>
            <?php }}?>
        </select>`)

     });
     // Xử lý sự kiện click của nút "Edit"
     $(document).on('click', '#updateButton', function() {
         var newRow = $(this).closest('tr'); 

         let id = newRow.find(".id").text()
         let b1_thu = newRow.find(".b1_thu").text()
         let b1_tiet = newRow.find(".b1_tiet").text()
         let b1_phong = newRow.find(".b1_phong").text()
         let b2_thu = newRow.find(".b2_thu").text()
         let b2_tiet = newRow.find(".b2_tiet").text()
         let b2_phong = newRow.find(".b2_phong").text()
         let ngay_bd = newRow.find(".n_bd input").val()
         let ngay_kt = newRow.find(".n_kt input").val()
         let ghichu = newRow.find(".ghichu").text()
         var lop = newRow.find('.malop-select').val();
         var monhoc = newRow.find('.mahp-select').val();
         var giangvien = newRow.find('.magv-select').val();
         // Tạo đối tượng dữ liệu để gửi đi
         var data = {
            id,
            b1_tiet: b1_thu || defaultValue.defaultb1_thu,
            b1_thu: b1_tiet || defaultValue.defaultb1_tiet,
            b1_phong: b1_phong || defaultValue.defaultb1_phong,
            b2_tiet: b2_thu || defaultValue.defaultb2_thu,
            b2_thu: b2_tiet || defaultValue.defaultb2_tiet,
            b2_phong: b2_phong || defaultValue.defaultb2_phong,
            ngay_bd: ngay_bd || defaultValue.defaultn_bd,
            ngay_kt: ngay_kt || defaultValue.defaultn_kt,
            ghichu: (ghichu || defaultValue.defaultgc) || "",
            lop: lop || defaultValue.default_lop,
            monhoc: monhoc || defaultValue.default_mh,
            giangvien: giangvien || defaultValue.default_gv,
         };
         console.log(data);
         $.ajax({
             url: '<?= URL ?>/AdminThoiKhoaBieuController/edit',
             type: 'POST',
             data: data,
             success: (response) => {
                console.log(response);
                $(this).parent("td").html(`<a class="editThoiKhoaBieu" href="#">edit</a>`)
                arr.forEach(el => {
                    el.attr("contenteditable", "false")
                });
                newRow.find(".b1_thu").text(b1_thu || defaultValue.defaultb1_thu)
                newRow.find(".b1_tiet").text(b1_tiet || defaultValue.defaultb1_tiet)
                newRow.find(".b1_phong").text(b1_phong || defaultValue.defaultb1_phong)
                newRow.find(".b2_thu").text(b2_thu || defaultValue.defaultb2_thu)
                newRow.find(".b2_tiet").text(b2_tiet || defaultValue.defaultb2_tiet)
                newRow.find(".b2_phong").text(b2_phong || defaultValue.defaultb2_phong)
                newRow.find(".n_bd").html(ngay_bd || defaultValue.defaultn_bd)
                newRow.find(".n_kt").html(ngay_kt || defaultValue.defaultn_kt)
                newRow.find(".ghichu").text((ghichu || defaultValue.defaultgc) || "")
                newRow.find(".lop").html(lop || defaultValue.default_lop)
                newRow.find(".mh").html(monhoc || defaultValue.default_mh)
                newRow.find(".gv").html(giangvien || defaultValue.default_gv)
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