<?php
    include 'core/functions/Auth.php';
    include 'core/templates/Page.inc.php';
    $user = new Auth();
    $user->startsession();
    if(isset($_SESSION['user-email']) && !empty($_SESSION['user-email'])) {
        header("location: home.php");
        exit();
    }

    $page = new Page();
    $page->header('Kareem System');
?>
    <div class="container">
        <!-- Login Form Start -->
        <div class="row justify-content-center wrapper m-1">
            <div class="col-lg-10 my-auto">
                <div class="card-group login-shadow row">
                    <div class="col-12 col-sm-12 col-md-12 p-0 col-lg">
                        <div class="card rounded-left">
                            <div class="card-body">
                                <h2 class="card-title text-capitalize text-center text-primary font-weight-bold">Sign into your account</h2>
                                <hr class="my-3">
                                <form action="#" method="post" class="px-1" id="login-form">
                                    <div class="input-group input-group-lg form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text rounded">
                                                <i class="far fa-envelope fa-lg"></i>
                                            </span>
                                        </div>
                                        <input type="email" name="email" id="email" class="form-control rounded-0" placeholder="Email" required <?php if(isset($_COOKIE['email']) && !empty($_COOKIE['email'])) echo "value='" . $_COOKIE['email'] . "'"; else echo 'autofocus';  ?>>
                                        <!--div class="invalid-feedback">
                                            Enter A Valid Email Address.
                                        </div-->
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
                                            <input type="checkbox" name="rem" id="custom-checkbox" class="custom-control-input" <?php if(isset($_COOKIE['email']) && !empty($_COOKIE['email'])) echo 'checked';  ?>>
                                            <label for="custom-checkbox" class="custom-control-label" style="cursor:pointer;">Remember Me</label>
                                        </div>
                                        <div class="float-right">
                                            <a href="#" id="forget-pass">Forget Password ?</a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Sign In" class="btn btn-primary btn-block btn-lg btn-block btn-sign-style">
                                    </div>
                                    <div class="form-group" id="msg-box-login">
                                        <div class="alert alert-success font-weight-bold text-capitalize" id="s-msg" style="display: none;">
                                            <button class="close" data-dismiss="alert">&times;</button>
                                            <i class="fas fa-check-circle"></i>
                                            All Done. You can sign in now.
                                        </div>
                                        <div class="alert alert-danger font-weight-bold" id="f-msg-login" style="display: none;">
                                            <button class="close" data-dismiss="alert">&times;</button>
                                            <i class="fas fa-exclamation-triangle"></i> *Please Enter Valid Information.</div>
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
                                <button class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4 w-50" style="border-radius:100px;border-width:2px;" id="register-btn">Sign Up</button>
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
                                <button class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4 w-50" style="border-radius:100px;border-width:2px;" id='registerback'>Sign In</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 p-0 col-lg">
                        <div class="card rounded-right">
                            <div class="card-body">
                                <h2 class="card-title text-capitalize text-center text-primary font-weight-bold">Create A New Account</h2>
                                <hr class="my-3">
                                <form action="#" method="post" class="px-1" id="register-form">
                                    <div class="input-group form-group input-group-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text rounded">
                                                <i class="far fa-user fa-lg"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="first-name" id="first-name" class="form-control rounded-0" placeholder="First Name" required>
                                        <input type="text" name="last-name" id="last-name" class="form-control rounded-0" placeholder="Last Name" required>
                                        <div class="invalid-feedback">
                                            Don't leave the field empty.
                                        </div>
                                    </div>
                                    <div class="input-group input-group-lg form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text rounded">
                                                <i class="far fa-envelope fa-lg"></i>
                                            </span>
                                        </div>
                                        <input type="email" name="email" id="remail" class="form-control rounded-0" placeholder="Email" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid email.
                                        </div>
                                    </div>
                                    <div class="input-group input-group-lg form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text rounded">
                                                <i class="fas fa-key fa-lg"></i>
                                            </span>
                                        </div>
                                        <input type="password" name="password" id="rpassword" class="form-control rounded-0" placeholder="Password" required minlength="7">
                                        <div class="invalid-feedback">
                                            Please provide a valid  7-character password.
                                        </div>
                                    </div>
                                    <div class="form-group input-group input-group-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text rounded">
                                                <i class="fas fa-key fa-lg"></i>
                                            </span>
                                        </div>
                                        <input type="password" name="re-password" id="re-password" class="form-control rounded-0" placeholder="Re-Password" required minlength="7">
                                        <div class="invalid-feedback">
                                            Please write the same password again.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Sign Up" class="btn btn-primary btn-block btn-lg btn-block btn-sign-style">
                                    </div>
                                    <div class="form-group" id="msg-box">
                                        <div class="alert alert-danger font-weight-bold" id="f-msg" style="display: none;"><i class="fas fa-exclamation-triangle"></i> *Please Enter Valid Information.</div>
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
                                <button class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4 w-50" style="border-radius:100px;border-width:2px;" id="resetback">Go Back</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 p-0 col-lg">
                        <div class="card rounded-right h-100">
                            <div class="card-body">
                                <h2 class="card-title text-capitalize text-center text-primary font-weight-bold">Forget Your Password ?</h2>
                                <p class="text-capitalize text-center p-2">To Reset Your Password, Enter Email Address And we will send you an email with the instructions</p>
                                <hr class="my-3">
                                <form action="#" method="post" class="px-1" id="reset-form">
                                    <div class="form-group" id="msg-box-r"></div>
                                    <div class="input-group input-group-lg form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text rounded">
                                                <i class="far fa-envelope fa-lg"></i>
                                            </span>
                                        </div>
                                        <input type="email" name="email" id="cemail" class="form-control rounded-0" placeholder="Email" required autofocus>
                                        <div class="invalid-feedback">
                                            Please Enter A Valid Email Address
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block btn-lg btn-block btn-sign-style">Send Email</button>
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
<?php
    $page->footer(['layout/js/main.js', 'layout/js/main.js']);