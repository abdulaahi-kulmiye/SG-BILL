<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="icon" href="admin/images/pos1.jpg"  sizes="16x16">
     <script src="jquery-3.2.1.js"></script>
    <!-- bootstrap javascript -->
    
<link rel="stylesheet" type="text/css" href="admin/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="admin/styles.css" />
	<script src="admin/js/bootstrap.min.js"></script>
	<link href="admin/font-awesome/css/font-awesome.css" rel="stylesheet">
	<title>SAHAL GAS | LOGIN</title>    
    <?php include("admin/links.php"); ?>
</head>
     <body class="bg">

	<section class="container">
	
			<section class="login-form">
		                    <form action="login.php" method="post" role="login">
                        <?php include("errors.php"); ?>
				    <div class=" pull-left">
					<img src="admin/images/sahallogo.png" class="img-responsive" style= "width:80px; height:80px; position:absulate" alt="" /></div>
					 <br>
					<div >
					<img src="admin/images/logo.png" class="img-responsive" alt=""  style= "margin-bottom:50px" />
                      </div>
					   <p style="margin-bottom:50px"></p>
					
					<div class="input-group margin-bottom-sm">
					<span class="input-group-addon" ><span class= "fa fa-user fa-lg"></span></span>
					<input type="text" name="username" placeholder="username" required class="form-control input-lg" />
					</div>
					<p style="margin-bottom:10px"></p>
						<div class="input-group">
					<span class="input-group-addon" ><i class= "fa fa-lock fa-lg"></i></span>
					<input type="password" name="password" placeholder="Password" required class="form-control input-lg" />
					</div>
				
					<p style="margin-bottom:25px"></p>
					<button type="submit" name="login"  class="btn btn-lg btn-primary btn-block"><i class= "fa fa-sign-in fa-lg"></i> LOG IN</button>
					
						<p style="margin-bottom:6px"></p>
						
				</form>
				
			</section>
	</section>
	

    
</body>
                         
</html>