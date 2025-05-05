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
                                        <!-- <a href="<?php echo base_url() ?>menu/create" class="btn btn-info waves-effect waves-light width-xs" role="button" aria-disabled="true"><i class="fe-plus"></i> <?php echo $m ?></a> -->

                                    <button type="button" class="btn btn-primary btn-sm waves-effect waves-light"  data-toggle="modal" data-target="#con-close-modal-create"><i class="fe-plus-square"></i> <?= $create ?></button></h4>
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
													<th>Titile</th>
                                                    <th>Parent</th>
                                                    <th>Url</th>
													<th>Keterangan</th>
													<th class="text-center">icon</th>
                                                    <th>Active</th>
													<th class="text-center" width="8%">Action</th>
												</tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $no=0;
                                                foreach ($menu->result_array() as $menu) : 
                                                $no++; 
                                            ?>
												<tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $menu['title']; ?></td>
                                                    <td>
                                                        <?php if ($menu['is_main_menu']=='0') : ?> 
                                                           Parent
                                                        <?php else : ?>
                                                            <?php 
                                                            $is_main = $this->db->get_where('_user_menu',array('id'=>$menu['is_main_menu']));
                                                            foreach ($is_main->result() as $is_main) { 
                                                                echo '<strong>'. $is_main->title. '<strong>';
                                                            } ?>
                                                        <?php endif ?>
                                                    </td>
                                                    <td><?= $menu['url']; ?></td>
                                                    <td><?= $menu['ket']; ?></td>
                                                    <td class="text-center"><i class="<?= $menu['icon']; ?>"></i></td>
                                                    <td>
                                                        <?php if ($menu['is_aktif']=='1') { 
                                                         echo   '<a class="text-primary" data-toggle="modal" data-target=".deactivate' .$menu['id']. '">Active</a>';
                                                         } else { 
                                                         echo   '<a class="text-danger" data-toggle="modal" data-target=".active' .$menu['id']. '">Deactivate</a>';
                                                        } ?>
                                                            
                                                    </td>
                                                    <td class="text-center">
                                                       <span class="badge badge-primary" data-toggle="modal" data-target="#edit<?php echo $menu['id']; ?>"><i class="fe-edit"> </i><?= $edit ?></span>
                                                       <span class="badge badge-danger" data-toggle="modal" data-target=".delete<?php echo $menu['id']; ?>"><i class="fe-trash-2"></i> <?= $delete ?></span>
                                                    </td>
												</tr>

                                                <div id="edit<?php echo $menu['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header badge-primary">
                                                                <h4 class="modal-title mt-0"><?php echo $edit.' '.$m.' '.$menu['title']; ?></h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="<?php echo site_url('menu/edit_action') ?>" method="POST">
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-6" hidden>
                                                                            <div class="form-group">
                                                                                <label for="userName">ID Menu<span class="text-danger">*</span></label>
                                                                                <input type="text" name="id" parsley-trigger="change" required
                                                                                        placeholder="Enter ID Menu" class="form-control" id="id" value="<?php echo $menu['id'];?>" hidden>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="userName">Title<span class="text-danger">*</span></label>
                                                                                <input type="text" name="title" parsley-trigger="change" required
                                                                                        placeholder="Enter Title" class="form-control" id="title" value="<?php echo $menu['title'];?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="userName">Url<span class="text-danger">*</span></label>
                                                                                    <input type="text" name="url" parsley-trigger="change" required
                                                                                            placeholder="Enter Ur" class="form-control" id="url" value="<?php echo $menu['url'];?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="userName">Keterangan<span class="text-danger">*</span></label>
                                                                                    <input type="text" name="ket" parsley-trigger="change" required
                                                                                            placeholder="Enter Keterangan" class="form-control" id="ket" value="<?php echo $menu['ket'];?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row" hidden>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                 <label for="userName">Icon<span class="text-danger">*</span></label>
                                                                                    <select name="icon" id="icon2" class="selectpicker2 form-control show-tick" data-live-search="true" data-style="btn-light" required>
                                                                                        <option data-content="<i class='fe-home' aria-hidden='true'></i> fe-home" value="fe-home" <?php if ($menu['icon']=='fe-home') { echo 'selected';} ?>></option>
                                                                                        <option data-content="<i class='fe-plus' aria-hidden='true'></i> fe-plus" value="fe-plus" <?php if ($menu['icon']=='fe-plus') { echo 'selected';} ?>></option>
                                                                                        <option data-content="<i class='fe-user' aria-hidden='true'></i> fe-user" value="fe-user" <?php if ($menu['icon']=='fe-user') { echo 'selected';} ?>></option>
                                                                                        <option data-content="<i class='fe-user-plus' aria-hidden='true'></i> fe-user-plus" value="fe-user-plus" <?php if ($menu['icon']=='fe-user-plus') { echo 'selected';} ?>></option>
                                                                                        <option data-content="<i class='fe-settings' aria-hidden='true'></i> fe-settings" value="fe-settings" <?php if ($menu['icon']=='fe-settings') { echo 'selected';} ?>></option>
                                                                                        <option data-content="<i class='fe-power' aria-hidden='true'></i> fe-power" value="fe-power" <?php if ($menu['icon']=='fe-power') { echo 'selected';} ?>></option>
                                                                                    </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="userName">Parent <span class="text-danger">*</span></label>
                                                                                    <!-- <input type="text" name="is_main_menu" parsley-trigger="change" required
                                                                                            placeholder="Enter Parent" class="form-control" id="is_main_menu" value="<?php echo $menu['title'];?>"> -->
                                                                                    <select id="is_main_menu" name="is_main_menu" class="form-control select2" required>
                                                                                        <option>Pilih</option>
                                                                                        <option value="0">Parent</option>
                                                                                    <?php if ($menu['is_main_menu'] != '0') : ?>
                                                                                        <?php $is_main = $this->db->get_where('_user_menu',array('id'=>$menu['is_main_menu']));
                                                                                        foreach ($is_main->result() as $is_main) { ?>
                                                                                                <option value="0" selected><?= $is_main->title ?></option>
                                                                                                <?php     
                                                                                                    $this->db->where('title !=', $is_main->title);
                                                                                                    $this->db->where('is_main_menu', 0);
                                                                                                    $this->db->where('title !=', $menu['title']);
                                                                                                    $query_menu = $this->db->get('_user_menu'); 
                                                                                                      foreach ($query_menu->result_array() as $user_menu) : ?>

                                                                                                        <option value="<?= $user_menu['id'] ?>"><?= $user_menu['title'] ?></option>
                                                                                                <?php endforeach ?>
                                                                                        <?php } ?>
                                                                                    <?php else : ?>
                                                                                    <?php 
                                                                                        $this->db->where('is_main_menu', 0);
                                                                                        $this->db->where('title !=', $menu['title']);
                                                                                        $query_menu = $this->db->get('_user_menu'); 
                                                                                          foreach ($query_menu->result_array() as $user_menu) : ?>
                                                                                            <option value="<?= $user_menu['id'] ?>"
                                                                                                <?php if ($user_menu['is_main_menu']==$menu['is_main_menu']): ?>
                                                                                                    selected
                                                                                                <?php endif ?>
                                                                                            ><?= $user_menu['title'] ?></option>
                                                                                    <?php endforeach ?>
                                                                                    <?php endif ?>
                                                                                    </select>

                                                                                    
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                 <label for="userName">Active<span class="text-danger">*</span></label>
                                                                                <select name="is_aktif" id="is_aktif" class="form-control select2" required>
                                                                                    <?php if ($menu['is_aktif']==1) {
                                                                                        echo '
                                                                                        <option value="1" selected>Ya</option>
                                                                                        <option value="0">Tidak</option>';
                                                                                    } else { 
                                                                                        echo '
                                                                                        <option value="1">Ya</option>
                                                                                        <option value="0" selected>Tidak</option>';
                                                                                    }?>
                                                                                </select>
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



                                            <div class="modal fade delete<?php echo $menu['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header badge-danger">
                                                            <h4 class="modal-title mt-0" id="mySmallModalLabel"><?= $delete.' '.$m; ?></h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="<?php echo site_url('menu/delete_action') ?>" method="POST">
                                                            <div class="modal-body">
                                                                <div class="col-md-12">
                                                                    <div class="form-group" hidden>
                                                                         <label for="userName">Active<span class="text-danger">*</span></label>
                                                                            <input type="text" name="id" parsley-trigger="change" required
                                                                                    placeholder="Enter Active" class="form-control" id="id" value="<?php echo $menu['id'];?>" readonly>
                                                                    </div>
                                                                    <p>Apakah anda yakin mau menghapus <b> <?php echo $menu['title'] ?> </b> ?</p>
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

                                            <div class="modal fade active<?php echo $menu['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header badge-success">
                                                            <h4 class="modal-title mt-0" id="mySmallModalLabel">Activation</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="<?php echo site_url('menu/active_action') ?>" method="POST">
                                                            <div class="modal-body">
                                                                <div class="col-md-12">
                                                                    <div class="form-group" hidden>
                                                                         <label for="userName">Menu Id<span class="text-danger">*</span></label>
                                                                            <input type="text" name="id" parsley-trigger="change" required placeholder="Enter Active" class="form-control" id="id" value="<?php echo $menu['id'];?>" readonly>
                                                                    </div>
                                                                    <div class="form-group" hidden>
                                                                         <label for="userName">Is Active<span class="text-danger">*</span></label>
                                                                            <input type="text" name="is_aktif" parsley-trigger="change" required placeholder="Enter Active" class="form-control" id="id" value="1" readonly>
                                                                    </div>
                                                                    <p>Activate <b> <?= strtoupper($menu['title'].' '.$m); ?> </b> ?</p>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-success waves-effect waves-light"><i class="fe-check"> </i> <?= $activate ?></button>
                                                            </div>
                                                        </form>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->

                                            <div class="modal fade deactivate<?php echo $menu['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header badge-warning">
                                                            <h4 class="modal-title mt-0" id="mySmallModalLabel">Activation</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="<?php echo site_url('menu/deactive_action') ?>" method="POST">
                                                            <div class="modal-body">
                                                                <div class="col-md-12">
                                                                    <div class="form-group" hidden>
                                                                         <label for="userName">Menu Id<span class="text-danger">*</span></label>
                                                                            <input type="text" name="id" parsley-trigger="change" required placeholder="Enter Active" class="form-control" id="id" value="<?php echo $menu['id'];?>" readonly>
                                                                    </div>
                                                                    <div class="form-group" hidden>
                                                                         <label for="userName">Is Active<span class="text-danger">*</span></label>
                                                                            <input type="text" name="is_aktif" parsley-trigger="change" required placeholder="Enter Active" class="form-control" id="id" value="0" readonly>
                                                                    </div>
                                                                    <p>Deactivate <b> <?= strtoupper($menu['title'].' '.$m); ?> </b> ?</p>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-warning waves-effect waves-light"><i class="fe-check"> </i> <?= $deactivate ?></button>
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

               <div id="con-close-modal-create" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header badge-primary">
                                <h4 class="modal-title mt-0"><?php echo $create.' '.$m ?></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?php echo site_url('menu/create_action') ?>" method="POST">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userName">Title<span class="text-danger">*</span></label>
                                                <input type="text" name="title" parsley-trigger="change" required
                                                        placeholder="Enter Title" class="form-control" id="title">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userName">Url<span class="text-danger">*</span></label>
                                                    <input type="text" name="url" parsley-trigger="change" required
                                                            placeholder="Enter Ur" class="form-control" id="url">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userName">Ket<span class="text-danger">*</span></label>
                                                    <input type="text" name="ket" parsley-trigger="change" required
                                                            placeholder="Enter Keterangan" class="form-control" id="ket">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                 <label for="userName">Icon<span class="text-danger">*</span></label>
                                                    <select class="selectpicker form-control show-tick" name="icon" data-live-search="true" data-style="btn-light" required>
                                                        <option data-content="<i class='fe-home' aria-hidden='true'></i> fe-home" value="fe-home"></option>
                                                        <option data-content="<i class='fe-plus' aria-hidden='true'></i> fe-plus" value="fe-plus"></option>
                                                        <option data-content="<i class='fe-user' aria-hidden='true'></i> fe-user" value="fe-user"></option>
                                                        <option data-content="<i class='fe-user-plus' aria-hidden='true'></i> fe-user-plus" value="fe-user-plus"></option>
                                                        <option data-content="<i class='fe-settings' aria-hidden='true'></i> fe-settings" value="fe-settings"></option>
                                                        <option data-content="<i class='fe-power' aria-hidden='true'></i> fe-power" value="fe-power"></option>
                                                    </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userName">Parent<span class="text-danger">*</span></label>
                                                    <select id="is_main_menu" name="is_main_menu" class="form-control select2"  required>
                                                            <option>Pilih</option>
                                                            <option value="0">Parent</option>
                                                            <?php 
                                                            $this->db->where('is_main_menu', '0');
                                                            $is_main_menu = $this->db->get('_user_menu');
                                                            foreach ($is_main_menu->result_array() as $is_main_menu) : ?>
                                                            <option value="<?= $is_main_menu['id']; ?>"><?= $is_main_menu['title']; ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                 <label for="userName">Active<span class="text-danger">*</span></label>
                                                        <select name="is_aktif" id="is_aktif" class="form-control select2" required>
                                                            <option>Pilih</option>
                                                            <option value="1">Ya</option>
                                                            <option value="0">Tidak</option>
                                                        </select>
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