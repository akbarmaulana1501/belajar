<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0);">back</a>
                    </li>
                    <li class="breadcrumb-item active">Approval Mapping</li>
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
                            <th>Nama Approval</th>
                            <th>Nama Pengajuan</th>      
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
                        <?php $this->load->view('admin/mapping_approval/list_modal') ?>

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
                    "url": "<?= site_url('mapping_approval/ajax_list')?>",
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
            $(".addPengajuan").show();
            $('.modal-title').text('<?= $create.' '.$m ?>'); 

            $('#image-preview').hide(); 
            $('.id_pegawai_approval').hide();            
            $('[name="addApproval"]').trigger("change.select2");
            $('[name="addPengajuan"]').trigger("change.select2");
            
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
                    url = "<?php echo site_url('mapping_approval/insert')?>";
                } else {
                    url = "<?php echo site_url('mapping_approval/update')?>";
                }

            // ajax adding data to database
            $.ajax({
                url : url,
                type: "POST",
                data: {
                    addApproval:$("#addApproval").val(),
                    addPengajuan:$("#addPengajuan").val()
                },
                cache:false,
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
                    // else if(data.status==false) {
                    //     reload_table();
                    //     $.toast({
                    //                     text: "Data gagal disimpan.", 
                    //                     heading: 'Error', 
                    //                     icon: 'error', 
                    //                     showHideTransition: 'fade', 
                    //                     allowToastClose: false, 
                    //                     hideAfter: 3000, 
                    //                     stack: 5, 
                    //                     position: 'bottom-right', 
                    //                     textAlign: 'left',
                    //                     // loader: true, 
                    //                     // bgColor: '#0040e0',
                    //                 });
                    // }

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

        $(document).ready(()=>{
                $.ajax({
                    url:"<?= site_url('mapping_approval/get_list_pegawai') ?>",
                    method:"GET",
                    dataType:"json",
                    success:function(res){
                        var options2 = '';
                        for(var i=0;i<res.length;i++){
                            options2 += '<option  value="'+res[i].id_pegawai+'">'+res[i].nama+'</option>';
                        }
                        $('#addApproval').append(options2);
                        $('#addPengajuan').append(options2);
                    }
                });
            });
    

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
                            url:"<?php echo site_url('mapping_approval/delete');?>",
                            type:"POST",
                            data:"id_pegawai_approval="+id,
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

        function update(id_pegawai) {
            save_method = 'update';
            $('#form')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string
            $(".addPengajuan").hide();

            //Ajax Load data from ajax
            $.ajax({
                url : "<?php echo site_url('mapping_approval/get_by_id')?>",
                type: "POST",
                dataType: "JSON",
                data:{
                    id_peg:id_pegawai,
                },
                success: function(data)
                {
                    $('[name="addApproval"]').val(data.approval).trigger('change');
                    $('[name="addPengajuan"]').val(data.approval).trigger('change');
                    $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('<?= $edit.' '.$m ?>'); // Set title to Bootstrap modal title
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }

        function singleDelete(id)
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
                            url:"<?php echo site_url('mapping_approval/singleDelete');?>",
                            type:"POST",
                            data:"id="+id,
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
                