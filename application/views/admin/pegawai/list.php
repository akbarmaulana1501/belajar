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

                                      <?php if ($this->App->aplikasi()['role_id']==1): ?>
                                        <th>Bar/Qr Code</th>
                                      <?php endif ?>

                                      <?php if ($this->App->aplikasi()['role_id'] == 1): ?>
                                        <th class="text-center" width="8%">Action</th>
                                        <?php elseif ($this->App->aplikasi()['role_id'] == 2): ?>
                                         <th class="text-center" width="8%">Action</th>
                                       <?php endif; ?>


                                       <!-- <th class="text-center" width="8%">Action</th> -->


                                       <th>Status Aktif</th>
                                       <th>Detail</th>
                                       <th>NIK</th>
                                       <th>NIK Lama</th>
                                       <th>Nama</th>
                                       <th>Gelar 1</th>
                                       <th>Gelar 2</th>
                                       <th>Jenis Kelamin</th>
                                       <th>Tempat Lahir</th>
                                       <th>Tanggal Lahir</th>
                                       <th>Golongan Darah</th>
                                       <th>Tinggi Badan</th>
                                       <th>Berat Badan</th>
                                       <th>Agama</th>
                                       <th>No KTP</th>
                                       <th>Alamat KTP</th>
                                       <th>Alamat Domisili</th>
                                       <th>Telepon 1</th>
                                       <th>Telepon 2</th>
                                       <th>Telepon Keluarga</th>
                                       <th>Email</th>
                                       <th>Masa Kerja</th>
                                       <th>Jatah Cuti</th>
                                     </tr>
                                   </thead>
                                   <tbody>
                                   </tbody>
                                 </table>
                               </div>
                             </div>
                           </div>
                         </div>         

                         <!-- load modal   -->
                         <?php $this->load->view('admin/pegawai/list_modal') ?>

                       </div> <!-- end container-fluid -->

                     </div> <!-- end content -->     

                     <!-- ============================================================== -->
                     <!-- End Page content -->
                     <!-- ============================================================== -->
                   </div>

                   <?php $this->load->view('templates/includes/footer') ?>

                   <script type="text/javascript">

                    $(function() {
                      $('[name="nik"]').keypress(function (e) {
                       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                        $("#err_nik").html('<div class="text-danger"><strong>Stop!</strong> Hanya bisa di input dengan angka</div>').show().fadeOut("slow");
                        return false;
                      } 
                    });

                      $('[name="nik_lama"]').keypress(function (e) {
                       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                        $("#err_nik_lama").html('<div class="text-danger"><strong>Stop!</strong> Hanya bisa di input dengan angka</div>').show().fadeOut("slow");
                        return false;
                      } 
                    });

                      $('[name="tgl_lahir"]').keypress(function (e) {
                       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                        $("#err_tgl_lahir").html('<div class="text-danger"><strong>Stop!</strong> Hanya bisa di input dengan angka</div>').show().fadeOut("slow");
                        return false;
                      } 
                    });

                      $('[name="tinggi"]').keypress(function (e) {
                       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                        $("#err_tinggi").html('<div class="text-danger"><strong>Stop!</strong> Hanya bisa di input dengan angka</div>').show().fadeOut("slow");
                        return false;
                      } 
                    });

                      $('[name="berat"]').keypress(function (e) {
                       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                        $("#err_berat").html('<div class="text-danger"><strong>Stop!</strong> Hanya bisa di input dengan angka</div>').show().fadeOut("slow");
                        return false;
                      } 
                    });

                      $('[name="no_ktp"]').keypress(function (e) {
                       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                        $("#err_no_ktp").html('<div class="text-danger"><strong>Stop!</strong> Hanya bisa di input dengan angka</div>').show().fadeOut("slow");
                        return false;
                      } 
                    });

                      $('[name="no_telp_keluarga"]').keypress(function (e) {
                       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                        $("#err_no_telp_keluarga").html('<div class="text-danger"><strong>Stop!</strong> Hanya bisa di input dengan angka</div>').show().fadeOut("slow");
                        return false;
                      } 
                    });

                      $('[name="telpon1"]').keypress(function (e) {
                       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                        $("#err_telpon1").html('<div class="text-danger"><strong>Stop!</strong> Hanya bisa di input dengan angka</div>').show().fadeOut("slow");
                        return false;
                      } 
                    });

                      $('[name="telpon2"]').keypress(function (e) {
                       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                        $("#err_telpon2").html('<div class="text-danger"><strong>Stop!</strong> Hanya bisa di input dengan angka</div>').show().fadeOut("slow");
                        return false;
                      } 
                    });

                      $('[name="tahun_lulus"]').keypress(function (e) {
                       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                        $("#err_tahun_lulus").html('<div class="text-danger"><strong>Stop!</strong> Hanya bisa di input dengan angka</div>').show().fadeOut("slow");
                        return false;
                      } 
                    });

                      $('[name="tgl_keluar"]').keypress(function (e) {
                       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                        $("#err_tgl_keluar").html('<div class="text-danger"><strong>Stop!</strong> Hanya bisa di input dengan angka</div>').show().fadeOut("slow");
                        return false;
                      } 
                    });

                      $('[name="tgl_pengajuan"]').keypress(function (e) {
                       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                        $("#err_tgl_pengajuan").html('<div class="text-danger"><strong>Stop!</strong> Hanya bisa di input dengan angka</div>').show().fadeOut("slow");
                        return false;
                      } 
                    });

                      $('[name="nomorSK"]').keypress(function (e) {
                       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                        $("#err_nosk").html('<div class="text-danger"><strong>Stop!</strong> Hanya bisa di input dengan angka</div>').show().fadeOut("slow");
                        return false;
                      } 
                    });

                      $('[name="noRek"]').keypress(function (e) {
                       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                        $("#err_noRek").html('<div class="text-danger"><strong>Stop!</strong> Hanya bisa di input dengan angka</div>').show().fadeOut("slow");
                        return false;
                      } 
                    });

                      $('[name="noDPLK"]').keypress(function (e) {
                       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                        $("#err_dplk").html('<div class="text-danger"><strong>Stop!</strong> Hanya bisa di input dengan angka</div>').show().fadeOut("slow");
                        return false;
                      } 
                    });

                      $('[name="strsip"]').keypress(function (e) {
                       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                        $("#err_strsip").html('<div class="text-danger"><strong>Stop!</strong> Hanya bisa di input dengan angka</div>').show().fadeOut("slow");
                        return false;
                      } 
                    });


                    });

        var save_method; //for save method string
        var table;
        var base_url = '<?= base_url();?>';

        $(document).ready(function() {

            //datatables
            table = $('#table').DataTable({ 
                // dom: 'Bfrtip',
                // "buttons": [ {
                //     "extend": 'excelHtml5',
                //      text: 'Ekport Excel',
                //          customize: function( xlsx ) {
                //                 var sheet = xlsx.xl.worksheets['sheet1.xml'];                
                //                 $('row c[r^="C"]', sheet).attr( 's', '2' );
                //             },
                //     } ],


                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.

                // Load data for the table's content from an Ajax source
                "ajax": {
                  "url": "<?= site_url('pegawai/ajax_list')?>",
                  "type": "POST"
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

            //datepicker
            // $('.datepicker').datepicker({ dayNames: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Ming'] });
            $('.datepicker').datepicker({
              autoclose: true,
              format: "yyyy-mm-dd",
              todayHighlight: true,
              orientation: "auto",
              locale: "id",
            });

          });



        function nonaktif_pegawai(id_pegawai) {
            $('#form_nonaktif')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string
            $('.id_pegawai').hide();


            //Ajax Load data from ajax
            $.ajax({
              url : "<?php echo site_url('pegawai/get_by_id')?>/" + id_pegawai,
              type: "GET",
              dataType: "JSON",
              success: function(data)
              {
                $('[name="id_pegawai"]').val(id_pegawai).prop('readonly', true);
                $('[name="nik"]').val(data.nik).prop('readonly', true);
                $('[name="nik_lama"]').val(data.nik_lama).prop('readonly', true);
                $('.nik_lama').hide();
                $('[name="nama"]').val(data.nama).prop('readonly', true);
                $('[name="status_aktif"]').val(data.status_aktif).change();  
                $('[name="alasan_keluar"]').val(data.alasan_keluar);
                $('[name="tgl_pengajuan"]').datepicker('update', data.tgl_pengajuan);
                $('[name="tgl_keluar"]').datepicker('update', data.tgl_keluar);
                $('[name="ket_keluar"]').val(data.ket_keluar);

                $('#modal_form_nonaktif').modal('show'); 

                if (data.status_aktif==1) {
                  $('.modal-title').text('<?= $non_aktif ?>'); 
                } else {
                  $('.modal-title').text('<?= $aktif ?>'); 
                }

              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert('Error get data from ajax');
              }
            });
          }

          function nonaktif_proses() {
            $('#btnSave').text('Processing...'); //change button text
            $('#btnSave').attr('disabled',true); //set button disable 
            var url;

            url = "<?php echo site_url('pegawai/non_active')?>";

            var formData = new FormData($('#form_nonaktif')[0]);
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
                      $('#modal_form_nonaktif').modal('hide');
                      reload_table();
                      $.toast({
                        text: "Data berhasil dinonaktifkan", 
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
                    $('#btnSave').html('<i class="fe-trash"> </i> Save'); //change button text
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

          function add_penempatan(id_pegawai) {
            save_method = 'add_penempatan';
            $('#form_penempatan')[0].reset(); 
            $('.form-group').removeClass('has-error');
            $('.help-block').empty();
            $('.id_pegawai').hide();
            $('[name="id_pegawai"]').prop('readonly', true);
            $('[name="nik"]').prop('readonly', true);
            $('[name="nik_lama"]').prop('readonly', false);
            $('[name="nama"]').prop('readonly', true);

            $.ajax({
              url : "<?php echo site_url('pegawai/get_pp_by_id')?>/" + id_pegawai,
              type: "GET",
              dataType: "JSON",
              success: function(data)
              {
                $('[name="id_pegawai"]').val(id_pegawai);
                $('[name="nik"]').val(data.nik);
                $('[name="nik_lama"]').val(data.nik_lama);
                $('[name="nama"]').val(data.nama);


                $(".cari_unit_level").trigger("change.select2");  
                $(".cari_unit_bisnis").trigger("change.select2");
                $(".cari_unit_usaha").trigger("change.select2"); 
                $(".cari_unit_organisasi").trigger("change.select2");
                $(".cari_unit_kerja").trigger("change.select2");
                $(".cari_unit_kerja_sub").trigger("change.select2");

                $('#modal_form_penempatan').modal('show'); 
                $('.modal-title').text('Add Penempatan Pegawai'); 

              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert('Error get data from ajax');
              }
            });
          }

          function update_penempatan(id_pegawai){
            save_method = 'update_penempatan';
            $('#form_penempatan')[0].reset(); 
            
            $('.form-group').removeClass('has-error'); 
            $('.help-block').empty(); 

            $('.id_pegawai').hide();
            $('[name="id_pegawai"]').prop('readonly', true);            
            $('[name="nik"]').prop('readonly', true);
            $('[name="nik_lama"]').prop('readonly', true);
            $('[name="nama"]').prop('readonly', true);

            //Ajax Load data from ajax
            $.ajax({
              url : "<?php echo site_url('pegawai/get_pp_by_id')?>/" + id_pegawai,
              type: "GET",
              dataType: "JSON",
              success: function(data)
              {
                $('[name="id_pegawai"]').val(id_pegawai);
                $('[name="nik"]').val(data.nik);
                $('[name="nik_lama"]').val(data.nik_lama);
                $('[name="nama"]').val(data.nama);


                $(".cari_unit_level").trigger("change.select2");
                $('[name="id_unit_level"]').val(data.id_unit_level).change();  
                $('[name="nm_unit_level"]').val(data.nm_unit_level).change();  

                $(".cari_unit_bisnis").trigger("change.select2");
                $('[name="id_unit_bisnis"]').val(data.id_unit_bisnis).change();  
                $('[name="nm_unit_bisnis"]').val(data.nm_unit_bisnis).change();

                $(".cari_unit_usaha").trigger("change.select2");
                $('[name="id_unit_usaha"]').val(data.id_unit_usaha).change();  
                $('[name="nm_unit_usaha"]').val(data.nm_unit_usaha).change();  

                $(".cari_unit_organisasi").trigger("change.select2");
                $('[name="id_unit_organisasi"]').val(data.id_unit_organisasi).change();  
                $('[name="nm_unit_organisasi"]').val(data.nm_unit_organisasi).change();

                $(".cari_unit_kerja").trigger("change.select2");
                $('[name="id_unit_kerja"]').val(data.id_unit_kerja).change();  
                $('[name="nm_unit_kerja"]').val(data.nm_unit_kerja).change(); 

                $(".cari_unit_kerja_sub").trigger("change.select2");
                $('[name="id_unit_kerja_sub"]').val(data.id_unit_kerja_sub).change();  
                $('[name="nm_unit_kerja_sub"]').val(data.nm_unit_kerja_sub).change(); 


                    $('#modal_form_penempatan').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Update Penempatan Pegawai'); // Set title to Bootstrap modal title

                  },
                  error: function (jqXHR, textStatus, errorThrown)
                  {
                    alert('Error get data from ajax');
                  }
                });
          }

          function simpan_data_penempatan(){
            $('#btnSave').text('sedang meyimpan...'); //change button text
            $('#btnSave').attr('disabled',true); //set button disable 
            var url;  

            if(save_method == 'add_penempatan') {
              url = "<?php echo site_url('pegawai/insert_data_penempatan')?>";
            } else {
              url = "<?php echo site_url('pegawai/update_data_penempatan')?>";
            }       
            
            var formData = new FormData($('#form_penempatan')[0]);
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
                      $('#modal_form_penempatan').modal('hide');
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

                        $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); 
                            //select parent twice to select div form-group class and add has-error class
                            
                            $('[name="'+data.inputerror[i]+'"]').next().next().text(data.error_string[i]); 
                            //select span help-block class set text error string
                            
                          }
                        // console.log(data.inputerror);
                      }
                    $('#btnSave').html('<i class="fe-save"> </i> Save'); //change button text
                    $('#btnSave').attr('disabled',false); //set button enable 


                  },
                  error: function (jqXHR, textStatus, errorThrown)
                  {
                    alert('error');
                    $('#btnSave').html('<i class="fe-save"> </i> Save'); //change button text
                    $('#btnSave').attr('disabled',false); //set button enable 

                  }
                });
          }

          function add() {
            save_method = 'add';
            $('#form')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string
            $('#modal_form').modal('show'); 
            $('.modal-title').text('<?= $create.' '.$m ?>'); 


            $('#image-preview').hide(); 
            $('.id_pegawai').hide();
            $('[name="nik"]').val('').prop('readonly', false);
            $('[name="nama"]').val('').prop('readonly', false);
            $('.nik_lama').hide();
            $('[name="nik_lama"]').val(0);
            $('.status_aktif').hide();
            $('[name="status_aktif"]').val(1).prop('readonly', true);
            $('[name="jenis_kelamin"]').trigger("change.select2");
            $('[name="agama_data_pegawai"]').trigger("change.select2");
            $('[name="status_pegawai"]').trigger("change.select2");
            $('[name="fungsi"]').trigger("change.select2");
            $('[name="lokasi"]').trigger("change.select2");
            $('[name="pend_terakhir"]').trigger("change.select2");
            $('[name="s_bank"]').trigger("change.select2");
            $('[name="status_kwn"]').trigger("change.select2");
            $('[name="id_medis"]').trigger("change.select2");
            $('[name="gol_dar"]').trigger("change.select2");
            $('[name="gol"]').trigger("change.select2");
            $('[name="sgt"]').trigger("change.select2");
            $('[name="id_eselon"]').trigger("change.select2");
            $('[name="stat_pajak"]').trigger("change.select2");
            $('[name="tk_pajak"]').trigger("change.select2");
            $('[name="pjk_mulai"]').trigger("change.select2");
            $('[name="pjk_akhir"]').trigger("change.select2");

            $('.jth_cuti').hide();
          }

          function update(id_pegawai) {
            save_method = 'update';
            $('#form')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string
            $('.id_pegawai').hide();
            $('.nik_lama').show();
            $('.nik_lama').removeClass('col-md-3').addClass('col-md-3');
            // $('#id_pegawai').hide();
            // $('#cari_pegawai').hide();
            // $('[name="password"]').prop('readonly', false);
            $('[name="status_aktif"]').prop('readonly', true);
            $('.status_aktif').hide();
            $('.jth_cuti').hide();


            //Ajax Load data from ajax
            $.ajax({
              url : "<?php echo site_url('pegawai/get_by_id')?>/" + id_pegawai,
              type: "GET",
              dataType: "JSON",
              success: function(data)
              {
                $('[name="id_pegawai"]').val(id_pegawai);
                $('[name="nik"]').val(data.nik);
                $('[name="nik_lama"]').val(data.nik_lama);
                $('[name="nama"]').val(data.nama);
                $('[name="nm_pgl"]').val(data.nm_pgl);
                $('[name="strsip"]').val(data.no_strsip);
                $('[name="datestrsip"]').val(data.tgl_strsip);
                $('[name="gelar1"]').val(data.gelar1);
                $('[name="gelar2"]').val(data.gelar2);
                $('[name="jenis_kelamin"]').val(data.jenis_kelamin).change();
                $('[name="tpt_lahir"]').val(data.tpt_lahir);
                $('[name="tgl_lahir"]').datepicker('update', data.tgl_lahir);
                $('[name="gol_dar"]').val(data.gol_dar).change();
                $('[name="tinggi"]').val(data.tinggi);
                $('[name="berat"]').val(data.berat);
                $('[name="agama_data_pegawai"]').val(data.agama).change();
                $('[name="status_pegawai"]').val(data.status_pegawai).change();
                $('[name="no_ktp"]').val(data.no_ktp);
                $('[name="no_kk"]').val(data.no_kk);
                $('[name="alamat_ktp"]').val(data.alamat_ktp);
                $('[name="alamat_dom"]').val(data.alamat_dom);
                $('[name="telpon1"]').val(data.telpon1);
                $('[name="telpon2"]').val(data.telpon2);
                $('[name="no_telp_keluarga"]').val(data.no_telp_keluarga);
                $('[name="email"]').val(data.email);
                $('[name="status_aktif"]').val(data.status_aktif).change();  
                $('[name="tgl_pengajuan"]').val(data.tgl_pengajuan);  
                $('[name="tgl_keluar"]').val(data.tgl_keluar);  
                $('[name="alasan_keluar"]').val(data.alasan_keluar);  
                $('[name="ket_keluar"]').val(data.ket_keluar);  
                $('[name="fungsi"]').val(data.fungsi).change();  
                $('[name="lokasi"]').val(data.lokasi).change();  
                $('[name="status_kwn"]').val(data.status_kwn).change();  
                $('[name="no_bpjs_kes"]').val(data.no_bpjs_kes);  
                $('[name="no_bpjs_tkerja"]').val(data.no_bpjs_tkerja);  
                $('[name="tgl_kerja"]').val(data.tgl_kerja);  
                $('[name="tgl_diangkat_pwtt"]').val(data.tgl_diangkat_pwtt);  
                $('[name="tgl_cuti"]').val(data.tgl_cuti);  
                    // $('[name="masa_kerja"]').val(data.masa_kerja);  
                    $('[name="nm_medis"]').val(data.nm_medis).change();  
                    $('[name="id_medis"]').val(data.id_medis).change();  
                    $('[name="gol"]').val(data.gol).change();  
                    $('[name="sgt"]').val(data.sgt).change();  
                    $('[name="id_eselon"]').val(data.id_eselon).change();  
                    $('[name="tmt_sgt"]').val(data.tmt_sgt);  
                    $('[name="tmt_gol"]').val(data.tmt_gol);  
                    $('[name="tmt_eselon"]').val(data.tmt_eselon);  
                    $('[name="stat_pajak"]').val(data.stat_pajak).change();  
                    $('[name="tk_pajak"]').val(data.tk_pajak).change();  
                    $('[name="pjk_mulai"]').val(data.pjk_mulai).change();  
                    $('[name="pjk_akhir"]').val(data.pjk_akhir).change();  
                    $('[name="npwp"]').val(data.npwp);  
                    $('[name="tgl_npwp"]').val(data.tgl_npwp);
                    $('[name="pend_terakhir"]').val(data.pend_terakhir).change();
                    $('[name="nomorSK"]').val(data.no_SK);
                    $('[name="noDPLK"]').val(data.no_dplk); 

                    $('[name="s_bank"]').val(data.id_bank).trigger('change');
                    $('[name="noRek"]').val(data.no_rek);
                    $('[name="anRek"]').val(data.atas_nm); 

                    $('[name="jth_cuti"]').val(data.jatah_cuti); 

                    $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('<?= $edit.' '.$m ?>'); // Set title to Bootstrap modal title

                    $('#image-preview').show(); // show image preview modal

                    if(data.image)
                    {
                        $('#label-image').text('Change image'); // label image upload
                        $('#image-preview div').html('<img src="'+base_url+'image/profilepegawai/'+data.image+'" class="img-responsive">'); // show image
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

                      function reload_table() {
            table.ajax.reload(null,false); //reload datatable ajax 
          }

          function save() {
            $('#btnSave').text('saving...'); //change button text
            $('#btnSave').attr('disabled',true); //set button disable 
            var url;

            if(save_method == 'add') {
              url = "<?php echo site_url('pegawai/insert')?>";
            } else {
              url = "<?php echo site_url('pegawai/update')?>";
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
        function deletedata(id) {

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
                url:"<?php echo site_url('pegawai/delete');?>",
                type:"POST",
                data:"id_pegawai="+id,
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
        function active(id) {

          Swal.fire({
            title: 'Apa kamu yakin?',
            text: "Aktifkan pegawai ini!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Aktifkan!',
            cancelButtonText: 'Batal'
          }).then((result) => {

            if (result.value) {

              $.ajax ({
                url:"<?php echo site_url('pegawai/active');?>",
                type:"POST",
                data:"id_pegawai="+id,
                cache:false,
                dataType: 'json',
                success:function(respone) {
                  if (respone.status === true) {
                    reload_table();
                    $.toast({
                      text: "pegawai berhasil diaktifkan", 
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
                      text: "pegawai gagal di aktifkan", 
                      heading: 'Error', 
                      icon: 'error',
                    });
                  }
                }
              });

            } else if (result.dismiss === swal.DismissReason.cancel) {
              reload_table();
              $.toast({
                text: "pegawai batal di aktifkan", 
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
        function non_active(id) {

          Swal.fire({
            title: 'Apa kamu yakin?',
            text: "Non Aktifkan pegawai ini!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Non Aktifkan!',
            cancelButtonText: 'Batal'
          }).then((result) => {

            if (result.value) {

              $.ajax ({
                url:"<?php echo site_url('pegawai/non_active');?>",
                type:"POST",
                data:"id_pegawai="+id,
                cache:false,
                dataType: 'json',
                success:function(respone) {
                  if (respone.status === true) {
                    reload_table();
                    $.toast({
                      text: "pegawai berhasil di nonaktifkan", 
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
                text: "pegawai batal di nonaktifkan", 
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
              url: "<?= base_url(); ?>pegawai/get_pegawai_like",
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
              url  : "<?php echo base_url('pegawai/get_pegawai')?>",
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

      <!-- KODE A -->
      <script type="text/javascript">
        $(document).ready(function(){

         $(".cari_unit_level").select2({
          width: '100%',
          dropdownAutoWidth: true,
          minimumInputLength: 1,
          ajax: { 
            url: "<?= base_url(); ?>pegawai/get_unit_level_like",
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function (params) {
              return {
                                        searchTermunit_level: params.term // search term
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
          $('.cari_unit_level').on('change',function(){

            var id_unit_level=$(this).val();
            $.ajax({
              type : "POST",
              url  : "<?php echo base_url('pegawai/get_unit_level')?>",
              dataType : "JSON",
              data : {id_unit_level: id_unit_level},
              cache:false,
              success: function(data){
                $.each(data,function(id_unit_level, nm_unit_level){
                  $('[name="id_unit_level"]').val(data.id_unit_level);
                  $('[name="nm_unit_level"]').val(data.nm_unit_level);
                  $('.id_unit_level').show();
                  $('.nm_unit_level').show();

                });

              }
            });
            return false;
          });
        });

       });
     </script>

     <!-- KODE B -->
     <script type="text/javascript">
      $(document).ready(function(){

       $(".cari_unit_bisnis").select2({
        width: '100%',
        dropdownAutoWidth: true,
        minimumInputLength: 1,
        ajax: { 
          url: "<?= base_url(); ?>pegawai/get_unit_bisnis_like",
          type: "post",
          dataType: 'json',
          delay: 250,
          data: function (params) {
            return {
                                        searchTermunit_bisnis: params.term // search term
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
        $('.cari_unit_bisnis').on('change',function(){

          var id_unit_bisnis=$(this).val();
          $.ajax({
            type : "POST",
            url  : "<?php echo base_url('pegawai/get_unit_bisnis')?>",
            dataType : "JSON",
            data : {id_unit_bisnis: id_unit_bisnis},
            cache:false,
            success: function(data){
              $.each(data,function(id_unit_bisnis, nm_unit_bisnis){
                $('[name="id_unit_bisnis"]').val(data.id_unit_bisnis);
                $('[name="nm_unit_bisnis"]').val(data.nm_unit_bisnis);
                $('.id_unit_bisnis').show();
                $('.nm_unit_bisnis').show();

              });

            }
          });
          return false;
        });
      });

     });
   </script>

   <!-- KODE C -->
   <script type="text/javascript">
    $(document).ready(function(){

     $(".cari_unit_usaha").select2({
      width: '100%',
      dropdownAutoWidth: true,
      minimumInputLength: 1,
      ajax: { 
        url: "<?= base_url(); ?>pegawai/get_unit_usaha_like",
        type: "post",
        dataType: 'json',
        delay: 250,
        data: function (params) {
          return {
                                        searchTermunit_usaha: params.term // search term
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
      $('.cari_unit_usaha').on('change',function(){

        var id_unit_usaha=$(this).val();
        $.ajax({
          type : "POST",
          url  : "<?php echo base_url('pegawai/get_unit_usaha')?>",
          dataType : "JSON",
          data : {id_unit_usaha: id_unit_usaha},
          cache:false,
          success: function(data){
            $.each(data,function(id_unit_usaha, nm_unit_usaha){
              $('[name="id_unit_usaha"]').val(data.id_unit_usaha);
              $('[name="nm_unit_usaha"]').val(data.nm_unit_usaha);
              $('.id_unit_usaha').show();
              $('.nm_unit_usaha').show();

            });

          }
        });
        return false;
      });
    });

   });
 </script>

 <!-- KODE D -->
 <script type="text/javascript">
  $(document).ready(function(){

   $(".cari_unit_organisasi").select2({
    width: '100%',
    dropdownAutoWidth: true,
    minimumInputLength: 1,
    ajax: { 
      url: "<?= base_url(); ?>pegawai/get_unit_organisasi_like",
      type: "post",
      dataType: 'json',
      delay: 250,
      data: function (params) {
        return {
                                        searchTermunit_organisasi: params.term // search term
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
    $('.cari_unit_organisasi').on('change',function(){

      var id_unit_organisasi=$(this).val();
      $.ajax({
        type : "POST",
        url  : "<?php echo base_url('pegawai/get_unit_organisasi')?>",
        dataType : "JSON",
        data : {id_unit_organisasi: id_unit_organisasi},
        cache:false,
        success: function(data){
          $.each(data,function(id_unit_organisasi, nm_unit_organisasi){
            $('[name="id_unit_organisasi"]').val(data.id_unit_organisasi);
            $('[name="nm_unit_organisasi"]').val(data.nm_unit_organisasi);
            $('.id_unit_organisasi').show();
            $('.nm_unit_organisasi').show();

          });

        }
      });
      return false;
    });
  });

 });
</script>

<!-- KODE E -->
<script type="text/javascript">
  $(document).ready(function(){

   $(".cari_unit_kerja").select2({
    width: '100%',
    dropdownAutoWidth: true,
    minimumInputLength: 1,
    ajax: { 
      url: "<?= base_url(); ?>pegawai/get_unit_kerja_like",
      type: "post",
      dataType: 'json',
      delay: 250,
      data: function (params) {
        return {
                                        searchTermunit_kerja: params.term // search term
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
    $('.cari_unit_kerja').on('change',function(){

      var id_unit_kerja=$(this).val();
      $.ajax({
        type : "POST",
        url  : "<?php echo base_url('pegawai/get_unit_kerja')?>",
        dataType : "JSON",
        data : {id_unit_kerja: id_unit_kerja},
        cache:false,
        success: function(data){
          $.each(data,function(id_unit_kerja, nm_unit_kerja){
            $('[name="id_unit_kerja"]').val(data.id_unit_kerja);
            $('[name="nm_unit_kerja"]').val(data.nm_unit_kerja);
            $('.id_unit_kerja').show();
            $('.nm_unit_kerja').show();

          });

        }
      });
      return false;
    });
  });

 });
</script>

<!-- KODE F -->
<script type="text/javascript">
  $(document).ready(function(){

   $(".cari_unit_kerja_sub").select2({
    width: '100%',
    dropdownAutoWidth: true,
    minimumInputLength: 1,
    ajax: { 
      url: "<?= base_url(); ?>pegawai/get_unit_kerja_sub_like",
      type: "post",
      dataType: 'json',
      delay: 250,
      data: function (params) {
        return {
                                        searchTermunit_kerja_sub: params.term // search term
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
    $('.cari_unit_kerja_sub').on('change',function(){

      var id_unit_kerja_sub=$(this).val();
      $.ajax({
        type : "POST",
        url  : "<?php echo base_url('pegawai/get_unit_kerja_sub')?>",
        dataType : "JSON",
        data : {id_unit_kerja_sub: id_unit_kerja_sub},
        cache:false,
        success: function(data){
          $.each(data,function(id_unit_kerja_sub, nm_unit_kerja_sub){
            $('[name="id_unit_kerja_sub"]').val(data.id_unit_kerja_sub);
            $('[name="nm_unit_kerja_sub"]').val(data.nm_unit_kerja_sub);
            $('.id_unit_kerja_sub').show();
            $('.nm_unit_kerja_sub').show();

          });

        }
      });
      return false;
    });
  });

 });
</script>

<!-- Lokasi Unit Usaha -->
<script type="text/javascript">
  $(document).ready(function(){

   $(".cari_unit_lokasi").select2({
    width: '100%',
    dropdownAutoWidth: true,
    minimumInputLength: 1,
    ajax: { 
      url: "<?= base_url(); ?>pegawai/get_unit_lokasi_like",
      type: "post",
      dataType: 'json',
      delay: 250,
      data: function (params) {
        return {
                                        searchTermunit_lokasi: params.term // search term
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
    $('.cari_unit_lokasi').on('change',function(){

      var id_unit_lokasi=$(this).val();
      $.ajax({
        type : "POST",
        url  : "<?php echo base_url('pegawai/get_unit_lokasi')?>",
        dataType : "JSON",
        data : {id_unit_lokasi: id_unit_lokasi},
        cache:false,
        success: function(data){
          $.each(data,function(id_unit_lokasi, nm_unit_lokasi){
            $('[name="id_unit_lokasi"]').val(data.id_unit_lokasi);
            $('[name="nm_unit_lokasi"]').val(data.nm_unit_lokasi);
            $('.id_unit_lokasi').show();
            $('.nm_unit_lokasi').show();

          });

        }
      });
      return false;
    });
  });

 });
  $(document).ready(()=>{
    $.ajax({
      url:"<?= site_url('pegawai/get_list_medis') ?>",
      method:"GET",
      dataType:"json",
      success:function(res){
        var options = '';
        for(var i=0;i<res.length;i++){
          options += '<option  value="'+res[i].nm_medis+'">'+res[i].nm_medis+'</option>';
        }
        $('#id_medis').append(options);
      }
    });
    $.ajax({
      url:"<?= site_url('pegawai/get_list_bank') ?>",
      method:"GET",
      dataType:"json",
      success:function(res){
        var options2 = '';
        for(var i=0;i<res.length;i++){
          options2 += '<option  value="'+res[i].id_bank+'">'+res[i].nm_bank+'</option>';
        }
        $('#s_bank').append(options2);
      }
    });
  });
  $("#id_medis").on('change',()=>{ 
    $.ajax({
      url:"<?= site_url('pegawai/get_list_medis') ?>",
      method:"GET",
      dataType:"json",
      success:function(res){
        var opt = '';
        for(var i=0;i<res.length;i++){
          if(res[i].nm_medis == $("#id_medis").val()){
            opt = res[i].id_medis;
          }
        }
        // if(opt == '' || opt == 'Non Medis / Umum'){
          if(opt == '' || opt == 'NDS'){
            $("#strsip").val("-");
            $("#strsip2").val(null);
            $("#strsip").hide();
            $("#strsip2").hide();
          }else{
            $("#strsip").show();
            $("#strsip2").show();
          }
          $('#nm_medis').val(opt);
        }
      });
  });

            //active
            function codeimage(id) {

              Swal.fire({
                title: 'Apa kamu yakin?',
                text: "Buat QR Code dan Bar Code",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Buatkan!',
                cancelButtonText: 'Batal'
              }).then((result) => {

                if (result.value) {

                  $.ajax ({
                    url:"<?php echo site_url('pegawai/codeimage');?>",
                    type:"POST",
                    data:"id_pegawai="+id,
                    cache:false,
                    dataType: 'json',
                    success:function(respone) {
                      if (respone.status === true) {
                        reload_table();
                        $.toast({
                          text: "Code berhasil dibuat", 
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
                          text: "Code Gagal dibuat", 
                          heading: 'Error', 
                          icon: 'error',
                        });
                      }
                    }
                  });

                }
              })

            } 


            function reset_jatah_cuti() {
        // var Postdata = new FormData(document.getElementById("formApp"));
        var Postdata = '<?php date("Y-m-d") ?>';

        Swal.fire({
          title: 'Apakah ingin reset jatah cuti tahunan?',
          text: "Anda tidak dapat mengembalikan ini!",
          icon: 'question',
          showCancelButton: true,
          confirmButtonColor: '#348cd4',
          cancelButtonColor: '#f7531f',
          confirmButtonText: 'Ya, Reset!',
          cancelButtonText: 'Batal'
        }).then((result) => {
          if (result.value) {
            $.ajax({
              url: "<?= base_url("pegawai/reset_jatah_cuti") ?>",
              type: "POST",
              data: Postdata,
              processData: false,
              contentType: false,
              dataType: 'json',
              success: function(respone) {
                if (respone.status === true) {
                  reload_table();
                  $.toast({
                    text: "Berhasil direset",
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
                    text: "Terdapat Error",
                    heading: 'Error',
                    icon: 'error',
                  });
                }
              }
            });

          } else if (result.dismiss === swal.DismissReason.cancel) {
            reload_table();
            $.toast({
              text: "Data Batal direset",
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

