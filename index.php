<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kareem System</title>
    <link rel="stylesheet" href="layout/css/all.min.css">
    <link rel="stylesheet" href="layout/css/bootstrap.min.css">
    <link rel="stylesheet" href="layout/css/style.css">
</head>
<body>
    <div class="container">
        <!-- Login Form Start -->
        <div class="row justify-content-center wrapper m-1">
            <div class="col-lg-10 my-auto">
                <div class="card-group login-shadow row">
                    <div class="col-12 col-sm-12 col-md-12 p-0 col-lg">
                        <div class="card rounded-left">
                            <div class="card-body">
                                <h2 class="card-title text-capitalize text-center text-primary font-weight-bold">Sign into your account</h5>
                                <hr class="my-3">
                                <form action="#" method="post" class="px-1" id="login-form">
                                    <div class="input-group input-group-lg form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text rounded">
                                                <i class="far fa-envelope fa-lg"></i>
                                            </span>
                                        </div>
                                        <input type="email" name="email" id="email" class="form-control rounded-0" placeholder="Email" required autofocus>
                                    </div>
                                    <div class="input-group input-group-lg form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text rounded">
                                                <i class="fas fa-key fa-lg"></i>
                                            </span>
                                        </div>
                                        <input type="password" name="password" id="password" class="form-control rounded-0" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox float-left">
                                            <input type="checkbox" name="rem" id="custom-checkbox" class="custom-control-input">
                                            <label for="custom-checkbox" class="custom-control-label" style="cursor:pointer;">Remember Me</label>
                                        </div>
                                        <div class="float-right">
                                            <a href="#">Forget Password ?</a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Sign In" class="btn btn-primary btn-block btn-lg btn-block btn-sign-style">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 p-0 col-lg-5">
                        <div class="card rounded-right bg-login-color h-100">
                            <div class="card-body d-flex flex-column justify-content-center">
                                <h2 class="text-center font-weight-bold text-white">Hello People !</h2>
                                <hr class="my-3 bg-light" style="height:2px;border-radius:100px;">
                                <p class="text-center font-weight-bolder text-capitalize text-white">Enter your personal info, so you could start your journey with us ...</p>
                                <button class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4 w-50" style="border-radius:100px;border-width:2px;">Sign Up</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- login Form End -->
        <!-- Register Form Start -->
        <div class="row justify-content-center wrapper m-1 m-ms-0" style="display:none">
            <div class="col-lg-10 my-auto">
                <div class="cardgroup login-shadow row">
                    <div class="col col-sm-12 col-md-12 p-0 col-lg-5">
                        <div class="card rounded-left bg-login-color h-100">
                            <div class="card-body d-flex flex-column justify-content-center">
                                <h2 class="text-center font-weight-bold text-white">Have An Account ?</h2>
                                <hr class="my-3 bg-light" style="height:2px;border-radius:100px;">
                                <p class="text-center font-weight-bolder text-capitalize text-white">Enter your personal info, so you could start your journey with us ...</p>
                                <button class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4 w-50" style="border-radius:100px;border-width:2px;">Sign In</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 p-0 col-lg">
                        <div class="card rounded-right">
                            <div class="card-body">
                                <h2 class="card-title text-capitalize text-center text-primary font-weight-bold">Create A New Account</h5>
                                <hr class="my-3">
                                <form action="#" method="post" class="px-1" id="register-form">
                                    <div class="input-group form-group input-group-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text rounded">
                                                <i class="far fa-user fa-lg"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="first-name" id="first-name" class="form-control rounded-0" placeholder="First Name">
                                        <input type="text" name="last-name" id="last-name" class="form-control rounded-0" placeholder="Last Name">
                                    </div>
                                    <div class="input-group input-group-lg form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text rounded">
                                                <i class="far fa-envelope fa-lg"></i>
                                            </span>
                                        </div>
                                        <input type="email" name="email" id="remail" class="form-control rounded-0" placeholder="Email" required autofocus>
                                    </div>
                                    <div class="input-group input-group-lg form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text rounded">
                                                <i class="fas fa-key fa-lg"></i>
                                            </span>
                                        </div>
                                        <input type="password" name="password" id="rpassword" class="form-control rounded-0" placeholder="Password" required minlength="7">
                                    </div>
                                    <div class="form-group input-group input-group-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text rounded">
                                                <i class="fas fa-key fa-lg"></i>
                                            </span>
                                        </div>
                                        <input type="password" name="re-password" id="re-password" class="form-control rounded-0" placeholder="Re-Password" required minlength="7">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Sign Up" class="btn btn-primary btn-block btn-lg btn-block btn-sign-style">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Register Form End -->
        <!-- Forget Password Start -->
        <div class="row justify-content-center wrapper m-1 m-ms-0" style="display:none">
            <div class="col-lg-10 my-auto">
                <div class="card-group login-shadow row">
                    <div class="col-12 col-sm-12 col-md-12 p-0 col-lg-5">
                        <div class="card rounded-left bg-login-color h-100">
                            <div class="card-body d-flex flex-column justify-content-center">
                                <h2 class="text-center font-weight-bold text-white">Reset Password</h2>
                                <hr class="my-3 bg-light" style="height:2px;border-radius:100px;">
                                <button class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4 w-50" style="border-radius:100px;border-width:2px;">Go Back</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 p-0 col-lg">
                        <div class="card rounded-right h-100">
                            <div class="card-body">
                                <h2 class="card-title text-capitalize text-center text-primary font-weight-bold">Forget Your Password ?</h5>
                                <p class="text-capitalize text-center p-2">To Reset Your Password, Enter Email Address And we will send you an email with the instructions</p>
                                <hr class="my-3">
                                <form action="#" method="post" class="px-1" id="reset-form">
                                    <div class="input-group input-group-lg form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text rounded">
                                                <i class="far fa-envelope fa-lg"></i>
                                            </span>
                                        </div>
                                        <input type="email" name="email" id="cemail" class="form-control rounded-0" placeholder="Email" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Sign In" class="btn btn-primary btn-block btn-lg btn-block btn-sign-style">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Forget Password End -->
    </div>
    <!-- javascipt -->
    <script src="layout/js/jquery-3.5.1.min.js"></script>
    <script src="layout/js/bootstrap.bundle.min.js"></script>
</body>
</html>