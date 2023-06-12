<?php include '../quanlysvphp/app/mvc/views/layout/header-siba-GV.php' ?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Danh Sách Học Sinh Lớp
                        <!-- <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                        </span> -->
                    </header>
                    <div class="panel-body">
                        <div class="adv-table editable-table ">
                            <div class="clearfix">
                            <div class="col-lg-6">
                            <div class="form-group">
                                <label class="col-lg-2 col-sm-2 control-label">Mã Lớp </label>
                                <div class="col-lg-4">
                                    <select id="e2" style="width:250px" class="populate placeholder select2-offscreen" tabindex="-1" title="">
                                        <optgroup label="MALOP/Tenlop">
                                            <?php foreach($result as $resuil_lop){ ?>
                                            <option value="<?= $resuil_lop['MALOP'] ?>"><?=$resuil_lop['MALOP'] ?>/<?= $resuil_lop['TENLOP'] ?></option>
                                            <?php }?>
                                        </optgroup>   
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                <button type="button" style="margin-top:-6px;" class="btn btn-round btn-primary btn-timlop">Tìm</button>
                                </div>
                            </div>
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
                                        <div class="dataTables_filter" id="editable-sample_filter"><label>Search: <input type="text" id="search-input" aria-controls="editable-sample" class="form-control medium"></label></div>
                                    </div>
                                </div>
                               <div id="table-sinvienlop">

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
    $(document).on('click','.btn-timlop',function(){
        var selectmalop = $('#e2').find('option:selected').val();
       var data = {
        selectmalop:selectmalop
       };
       $.ajax({
        url:'<?= URL ?>/GiangVienSVLopController/index',
        type: 'POST',
        dataType: 'html',
        data:data,
        success:function(response)
        {
          $('#table-sinvienlop').html(response);
        }, 
        error: function(xhr, status, error) {
        console.log('Lỗi khi gửi yêu cầu AJAX:', error);
        }
       })
    })

            });
</script>
<!-- main-end -->
<?php include '../quanlysvphp/app/mvc/views/layout/footerGV.php' ?>