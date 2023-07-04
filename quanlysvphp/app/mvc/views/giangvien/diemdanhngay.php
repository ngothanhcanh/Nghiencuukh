<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= URL ?>/public/theme-bucket-master/js/data-tables/DT_bootstrap.css" />
    <link href="<?= URL ?>/public/theme-bucket-master/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= URL ?>/public/theme-bucket-master/js/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet">
    <link href="<?= URL ?>/public/theme-bucket-master/css/bootstrap-reset.css" rel="stylesheet">
    <link href="<?= URL ?>/public/theme-bucket-master/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?= URL ?>/public/theme-bucket-master/js/jvector-map/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <link href="<?= URL ?>/public/theme-bucket-master/css/clndr.css" rel="stylesheet">
    <!--clock css-->
    <link href="<?= URL ?>/public/theme-bucket-master/js/css3clock/css/style.css" rel="stylesheet">
    <!--Morris Chart CSS -->
    <link href="<?= URL ?>/public/theme-bucket-master/js/morris-chart/morris.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?= URL ?>/public/theme-bucket-master/css/style.css" rel="stylesheet">
    <link href="<?= URL ?>/public/theme-bucket-master/css/style-responsive.css" rel="stylesheet" />
</head>

<body>

    <table class="table table-striped table-hover table-bordered dataTable" id="editable-sample" aria-describedby="editable-sample_info">
        <thead>
            <tr role="row">
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending" style="width: 223px;">Mã sinh viên</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Points: activate to sort column ascending" style="width: 145px;">Mã học phần</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Points: activate to sort column ascending" style="width: 145px;">Buổi</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Points: activate to sort column ascending" style="width: 145px;">Status</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Points: activate to sort column ascending" style="width: 145px;">Ghi chú</th>
            </tr>
        </thead>
        <tbody id="search-results_diemdanh" role="alert" aria-live="polite" aria-relevant="all">
            <?php foreach ($result_diemdanhngay as $row) {
            ?>
                <tr class="odd" id="<?= $row['MSSV'] ?>">
                    <td class="mssvngay"><?php echo $row['MSSV'] ?></td>
                    <td class="mahpngay"><?= $row['MAHP'] ?></td>
                    <td class="buoinay"><?= $row['BUOIHOC'] ?></td>
                    <td class="ngayhoc" hidden><?= $row['NGAYHOC'] ?></td>
                    <td class="statusngay"><?php if($row['STATUS']==='1'){echo 'có';}else{echo 'vắng';} ?></td>
                    <td class="ghichungay"><?= $row['GHICHU'] ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <button id="edit-all-btn">Sửa tất cả</button>
    <button id="save-btn-dd">Lưu</button>
    <!-- page end-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
document.getElementById("edit-all-btn").addEventListener("click", function() {
    var rows = document.querySelectorAll("#search-results_diemdanh tr"); // Get all rows in the table

    for (var i = 0; i < rows.length; i++) {
        var row = rows[i];
        var cells = row.querySelectorAll("td.ghichungay, td.statusngay"); // Get all data cells in the row

        for (var j = 0; j < cells.length; j++) {
            var cell = cells[j];

            if (cell.classList.contains("statusngay")) {
                // Create a checkbox element
                var checkbox = document.createElement("input");
                checkbox.type = "checkbox";
                checkbox.checked = cell.textContent.trim() === "có"; // Set checkbox checked state based on cell content

                // Replace the text content with the checkbox element
                cell.textContent = "";
                cell.appendChild(checkbox);
            } else {
                cell.setAttribute("contenteditable", "true"); // Enable editing mode for other data cells
                cell.classList.add("editable"); // Add the 'editable' class to mark editable cells
            }
        }
    }
});

document.getElementById("save-btn-dd").addEventListener("click", function(event) {
    event.preventDefault();
    console.log("Button clicked");
    var rows = document.querySelectorAll("#search-results_diemdanh tr"); // Get all rows in the table
    var data = [];

    for (var i = 0; i < rows.length; i++) {
        var row = rows[i];
        var mssv = row.querySelector(".mssvngay").textContent.trim();
        var mahp = row.querySelector(".mahpngay").textContent.trim();
        var buoi = row.querySelector(".buoinay").textContent.trim();
        var ngay = row.querySelector(".ngayhoc").textContent.trim();
        var statusCell = row.querySelector(".statusngay");
        var statusCheckbox = statusCell.querySelector("input[type=checkbox]");
        var status = statusCheckbox.checked ? "1" : "0";
        var ghichu = row.querySelector(".ghichungay").textContent.trim();

        data.push({
            "mssv": mssv,
            "mahp": mahp,
            "buoi": buoi,
            "ngay": ngay,
            "status": status,
            "ghichu": ghichu
        });
    }

    // Send the data to the controller to update the database
    $.ajax({
        type: "POST",
        url: "<?= URL ?>/GiangVienDiemDanhController/saveData",
        data: { data: JSON.stringify(data) },
        dataType: 'json',
        success: function(response) {
            console.log('thanhcong');
            // Handle the response from the controller if needed
            console.log(response);
        },
        error: function(xhr, status, error) {
            console.log(error)
        }
    });

    // Disable editing mode and remove the 'editable' class for data cells
    var editableCells = document.querySelectorAll("#search-results_diemdanh .editable");
    for (var k = 0; k < editableCells.length; k++) {
        var editableCell = editableCells[k];
        editableCell.setAttribute("contenteditable", "false");
        editableCell.classList.remove("editable");
    }
});

</script>
    <!-- main-end -->
</body>

</html>