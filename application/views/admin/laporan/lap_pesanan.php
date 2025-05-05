<!-- https://shareurcodes.com/blog/dataTables%20server-side%20processing%20with%20custom%20parameters%20in%20codeigniter-->
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo $m ?></a></li>
                                            <li class="breadcrumb-item active"><?php echo $ml ?></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">
                                    <button type="button" id="btn-reset2" class="btn btn-info btn-sm"><i class="fe-refresh-ccw"></i> Reload</button></button>
                                    </h4>
                                    <button type="button" class="btn btn-sm btn-primary waves-effect waves-light" onclick="add()"><i class="fe-plus-square"></i> Create </button>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card card-border">
                                    <div class="card-header border-primary pb-0">
                                    </div>
                                    <div class="card-body">
                                       <div class="form-group mb-0 col-md-10 offset-md-1">
                                            <label>Filter Berdasarkan Tanggal</label>
                                            <div>
                                                <form action="<?php base_url('admin/') ?>lap_pesanan/cetak" id="form-filter" class="form-horizontal" target="_blank">
                                                    <div class="input-daterange input-group">
                                                        <input type="text" class="form-control" id="start_date" name="start_date" autocomplete="off" />
                                                        <div class="input-group-append">
                                                            <span class="input-group-text bg-primary b-0">S.D</span>
                                                        </div>
                                                        <input type="text" class="form-control" id="end_date" name="end_date" autocomplete="off" required />
                                                        <button type="submit" id="btn-filter" class="btn btn-primary form-control waves-effect waves-light"><i class="fas fa-filter"></i> Filter || <i class="fa fa-print"></i> Cetak</button>
                                                        <button type="button" id="btn-reset" class="btn btn-info"><i class="mdi mdi-filter-remove"></i> Reset</button>
                                                       
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="card-body table-responsive">
                                        <table id="lap_pesanan" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th width="2%">No</th>
                                                    <th>Tanggal Order</th>
                                                    <th>Item</th>
                                                    <th>Banyak</th>
                                                    <th>Harga</th>
                                                    <th>Total</th>
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
                       <div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
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
                                            <embed src="http://localhost/farfum/admin/lap_pesanan/cetak?start_date=2019-02-05&end_date=2029-08-17" frameborder="0" width="100%" height="600px">
                                        </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                        <!-- <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button> -->
                                        <button type="button" id="btnSave" onclick="save()" class="btn btn-info waves-effect waves-light"><!-- <i class="fe-save"> </i> --> Save</button>
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

            function add() {
                save_method = 'add';
                $('#form')[0].reset(); // reset form on modals
                $('.form-group').removeClass('has-error'); // clear error class
                $('#modal_form').modal({backdrop: 'static', keyboard: false}); // show bootstrap modal
                $('.modal-title').text('xxxxxxxx'); // Set Title to Bootstrap modal title
                
            }
        </script>
        <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
            }, 16000);
        </script>

        <script>
            $( ".select2").select2();
        </script>

        <script> 
            $(document).ready(function () {
                $(".input-daterange").datepicker({
                    class: "datepicker",
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                   
                });
            });
        </script>

        <!-- Ajax Hasil Pemeriksaan Bidan -->
        <script type="text/javascript">

                var lap_pesanan;

                $(document).ready(function() {

                    //datatables
                    lap_pesanan = $('#lap_pesanan').DataTable({ 

                        "processing": true, //Feature control the processing indicator.
                        "serverSide": true, //Feature control DataTables' server-side processing mode.
                        "order": [], //Initial no order.

                        // Load data for the table's content from an Ajax source
                        "ajax": {
                            "url": "<?php echo site_url('admin/lap_pesanan/ajax_list')?>",
                            "type": "POST",
                            "data": function ( data ) {
                                data.start_date = $('#start_date').val();
                                data.end_date = $('#end_date').val();
                            }
                        },

                        //Set column definition initialisation properties.
                        "columnDefs": [
                        { 
                            "targets": [ -1 ], //last column
                            "orderable": false, //set not orderable
                        },
                        ],

                    });

                });

            $('#btn-filter').click(function(){ //button filter event click
                lap_pesanan.ajax.reload();  //just reload table
            });

            $('#btn-reset2').click(function(){ //button reset event click
                $('#form-filter')[0].reset();
                lap_pesanan.ajax.reload();  //just reload table
            });

            $('#btn-reset').click(function(){ //button reset event click
                $('#form-filter')[0].reset();
                lap_pesanan.ajax.reload();  //just reload table
            });

            function load_lap_pesanan()
            {
                lap_pesanan.ajax.reload(null,false); //reload datatable ajax 
            }


        </script>
                
    </body>
</html>