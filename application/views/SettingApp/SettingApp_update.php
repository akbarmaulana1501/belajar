                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo ucwords($m)?></a></li>
                                            <li class="breadcrumb-item active"><?php echo ucwords($ml) ?></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"><a href="<?php echo base_url() ?>dashboard" class="btn btn-info btn-sm waves-effect waves-light width-xs" role="button" aria-disabled="true"><i class="fe-arrow-left"></i> <?php echo ucwords($dashboard) ?></a></h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card card-border">
                                    <div class="card-header border-primary pb-0">
                                    </div>
                                    <div class="card-body">
                                        <div class="row justify-content-center mt-1 mb-2">
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <h3 class="title">Setting Application</h3>
                                                        <p class="text-muted sub-title mb-2">Silahkan isi data berikut!</p>
                                                    </div>
                                                </div>
    
                                                <div class="row">
    
                                                    <!-- Contact form -->
                                                    <div class="col-sm-12">
                                                        <form action="#" id="form" enctype="multipart/form-data">
                                                     
                                                            <div class="form-group" hidden='hidden'>
                                                                <label for="userName">ID Application<span class="text-danger">*</span></label>
                                                                <input type="text" name="id_application" parsley-trigger="change" required placeholder="Enter ID Application" class="form-control" id="id_application" readonly>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="userName">Nama Perusahaan<span class="text-danger">*</span></label>
                                                                        <input type="text" name="nm_perusahaan" parsley-trigger="change" required
                                                                                placeholder="Enter Nama Aplikasi" class="form-control" id="nm_perusahaan">
                                                                    </div>
                                                                </div> <!-- /col -->
                                                            </div> <!-- /row -->

                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="userName">Nama Aplikasi<span class="text-danger">*</span></label>
                                                                        <input type="text" name="nm_application" parsley-trigger="change" required
                                                                                placeholder="Enter Nama Aplikasi" class="form-control" id="nm_application">
                                                                    </div>
                                                                </div> <!-- /col -->
                                                                <div class="col-6">
                                                                        <div class="form-group">
                                                                            <label for="userName">Website<span class="text-danger">*</span></label>
                                                                            <input type="text" name="website" parsley-trigger="change" required
                                                                                    placeholder="Enter website" class="form-control" id="website">
                                                                        </div>
                                                                </div> <!-- /col -->
                                                            </div> <!-- /row -->

                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="userName">Kelurahan<span class="text-danger">*</span></label>
                                                                        <input type="text" name="kel" parsley-trigger="change" required
                                                                                placeholder="Enter Kelurahan" class="form-control" id="kel">
                                                                    </div>
                                                                </div> <!-- /col -->
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="userName">Kecamatan<span class="text-danger">*</span></label>
                                                                        <input type="text" name="kec" parsley-trigger="change" required
                                                                                placeholder="Enter Kecamatan" class="form-control" id="kec">
                                                                    </div>
                                                                </div> <!-- /col -->
                                                            </div> <!-- /row -->

                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="userName">Kabupaten / Kota<span class="text-danger">*</span></label>
                                                                        <input type="text" name="kab_kota" parsley-trigger="change" required
                                                                                placeholder="Enter Kabupaten / Kota" class="form-control" id="kab_kota">
                                                                    </div>
                                                                </div> <!-- /col -->
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="userName">Provinsi<span class="text-danger">*</span></label>
                                                                        <input type="text" name="prov" parsley-trigger="change" required
                                                                                placeholder="Enter Provinsi" class="form-control" id="prov">
                                                                    </div>
                                                                </div> <!-- /col -->
                                                            </div> <!-- /row -->

                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="userName">Telepon<span class="text-danger">*</span></label>
                                                                        <input type="text" name="no_telp" parsley-trigger="change" required
                                                                                placeholder="Enter Telepon" class="form-control" id="no_telp">
                                                                    </div>
                                                                </div> <!-- /col -->
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="userName">E-Mail<span class="text-danger">*</span></label>
                                                                        <input type="text" name="email" parsley-trigger="change" required placeholder="Enter E-Mail" class="form-control" id="email">
                                                                    </div>
                                                                </div> <!-- /col -->
                                                            </div> <!-- /row -->
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <div class="form-group">
                                                                            <label for="userName">Alamat<span class="text-danger">*</span></label> 
                                                                            <textarea required class="form-control" rows="3" name="alamat"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div> <!-- /col -->
                                                            </div> <!-- /row -->
                                                            <!-- /Form Msg -->
    
                                                            <div class="row update">
                                                                <div class="col-12">
                                                                    <button type="button" id="btnSave" onclick="save()" class="btn btn-primary mr-1"><i class="fe-save"> </i> Update</button>
                                                                </div> <!-- /col -->
                                                            </div> <!-- /row -->
    
                                                        </form> <!-- /form -->
                                                    </div> <!-- end col -->
    
                                                     <!-- end col -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->


    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
    </div>

        <?php $this->load->view('templates/includes/footer') ?>
 
        
        <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
            }, 16000);

        $(document).ready(function() {
                $.ajax({
                    url : "<?php echo site_url('setting-app/id')?>",
                    type: "GET",
                    dataType: "JSON",
                    success: function(data)
                    {

                        $('[name="id_application"]').val(data.id_application);
                        $('[name="nm_application"]').val(data.nm_application);
                        $('[name="nm_perusahaan"]').val(data.nm_perusahaan);
                        $('[name="alamat"]').val(data.alamat);
                        $('[name="kel"]').val(data.kel);
                        $('[name="kec"]').val(data.kec);
                        $('[name="kab_kota"]').val(data.kab_kota);
                        $('[name="prov"]').val(data.prov);
                        $('[name="no_telp"]').val(data.no_telp);
                        $('[name="email"]').val(data.email);
                        $('[name="website"]').val(data.website);
                        $('#btnSave').html('<i class="fe-save"> </i> Update'); 
                        

                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        Swal.fire({
                            icon : "error",
                            title:"Oops...",
                            text:"Gagal mengambil data!"
                        });

                        // alert('Error adding / update data');
                        $('#btnSave').html('<i class="fe-save"> </i> Update'); 
                        $('#btnSave').attr('disabled',false); 

                    }
                });
            });

        function roload() {
            $.ajax({
                    url : "<?php echo site_url('setting-app/id')?>",
                    type: "GET",
                    dataType: "JSON",
                    success: function(data)
                    {

                        $('[name="id_application"]').val(data.id_application);
                        $('[name="nm_application"]').val(data.nm_application);
                        $('[name="nm_perusahaan"]').val(data.nm_perusahaan);
                        $('[name="alamat"]').val(data.alamat);
                        $('[name="kel"]').val(data.kel);
                        $('[name="kec"]').val(data.kec);
                        $('[name="kab_kota"]').val(data.kab_kota);
                        $('[name="prov"]').val(data.prov);
                        $('[name="no_telp"]').val(data.no_telp);
                        $('[name="email"]').val(data.email);
                        $('[name="website"]').val(data.website);
                        $('#btnSave').html('<i class="fe-save"> </i> Update'); 
                        

                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        Swal.fire({
                            icon : "error",
                            title:"Oops...",
                            text:"Gagal mengambil data!"
                        });

                        // alert('Error adding / update data');
                        $('#btnSave').html('<i class="fe-save"> </i> Update'); 
                        $('#btnSave').attr('disabled',false); 

                    }
                });
        }
        
        function save() {
                $('#btnSave').text('saving...'); 
                $('#btnSave').attr('disabled',true); 
                url = "<?php echo site_url('setting-app/update')?>";
                $.ajax({
                    url : url,
                    type: "POST",
                    enctype: "multipart/form-data",
                    data: $('#form').serialize(),
                    dataType: "JSON",
                    success: function(data)
                    {

                        if(data.status) 
                        {
                            $.toast({
                                        text: "Data berhasil disimpan", 
                                        heading: 'Success', 
                                        icon: 'success', 
                                        showHideTransition: 'fade', 
                                        allowToastClose: false, 
                                        hideAfter: 3000, 
                                        stack: 5, 
                                        position: 'bottom-right', 
                                        textAlign: 'left',
                                        // loader: true, 
                                        // bgColor: '#0040e0',
                                    });
                            roload();
                            $('#btnSave').html('<i class="fe-save"> </i> Update'); 
                            $('#btnSave').attr('disabled',false); 
                        }
                        else
                        {
                            for (var i = 0; i < data.inputerror.length; i++) 
                            {
                                $('[name="'+data.inputerror[i]+'"]').addClass('is-invalid');
                                $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]).addClass('invalid-feedback');
                            }
                            $('#btnSave').html('<i class="fe-save"> </i> Update'); 
                            $('#btnSave').attr('disabled',false); 
                        }  


                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        Swal.fire({
                            icon : "error",
                            title:"Oops...",
                            text:"Session anda sudah berakhir!",
                            footer:'Ingin keluar ? <a href="<?= base_url('auth/logout') ?>"> Klik disini </a> '
                        });
                        
                        $('#btnSave').html('<i class="fe-save"> </i> Update'); 
                        $('#btnSave').attr('disabled',false); 

                    }
                });
            }
        </script>
       

    </body>
</html>