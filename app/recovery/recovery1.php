<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <title>Forget Password</title>
    <link rel="stylesheet" type="text/css" href="../assets/styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/styles/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/styles/animation.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/fonts/css/fontawesome-all.min.css">
    <link rel="manifest" href="../assets/scripts/_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="180x180" href="../../assets/img/favicon.png">
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png" />
    <style type="text/css">
        #verCon {
            display: none;
        }

        #keyCon {
            display: none;
        }
    </style>
    <style>
        .form-control {
            background-color: #cccccc !important;
            border-radius: 5rem !important;
            padding-left: 50px !important;
        }

        .form-control:focus {
            background-color: #f2f2f2 !important;
        }

        .input-style i {
            padding-left: 20px !important;
        }

        .btn {
            border-radius: 5rem !important;
        }
    </style>
</head>

<body class="theme-light">

    <div id="preloader">
        <div class="spinner-border color-highlight" role="status"></div>
    </div>

    <div id="page">

        <div class="page-content mt-3">

            <div style="display:flex; justify-content:center; align-content:center;">
                <div class="card card-style login-box" style="min-width:450px; padding:20px;">
                    <div class="content">

                        <div class="text-center">
                            <div class="pb-3 pt-3">
                                <img src="../../assets/img/logodark.png" class="img-fluid" width="250" />
                            </div>
                            <h1 class="font-30 mb-3" style="color: white;">Forget Password</h1>
                            <p class="boxed-text-xl color-highlight pt-3 pb-3 font-15" id="msgcon">
                                Enter the email account associated with your account and we'll send you the reset Code!
                            </p>
                        </div>

                        <form id="emailCon" method="post">
                            <div class="px-2">


                                <div class="user-box">
                                    <input type="email" id="email" name="email" style="font-size: large;" required readonly />
                                    <label for="email">Email <em style="color:red;">*</em>
                                    </label>
                                </div>

                                <!-- <div class="input-style  no-borders has-icon mb-4">
                        <i class="fa fa-at"></i>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required readonly />
                        <label for="email" class="color-highlight">Email</label>
                        <em>(required)</em>
                    </div> -->

                                <button type="submit" id="submit-btn" style="width: 100%;" class="mybt font-600 font-15 mt-4">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    Recover Password
                                </button>
                                <div class="row pt-5 mb-3">
                                    <div class="col-12 text-center font-15">
                                        <a class="text-white" href="../login/">Already Have An Account? Login Now</a>
                                    </div>
                                    <div class="col-12 text-center font-15 mt-2">
                                        <a class="text-white" href="../register/">Don't Have An Account, Create Account</a>
                                    </div>
                                </div>

                            </div>
                        </form>

                        <form id="verCon" method="post">
                            <div class="px2">
                                <div class="user-box">
                                    <input type="number" id="vercode" name="code" placeholder="Verification Code" required />
                                    <label for="vercode">Verification Code <em style="color: red;">*</em></label>
                                    
                                </div>
                                <input type="hidden" name="email" id="veremail" />
                                <button type="submit" id="submit-btn2" style="width: 100%;" class="mybt font-600 font-15 mt-4">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>Verify Code
                                </button>
                                <div class="row pt-5 mb-3">
                                    <div class="col-12 text-center font-15">
                                        <a class="text-white" href="../login/">Already Have An Account? Login Now</a>
                                    </div>
                                    <div class="col-12 text-center font-15 mt-2">
                                        <a class="text-white" href="../register/">Don't Have An Account, Create Account</a>
                                    </div>
                                </div>

                            </div>
                        </form>

                        <form name="chngpwd" id="keyCon">
                            <div class="px2">
                                <div class="user-box">
                                    <input type="password" id="password" name="password" placeholder="New Password" required readonly />
                                    <label for="password">New Password<em style="color: red;">*</em></label>
                                </div>

                                <div class="user-box">
                                    <input type="password" id="password2" name="password2" placeholder="Retype Password" required readonly />
                                    <label for="password" >Retype Password<em style="color: red;">*</em></label>
                                </div>

                                <input type="hidden" id="keyemail" name="email" />
                                <input type="hidden" id="keycode" name="code" />

                                <button type="submit" id="submit-btn3" style="width: 100%;" class="mybt font-600 font-15 mt-4">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span> Update Password
                                </button>
                                <div class="row pt-5 mb-3">
                                    <div class="col-12 text-center font-15">
                                        <a class="text-white" href="../login/">Already Have An Account? Login</a>
                                    </div>
                                    <div class="col-12 text-center font-15 mt-2">
                                        <a class="text-white" href="../register/">New User? Create Account</a>
                                    </div>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>



        </div>
        <!-- Page content ends here-->

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../assets/scripts/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="../assets/scripts/custom.js"></script>

    <script>
        $("document").ready(function() {
            //Enable Form Input
            $("#email").click(function() {
                $(this).removeAttr("readonly");
            });
            $("#password").click(function() {
                $(this).removeAttr("readonly");
            });
            $("#password2").click(function() {
                $(this).removeAttr("readonly");
            });



            //Check If Email Exist And Send Verification Code
            $('#emailCon').submit(function(e) {
                e.preventDefault()
                // $('#submit-btn').removeClass("gradient-highlight");
                $('#submit-btn').addClass("btn-secondary");
                $('#submit-btn').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i> Processing ...');

                $.ajax({
                    url: '../home/includes/route.php?get-user-code',
                    data: new FormData($(this)[0]),
                    cache: false,
                    contentType: false,
                    processData: false,
                    method: 'POST',
                    type: 'POST',
                    success: function(resp) {
                        console.log(resp);
                        if (resp == 0) {
                            swal('Alert!!', "A Verification Code Have Been Sent To Your Email Address, Please Check And Provide The Code To Continue.", "success");
                            $("#emailCon").hide();
                            $("#verCon").show();
                            $("#veremail").val($("#email").val());
                        } else if (resp == 1) {
                            swal('Alert!!', "Email Not Found, Please Verify Your Email And Try Again.", "error");
                        } else {
                            swal('Alert!!', "Unknow Error, Please Contact Our Customer Support", "error");
                        }

                        $('#submit-btn').removeClass("btn-secondary");
                        // $('#submit-btn').addClass("gradient-highlight");
                        $('#submit-btn').html("<span></span> <span></span> <span></span> <span></span> Recover Password");

                    }
                })
            });

            //Verify Email Code And Allow Password Update
            $('#verCon').submit(function(e) {
                e.preventDefault()
                // $('#submit-btn2').removeClass("gradient-highlight");
                $('#submit-btn2').addClass("btn-secondary");
                $('#submit-btn2').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i> Processing ...');

                $.ajax({
                    url: '../home/includes/route.php?verify-user-code',
                    data: new FormData($(this)[0]),
                    cache: false,
                    contentType: false,
                    processData: false,
                    method: 'POST',
                    type: 'POST',
                    success: function(resp) {
                        console.log(resp);
                        if (resp == 0) {
                            swal('Alert!!', "Code Verified, Please Enter Your New Password Below.", "success");
                            $("#emailCon").hide();
                            $("#verCon").hide();
                            $("#keyCon").show();
                            $("#keyemail").val($("#email").val());
                            $("#keycode").val($("#vercode").val());
                        } else if (resp == 1) {
                            swal('Alert!!', "Incorrect Code Provided, Please Verify Details And Try Again.", "error");
                        } else {
                            swal('Alert!!', "Unknow Error, Please Contact Our Customer Support", "error");
                        }

                        $('#submit-btn2').removeClass("btn-secondary");
                        // $('#submit-btn2').addClass("gradient-highlight");
                        $('#submit-btn2').html("<span></span> <span></span> <span></span> <span></span> Verify Code");

                    }
                })
            });

            //Update User Password``````````
            $('#keyCon').submit(function(e) {
                e.preventDefault()

                //Validate Password
                $msg = "";
                if ($("#password").val() != $("#password2").val()) {
                    $msg = "New Password & Retyped Password Don't Match.";
                }
                if ($("#password").val().length > 15) {
                    $msg = "Password should not be more than 15 character.";
                }
                if ($("#password").val().length < 8) {
                    $msg = "Password should be at least 8 character.";
                }

                if ($msg != "") {
                    swal("Alert!!", $msg, "info");
                    $msg = "";
                    return;
                }

                // $('#submit-btn2').removeClass("gradient-highlight");
                $('#submit-btn2').addClass("btn-secondary");
                $('#submit-btn2').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i> Processing ...');

                $.ajax({
                    url: '../home/includes/route.php?update-user-pass',
                    data: new FormData($(this)[0]),
                    cache: false,
                    contentType: false,
                    processData: false,
                    method: 'POST',
                    type: 'POST',
                    success: function(resp) {
                        console.log(resp);
                        if (resp == 0) {
                            swal('Alert!!', "Password Updated Successfully, You Can Now Login With Your Details.", "success");
                            $("#verCon").hide();
                            $("#keyCon").hide();
                            $("#emailCon").show();
                            $("#emailCon")[0].reset();
                            $("#keyCon")[0].reset();
                            $("#verCon")[0].reset();
                            window.location.href = "../login/";
                        } else if (resp == 1) {
                            swal('Alert!!', "Unable To Update Password, Please Try Again Later.", "error");
                        } else {
                            swal('Alert!!', "Unknow Error, Please Contact Our Customer Support.", "error");
                        }

                        $('#submit-btn2').removeClass("btn-secondary");
                        // $('#submit-btn2').addClass("gradient-highlight");
                        $('#submit-btn2').html("<span></span> <span></span> <span></span> <span></span> Update Password");

                    }
                })
            });

        });
    </script>
</body>

</html>