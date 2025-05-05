                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo ucwords($m) ?></a></li>
                                            <li class="breadcrumb-item active"><?php echo ucwords($ml) ?></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">  
                            <div class="col-lg-4">
                                <div class="card card-border">
                                    <div class="card-header border-primary pb-0">
                                        <!-- <h4 class="card-title text-white mb-0"><?php echo ucwords($m) ?></h4> -->
                                    </div>
                                    <!-- <div class="card-body row"> -->
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="text-center member-box">
                                                        <div class="dropdown float-right">
                                                            <a class="dropdown-toggle card-drop" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="mdi mdi-dots-horizontal"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-right">
                                                                <li><a href="#" onclick='$("#filefoto").trigger("click")' class="dropdown-item">Upload Foto</a></li>
                                                                <form id="formProfile">
                                                                    <input type="hidden" name="idpwg" value='<?= encrypt_url($this->session->userdata('id_pegawai')); ?>'>
                                                                    <input class="form-control-file invisible" type="file" name="filefoto" id="filefoto">
                                                                </form>
                                                            </ul>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <div class="member-card">
                                                            <?php if ($this->App->aplikasi()['image_user']): ?>

                                                                <div class="member-avatar avatar-xl mx-auto d-block" style="width: 200px;height: 200px;border-radius: 50%;overflow: hidden;">
                                                                    <img src="<?= base_url('image/') ?>profileuser/<?php echo $this->App->aplikasi()['image_user']; ?>" class="rounded-circle img-thumbnail" alt="profile-image" style="width: 100%;height: 100%;object-fit: cover;">
                                                                    <i class="mdi mdi-star-circle member-star text-muted" title="Unverified user"></i>
                                                                </div>
                                                                <?php else: ?>
                                                                 <div class="member-avatar avatar-xl mx-auto d-block">
                                                                    <img src="<?= base_url('image/') ?>profileuser/default/avatar-2.png" class="rounded-circle img-thumbnail" alt="profile-image">
                                                                    <i class="mdi mdi-star-circle member-star text-muted" title="unverified user"></i>
                                                                </div>   
                                                            <?php endif ?>
                                                            <div class="">
                                                                <h4 class="mb-1"> <?= ucwords($this->App->aplikasi()['nama_user']) ?> </h4>
                                                                <p class="text-muted mb-3"><?=$this->App->aplikasi()['email_user'] ?> <span> <br> </span> <span> <a href="#" class="text-pink"><?= $this->App->aplikasi()['role'] ?></a> </span></p>
                                                            </div>

                                                            <form action="<?php //echo $create_action ?>" method="POST" id="cek_pasienbaru">
                                                            </form>       
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="card-footer">

                                                    <div class="button-list">

                                                        <?php  if($this->App->aplikasi()['role_id'] != 4):?>

                                                            <a href="<?php echo site_url('pegawai/detail/') . encrypt_url($this->session->userdata('id_pegawai')); ?>" class="btn btn-block btn-danger waves-effect waves-light">Update Data</a>

                                                        <?php endif ?>  

                                                        <div id="keluarga_pegawai"></div>

                                                    </div>

                                                    <!-- <div class="button-list" style="margin-top: 20px;">
                                                        <a onclick="buka_modal_form_keluarga_pegawai()" class="btn btn-block btn-danger waves-effect waves-light" style="color: white;">Update Data Keluarga</a>
                                                    </div> -->

                                                    <div id="keluarga_pegawai"></div>

                                                </div>
                                            </div>
                                        </div> <!-- end col -->       
                                        <!-- </div>-->
                                    </div>
                                    <!-- end row -->
                                </div>
                                
                                <div class="col-lg-8">
                                    <div class="col-lg-12">
                                        <div class="card card-border">
                                            <div class="card-header border-primary pb-0">
                                                <!-- <h4 class="card-title text-black mb-0"><?php echo ucwords($m) ?></h4> -->
                                            </div>
                                            <!-- <div class="card-body row"> -->
                                                <div class="col-lg-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <!-- <div class="dropdown float-right">
                                                                        <a class="dropdown-toggle card-drop" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <i class="mdi mdi-dots-horizontal"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                                            <li><a href="#" class="dropdown-item">Edit</a></li>
                                                                        </ul>
                                                                    </div> -->
                                                                    <div class="table-responsive">
                                                                        <table class="table table-centered table-borderless mt-1">
                                                                            <thead>
                                                                                <tr>
                                                                                    <td width="30%">Nama Lengkap</td>
                                                                                    <td width="2%">:</td>
                                                                                    <td width="68%"><?= ucwords($this->App->aplikasi()['nama']) ?></td>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="30%">E-mail</td>
                                                                                    <td width="2%">:</td>
                                                                                    <td width="68%"><?= ucwords($this->App->aplikasi()['email_user']) ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="30%">Role</td>
                                                                                    <td width="2%">:</td>
                                                                                    <td width="68%"><?= ucwords($this->App->aplikasi()['role']) ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="30%">Date Created</td>
                                                                                    <td width="2%">:</td>

                                                                                    <td width="68%"><?= $this->App->aplikasi()['date_created_user'];?> </td> 

                                                                               <!--  <td width="68%">
                                                                                    <?php 
                                                                                    $timestamp = $this->App->aplikasi()['date_created'];
                                                                                    $myfomat = date('d - M - Y H:i:s', $timestamp);
                                                                                    echo $myfomat; ?> 
                                                                                </td> -->
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->       
                                            <!-- </div>                                        -->
                                        </div>
                                        <!-- end row -->
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="card card-border">
                                            <div class="card-header border-primary pb-0">
                                                <!-- <h4 class="card-title text-black mb-0"><?php echo ucwords($m) ?></h4> -->
                                            </div>
                                            <div id="keluarga_pegawai_tampil"></div>
                                        </div>
                                    </div>

                                </div>

                            </div>             

                        </div> <!-- end container-fluid -->

                    </div> <!-- end content -->



                <!-- <?php 
                    // echo '<pre>';
                    // echo print_r($dokter);
                    // echo '</pre>';
                ?>
            -->


            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
        </div>

        <!-- MODAL FORM KELUARGA -->

        <div class="modal fade bs-example-modal-xl" id="modal_form_keluarga_pegawai" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header badge-primary">
                        <h4 class="modal-title mt-0"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body form">
                        <form action="#" id="form_keluarga_pegawai" class="form-horizontal">
                            <div class="form-body">
                                <div class="row">
                                    <input type="hidden" name="id_pegawai" parsley-trigger="change" required
                                    placeholder="Masukkan ID Pegawai" class="form-control" id="id_pegawai" readonly>
                                    <!-- <div class="col-md-4 id_pegawai">
                                        <div class="form-group">
                                            <label for="Name">ID Pegawai<span class="text-danger">*</span></label>
                                            <input type="text" name="id_pegawai" parsley-trigger="change" required
                                            placeholder="Masukkan ID Pegawai" class="form-control" id="id_pegawai" readonly>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div> -->
                                    <div class="col-md-6 nik">
                                        <div class="form-group">
                                         <label for="Name">NIK<span class="text-danger">*</span></label>
                                         <input type="text" name="nik" parsley-trigger="change" required
                                         placeholder="Masukkan NIK" class="form-control number-only" id="nik" readonly>
                                         <span class="help-block text-danger"></span> 
                                         <span id="errmsg" class="text-danger">  </span>
                                     </div>
                                 </div>

                                 <div class="col-md-6 nama">
                                    <div class="form-group">
                                        <label for="Name">Nama Pegawai<span class="text-danger">*</span></label>
                                        <input type="text" name="nama" parsley-trigger="change" required
                                        placeholder="Masukkan Nama Pegawai" class="form-control" id="nama" readonly>
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>

                                <div class="col-md-6 nama_ibu">
                                    <div class="form-group">
                                        <label for="Name">Nama Ibu<span class="text-danger">*</span></label>
                                        <input type="text" name="nama_ibu" parsley-trigger="change" required
                                        placeholder="Masukkan Nama Ibu" class="form-control" id="nama_ibu">
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>

                                <div class="col-md-6 nama_ayah">
                                    <div class="form-group">
                                        <label for="Name">Nama Ayah<span class="text-danger">*</span></label>
                                        <input type="text" name="nama_ayah" parsley-trigger="change" required
                                        placeholder="Masukkan Nama Ayah" class="form-control" id="nama_ayah">
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>

                                <div class="col-md-6 pekerjaan_ibu">
                                    <div class="form-group">
                                        <label for="Name">Pekerjaan Ibu<span class="text-danger">*</span></label>
                                        <input type="text" name="pekerjaan_ibu" parsley-trigger="change" required
                                        placeholder="Masukkan Pekerjaan Ibu" class="form-control" id="pekerjaan_ibu">
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>

                                <div class="col-md-6 pekerjaan_ayah">
                                    <div class="form-group">
                                        <label for="Name">Pekerjaan Ayah<span class="text-danger">*</span></label>
                                        <input type="text" name="pekerjaan_ayah" parsley-trigger="change" required
                                        placeholder="Masukkan Pekerjaan Ayah" class="form-control" id="pekerjaan_ayah">
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnSaveKeluarga" onclick="simpan_data_keluarga_pegawai()" class="btn btn-primary"><i class="fe-save"> </i> Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('templates/includes/footer') ?>


    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 16000);


        //defaultImages agar saat batal ganti foto, preview images akan kembali seperti semula
        var defaultImages = '<?php if ($this->App->aplikasi()['image_user']){ echo $this->App->aplikasi()['image_user'];}else{echo "default/avatar-2.png";} ?>';

        $('#filefoto').change( function(event) {
            var formData = new FormData($('#formProfile')[0]);
            //untuk mentrigger saat input file memiliki file foto, maka akan mempreview photo tersebut
            var tmppath = URL.createObjectURL(event.target.files[0]);
            $(".img-thumbnail").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
            setTimeout(() => {
                Swal.fire({
                  title: 'Simpan Perubahan ?',
                  icon: 'question',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Ya',
                  cancelButtonText: 'Batal'
              }).then((result) => {
                if(result.value){
                    $.ajax({
                        url: "<?= site_url('profile/changePhoto') ?>",
                        data: formData,
                        method:"POST",
                        dataType: "json",
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            if(data.status === "sukses"){
                                $.toast({
                                    text: "Berhasil ganti foto", 
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
                            }else{
                                $.toast({
                                    text: data.msg, 
                                    heading: 'Error', 
                                    icon: 'error',
                                });
                            }
                        }
                    });
                }else{
                    $(".img-thumbnail").fadeIn("fast").attr('src',"<?= base_url('image/') ?>profileuser/"+defaultImages);
                }
            })
          }, 1500);
        });

    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $.ajax({
                url : "<?php echo site_url('profile/get_pegawai_keluarga_by_id/'.encrypt_url($this->session->userdata('id_pegawai')))?>/",
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    var event_data = '';

                    event_data += '<div class="col-lg-12">';
                    event_data += '<div class="card">';
                    event_data += '<div class="card-body">';
                    // event_data += '<div class="clearfix"></div>';
                    event_data += '<div class="row">';
                    event_data += '<div class="col-md-12">';

                    // event_data += '<div class="dropdown float-right"><a class="dropdown-toggle card-drop" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a><ul class="dropdown-menu dropdown-menu-right"><li><a href="#" class="dropdown-item">Edit</a></li></ul></div>';

                    event_data += '<table class="table table-responsive table-centered table-borderless mt-2" style="font-weight: normal">';

                    event_data += '<tbody>';
                    event_data += '<tr>';

                    if (data.nama_ibu===null){
                        data.nama_ibu = "(Belum Diisi)";
                    }
                    if (data.nama_ayah===null){
                        data.nama_ayah = "(Belum Diisi)";
                    }
                    if (data.pekerjaan_ibu===null){
                        data.pekerjaan_ibu = "(Belum Diisi)";
                    }
                    if (data.pekerjaan_ayah===null){
                        data.pekerjaan_ayah = "(Belum Diisi)";
                    }
                    if (data.status_kwn===null){
                        data.status_kwn = "(Belum Diisi)";
                    }
                    if (data.no_kk==0){
                        data.no_kk = "(Belum Diisi)";
                    }

                    event_data += '<td width="20%">'+'Nama Ibu'+'</td>';  
                    event_data += '<td width="1%">'+':'+'</td>';  
                    event_data += '<td width="36%">'+data.nama_ibu+'</td>';

                    event_data += '<td width="20%">'+'Pekerjaan Ibu'+'</td>';  
                    event_data += '<td width="1%">'+':'+'</td>';  
                    event_data += '<td width="36%">'+data.pekerjaan_ibu+'</td>';

                    event_data += '</tr>'

                    event_data += '<tr>';

                    event_data += '<td width="20%">'+'Nama Ayah'+'</td>';  
                    event_data += '<td width="1%">'+':'+'</td>';  
                    event_data += '<td width="36%">'+data.nama_ayah+'</td>';

                    event_data += '<td width="20%">'+'Pekerjaan Ayah'+'</td>';  
                    event_data += '<td width="1%">'+':'+'</td>';  
                    event_data += '<td width="36%">'+data.pekerjaan_ayah+'</td>';

                    event_data += '</tr>';

                    event_data += '<tr>';

                    event_data += '<td width="20%">'+'Status Kawin'+'</td>';  
                    event_data += '<td width="1%">'+':'+'</td>';  
                    event_data += '<td width="36%">'+data.status_kwn+'</td>';

                    event_data += '<td width="20%">'+'No. Kartu Keluarga'+'</td>'; 
                    event_data += '<td width="1%">'+':'+'</td>';  
                    event_data += '<td width="36%">'+data.no_kk+'</td>';

                    event_data += '</tr>';

                    event_data += '</tbody>';
                    event_data += '</div>';
                    event_data += '</div>';
                    event_data += '</div>';
                    event_data += '</div>';
                    event_data += '</div>';

                    $("#keluarga_pegawai_tampil tbody").empty().append();
                    $("#keluarga_pegawai_tampil").append(event_data);
                }
            });                 
                    });
                </script>

                <script type="text/javascript">
                    function buka_modal_form_keluarga_pegawai() {
                        $('#modal_form_keluarga_pegawai').modal('show');
                    }

        // Button Keluarga Pegawai
        $.ajax({
            url : "<?php echo site_url('profile/get_cek_keluarga_by_id/'.encrypt_url($this->session->userdata('id_pegawai')))?>/",
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                if (data.cek_keluarga_by_id === true) {
                    $('#keluarga_pegawai').html('<a href="javascript:void(0)" title="Data Keluarga Pegawai" id="update_keluarga_pegawai" class="btn btn-block btn-success waves-effect waves-light" onclick="update_keluarga_pegawai('+"'"+data.id_pegawai+"'"+')"><i class="fas fa-edit"></i> Data Keluarga Pegawai</a>'); 

                } else if (data.cek_keluarga_by_id === false){
                    $('#keluarga_pegawai').html('<a href="javascript:void(0)" title="Data Keluarga Pegawai" id="add_keluarga_pegawai" class="btn btn-block btn-danger waves-effect waves-light" onclick="add_keluarga_pegawai('+"'"+data.id_pegawai+"'"+')"><i class="fe-plus-square"></i> Data Keluarga Pegawai</a>'); 
                }  

            }
        });  

        function add_keluarga_pegawai(id_pegawai){
            save_method = 'add_keluarga_pegawai';
            $('#form_keluarga_pegawai')[0].reset(); 
            $('.form-group').removeClass('has-error');
            $('.help-block').empty();
            $('[name="id_pegawai"]').prop('readonly', true);
            $('.id_pegawai').hide();
            $('[name="nik"]').prop('readonly', true);
            $('.nik').removeClass('col-md-4').addClass('col-md-6');
            $('.nama').removeClass('col-md-4').addClass('col-md-6');
            $('[name="nik_lama"]').prop('readonly', true);
            $('.nik_lama').hide();
            $('[name="nama"]').prop('readonly', true);

            $.ajax({
                url : "<?php echo site_url('profile/get_by_id')?>/" + id_pegawai,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    $('[name="id_pegawai"]').val(id_pegawai);
                    $('[name="nik"]').val(data.nik);
                    $('[name="nik_lama"]').val(data.nik_lama);
                    $('[name="nama"]').val(data.nama);

                    // if (data.status_kwn==='Tidak Kawin') {

                    // $('.pasangan').hide();
                    // $('.anak_pertama').hide();
                    // $('.anak_kedua').hide();
                    // $('.anak_ketiga').hide();

                    // }



                    $('#modal_form_keluarga_pegawai').modal('show'); 
                    $('.modal-title').text('Tambah Data Keluarga Pegawai'); 

                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }

        function update_keluarga_pegawai(id_pegawai){
            save_method = 'update_keluarga_pegawai';
            $('#form_keluarga_pegawai')[0].reset(); 

            $('.form-group').removeClass('has-error'); 
            $('.help-block').empty(); 

            $('.id_pegawai').hide();
            $('[name="id_pegawai"]').prop('readonly', true);            
            $('[name="nik"]').prop('readonly', true);
            $('.nik').removeClass('col-md-4').addClass('col-md-6');
            $('.nama').removeClass('col-md-4').addClass('col-md-6');
            $('[name="nik_lama"]').prop('readonly', true);
            $('.nik_lama').hide();
            $('[name="nama"]').prop('readonly', true);

            //Ajax Load data from ajax
            $.ajax({
                url : "<?php echo site_url('profile/get_pegawai_keluarga_by_id')?>/" + id_pegawai,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    $('[name="id_pegawai"]').val(id_pegawai);
                    $('[name="nik"]').val(data.nik);
                    $('[name="nik_lama"]').val(data.nik_lama);
                    $('[name="nama"]').val(data.nama);

                    $('[name="nama_ibu"]').val(data.nama_ibu);
                    $('[name="pekerjaan_ibu"]').val(data.pekerjaan_ibu);
                    $('[name="nama_ayah"]').val(data.nama_ayah);
                    $('[name="pekerjaan_ayah"]').val(data.pekerjaan_ayah);

                    // if (data.status_kwn==='Tidak Kawin') {

                    //     $('.pasangan').hide();
                    //     $('.anak_pertama').hide();
                    //     $('.anak_kedua').hide();
                    //     $('.anak_ketiga').hide();


                    // } else {

                    //     $('[name="pasangan"]').val(data.pasangan);
                    //     $('[name="anak_pertama"]').val(data.anak_pertama);
                    //     $('[name="anak_kedua"]').val(data.anak_kedua);
                    //     $('[name="anak_ketiga"]').val(data.anak_ketiga);
                    // }

                    $('#modal_form_keluarga_pegawai').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Ubah Data Keluarga Pegawai'); // Set title to Bootstrap modal title

                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }

        function simpan_data_keluarga_pegawai(){
            $('#btnSave').text('sedang meyimpan...');
            $('#btnSave').attr('disabled',true); //set button disable 
            var url;  

            if(save_method == 'add_keluarga_pegawai') {
                url = "<?php echo site_url('profile/insert_data_pegawai_keluarga')?>";
            } else {
                url = "<?php echo site_url('profile/update_data_pegawai_keluarga')?>";
            }       
            
            var formData = new FormData($('#form_keluarga_pegawai')[0]);
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
                        $('#modal_form_keluarga_pegawai').modal('hide');
                        // reload();
                        // reload_keluarga();
                        location.reload();
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

                            $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); 


                            $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); 


                        }
                        // console.log(data.inputerror);
                    }
                    $('#btnSave').html('<i class="fe-save"> </i> Save');
                    $('#btnSave').attr('disabled',false);


                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('error');
                    $('#btnSave').html('<i class="fe-save"> </i> Save');
                    $('#btnSave').attr('disabled',false);
                }
            });
        }

        function reload_keluarga(){
            $.ajax({
                url : "<?php echo site_url('profile/get_pegawai_keluarga_by_id/'.encrypt_url($this->session->userdata('id_pegawai')))?>/",
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    var event_data = '';

                    event_data += '<div class="col-lg-12">';
                    event_data += '<div class="card">';
                    event_data += '<div class="card-body">';
                    // event_data += '<div class="clearfix"></div>';
                    event_data += '<div class="row">';
                    event_data += '<div class="col-md-12">';

                    event_data += '<div class="dropdown float-right"><a class="dropdown-toggle card-drop" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a><ul class="dropdown-menu dropdown-menu-right"><li><a href="#" class="dropdown-item">Edit</a></li></ul></div>';

                    event_data += '<table class="table table-responsive table-centered table-borderless mt-2" style="font-weight: normal">';

                    event_data += '<tbody>';
                    event_data += '<tr>';

                    if (data.nama_ibu===null){
                        data.nama_ibu = "";
                    }
                    if (data.nama_ayah===null){
                        data.nama_ayah = "";
                    }
                    if (data.pekerjaan_ibu===null){
                        data.pekerjaan_ibu = "";
                    }
                    if (data.pekerjaan_ayah===null){
                        data.pekerjaan_ayah = "";
                    }

                    event_data += '<td width="20%">'+'Nama Ibu'+'</td>';  
                    event_data += '<td width="1%">'+':'+'</td>';  
                    event_data += '<td width="36%">'+data.nama_ibu+'</td>';

                    event_data += '<td width="20%">'+'Pekerjaan Ibu'+'</td>';  
                    event_data += '<td width="1%">'+':'+'</td>';  
                    event_data += '<td width="36%">'+data.pekerjaan_ibu+'</td>';

                    event_data += '</tr>'

                    event_data += '<tr>';

                    event_data += '<td width="20%">'+'Nama Ayah'+'</td>';  
                    event_data += '<td width="1%">'+':'+'</td>';  
                    event_data += '<td width="36%">'+data.nama_ayah+'</td>';

                    event_data += '<td width="20%">'+'Pekerjaan Ayah'+'</td>';  
                    event_data += '<td width="1%">'+':'+'</td>';  
                    event_data += '<td width="36%">'+data.pekerjaan_ayah+'</td>';

                    event_data += '</tr>';

                    event_data += '<tr>';

                    event_data += '<td width="20%">'+'Status Kawin'+'</td>';  
                    event_data += '<td width="1%">'+':'+'</td>';  
                    event_data += '<td width="36%">'+data.status_kwn+'</td>';

                    event_data += '<td width="20%">'+'No. Kartu Keluarga'+'</td>'; 
                    event_data += '<td width="1%">'+':'+'</td>';  
                    event_data += '<td width="36%">'+data.no_kk+'</td>';

                    event_data += '</tr>';

                    event_data += '</tbody>';
                    event_data += '</div>';
                    event_data += '</div>';
                    event_data += '</div>';
                    event_data += '</div>';
                    event_data += '</div>';

                    $("#keluarga_pegawai_tampil tbody").empty().append();
                    $("#keluarga_pegawai_tampil").append(event_data);
                }
            });
        }

    </script>


</body>
</html>

