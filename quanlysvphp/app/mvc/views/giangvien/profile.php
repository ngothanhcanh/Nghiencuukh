<?php include '../quanlysvphp/app/mvc/views/layout/header-siba-GV.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .main {
        display: grid;
        grid-template-columns: 1fr 2fr;
        margin-left: 12.5%;
        display: flex;
        height: 960px;
        width: 87.5%;
        padding-top: 82px;
    }

    .profile-left {
        flex: 1;
        background-color: #514f49;
        padding: 20px;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
    }

    .profile-left img {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        object-fit: cover;
        object-position: top;
        margin-bottom: 10px;
    }

    .profile-right {
        flex: 2;
        background-color: #7a6f6f;
        margin-left: 20px;
    }

    .profile-top {
        background-color: #cec0c0;
        margin-bottom: 20px;
        height: 40%; 
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
    }

    .profile-top h2 {
        margin: 0;
        font-size: 24px;
    }

    .profile-top table {
        width: 100%;
    }
    .profile-top td {
        display: inline-block;
       
        margin: 20px;
      
    }
    .title1{
        width: 100px;
        font-size: 15px;
    }
    .profile-bottom {
        height: 57%;
        background-color: #cec0c0;
    }
    .profile-top table tr:not(:last-child) {
        border-bottom: 1px solid #000;}
    .info {
        padding-left: 30px;
    }
</style>

<body>
    <div class="main">
        <div class="profile-left">
            <img src="<?=URL ?>/public/images/avt.jpg" alt="">
            <h3><?php echo $_SESSION['namegv'] ?> (<?php echo $_SESSION['magv'] ?>)</h3>
            <h3><?php echo $tenkhoa['TENKH'] ?></h3>
        </div>
        <div class="profile-right">
            <div class="profile-top">
                <h2>About</h2>
                <table>
                    <tr>
                        <td class="title1">Full Name</td>
                        <td class="info"><?php echo $_SESSION['namegv']  ?></td>
                    </tr>
                    <tr>
                        <td class="title1">Email</td>
                        <td class="info">******</td>
                    </tr>
                    <tr>
                        <td class="title1">Phone</td>
                        <td class="info">******</td>
                    </tr>
                    <tr>
                        <td class="title1">Address</td>
                        <td class="info">******</td>
                    </tr>
                </table>
            </div>
            <div class="profile-bottom"></div>
        </div>
    </div>
</body>

</html>
<?php include '../quanlysvphp/app/mvc/views/layout/footerGV.php' ?>