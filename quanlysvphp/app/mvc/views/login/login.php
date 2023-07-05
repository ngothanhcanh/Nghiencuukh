<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"  href="<?php echo URL ?>/public/css/style.css">
</head>
    <div class="container">
		<div class="form-container">
            <div class="logo-login">
            <img src="<?= URL ?>/public/images/logo-UPT.png" alt="">
			<h2>WELCOME TO UPT</h2>
            </div>
			<h3 style="color:red;"><?php 
			if(!empty($error))
			{
			foreach($error as $errors)
			{  
				echo $errors;
			}
		    }
			?>
			</h3>
			<form class="form-signin" method="post" action="<?=URL?>/LoginController/index">
				<label for="username"></label>
				<input type="text"  name="login_name" class="form-control" placeholder="User Name" autofocus>

				<label for="password"></label>
                <input type="password" name="login_password" class="form-control" placeholder="Password">

				<input type="submit" name="login_submit" value="Đăng nhập">

			</form>
		</div>
	</div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </body>
</html>
