<?php $this->load->view('templates/includes/header') ?>
    <body class="bg-white">
        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6">
                        <div>

                            <!-- <div class="text-center mb-4"> -->
                                <!-- <a href="index.html"> -->
                                    <!-- <span><img src="<?= base_url('templates/') ?>assets/images/logo-dark.png" alt="" height="30"></span> -->
                                <!-- </a> -->
                            <!-- </div> -->

                            <div class="text-center">
                                <img src="<?= base_url('templates/') ?>assets/images/icons/high_priority.svg" alt="high_priority.svg" height="60">
                                <h2 class="text-uppercase text-primary mt-4">Page Is Blocked</h2>
                                <p class="text-muted mt-4 ">It's looking like you may have taken a wrong turn. Don't worry... it
                                happens to the best of us. You might want to check your internet connection. Here's a
                                little tip that might help you get back on track.</p>

                                <a href="<?= base_url('auth/logout') ?>" class="btn btn-primary waves-effect waves-light mt-4"> Return Login</a>
                            </div>

                        </div>
                        <!-- end card -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->
      
    </div>
    <!-- END wrapper -->
    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
           <!-- Vendor js -->
        <script src="<?= base_url('templates/') ?>assets/js/vendor.min.js"></script>

        <!-- Bootstrap select plugin -->
        <script src="<?= base_url('templates/') ?>assets/libs/bootstrap-select/bootstrap-select.min.js"></script>
        <script src="<?= base_url('templates/') ?>assets/libs/select2/select2.min.js"></script>
        <script src="<?= base_url('templates/') ?>assets/libs/jquery-mockjax/jquery.mockjax.min.js"></script>
        <script src="<?= base_url('templates/') ?>assets/libs/autocomplete/jquery.autocomplete.min.js"></script>
        <script src="<?= base_url('templates/') ?>assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
        <script src="<?= base_url('templates/') ?>assets/libs/switchery/switchery.min.js"></script>
        <script src="<?= base_url('templates/') ?>assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
        <script src="<?= base_url('templates/') ?>assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
        <script src="<?= base_url('templates/') ?>assets/libs/bootstrap-filestyle2/bootstrap-filestyle.min.js"></script>

        <!-- form advanced init js -->
        <script src="<?= base_url('templates/') ?>assets/js/pages/form-advanced.init.js"></script>

        <!-- App js -->
        <script src="<?= base_url('templates/') ?>assets/js/app.min.js"></script>


        <!-- Datatable plugin js -->
        <script src="<?= base_url('templates/') ?>assets/libs/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url('templates/') ?>assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="<?= base_url('templates/') ?>assets/libs/datatables/dataTables.responsive.min.js"></script>
        <script src="<?= base_url('templates/') ?>assets/libs/datatables/responsive.bootstrap4.min.js"></script>

        <script src="<?= base_url('templates/') ?>assets/js/pages/datatables.init.js"></script>

        <!-- Plugins js -->
        <script src="<?= base_url('templates/') ?>assets/libs/dropify/dropify.min.js"></script>

        <!-- Init js-->
        <script src="<?= base_url('templates/') ?>assets/js/pages/form-fileuploads.init.js"></script>

        <script src="<?= base_url('templates/') ?>assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <!-- Function  -->

        <!-- plugins -->
        <script src="<?= base_url('templates/') ?>assets/libs/moment/moment.min.js"></script>
        <script src="<?= base_url('templates/') ?>assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
        <script src="<?= base_url('templates/') ?>assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
        <script src="<?= base_url('templates/') ?>assets/libs/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script src="<?= base_url('templates/') ?>assets/libs/clockpicker/bootstrap-clockpicker.min.js"></script><!-- Init js-->
        <script src="<?= base_url('templates/') ?>assets/js/pages/form-pickers.init.js"></script>
        <script src="<?= base_url('templates/') ?>assets/libs/jquery-mask-plugin/jquery.mask.min.js"></script>        
        <script src="<?= base_url('templates/') ?>assets/libs/autonumeric/autoNumeric-min.js"></script>
        <!-- SweetAlert2 -->
        <script src="<?= base_url('templates/') ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
        <!-- Toastr -->
        <script src="<?= base_url('templates/') ?>assets/plugins/toastr/toastr.min.js"></script>
        <!-- Init js-->
        <script src="<?= base_url('templates/') ?>assets/js/pages/form-masks.init.js"></script>


        <script src="<?= base_url('templates/') ?>assets/libs/jquery-toast/jquery.toast.min.js"></script>

        <!-- toastr init js-->
        <script src="<?= base_url('templates/') ?>assets/js/pages/toastr.init.js"></script>
        <!-- form advanced init js -->
        <script src="<?= base_url('templates/') ?>assets/js/pages/form-advanced.init.js"></script>
        <script>
            $.toast({
                        text: "Tidak diberikan akses!", 
                        heading: 'Access Danied', 
                        icon: 'error', 
                        showHideTransition: 'fade', 
                        allowToastClose: false, 
                        hideAfter: 3000, 
                        stack: 5, 
                        position: 'bottom-right', 
                        textAlign: 'left',
                        // loader: true, 
                        // bgColor: '#0040e0',
                    });
        </script>  