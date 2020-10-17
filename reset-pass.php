<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="icon" type="image/png" href="favicon.png"/>
    <link rel="stylesheet" href="layout/css/all.min.css">
    <link rel="stylesheet" href="layout/css/bootstrap.min.css">
    <link rel="stylesheet" href="layout/css/style.css">
</head>
<body>
    <div class="container">
    <div class="row justify-content-center wrapper m-1">
            <div class="col-lg-7 my-auto">
                <div class="card-group login-shadow row">
                    <div class="col p-0">
                        <div class="card rounded-left">
                            <div class="card-body">
                                <h2 class="card-title text-capitalize text-center text-primary font-weight-bold">Reset Your Password</h2>
                                <hr class="my-3">
                                <form action="#" method="post" class="px-1" id="login-form">
                                    <div class="input-group input-group-lg form-group">
                                    <div class="input-group input-group-lg form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text rounded">
                                                <i class="fas fa-key fa-lg"></i>
                                            </span>
                                        </div>
                                        <input type="password" name="password" id="rpassword" class="form-control rounded-0" placeholder="New-Password" required>
                                    </div>
                                    <div class="input-group input-group-lg form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text rounded">
                                                <i class="fas fa-key fa-lg"></i>
                                            </span>
                                        </div>
                                        <input type="password" name="password" id="rrpassword" class="form-control rounded-0" placeholder="Rewrite Password" required>
                                    </div>
                                    <div class="form-group w-100 text-center">
                                        <input type="submit" value="Sign In" class="btn btn-primary btn-block btn-lg btn-block btn-sign-style">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>