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
                                    <h4 class="page-title">
                                        <button type="button" class="btn btn-sm btn-primary waves-effect waves-light" onclick="add()"><i class="fe-plus-square"></i> Create </button>
                                        <button type="button" data-toggle="collapse" data-target="#list_filter"  class="btn btn-sm btn-primary waves-effect waves-light" id="filter"><i class="fas fa-filter"></i> Filter </button>
                                    </h4>
                                    

                                </div>
                            </div>
                        </div>

                        <!-- tampilan filter -->
                        <div class="collapse" id="list_filter">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card card-border">
                                        <div class="card-header border-primary pb-0"></div>
                                        <div class="card-body">

                                            <div class="row">
                                                <?php if ($this->session->userdata('role_id') == 3): ?>
                                                    <div class="col-md-6">
                                                       <div class="form-group mb-0">
                                                        <label>Unit Kerja</label>
                                                        <div>
                                                            <select id="filter_unit_kerja_sub" name="filter_unit_kerja_sub" class="form-control select2" required>
                                                                <option value="">Pilih</option>

                                                                <?php foreach ($unit_kerja_sub as $uks) : ?>
                                                                    <option value="<?= $uks['id_unit_kerja_sub']; ?>"><?= $uks['nm_unit_kerja_sub']; ?></option>
                                                                <?php endforeach ?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>   
                                                <?php else: ?>
                                                    <div class="col-md-6">
                                                       <div class="form-group mb-0">
                                                        <label>Unit Usaha</label>
                                                        <div>
                                                            <select id="filter_unit" name="filter_unit" class="form-control select2" required>
                                                                <option value="">Pilih</option>

                                                                <?php foreach ($unit as $u) : ?>
                                                                    <option value="<?= $u['id_unit_usaha']; ?>"><?= $u['nm_unit_usaha']; ?></option>
                                                                <?php endforeach ?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif ?>
                                            <div class="col-md-2">
                                                <label>Role</label>
                                                <select id="filter_role" name="filter_role" class="form-control select2" required>
                                                    <option value="">Pilih</option>

                                                    <?php foreach ($role as $r) : ?>
                                                        <option value="<?= $r['id']; ?>"><?= $r['role']; ?></option>
                                                    <?php endforeach ?>

                                                </select>
                                            </div>
                                            <div class="col-md-2" style="padding-top:30px" id="button_filter">
                                               <button type="button" id="btn-filter" class="btn btn-block btn-primary waves-effect waves-light"><i class="fas fa-filter"></i> Filter </button>
                                           </div>
                                           <div class="col-md-2" style="padding-top:30px" id="button_reset">
                                               <button type="button" id="reset" class="btn btn-block btn-danger"><i class="fas fa-undo"></i> Reset </button>
                                           </div>
                                       </div>
                                   </div>
                               </div>
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
                                            <th class="text-center" width="8%">Action</th>
                                            <th>E-Mail</th>
                                            <th>NIK Pegawai</th>
                                            <th>Nama</th>
                                            <th>Role</th>
                                            <th>Aktif</th>
                                            <th>Penempatan</th>
                                            <th>Created</th>
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
                <div class="modal fade bs-example-modal-xl" id="modal_form" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header badge-primary">
                                <h4 class="modal-title mt-0"></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body form">
                                <form action="#" id="form" class="form-horizontal">
                                    <div class="form-body">
                                        <div class="row">
                                            <input type="text" name="user_id" id="user_id" readonly>

                                            <div class="col-md-12" id="cari_pegawai">
                                                <div class="form-group">
                                                    <label for="userName">Cari Pegawai<span class="text-danger">*</span></label>
                                                    <select name="cari_pegawai"  class="form-control select2 cari_pegawai" required>
                                                        <!-- <option disabled="disabled"  value="" selected>Pilih</option> -->
                                                        <option disabled="disabled"  value="" selected>Pilih</option>
                                                    </select>
                                                    <span class="help-block text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 id_pegawai">
                                                <div class="form-group">
                                                    <label for="userName">ID Pegawai<span class="text-danger">*</span></label>
                                                    <input type="text" name="id_pegawai" parsley-trigger="change" required
                                                    placeholder="Enter Pegawai" class="form-control" id="id_pegawai" readonly>
                                                    <span class="help-block text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 nik">
                                                <div class="form-group">
                                                 <label for="userName">NIK Pegawai<span class="text-danger">*</span></label>
                                                 <input type="text" name="nik" parsley-trigger="change" required
                                                 placeholder="Enter NIK" class="form-control" id="nik" readonly>
                                                 <span class="help-block text-danger"></span>
                                             </div>
                                         </div>
                                         <div class="col-md-6 nama">
                                            <div class="form-group">
                                                <label for="userName">Nama Pegawai<span class="text-danger">*</span></label>
                                                <input type="text" name="nama" parsley-trigger="change" required
                                                placeholder="Enter Name" class="form-control" id="nama" readonly>
                                                <span class="help-block text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userName">E-Mail<span class="text-danger">* </span></label>
                                                <input type="text" name="email" parsley-trigger="change" required
                                                placeholder="Enter E-Mail" class="form-control" id="email">
                                                <!-- <span class="text-primary">*<i>Username login</i></span> -->
                                                <span class="help-block text-danger"></span>
                                                <span class="help-block text-danger"></span>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userName">Password<span class="text-danger">*</span></label>
                                                <input type="password" name="password" parsley-trigger="change" required
                                                placeholder="Enter password" value="123456" class="form-control" id="password" readonly>
                                                <!-- <span class="text-primary">* Default Password : <i>123456</i></span> -->
                                                <span class="help-block text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userName">Picture</label>
                                                            <!-- <input type="text" name="image" parsley-trigger="change" required
                                                                placeholder="Enter Image" class="form-control" id="image"> -->
                                                              <!--   <input type="file" class="form-control"  name="filefoto" id="filefoto">
                                                                <span class="help-block text-danger"></span> -->

                                                                <input name="image" type="file" class="form-control filestyle">
                                                                <span class="help-block text-danger"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group" id="image-preview">
                                                                <label for="userName">Picture</label>
                                                                <div class="col">
                                                                    <span class="text-danger"><i>No Picture</i></span>
                                                                </div>
                                                                <span class="help-block text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="role_id" class="control-label">Role</label>

                                                                <select id="role_id" name="role_id" class="form-control select2" required>
                                                                    <option value="">Pilih</option>

                                                                    <?php foreach ($role as $r) : ?>
                                                                        <option value="<?= $r['id']; ?>"><?= $r['role']; ?></option>
                                                                    <?php endforeach ?>

                                                                </select>

                                                                <span class="help-block text-danger"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="is_active" class="control-label">Aktifkan</label>

                                                                <select name="is_active" class="form-control select2" required>
                                                                    <option value="">Pilih</option>
                                                                    <option value="1">Ya</option>
                                                                    <option value="0">Tidak</option>
                                                                </select>

                                                                <span class="help-block text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            <!-- End Bootstrap modal -->   

                        </div> <!-- end container-fluid -->

                    </div> <!-- end content -->     

                    <!-- ============================================================== -->
                    <!-- End Page content -->
                    <!-- ============================================================== -->
                </div>

                <?php $this->load->view('templates/includes/footer') ?>

                <script type="text/javascript">

        var save_method; //for save method string
        var table;
        var base_url = '<?= base_url();?>';

        $(document).ready(function() {

            //datatables
            table = $('#table').DataTable({ 

                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.

                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?= site_url('user/ajax_list')?>",
                    "type": "POST",
                    "data": function ( data ) {
                        data.filter_unit_kerja_sub = $('#filter_unit_kerja_sub').val();
                        data.filter_unit = $('#filter_unit').val();
                        data.filter_role = $('#filter_role').val();
                    }
                },

                //Set column definition initialisation properties.
                "columnDefs": [
                { 
                        "targets": [ -1 ], //last column
                        "orderable": false, //set not orderable
                    },
                    { 
                        "targets": [ -2 ], //2 last column (image)
                        "orderable": false, //set not orderable
                    },
                    ],

                });

            $('#btn-filter').click(function() { 
                table.ajax.reload(); 

                var x = document.getElementById("button_reset");
                if ($('#filter_unit').val() !=='') {
                    x.style.visibility = 'visible'; //show
                } else if ($('#filter_role').val() !=='') {
                    x.style.visibility = 'visible';        //show
                } else if ($('#filter_unit').val() ==='') {
                    x.style.visibility = 'hidden';         //hide
                } else if ($('#filter_role').val() ==='') {
                    x.style.visibility = 'hidden';         //hide
                } 
            });

            $('#reset').click(function() { 
                $('#filter_unit').val('').trigger('change');
                $('#filter_role').val('').trigger('change');
                table.ajax.reload();  
            });

            $('#reload').click(function() { 
                table.ajax.reload(); 
            });

            $('#filter').click(function() { 
                var x = document.getElementById("button_reset");
                x.style.visibility = 'hidden';         //hide
            });

            //datepicker
            $('.datepicker').datepicker({
                autoclose: true,
                format: "yyyy-mm-dd",
                todayHighlight: true,
                orientation: "top auto",
                todayBtn: true,
                todayHighlight: true,  
            });

            //set input/textarea/select event when change value, remove class error and remove text help block 
            // $("input").change(function() {
            //     $(this).parent().removeClass('has-error');
            //     $(this).next().empty();
            // });
            // $(".datepicker").change(function() {
            //     $(this).parent().removeClass('has-error');
            //     $(this).parent().next().empty();
            // });
            // $("textarea").change(function() {
            //     $(this).parent().removeClass('has-error');
            //     $(this).next().empty();
            // });
            // $("select").change(function() {
            //     $(this).parent().removeClass('has-error');
            // });

        });



        function add()
        {
            save_method = 'add';
            $('#form')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string
            $('#modal_form').modal('show'); // show bootstrap modal
            $('.modal-title').text('<?= $create.' '.$m ?>'); // Set Title to Bootstrap modal title


            $('#image-preview').hide(); // hide image preview modal
            $('.id_pegawai').hide();
            $('.nik').hide();
            $('.nama').hide();
            $('#cari_pegawai').show();
            $('#user_id').hide();
            // $('select[name="role_id"]').val('').trigger('change');  
            // $('select[name="is_active"]').val('').trigger('change');  

            // $('#label-image').text('Upload image'); // label image upload
        }

        function update(user_id)
        {
            save_method = 'update';
            $('#form')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string
            $('.id_pegawai').hide();
            $('#user_id').hide();
            $('#cari_pegawai').hide();
            $('[name="password"]').prop('readonly', false);


            //Ajax Load data from ajax
            $.ajax({
                url : "<?php echo site_url('user/get_by_id')?>/" + user_id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {

                    $('[name="user_id"]').val(user_id);
                    $('select[name="cari_pegawai"]').val(data.cari_pegawai).trigger('change');
                    $('[name="id_pegawai"]').val(data.id_pegawai);
                    $('[name="nik"]').val(data.nik);
                    $('[name="nama"]').val(data.nama);
                    $('[name="email"]').val(data.email);
                    $('select[name="role_id"]').val(data.role_id).trigger('change');  
                    $('select[name="is_active"]').val(data.is_active).trigger('change');  


                    $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('<?= $edit.' '.$m ?>'); // Set title to Bootstrap modal title

                    $('#image-preview').show(); // show image preview modal

                    if(data.image)
                    {
                        $('#label-image').text('Change image'); // label image upload
                        $('#image-preview div').html('<img src="'+base_url+'image/profileuser/'+data.image+'" class="img-responsive">'); // show image
                        $('#image-preview div').append('<input type="checkbox" name="remove_image" value="'+data.image+'"/> Remove image when saving'); // remove image

                    }
                    else
                    {
                        $('#label-image').text('Upload image'); // label image upload
                        $('#image-preview div').text('(No image)');
                    }


                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }

        function reload_table()
        {
            table.ajax.reload(null,false); //reload datatable ajax 
        }

        function save()
        {
            $('#btnSave').text('saving...'); //change button text
            $('#btnSave').attr('disabled',true); //set button disable 
            var url;

            if(save_method == 'add') {
                url = "<?php echo site_url('user/insert')?>";
            } else {
                url = "<?php echo site_url('user/update')?>";
            }

            // ajax adding data to database

            var formData = new FormData($('#form')[0]);
            $.ajax({
                url : url,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
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
                    } 
                    else
                    {
                        for (var i = 0; i < data.inputerror.length; i++) 
                        {

                            $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                            $('[name="'+data.inputerror[i]+'"]').next().next().text(data.error_string[i]); //select span help-block class set text error string
                            
                        }
                        // console.log(data.inputerror);
                    }
                    $('#btnSave').html('<i class="fe-save"> </i> Save'); //change button text
                    $('#btnSave').attr('disabled',false); //set button enable 
                    

                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('error');
                    $('#btnSave').text('save'); //change button text
                    $('#btnSave').attr('disabled',false); //set button enable 

                }
            });
        }

        //delete
        function deletedata(id)
        {

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
                    url:"<?php echo site_url('user/delete');?>",
                    type:"POST",
                    data:"user_id="+id,
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

        //active
        function active(id)
        {

            Swal.fire({
              title: 'Apa kamu yakin?',
              text: "Aktifkan user ini!",
              icon: 'question',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya, Aktifkan!',
              cancelButtonText: 'Batal'
          }).then((result) => {

            if (result.value) {

                $.ajax ({
                    url:"<?php echo site_url('user/active');?>",
                    type:"POST",
                    data:"user_id="+id,
                    cache:false,
                    dataType: 'json',
                    success:function(respone) {
                        if (respone.status === true) {
                            reload_table();
                            $.toast({
                                text: "User berhasil diaktifkan", 
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
                              text: "User gagal di aktifkan", 
                              heading: 'Error', 
                              icon: 'error',
                          });
                      }
                  }
              });

            } else if (result.dismiss === swal.DismissReason.cancel) {
              reload_table();
              $.toast({
                text: "User batal di aktifkan", 
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

        //non active
        function non_active(id)
        {

            Swal.fire({
              title: 'Apa kamu yakin?',
              text: "Non Aktifkan user ini!",
              icon: 'question',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya, Non Aktifkan!',
              cancelButtonText: 'Batal'
          }).then((result) => {

            if (result.value) {

                $.ajax ({
                    url:"<?php echo site_url('user/non_active');?>",
                    type:"POST",
                    data:"user_id="+id,
                    cache:false,
                    dataType: 'json',
                    success:function(respone) {
                        if (respone.status === true) {
                            reload_table();
                            $.toast({
                                text: "User berhasil di nonaktifkan", 
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
                              text: "Data gagal di nonaktifkan", 
                              heading: 'Error', 
                              icon: 'error',
                          });
                      }
                  }
              });

            } else if (result.dismiss === swal.DismissReason.cancel) {
              reload_table();
              $.toast({
                text: "User batal di nonaktifkan", 
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

  <script type="text/javascript">
    $(document).ready(function(){
        $(".cari_pegawai").select2({
            width: '100%',
            dropdownAutoWidth: true,
            minimumInputLength: 3,
            ajax: { 
                url: "<?= base_url(); ?>user/get_pegawai_like",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                                        searchTermPegawai: params.term // search term
                                    };
                                },
                                processResults: function (response) {
                                    return {
                                        results: response
                                    };
                                },
                                cache: true
                            }
                        });


        $(document).ready(function(){
         $('.cari_pegawai').on('change',function(){

            var nik=$(this).val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('user/get_pegawai')?>",
                dataType : "JSON",
                data : {nik: nik},
                cache:false,
                success: function(data){
                    $.each(data,function(id_pegawai, nik, nama){
                        $('[name="id_pegawai"]').val(data.id_pegawai);
                        $('[name="nik"]').val(data.nik);
                        $('[name="nama"]').val(data.nama);
                        $('[name="email"]').val(data.email);
                        $('.nik').show();
                        $('.nama').show();

                    });

                }
            });
            return false;
        });

     });
    });
</script>


</body>
</html>

