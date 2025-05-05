<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0);">Master</a>
                    </li>
                    <li class="breadcrumb-item active">Bank</li>
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
                <table id="table" class="table table-striped table-bordered dt-rsponsive nowrap" style="border-collapse:collapse;border-spacing:0;width:100%;">

                    <thead>
                        <tr>
                            <th width="2%">No</th>
                            <th class="text-center" width="8%">Action</th>                            
                            <th>Nama</th>
                            <th>Cabang</th>
                            <th>Kota</th>        
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
<?php $this->load->view('admin/bank/list_modal') ?>
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
                    "url": "<?= site_url('bank/ajax_list')?>",
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
            $('.id_bank').hide();            
            $('[name="addNamabank"]').val(null);            
            $('[name="addCabangbank"]').val(null);
            $('[name="addKotabank"]').val(null);
            
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
                url = "<?php echo site_url('bank/insert')?>";
            } else {
                url = "<?php echo site_url('bank/update')?>";
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
                    }  else {

                        for (var i = 0; i < data.inputerror.length; i++) 
                        {
                            
                            $('[name="'+data.inputerror[i]+'"]').parent().addClass('has-error'); 
                            //select parent twice to select div form-group class and add has-error class
                            
                            $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); 
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
                    url:"<?php echo site_url('bank/delete');?>",
                    type:"POST",
                    data:"id_bank="+id,
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

      function update(id_bank) {
        save_method = 'update';
            $('#form')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string
            $('.id_bank').hide();
            

            //Ajax Load data from ajax
            $.ajax({
                url : "<?php echo site_url('bank/get_by_id')?>/" + id_bank,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    $('[name="id_bank"]').val(data.id_bank);
                    $('[name="addNamabank"]').val(data.nm_bank);
                    $('[name="addCabangbank"]').val(data.cabang);
                    $('[name="addKotabank"]').val(data.kota);
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
</body>
</html>
