<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0);">back</a>
                    </li>
                    <li class="breadcrumb-item active">jenis izin</li>
                </ol>
            </div>
            <?= $TombolCreate ?>
        </div>
    </div> 
</div>

<div class="row">
    <div class="col-sm-12">

        <div class="card card-border">

            <div class="card-header border-primary pb-0"></div>

            <div class="card-body table-responsive">
                <!-- <a class='btn btn-primary' href="<?= site_url('jenis_izin/downloadData')?>" target="_blank">
                    Download Data
                </a> -->
                
                <table id="table" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse:collapse;border-spacing:0;width:100%;">

                    <thead>
                        <tr>
                            <th width="2%">No</th>
                            <th class="text-center" width="8%">Action</th>                            
                            <th>Jenis Izin</th>
                            <th>Lama</th>      
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
<?php $this->load->view('admin/jenis_izin/list_modal') ?>

<?php $this->load->view('templates/includes/footer') ?>

<script type="text/javascript">

        var save_method; //for save method string
        var table;
        var base_url = '<?= base_url();?>';

        $(document).ready(function() {

            //datatables
            table = $('#table').DataTable({ 
                // dom: 'Bfrtip',
                // "buttons": [ {
                //     "extend": 'excelHtml5',
                //      text: 'Eksport Excel',
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
                    "url": "<?= site_url('jenis_izin/ajax_list')?>",
                    "type": "POST"
                },

                //Set column definition initialisation properties.
                // "columnDefs": [
                //     { 
                //         "targets": [ -1 ], //last column
                //         "orderable": false, //set not orderable
                //     },
                //     { 
                //         "targets": [ -2 ], //2 last column (image)
                //         "orderable": false, //set not orderable
                //     },
                // ],

                // $("#datatable-scroller").DataTable({
                // ajax:"<?= site_url('jenis_izin/ajax_list')?>",
                // deferRender:!0,
                // scrollY:380,
                // scrollCollapse:!0,
                // scroller:!0});

                // var handleDataTableButtons=function(){"use strict";0!==$("#datatable-buttons").length&&$("#datatable-buttons").DataTable({dom:"Bfrtip",buttons:[{extend:"copy",className:"btn-sm"},{extend:"csv",className:"btn-sm"},{extend:"excel",className:"btn-sm"},{extend:"pdf",className:"btn-sm"},{extend:"print",className:"btn-sm"}],responsive:!0})},TableManageButtons=function(){"use strict";return{init:function(){handleDataTableButtons()}}}();$(document).ready(function(){$("#datatable").dataTable(),$("#datatable-keytable").DataTable({keys:!0}),$("#datatable-responsive").DataTable(),$("#datatable-colvid").DataTable({dom:'C<"clear">lfrtip',colVis:{buttonText:"Change columns"}}),$("#datatable-scroller").DataTable({ajax:"../assets/data/scroller-demo.json",deferRender:!0,scrollY:380,scrollCollapse:!0,scroller:!0});$("#datatable-fixed-header").DataTable({fixedHeader:!0}),$("#datatable-fixed-col").DataTable({scrollY:"300px",scrollX:!0,scrollCollapse:!0,paging:!1,fixedColumns:{leftColumns:1,rightColumns:1}})}),TableManageButtons.init();

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

        function add() {
            save_method = 'add';
            $('#form')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string
            $('#modal_form').modal('show'); 
            $('.modal-title').text('<?= $create.' '.$m ?>'); 

            $('#image-preview').hide(); 
            $('.id_jenis_izin').hide();            
            $('[name="addNamajenis_izin"]').val(null);            
            $('[name="addLamajenis_izin"]').val(null);
            
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
                url = "<?php echo site_url('jenis_izin/insert')?>";
            } else {
                url = "<?php echo site_url('jenis_izin/update')?>";
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
                    url:"<?php echo site_url('jenis_izin/delete');?>",
                    type:"POST",
                    data:"id_jenis_izin="+id,
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

      function update(id_jenis_izin) {
        save_method = 'update';
            $('#form')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty();// clear error string
            $('.id_jenis_izin').hide();


            //Ajax Load data from ajax
            $.ajax({
                url : "<?php echo site_url('jenis_izin/get_by_id')?>/" + id_jenis_izin,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    $('[name="id_jenis_izin"]').val(data.id_jenis_izin);
                    $('[name="addNamajenis_izin"]').val(data.nm_jenis_izin);
                    $('[name="addLamajenis_izin"]').val(data.lama_jenis_izin);

                    $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('<?= $edit.' '.$m ?>'); // Set title to Bootstrap modal title
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }

    </script>       

    <script>
        //tombol

            // $('#download-btn').on('click', function() {

            //     // table = $('#table').DataTable({ 
            //     // dom: 'Bfrtip',
            //     // "buttons": [ {
            //     //     "extend": 'excelHtml5',
            //     //      text: 'Eksport Excel',
            //     //          customize: function( xlsx ) {
            //     //                 var sheet = xlsx.xl.worksheets['sheet1.xml'];                
            //     //                 $('row c[r^="C"]', sheet).attr( 's', '2' );
            //     //             },
            //     //     } ],
            //     // });

            // // Kirim request Ajax ke file PHP untuk mendownload data
            // $.ajax({
            //     url: '<?= site_url('jenis_izin/downloadDataC')?>',
            //     type: 'POST',
            //     dataType: 'json',
            //     success: function(response) {
            //     // Handle response dari file PHP
            //     // Misalnya, munculkan alert bahwa file sudah berhasil didownload
            //         alert('File berhasil didownload!');
            //         },
            //     error: function(xhr, status, error) {
            // // Handle error dari request Ajax
            //         alert('Terjadi kesalahan: ' + error);
            //         }
            //     });
            // });



        </script>

    </body>
    </html>
