                       <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo ucwords($m); ?></a></li>
                                            <li class="breadcrumb-item active"><?php echo ucwords($ml); ?></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">
                                    <button type="button" class="btn btn-sm btn-primary waves-effect waves-light"  data-toggle="modal" data-target="#con-close-modal-create"><i class="fe-plus-square"></i> <?= $create ?></button></h4>
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
                                    <div class="card-body table-responsive">
                                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
												<tr>
													<th width="2%">No</th>
                                                    <th>Role</th>
													<th class="text-center" width="22%">Role Access</th>
													<th class="text-center" width="8%">Action</th>
												</tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $no=0;
                                                foreach ($role->result_array() as $role) : 
                                                $no++; 
                                            ?>
												<tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $role['role']; ?></td>
                                                    <td class="text-center" width="22%">
                                                        <a href="<?php echo site_url('role/access/'.$role['id']) ?>" class="badge badge-warning"><i class="fe-lock"> </i> Modul Access </a>

                                                        <!-- <span class="badge badge-warning" data-toggle="modal" data-target="#access<?php echo $role['id']; ?>"><i class="fe-lock"> </i>Modul Access</span> -->
                                                    </td>
                                                    <td class="text-center" width="8%">
                                                       <span class="badge badge-primary" data-toggle="modal" data-target="#edit<?php echo $role['id']; ?>"><i class="fe-edit"> </i><?= $edit ?></span>
                                                       <span class="badge badge-danger" data-toggle="modal" data-target=".delete<?php echo $role['id']; ?>"><i class="fe-trash-2"></i> <?= $delete ?></span>
                                                    </td>
												</tr>

                                            <div id="edit<?php echo $role['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header badge-primary">
                                                                <h4 class="modal-title mt-0"><?php echo $edit.' '.$m.' '.$role['role']; ?></h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="<?php echo site_url('role/edit_action') ?>" method="POST">
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12" hidden>
                                                                            <div class="form-group">
                                                                                <label for="userName">ID<span class="text-danger">*</span></label>
                                                                                <input type="text" name="id" parsley-trigger="change" required
                                                                                        placeholder="Enter role" class="form-control" id="id" value="<?php echo $role['id'];?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="userName">Role<span class="text-danger">*</span></label>
                                                                                <input type="text" name="role" parsley-trigger="change" required
                                                                                        placeholder="Enter role" class="form-control" id="role" value="<?php echo $role['role'];?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-info waves-effect waves-light"><i class="fe-save"> </i> <?= $edit ?></button>
                                                            </div>
                                                            </form>
                                                    </div>
                                                </div><!-- /.modal -->
                                            </div>



                                            <div class="modal fade delete<?php echo $role['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header badge-danger">
                                                            <h4 class="modal-title mt-0" id="mySmallModalLabel"><?= $delete.' '.$m; ?></h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="<?php echo site_url('role/delete_action') ?>" method="POST">
                                                            <div class="modal-body">
                                                                <div class="col-md-12">
                                                                    <div class="form-group" hidden>
                                                                         <label for="userName">Active<span class="text-danger">*</span></label>
                                                                            <input type="text" name="id" parsley-trigger="change" required class="form-control" id="id" value="<?php echo $role['id'];?>" readonly>
                                                                    </div>
                                                                    <p>Apakah anda yakin mau menghapus <b> <?php echo $role['role'] ?> </b> ?</p>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-danger waves-effect waves-light"><i class="fe-trash-2"> </i> <?= $delete ?></button>
                                                            </div>
                                                        </form>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->

											<?php endforeach;?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>                       
                            
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->

               <div id="con-close-modal-create" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header badge-primary">
                                <h4 class="modal-title mt-0"><?php echo $create.' '.$m ?></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?php echo site_url('role/create_action') ?>" method="POST">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="userName">Role<span class="text-danger">*</span></label>
                                                <input type="text" name="role" parsley-trigger="change" required
                                                        placeholder="Enter Role" class="form-control" id="role">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info waves-effect waves-light"><i class="fe-save"> </i> Create</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div><!-- /.modal -->





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

    </body>
</html>