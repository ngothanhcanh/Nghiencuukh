<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=URL?>/public/theme-bucket-master/js/data-tables/DT_bootstrap.css" />
    <link href="<?=URL ?>/public/theme-bucket-master/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=URL ?>/public/theme-bucket-master/js/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet">
    <link href="<?=URL ?>/public/theme-bucket-master/css/bootstrap-reset.css" rel="stylesheet">
    <link href="<?=URL ?>/public/theme-bucket-master/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?=URL ?>/public/theme-bucket-master/js/jvector-map/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <link href="<?=URL ?>/public/theme-bucket-master/css/clndr.css" rel="stylesheet">
    <!--clock css-->
    <link href="<?=URL ?>/public/theme-bucket-master/js/css3clock/css/style.css" rel="stylesheet">
    <!--Morris Chart CSS -->
    <link href="<?=URL ?>/public/theme-bucket-master/js/morris-chart/morris.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?=URL ?>/public/theme-bucket-master/css/style.css" rel="stylesheet">
    <link href="<?=URL ?>/public/theme-bucket-master/css/style-responsive.css" rel="stylesheet"/>
</head>
<body>
  
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
                                        </tr>
                                    </thead>

                                    <tbody id="search-results" role="alert" aria-live="polite" aria-relevant="all">
                                        <?php if(!empty($result_svlop))
                                        {
                                            foreach ($result_svlop as $row) {
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
                                                    </tr>
                                        <?php
                                            }
                                        }else{
                                                
                                        }
                                        ?>
                                    </tbody>
                                </table>                       
        <!-- page end-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#search-input').on('input', function() {
            $('.odd').remove(); //xóa các tr odd đang hiện 
            var searchValue = $(this).val().toLowerCase(); //đưa hết về chữ thường 
            <?php if (isset($result)) {
                foreach ($result as $row) { ?>
                    var name = '<?php echo $row['TENSV']; ?>'.toLowerCase(); //đặt biến name là tên của giá trị name trong bảng người dùng
                    if (name.includes(searchValue)) //so sách giá trị tìm bằng giá trị name
                    {
                        var listItem = ' <tr class="odd" id="<?= $row['MSSV'] ?>"><td class="sorting_1"><?php echo $row['MSSV'] ?></td><td class="name"> <?= $row['TENSV'] ?></td> <td class="gioitinh"><?= $row['GIOITINH'] ?></td><td class="ngaysinh"><?= $row['NGAYSINH'] ?></td><td class="diachi"><?= $row['DIACHI'] ?></td><td class="khoas"><?= $row['IDKHOAS'] ?></td><td class="malop"><?= $row['MALOP'] ?></td><td class="makh"><?= $row['MAKH'] ?></td><td class="maph"><?= $row['MAPH'] ?></td></tr>'
                        $('#search-results').append(listItem);
                    }

            <?php }
            } ?>

        });
        // Xử lý sự kiện click của nút "Save"
    });
</script>
<!-- main-end -->
</body>
</html>


