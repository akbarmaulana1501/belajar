<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url('templates/') ?>assets/images/favicon.ico">

        <!-- Bootstrap select pluings -->
        <link href="<?= base_url('templates/') ?>assets/libs/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="<?= base_url('templates/') ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('templates/') ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('templates/') ?>assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="bg-white">
        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div>

                            <div class="text-center mb-4">
                                <a href="index.html">
                                    <span><img src="<?= base_url('templates/') ?>assets/images/logo-blue.png" alt="" height="65"></span>
                                </a>
                            </div>
                            <div id="infoMessage"> <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?></div>
                            <form class="user" method="post" action="<?= base_url('auth'); ?>">

                                <div class="form-group mb-3">
                                    <label for="emailaddress">Email address</label>
                                    <input class="form-control" type="email" id="email" name="email" placeholder="Enter your email" value="<?= set_value('email'); ?>">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>                                    
                                </div>

                                <!-- <a href="page-forgot_password" class="text-muted float-right">Forgot your password ?</a> -->

                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" required="" id="password" name="password" placeholder="Enter your password">
                                </div>

                                <div class="form-group mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkbox-signin" name="remember" checked>
                                        <!-- <label class="custom-control-label" for="checkbox-signin">Remember me</label> -->
                                    </div>
                                </div>

                                <div class="form-group text-center mb-3">
                                    <button class="btn btn-primary btn-lg width-lg btn-rounded" type="submit"> LogIn </button>
                                </div>

                            </form>

                        </div>
                        <!-- end card -->

                        <!-- <div class="row">
                            <div class="col-sm-12 text-center">
                                <p class="text-muted">Don't have an account? <a href="page-register.html" class="text-dark ml-1">Sign Up</a></p>
                            </div>
                        </div> -->
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->
    

        <!-- Vendor js -->
        <script src="<?= base_url('templates/') ?>assets/js/vendor.min.js"></script>

        <!-- Bootstrap select plugin -->
        <script src="<?= base_url('templates/') ?>assets/libs/bootstrap-select/bootstrap-select.min.js"></script>

        <!-- App js -->
        <script src="<?= base_url('templates/') ?>assets/js/app.min.js"></script>
        
    </body>
</html>