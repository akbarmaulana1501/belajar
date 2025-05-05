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
                                    <h4 class="page-title"><a href="<?php echo base_url() ?>menu/create" class="btn btn-info waves-effect waves-light width-xs" role="button" aria-disabled="true"><i class="fe-plus"></i> <?php echo $m ?></a>

                                    <button type="button" class="btn btn-primary waves-effect waves-light"  data-toggle="modal" data-target="#con-close-modal-create"><i class="fe-plus-square"></i> <?= $create ?></button></h4>
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
                                                            $id1 =$menu['id'];
                                                            $is_main = $this->db->get_where('user_menu',array('id'=>$menu['is_main_menu']));
                                                            foreach ($is_main->result() as $is_main) { 
                                                                echo '<strong>'. $is_main->title. '<strong>';
                                                            } ?>
                                                        <?php endif ?>
                                                    </td>
                                                    <td><?= $menu['url']; ?></td>
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
                                                            <form action="<?php echo site_url('admin/menu/edit_action') ?>" method="POST">
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="userName">ID Group<span class="text-danger">*</span></label>
                                                                                
                                                                                <input type="text" name="id" parsley-trigger="change" required
                                                                                        placeholder="Enter ID Group" class="form-control" id="id" value="<?php echo $menu['id'];?>" hidden>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="userName">Title<span class="text-danger">*</span></label>
                                                                                <input type="text" name="title" parsley-trigger="change" required
                                                                                        placeholder="Enter Title" class="form-control" id="title" value="<?php echo $menu['title'];?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="userName">Url<span class="text-danger">*</span></label>
                                                                                    <input type="text" name="url" parsley-trigger="change" required
                                                                                            placeholder="Enter Ur" class="form-control" id="url" value="<?php echo $menu['url'];?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                 <label for="userName">Icon<span class="text-danger">*</span></label>
                                                                                    <input type="text" name="icon" parsley-trigger="change" required
                                                                                            placeholder="Enter Icon" class="form-control" id="icon" value="<?php echo $menu['icon'];?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="userName">Parent<span class="text-danger">*</span></label>
                                                                                    <input type="text" name="is_main_menu" parsley-trigger="change" required
                                                                                            placeholder="Enter Parent" class="form-control" id="is_main_menu" value="<?php echo $menu['is_main_menu'];?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                 <label for="userName">Active<span class="text-danger">*</span></label>
                                                                                    <input type="text" name="is_aktif" parsley-trigger="change" required
                                                                                            placeholder="Enter Active" class="form-control" id="is_aktif" value="<?php echo $menu['is_aktif'];?>">
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
                                                        <form action="<?php echo site_url('admin/menu/delete_action') ?>" method="POST">
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
                                                        <form action="<?php echo site_url('admin/menu/active_action') ?>" method="POST">
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
                                                        <form action="<?php echo site_url('admin/menu/deactive_action') ?>" method="POST">
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

               <div id="con-close-modal-create" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header badge-primary">
                                <h4 class="modal-title mt-0"><?php echo $create.' '.$m ?></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?php echo site_url('admin/menu/create_action') ?>" method="POST">
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
                                                 <label for="userName">Icon<span class="text-danger">*</span></label>
                                                    <input type="text" name="icon" parsley-trigger="change" required
                                                            placeholder="Enter Icon" class="form-control" id="icon">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                 <label for="userName">Icon<span class="text-danger">*</span></label>
                                                    <select class="selectpicker form-control show-tick" name="icon" data-live-search="true" data-style="btn-light">
                                                        <option data-content="<i class='fe-alert-octagon' aria-hidden='true'></i> fe-alert-octagon" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-alert-circle' aria-hidden='true'></i> fe-alert-circle" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-activity' aria-hidden='true'></i> fe-activity" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-alert-triangle' aria-hidden='true'></i> fe-alert-triangle" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-align-center' aria-hidden='true'></i> fe-align-center" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-airplay' aria-hidden='true'></i> fe-airplay" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-align-justify' aria-hidden='true'></i> fe-align-justify" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-align-left' aria-hidden='true'></i> fe-align-left" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-align-right' aria-hidden='true'></i> fe-align-right" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-arrow-down-left' aria-hidden='true'></i> fe-arrow-down-left" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-arrow-down-right' aria-hidden='true'></i> fe-arrow-down-right" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-anchor' aria-hidden='true'></i> fe-anchor" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-aperture' aria-hidden='true'></i> fe-aperture" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-arrow-left' aria-hidden='true'></i> fe-arrow-left" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-arrow-right' aria-hidden='true'></i> fe-arrow-right" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-arrow-down' aria-hidden='true'></i> fe-arrow-down" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-arrow-up-left' aria-hidden='true'></i> fe-arrow-up-left" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-arrow-up-right' aria-hidden='true'></i> fe-arrow-up-right" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-arrow-up' aria-hidden='true'></i> fe-arrow-up" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-award' aria-hidden='true'></i> fe-award" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-bar-chart' aria-hidden='true'></i> fe-bar-chart" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-at-sign' aria-hidden='true'></i> fe-at-sign" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-bar-chart-2' aria-hidden='true'></i> fe-bar-chart-2" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-battery-charging' aria-hidden='true'></i> fe-battery-charging" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-bell-off' aria-hidden='true'></i> fe-bell-off" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-battery' aria-hidden='true'></i> fe-battery" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-bluetooth' aria-hidden='true'></i> fe-bluetooth" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-bell' aria-hidden='true'></i> fe-bell" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-book' aria-hidden='true'></i> fe-book" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-briefcase' aria-hidden='true'></i> fe-briefcase" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-camera-off' aria-hidden='true'></i> fe-camera-off" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-calendar' aria-hidden='true'></i> fe-calendar" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-bookmark' aria-hidden='true'></i> fe-bookmark" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-box' aria-hidden='true'></i> fe-box" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-camera' aria-hidden='true'></i> fe-camera" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-check-circle' aria-hidden='true'></i> fe-check-circle" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-check' aria-hidden='true'></i> fe-check" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-check-square' aria-hidden='true'></i> fe-check-square" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-cast' aria-hidden='true'></i> fe-cast" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-chevron-down' aria-hidden='true'></i> fe-chevron-down" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-chevron-left' aria-hidden='true'></i> fe-chevron-left" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-chevron-right' aria-hidden='true'></i> fe-chevron-right" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-chevron-up' aria-hidden='true'></i> fe-chevron-up" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-chevrons-down' aria-hidden='true'></i> fe-chevrons-down" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-chevrons-right' aria-hidden='true'></i> fe-chevrons-right" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-chevrons-up' aria-hidden='true'></i> fe-chevrons-up" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-chevrons-left' aria-hidden='true'></i> fe-chevrons-left" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-circle' aria-hidden='true'></i> fe-circle" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-clipboard' aria-hidden='true'></i> fe-clipboard" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-chrome' aria-hidden='true'></i> fe-chrome" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-clock' aria-hidden='true'></i> fe-clock" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-cloud-lightning' aria-hidden='true'></i> fe-cloud-lightning" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-cloud-drizzle' aria-hidden='true'></i> fe-cloud-drizzle" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-cloud-rain' aria-hidden='true'></i> fe-cloud-rain" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-cloud-off' aria-hidden='true'></i> fe-cloud-off" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-codepen' aria-hidden='true'></i> fe-codepen" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-cloud-snow' aria-hidden='true'></i> fe-cloud-snow" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-compass' aria-hidden='true'></i> fe-compass" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-copy' aria-hidden='true'></i> fe-copy" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-corner-down-right' aria-hidden='true'></i> fe-corner-down-right" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-corner-down-left' aria-hidden='true'></i> fe-corner-down-left" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-corner-left-down' aria-hidden='true'></i> fe-corner-left-down" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-corner-left-up' aria-hidden='true'></i> fe-corner-left-up" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-corner-up-left' aria-hidden='true'></i> fe-corner-up-left" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-corner-up-right' aria-hidden='true'></i> fe-corner-up-right" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-corner-right-down' aria-hidden='true'></i> fe-corner-right-down" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-corner-right-up' aria-hidden='true'></i> fe-corner-right-up" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-cpu' aria-hidden='true'></i> fe-cpu" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-credit-card' aria-hidden='true'></i> fe-credit-card" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-crosshair' aria-hidden='true'></i> fe-crosshair" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-disc' aria-hidden='true'></i> fe-disc" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-delete' aria-hidden='true'></i> fe-delete" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-download-cloud' aria-hidden='true'></i> fe-download-cloud" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-download' aria-hidden='true'></i> fe-download" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-droplet' aria-hidden='true'></i> fe-droplet" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-edit-2' aria-hidden='true'></i> fe-edit-2" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-edit' aria-hidden='true'></i> fe-edit" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-edit-1' aria-hidden='true'></i> fe-edit-1" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-external-link' aria-hidden='true'></i> fe-external-link" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-eye' aria-hidden='true'></i> fe-eye" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-feather' aria-hidden='true'></i> fe-feather" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-facebook' aria-hidden='true'></i> fe-facebook" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-file-minus' aria-hidden='true'></i> fe-file-minus" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-eye-off' aria-hidden='true'></i> fe-eye-off" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-fast-forward' aria-hidden='true'></i> fe-fast-forward" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-file-text' aria-hidden='true'></i> fe-file-text" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-film' aria-hidden='true'></i> fe-film" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-file' aria-hidden='true'></i> fe-file" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-file-plus' aria-hidden='true'></i> fe-file-plus " value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-folder' aria-hidden='true'></i> fe-folder" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-filter' aria-hidden='true'></i> fe-filter" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-flag' aria-hidden='true'></i> fe-flag" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-globe' aria-hidden='true'></i> fe-globe" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-grid' aria-hidden='true'></i> fe-grid" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-heart' aria-hidden='true'></i> fe-heart" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-home' aria-hidden='true'></i> fe-home" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-github' aria-hidden='true'></i> fe-github" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-image' aria-hidden='true'></i> fe-image" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-inbox' aria-hidden='true'></i> fe-inbox" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-layers' aria-hidden='true'></i> fe-layers" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-info' aria-hidden='true'></i> fe-info" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-instagram' aria-hidden='true'></i> fe-instagram" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-layout' aria-hidden='true'></i> fe-layout" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-link-2' aria-hidden='true'></i> fe-link-2" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-life-buoy' aria-hidden='true'></i> fe-life-buoy" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-link' aria-hidden='true'></i> fe-link" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-log-in' aria-hidden='true'></i> fe-log-in" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-list' aria-hidden='true'></i> fe-list" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-lock' aria-hidden='true'></i> fe-lock" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-log-out' aria-hidden='true'></i> fe-log-out" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-loader' aria-hidden='true'></i> fe-loader" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-mail' aria-hidden='true'></i> fe-mail" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-maximize-2' aria-hidden='true'></i> fe-maximize-2" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-map' aria-hidden='true'></i> fe-map" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-maximize' aria-hidden='true'></i> fe-maximize" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-map-pin' aria-hidden='true'></i> fe-map-pin" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-menu' aria-hidden='true'></i> fe-menu" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-message-circle' aria-hidden='true'></i> fe-message-circle" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-message-square' aria-hidden='true'></i> fe-message-square" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-minimize-2' aria-hidden='true'></i> fe-minimize-2" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-minimize' aria-hidden='true'></i> fe-minimize" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-mic-off' aria-hidden='true'></i> fe-mic-off" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-minus-circle' aria-hidden='true'></i> fe-minus-circle" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-mic' aria-hidden='true'></i> fe-mic" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-minus-square' aria-hidden='true'></i> fe-minus-square" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-minus' aria-hidden='true'></i> fe-minus" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-moon' aria-hidden='true'></i> fe-moon" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-monitor' aria-hidden='true'></i> fe-monitor" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-more-vertical' aria-hidden='true'></i> fe-more-vertical" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-more-horizontal' aria-hidden='true'></i> fe-more-horizontal" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-move' aria-hidden='true'></i> fe-move" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-music' aria-hidden='true'></i> fe-music" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-navigation-2' aria-hidden='true'></i> fe-navigation-2" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-navigation' aria-hidden='true'></i> fe-navigation" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-octagon' aria-hidden='true'></i> fe-octagon" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-package' aria-hidden='true'></i> fe-package" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-pause-circle' aria-hidden='true'></i> fe-pause-circle" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-pause' aria-hidden='true'></i> fe-pause" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-percent' aria-hidden='true'></i> fe-percent" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-phone-call' aria-hidden='true'></i> fe-phone-call" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-phone-forwarded' aria-hidden='true'></i> fe-phone-forwarded" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-phone-missed' aria-hidden='true'></i> fe-phone-miss" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-phone-off' aria-hidden='true'></i> fe-phone-off" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-phone-incoming' aria-hidden='true'></i> fe-phone-incoming" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-phone' aria-hidden='true'></i> fe-phone" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-phone-outgoing' aria-hidden='true'></i> fe-phone-outgoing" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-pie-chart' aria-hidden='true'></i> fe-pie-chart" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-play-circle' aria-hidden='true'></i> fe-play-circle" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-play' aria-hidden='true'></i> fe-play" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-plus-square' aria-hidden='true'></i> fe-plus-square" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-plus-circle' aria-hidden='true'></i> fe-plus-circle" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-plus' aria-hidden='true'></i> fe-plus" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-pocket' aria-hidden='true'></i> fe-pocket" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-printer' aria-hidden='true'></i> fe-printer" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-power' aria-hidden='true'></i> fe-power" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-radio' aria-hidden='true'></i> fe-radio" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-repeat' aria-hidden='true'></i> fe-repeat" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-refresh-ccw' aria-hidden='true'></i> fe-refresh-ccw" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-rewind' aria-hidden='true'></i> fe-rewind" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-rotate-ccw' aria-hidden='true'></i> fe-rotate-ccw" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-refresh-cw' aria-hidden='true'></i> fe-refresh-cw" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-rotate-cw' aria-hidden='true'></i> fe-rotate-cw" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-save' aria-hidden='true'></i> fe-save" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-search' aria-hidden='true'></i> fe-search" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-server' aria-hidden='true'></i> fe-server" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-scissors' aria-hidden='true'></i> fe-scissors" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-share-2' aria-hidden='true'></i> fe-share-2" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-share' aria-hidden='true'></i> fe-share" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-shield' aria-hidden='true'></i> fe-shield" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-settings' aria-hidden='true'></i> fe-settings" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-skip-back' aria-hidden='true'></i> fe-skip-back" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-shuffle' aria-hidden='true'></i> fe-shuffle" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-sidebar' aria-hidden='true'></i> fe-sidebar" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-skip-forward' aria-hidden='true'></i> fe-skip-forward" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-slack' aria-hidden='true'></i> fe-slack" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-slash' aria-hidden='true'></i> fe-slash" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-smartphone' aria-hidden='true'></i> fe-smartphone" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-square' aria-hidden='true'></i> fe-square" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-speaker' aria-hidden='true'></i> fe-speaker" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-star' aria-hidden='true'></i> fe-star" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-stop-circle' aria-hidden='true'></i> fe-stop-circle" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-sun' aria-hidden='true'></i> fe-sun" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-sunrise' aria-hidden='true'></i> fe-sunrise" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-tablet' aria-hidden='true'></i> fe-tablet" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-tag' aria-hidden='true'></i> fe-tag" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-sunset' aria-hidden='true'></i> fe-sunset" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-target' aria-hidden='true'></i> fe-target" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-thermometer' aria-hidden='true'></i> fe-thermometer" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-thumbs-up' aria-hidden='true'></i> fe-thumbs-up" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-thumbs-down' aria-hidden='true'></i> fe-thumbs-down" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-toggle-left' aria-hidden='true'></i> fe-toggle-left" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-toggle-right' aria-hidden='true'></i> fe-toggle-right" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-trash-2' aria-hidden='true'></i> fe-trash-2" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-trash' aria-hidden='true'></i> fe-trash" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-trending-up' aria-hidden='true'></i> fe-trending-up" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-trending-down' aria-hidden='true'></i> fe-trending-down" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-triangle' aria-hidden='true'></i> fe-triangle" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-type' aria-hidden='true'></i> fe-type" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-twitter' aria-hidden='true'></i> fe-twitter" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-upload' aria-hidden='true'></i> fe-upload" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-umbrella' aria-hidden='true'></i> fe-umbrella" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-upload-cloud' aria-hidden='true'></i> fe-upload-cloud" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-unlock' aria-hidden='true'></i> fe-unlock" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-user-check' aria-hidden='true'></i> fe-user-check" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-user-minus' aria-hidden='true'></i> fe-user-minus" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-user-plus' aria-hidden='true'></i> fe-user-plus" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-user-x' aria-hidden='true'></i> fe-user-x" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-user' aria-hidden='true'></i> fe-user" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-users' aria-hidden='true'></i> fe-users" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-video-off' aria-hidden='true'></i> fe-video-off" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-video' aria-hidden='true'></i> fe-video" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-voicemail' aria-hidden='true'></i> fe-voicemail" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-volume-x' aria-hidden='true'></i> fe-volume-x" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-volume-1' aria-hidden='true'></i> fe-volume-1" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-volume-2' aria-hidden='true'></i> fe-volume-2" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-volume' aria-hidden='true'></i> fe-volume" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-watch' aria-hidden='true'></i> fe-watch" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-wifi' aria-hidden='true'></i> fe-wifi" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-x-square' aria-hidden='true'></i> fe-x-square" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-wind' aria-hidden='true'></i> fe-wind" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-x' aria-hidden='true'></i> fe-x" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-x-circle' aria-hidden='true'></i> fe-x-circle" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-zap' aria-hidden='true'></i> fe-zap" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-zoom-in' aria-hidden='true'></i> fe-zoom-in" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-zoom-out' aria-hidden='true'></i> fe-zoom-out" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-command' aria-hidden='true'></i> fe-command" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-cloud' aria-hidden='true'></i> fe-cloud" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-hash' aria-hidden='true'></i> fe-hash" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-headphones' aria-hidden='true'></i> fe-headphones" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-underline' aria-hidden='true'></i> fe-underline" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-italic' aria-hidden='true'></i> fe-italic" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-bold' aria-hidden='true'></i> fe-bold" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-crop' aria-hidden='true'></i> fe-crop" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-help-circle' aria-hidden='true'></i> fe-help-circle" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-paperclip' aria-hidden='true'></i> fe-paperclip" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-shopping-cart' aria-hidden='true'></i> fe-shopping-cart" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-tv' aria-hidden='true'></i> fe-tv" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-wifi-off' aria-hidden='true'></i> fe-wifi-off" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-gitlab' aria-hidden='true'></i> fe-gitlab" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-sliders' aria-hidden='true'></i> fe-sliders" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-star-on' aria-hidden='true'></i> fe-star-on" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-heart-on' aria-hidden='true'></i> fe-heart-on" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-archive' aria-hidden='true'></i> fe-archive" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-arrow-down-circle' aria-hidden='true'></i> fe-arrow-down-circle" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-arrow-up-circle' aria-hidden='true'></i> fe-arrow-up-circle" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-arrow-left-circle' aria-hidden='true'></i> fe-arrow-left-circle" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-arrow-right-circle' aria-hidden='true'></i> fe-arrow-right-circle" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-bar-chart-line-' aria-hidden='true'></i> fe-bar-chart-line-" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-bar-chart-line' aria-hidden='true'></i> fe-bar-chart-line" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-book-open' aria-hidden='true'></i> fe-book-open" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-code' aria-hidden='true'></i> fe-code" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-database' aria-hidden='true'></i> fe-database" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-dollar-sign' aria-hidden='true'></i> fe-dollar-sign" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-folder-plus' aria-hidden='true'></i> fe-folder-plus" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-gift' aria-hidden='true'></i> fe-gift" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-folder-minus' aria-hidden='true'></i> fe-folder-minus" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-git-commit' aria-hidden='true'></i> fe-git-commit" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-git-branch' aria-hidden='true'></i> fe-git-branch" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-git-pull-request' aria-hidden='true'></i> fe-git-pull-request" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-git-merge' aria-hidden='true'></i> fe-git-merge" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-linkedin' aria-hidden='true'></i> fe-linkedin" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-hard-drive' aria-hidden='true'></i> fe-hard-drive" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-more-vertical-' aria-hidden='true'></i> fe-more-vertical-" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-more-horizontal-' aria-hidden='true'></i> fe-more-horizontal-" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-rss' aria-hidden='true'></i> fe-rss" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-send' aria-hidden='true'></i> fe-send" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-shield-off' aria-hidden='true'></i> fe-shield-off" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-shopping-bag' aria-hidden='true'></i> fe-shopping-bag" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-terminal' aria-hidden='true'></i> fe-terminal" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-truck' aria-hidden='true'></i> fe-truck" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-zap-off' aria-hidden='true'></i> fe-zap-off" value="fe-headphones"></option>
                                                        <option data-content="<i class='fe-youtube' aria-hidden='true'></i> fe-youtube" value="fe-headphones"></option>

                                                    </select>
                                                    <select class="selectpicker mb-0" data-style="btn-light" data-live-search="true">
                                                        <option data-icon="fas fa-glass-martini-alt text-primary mr-1">Mustard</option>
                                                        <option data-icon="far fa-heart mr-1">Ketchup</option>
                                                        <option data-icon="fas fa-film mr-1">Relish</option>
                                                        <option data-icon="fas fa-home mr-1">Mayonnaise</option>
                                                        <option data-icon="fa fa-print mr-1">Barbecue Sauce</option>
                                                    </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userName">Parent<span class="text-danger">*</span></label>
                                                    <input type="text" name="is_main_menu" parsley-trigger="change" required
                                                            placeholder="Enter Parent" class="form-control" id="is_main_menu">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                 <label for="userName">Active<span class="text-danger">*</span></label>
                                                    <input type="text" name="is_aktif" parsley-trigger="change" required
                                                            placeholder="Enter Active" class="form-control" id="is_aktif">
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

