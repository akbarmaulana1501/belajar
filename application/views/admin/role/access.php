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
                                    <h4 class="page-title">Access Menus : <?= $role['role'] ?></h4>
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
                                                        <th scope="col">Url</th>
                                                        <th scope="col">Menu</th>
                                                        <th scope="col">Keterangan</th>
                                                        <th scope="col" class="text-center">Read [Access]</th>
                                                        <th scope="col" class="text-center">Create</th>
                                                        <th scope="col" class="text-center">Update</th>
                                                        <th scope="col" class="text-center">Delete</th>
                                                </tr>
                                            </thead>
                                 
                                            <tbody>
                                            <?php
                                                $no=0;
                                                foreach ($menu as $m) : 
                                                    $crud = $this->db->get_where('_user_access_menu', array('menu_id' => $m['id'],'role_id' => $user['role_id']))->row_array();
                                                    // print_r($crud);

                                                    if (isset($crud['can_create'])==null) {
                                                        $crud['can_create'] = '-';
                                                    } elseif ($crud['can_create']==0 AND $m['url']!='#' AND $m['url'] != 'dashboard') {
                                                        $crud['can_create'] = '<div class="form-check">
                                                            <input class="form-check-create" type="checkbox" '.check_access_create($role['id'], $m['id']).'data-role="'.$role['id'].'" data-menu="'. $m['id'].'">
                                                        </div>';
                                                    } elseif ($crud['can_create']==1 AND $m['url']!='#' AND $m['url'] != 'dashboard') {
                                                        $crud['can_create'] = '<div class="form-check">
                                                            <input class="form-check-create" type="checkbox" '.check_access_create($role['id'], $m['id']).'data-role="'.$role['id'].'" data-menu="'. $m['id'].'">
                                                        </div>';
                                                    } else {
                                                         $crud['can_create'] = '';
                                                    }

                                                    
                                                    if (isset($crud['can_edit'])==null) {
                                                        $crud['can_edit'] = '-';
                                                    } elseif ($crud['can_edit']==0 AND $m['url']!='#' AND $m['url'] != 'dashboard') {
                                                        $crud['can_edit'] = '<div class="form-check">
                                                            <input class="form-check-edit" type="checkbox" '.check_access_edit($role['id'], $m['id']).'data-role="'.$role['id'].'" data-menu="'. $m['id'].'">
                                                        </div>';
                                                    } elseif ($crud['can_edit']==1 AND $m['url']!='#' AND $m['url'] != 'dashboard') {
                                                        $crud['can_edit'] = '<div class="form-check">
                                                            <input class="form-check-edit" type="checkbox" '.check_access_edit($role['id'], $m['id']).'data-role="'.$role['id'].'" data-menu="'. $m['id'].'">
                                                        </div>';
                                                    } else {
                                                         $crud['can_edit'] = '';
                                                    }

                                                    
                                                    if (isset($crud['can_delete'])==null) {
                                                        $crud['can_delete'] = '-';
                                                    } elseif ($crud['can_delete']==0 AND $m['url']!='#' AND $m['url'] != 'dashboard') {
                                                        $crud['can_delete'] = '<div class="form-check">
                                                            <input class="form-check-delete" type="checkbox" '.check_access_delete($role['id'], $m['id']).'data-role="'.$role['id'].'" data-menu="'. $m['id'].'">
                                                        </div>';
                                                    } elseif ($crud['can_delete']==1 AND $m['url']!='#' AND $m['url'] != 'dashboard') {
                                                        $crud['can_delete'] = '<div class="form-check">
                                                            <input class="form-check-delete" type="checkbox" '.check_access_delete($role['id'], $m['id']).'data-role="'.$role['id'].'" data-menu="'. $m['id'].'">
                                                        </div>';
                                                    } else {
                                                         $crud['can_delete'] = '';
                                                    }

                                                $no++; 
                                            ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $m['url']; ?></td>
                                                    <td><?= $m['title']; ?></td>
                                                    <td><?= $m['ket']; ?></td>
                                                    <td class="text-center">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">
                                                        </div>

                                                    </td>
                                                    <td class="text-center"><?= $crud['can_create']; ?></td>
                                                    <td class="text-center"><?= $crud['can_edit']; ?></td>
                                                    <td class="text-center"><?= $crud['can_delete']; ?></td>
                                                </tr>
                                            <?php endforeach;?>
                                            </tbody>
                                        </table>
                                    </div>
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
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
            }, 2000);
        </script>

        <script>
            $('.custom-file-input').change( function() {
                let fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').addClass("selected").html(fileName);
            });



            $('.form-check-input').on('click', function() {
                const menuId = $(this).data('menu');
                const roleId = $(this).data('role');

                $.ajax({
                    url: "<?= base_url('role/changeaccess'); ?>",
                    type: 'post',
                    data: {
                        menuId: menuId,
                        roleId: roleId
                    },
                    success: function() {
                        document.location.href = "<?= base_url('role/access/'); ?>" + roleId;
                    }
                });

            });

            $('.form-check-create').on('click', function() {
                const menuId = $(this).data('menu');
                const roleId = $(this).data('role');

                $.ajax({
                    url: "<?= base_url('role/changeaccess_create'); ?>",
                    type: 'post',
                    data: {
                        menuId: menuId,
                        roleId: roleId
                    },
                    success: function() {
                        document.location.href = "<?= base_url('role/access/'); ?>" + roleId;
                    }
                });

            });

            $('.form-check-edit').on('click', function() {
                const menuId = $(this).data('menu');
                const roleId = $(this).data('role');

                $.ajax({
                    url: "<?= base_url('role/changeaccess_edit'); ?>",
                    type: 'post',
                    data: {
                        menuId: menuId,
                        roleId: roleId
                    },
                    success: function() {
                        document.location.href = "<?= base_url('role/access/'); ?>" + roleId;
                    }
                });

            });

            $('.form-check-delete').on('click', function() {
                const menuId = $(this).data('menu');
                const roleId = $(this).data('role');

                $.ajax({
                    url: "<?= base_url('role/changeaccess_delete'); ?>",
                    type: 'post',
                    data: {
                        menuId: menuId,
                        roleId: roleId
                    },
                    success: function() {
                        document.location.href = "<?= base_url('role/access/'); ?>" + roleId;
                    }
                });

            });
        </script>      

    </body>
</html>