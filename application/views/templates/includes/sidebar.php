            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <li class="menu-title">Menu Utama</li>
                            <?php 
                                $role_id = $this->session->userdata('role_id');
                                $queryMenu = "SELECT `_user_menu`.`id`, `title`, `url`, `icon`, `is_main_menu`, `is_aktif`
                                                FROM `_user_menu` 
                                                JOIN `_user_access_menu` ON `_user_menu`.`id` = `_user_access_menu`.`menu_id`
                                                -- JOIN `user` ON `user`.`role_id` = '$role_id'
                                                -- JOIN `pegawai` ON `pegawai`.`id_pegawai` = `user`.`id_pegawai`
                                               WHERE `_user_access_menu`.`role_id` = '$role_id' 
                                               -- WHERE `_user_access_menu`.`role_id` = '$role_id' and `pegawai`.`id_pegawai` = 'PG_30' 
                                                 AND `_user_menu`.`is_aktif` = 1
                                                 AND `_user_menu`.`is_main_menu` = 0
                                            ORDER BY `_user_menu`.`no_urut` ASC
                                            ";
                                $menu = $this->db->query($queryMenu)->result_array();
                            ?>

                            <!-- LOOPING MENU -->
                            <?php foreach ($menu as $m) : ?>
                            <?php $id_menu = $m['id']; ?>
                            <?php 
                                $sub_menu = $this->db->get_where('_user_menu', array('is_main_menu' => $id_menu,'is_aktif' => 1)); 
                                if ($sub_menu->num_rows() > 0) { ?>
                            <li>
                                <?php if ($m['icon']=='#') { ?>
                                <a href="javascript: void(0);">    
                                <?php } else { ?>
                                <a href="<?= $m['url']; ?>">
                                <?php } ?>
                                    <i class="<?= $m['icon']; ?>"></i>
                                    <span> <?= $m['title']; ?> </span>
                                    <span class="menu-arrow"></span>
                                </a>

                                <ul class="nav-second-level" aria-expanded="false">
                                    <?php 
                                        $sub_sub = "SELECT `_user_menu`.`id`, `title`, `url`, `icon`, `is_main_menu`, `is_aktif`
                                                        FROM `_user_menu` JOIN `_user_access_menu`
                                                          ON `_user_menu`.`id` = `_user_access_menu`.`menu_id`
                                                       WHERE `_user_access_menu`.`role_id` = '$role_id'
                                                         AND `_user_menu`.`is_aktif` = 1
                                                         AND `_user_menu`.`is_main_menu` = '$id_menu'
                                                    ORDER BY `_user_access_menu`.`menu_id` ASC
                                                    ";
                                        $sube = $this->db->query($sub_sub)->result_array();
                                        $app_role = $this->db->get_where('pegawai_approval',array("approval" => $this->session->userdata("id_pegawai")))->num_rows();
                                        
                                    ?>
                                    <?php 
                                    foreach ($sube as $sube):
                                        if($sube['id'] == 16 && $app_role == 0 || $sube['id'] == 17 && $app_role == 0):
                                            continue;
                                        else:
                                        ?>
                                            <li><a test="<?= $app_role; ?>" href="<?= base_url() ?><?= $sube['url']; ?>"><?= $sube['title']; ?></a></li>
                                        <?php
                                        endif;
                                    endforeach; ?>
                                </ul>
                                
                            </li>                       

                            <?php } else { ?>
                                    
                            <li>
                                <a href="<?= base_url() ?><?= $m['url']; ?>">
                                     <i class="<?= $m['icon']; ?>"></i>
                                    <span> <?= $m['title']; ?></span>
                                </a>
                            </li>

                            <?php } ?>
                            <?php endforeach; ?>
                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">