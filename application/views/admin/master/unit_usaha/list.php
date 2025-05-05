                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?= $m ?></a></li>
                                            <li class="breadcrumb-item active"><?= $ml ?></li>
                                        </ol>
                                    </div>
                                    <?= $TombolCreate ?>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->                         
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card card-border">
                                    <div class="card-header border-primary pb-0">
                                    </div>
                                    <div class="card-body table-responsive">
                                        <table id="table" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th width="2%">No</th>
                                                    <th>ID Unit Usaha</th>
                                                    <th>Nama Unit Usaha</th>
                                                    <th>Alamat</th>
                                                    <th>Kelurahan</th>
                                                    <th>Kecamatan</th>
                                                    <th>Kabupaten / Kota</th>
                                                    <th>Provinsi</th>
                                                    <th>Telepon</th>
                                                    <th>Email</th>
                                                    <th>Website</th>
                                                    <?= show_th_action() ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>                       
                            

                    <!-- Bootstrap modal -->
                       <div class="modal fade bs-example-modal-xl" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header badge-primary">
                                        <h4 class="modal-title mt-0"></h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="#" id="form" enctype="multipart/form-data">
                                        <div class="modal-body form">
                                            <div class="row">
                                                <div class="col-md-6" hidden>
                                                    <div class="form-group">
                                                       <label for="userName">ID Unit Usaha<span class="text-danger">*</span></label>
                                                        <input type="text" name="id_unit_usaha" parsley-trigger="change"
                                                                placeholder="Enter ID Unit Usaha" class="form-control" id="id_unit_usaha">
                                                                <span class="help-block"></span> 
                                                            
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                       <label for="userName">Nama Unit Usaha<span class="text-danger">*</span></label>
                                                        <input type="text" name="nama_unit_usaha" parsley-trigger="change"
                                                                placeholder="Enter Nama Unit Usaha" class="form-control" id="nama_unit_usaha">
                                                                <span class="help-block"></span> 
                                                            
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                       <label for="userName">No Telepon<span class="text-danger">*</span></label>
                                                        <input type="text" name="no_telp" parsley-trigger="change"
                                                                placeholder="Enter No Telepon" class="form-control" id="no_telp">
                                                                <span class="help-block"></span> 
                                                            
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                       <label for="userName">Kelurahan<span class="text-danger">*</span></label>
                                                        <input type="text" name="kel" parsley-trigger="change"
                                                                placeholder="Enter Kelurahan" class="form-control" id="kel">
                                                                <span class="help-block"></span> 
                                                            
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                       <label for="userName">Kecamatan<span class="text-danger">*</span></label>
                                                        <input type="text" name="kec" parsley-trigger="change"
                                                                placeholder="Enter Kecamatan" class="form-control" id="kec">
                                                                <span class="help-block"></span> 
                                                            
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                       <label for="userName">Kabupaten / Kota<span class="text-danger">*</span></label>
                                                        <input type="text" name="kab_kota" parsley-trigger="change"
                                                                placeholder="Enter Kabupaten / Kota" class="form-control" id="kab_kota">
                                                                <span class="help-block"></span> 
                                                            
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                       <label for="userName">Provinsi<span class="text-danger">*</span></label>
                                                        <input type="text" name="prov" parsley-trigger="change"
                                                                placeholder="Enter Provinsi" class="form-control" id="prov">
                                                                <span class="help-block"></span> 
                                                            
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                       <label for="userName">Website<span class="text-danger">*</span></label>
                                                        <input type="text" name="website" parsley-trigger="change"
                                                                placeholder="Enter Website" class="form-control" id="website">
                                                                <span class="help-block"></span> 
                                                            
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                       <label for="userName">Email<span class="text-danger">*</span></label>
                                                        <input type="text" name="email" parsley-trigger="change"
                                                                placeholder="Enter Email" class="form-control" id="email">
                                                                <span class="help-block"></span> 
                                                            
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                       <label for="userName">Alamat<span class="text-danger">*</span></label>
                                                        <textarea class="form-control" id="alamat" name="alamat" required rows="3"></textarea>
                                                                <span class="help-block"></span> 
                                                            
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row" hidden>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                       <label for="userName">Logo<span class="text-danger">*</span></label>
                                                        <input type="file" name="logo" parsley-trigger="change"
                                                                placeholder="Enter Logo" class="filestyle form-control"  id="logo">
                                                                <span class="help-block"></span> 
                                                            
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                       <label for="userName">Favicon<span class="text-danger">*</span></label>
                                                       <input type="file" name="favicon" parsley-trigger="change"
                                                                placeholder="Enter Favicon" class="filestyle form-control"  id="favicon">
                                                                <span class="help-block"></span> 
                                                            
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                        <!-- <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button> -->
                                        <button type="button" id="btnSave" onclick="save()" class="btn btn-info waves-effect waves-light"><i class="fe-save"> </i> Save</button>
                                    </div>
                                    </form>
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
        </script>


       <script type="text/javascript">
            var save_method; 
            var table;

            $(document).ready(function() {

                table = $('#table').DataTable({ 
                    "language": {
                    "url": "<?= site_url('templates/assets/js/')?>Indonesian.json"},
                    "pagingType": "full_numbers",
                    "scrollX": true,
                    "processing": true, 
                    "serverSide": true, 
                    'searching': true,
                                
                    "order": [], 

                    "ajax": {
                        "url": "<?= site_url('unit_usaha/ajax_list')?>",
                        "type": "POST"
                    },

                    "columnDefs": [
                    { 
                        "targets": [ -1 ], 
                        "orderable": false, 
                    },
                    ],

                });

            });

            function reload_table() {
                table.ajax.reload(null,false); //reload datatable ajax 
            }

            function add() {
                save_method = 'add';
                $("#form")[0].reset(); // reset form on modals
                $('.form-group').removeClass('has-error'); // clear error class
                $('.help-block').empty(); // clear error string
                $('#modal_form').modal({backdrop: 'static', keyboard: false}); // show bootstrap modal
                $('.modal-title').text('<?= $create.' '.$m ?>'); // Set Title to Bootstrap modal title
            }



            function save() {
                $('#btnSave').text('saving...'); //change button text
                $('#btnSave').attr('disabled',true); //set button disable 
                if(save_method == 'add') {
                    url = "<?php echo site_url('unit_usaha/insert')?>";
                } else {
                    url = "<?php echo site_url('unit_usaha/update')?>";
                }
               
                // ajax adding data to database
                $.ajax({
                    url : url,
                    type: "POST",
                    enctype: "multipart/form-data",
                    data: $('#form').serialize(),
                    dataType: "JSON",
                    success: function(data)
                    {

                        if(data.status) //if success close modal and reload ajax table
                        {

                            $('#modal_form').modal('hide');
                            reload_table();
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

                            $('#btnSave').html('<i class="fe-save"> </i> Save'); //change button text
                            $('#btnSave').attr('disabled',false); //set button enable 
                        }
                        else
                        {
                            for (var i = 0; i < data.inputerror.length; i++) 
                            {
                                $('[name="'+data.inputerror[i]+'"]').addClass('is-invalid');
                                $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]).addClass('invalid-feedback');
                            }
                        }  
                        $('#btnSave').html('<i class="fe-save"> </i> Save'); //change button text
                        $('#btnSave').attr('disabled',false); //set button enable 


                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        Swal.fire({
                            icon : "error",
                            title:"Oops...",
                            text:"Session anda sudah berakhir!",
                            footer:'Ingin keluar ? <a href="<?= base_url('auth/logout') ?>"> Klik disini </a> '
                        });

                        // alert('Error adding / update data');
                        $('#btnSave').html('<i class="fe-save"> </i> Save'); //change button text
                        $('#btnSave').attr('disabled',false); //set button enable 

                    }
                });
            }

        function edit_data(id) {
            save_method = 'update';

                    $('#form')[0].reset(); // reset form on modals
                    $('.form-group').removeClass('has-error'); // clear error class
                    $('.help-block').empty(); // clear error string
                    $('#modal_form').modal({backdrop: 'static', keyboard: false}); // show bootstrap modal
                    $('.modal-title').text('<?= $edit.' '.$m ?>'); // Set Title to Bootstrap modal title


                //Ajax Load data from ajax
                $.ajax({
                    url : "<?php echo site_url('unit_usaha/get_by_id')?>/" + id ,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data)
                    {

                        $('[name="id_unit_usaha"]').val(data.id_unit_usaha);
                        $('[name="nama_unit_usaha"]').val(data.nama_unit_usaha);
                        $('[name="alamat"]').val(data.alamat);
                        $('[name="kel"]').val(data.kel);
                        $('[name="kec"]').val(data.kec);
                        $('[name="kab_kota"]').val(data.kab_kota);
                        $('[name="prov"]').val(data.prov);
                        $('[name="no_telp"]').val(data.no_telp);
                        $('[name="email"]').val(data.email);
                        $('[name="website"]').val(data.website);
                        $('[name="logo"]').val(data.logo);
                        $('[name="favicon"]').val(data.favicon);


                        $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                        $('.modal-title').text('<?= $edit.' '.$m ?>'); // Set title to Bootstrap modal title

                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error get data from ajax');
                    }
                });
            }


       //delete
        function delete_data(id){

                Swal.fire({
                  title: 'Apa kamu yakin?',
                  text: "Anda tidak akan dapat mengembalikan ini!",
                  icon: 'question',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Ya, hapus!',
                  cancelButtonText: 'Batal'
                }).then((result) => {

                    if (result.value) {

                        $.ajax ({
                            url:"<?php echo site_url('unit_usaha/delete');?>",
                            type:"POST",
                            data:"id_unit_usaha="+id,
                            cache:false,
                            dataType: 'json',
                            success:function(respone) {
                                if (respone.status === true) {
                                    reload_table();
                                        $.toast({
                                                    text: "Data berhasil dihapus", 
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
                                            } else {
                                                  $.toast({
                                                      text: "Data gagal dihapus", 
                                                      heading: 'Error', 
                                                      icon: 'error',
                                                    });
                                            }
                            }
                        });
                   } else if (result.dismiss === swal.DismissReason.cancel) {
                      reload_table();
                      $.toast({
                                    text: "Data batal dihapus", 
                                    heading: 'Note', 
                                    icon: 'info',
                                    showHideTransition: 'fade', 
                                    allowToastClose: false, 
                                    hideAfter: 3000, 
                                    stack: 5, 
                                    position: 'bottom-left', 
                                });
                    }
                })

        }

        </script>


           

    </body>
</html>

