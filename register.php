<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Page</title>    
        <?php include("links.php"); ?>
</head>
<body>
    <div class="container-fluid">
    <div class="row">
        <div class="col-sm-offset-4 col-sm-4 col-sm-offset-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                <h3>Register</h3>
                </div>
                <div class="panel-body">
                    <form action="register.php" method="post">
                        <?php include("errors.php"); ?>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" placeholder="enter your Username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password1" placeholder="enter your password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password2" placeholder="re-enter your password" class="form-control">
                        </div>
                        <button class="btn btn-danger btn-block" name="register"><i class="glyphicon glyphicon-user"></i> Sing Up</button>
                    </form>
                        <br>Already a Member? <a href="login.php">Login</a>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>