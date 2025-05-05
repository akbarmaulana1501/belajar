<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('templates/includes/header') ?>


    <body>

        <!-- Begin page -->
        <div id="wrapper">

            
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">

                    <!-- <li class="d-none d-sm-block">
                        <form class="app-search">
                            <div class="app-search-box">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <div class="input-group-append">
                                        <button class="btn" type="submit">
                                            <i class="fe-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </li> -->
        
                    <!-- <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle  waves-effect waves-light" data-toggle="dropdown" href="<?= base_url('templates/') ?>#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="fe-bell noti-icon"></i>
                            <span class="badge badge-danger rounded-circle noti-icon-badge">9</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                           
                            <div class="dropdown-item noti-title">
                                <h5 class="m-0">
                                    <span class="float-right">
                                        <a href="<?= base_url('templates/') ?>" class="text-dark">
                                            <small>Clear All</small>
                                        </a>
                                    </span>Notification
                                </h5>
                            </div>

                            <div class="slimscroll noti-scroll">
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-primary">
                                        <i class="mdi mdi-settings-outline"></i>
                                    </div>
                                    <p class="notify-details">New settings
                                        <small class="text-muted">There are new settings available</small>
                                    </p>
                                </a>

                               
                                <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                    <div class="notify-icon">
                                        <img src="<?= base_url('templates/') ?>assets/images/users/avatar-4.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                    <p class="notify-details">Cristina Pride</p>
                                    <p class="text-muted mb-0 user-msg">
                                        <small>Hi, How are you? What about our next meeting</small>
                                    </p>
                                </a>

                    
                               
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-warning">
                                        <i class="mdi mdi-bell-outline"></i>
                                    </div>
                                    <p class="notify-details">Updates
                                        <small class="text-muted">There are 2 new updates available</small>
                                    </p>
                                </a>

                               
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon">
                                        <img src="<?= base_url('templates/') ?>assets/images/users/avatar-4.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                    <p class="notify-details">Karen Robinson</p>
                                    <p class="text-muted mb-0 user-msg">
                                        <small>Wow ! this admin looks good and awesome design</small>
                                    </p>
                                </a>

                               
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-danger">
                                        <i class="mdi mdi-account-plus"></i>
                                    </div>
                                    <p class="notify-details">New user
                                        <small class="text-muted">You have 10 unread messages</small>
                                    </p>
                                </a>

                               
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-info">
                                        <i class="mdi mdi-comment-account-outline"></i>
                                    </div>
                                    <p class="notify-details">Caleb Flakelar commented on Admin
                                        <small class="text-muted">4 days ago</small>
                                    </p>
                                </a>

                               
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-secondary">
                                        <i class="mdi mdi-heart"></i>
                                    </div>
                                    <p class="notify-details">Carlos Crouch liked
                                        <b>Admin</b>
                                        <small class="text-muted">13 days ago</small>
                                    </p>
                                </a>
                            </div>

                            
                            <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                View all
                                <i class="fi-arrow-right"></i>
                            </a>

                        </div>
                    </li> -->

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="<?= base_url('templates/') ?>#" role="button" aria-haspopup="false" aria-expanded="false">
                            <?php if ($this->App->aplikasi()['image']): ?>
                                                            
                            <div class="member-avatar avatar-xl mx-auto d-block">
                                <img src="<?= base_url('image/') ?>profileuser/<?php echo $this->App->aplikasi()['image']; ?>" class="rounded-circle img-thumbnail" alt="profile-image">
                                
                            </div>
                            <?php else: ?>
                             <div class="member-avatar avatar-xl mx-auto d-block">
                                <img src="<?= base_url('image/') ?>profileuser/default/avatar-2.png" class="rounded-circle img-thumbnail" alt="profile-image">
                               
                            </div>   
                            <?php endif ?>
                            <!-- <img src="<?= base_url('templates/') ?>assets/images/users/<?php echo $this->App->aplikasi()['image']; ?>" alt="user-image" class="rounded-circle"> -->
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                           
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Selamat Datang ! </h6>
                            </div>

                           
                           
                            <a href="<?php echo base_url() ?>profile" class="dropdown-item notify-item">
                                <i class="fe-user"></i><strong>  <?php if (strlen($this->App->aplikasi()['nama'])>14) 
                                {
                                   echo "******"; // code...
                                } else {
                                    echo  $this->App->aplikasi()['nama'];
                                } ?></strong>
                                
                            </a>
                            <?php if ($this->App->aplikasi()['role_id'] ==1): ?>
                                
                           
                            <a href="<?php echo base_url() ?>setting-app" class="dropdown-item notify-item">
                                <i class="fe-settings"></i>
                                <span>Settings App</span>
                            </a>

                           
                            <!-- <a href="<?php echo base_url() ?>dashboard/company" class="dropdown-item notify-item">
                                <i class="fe-settings"></i>
                                <span>Company</span>
                            </a> -->

                            <?php endif ?>
                            <div class="dropdown-divider"></div>

                           
                            <a href="<?= base_url('auth/logout') ?>" class="dropdown-item notify-item">
                                <i class="fe-log-out"></i>
                                <span>Logout</span>
                            </a>

                        </div>
                    </li>
               </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="<?php echo site_url() ?>dashboard" class="logo text-center">
                        <span class="logo-lg">
                            <img src="<?= base_url('templates/') ?>assets/images/logo-white.png" alt="" height="38">
                            <!-- <span class="logo-lg-text-light">UBold</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-sm-text-dark">U</span> -->
                            <img src="<?= base_url('templates/') ?>assets/images/logo-sm1.png" alt="" height="15">
                        </span>
                    </a>
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="fe-menu"></i>
                        </button>
                    </li>
               </ul>
            </div>
            <!-- end Topbar -->

            
            <?php $this->load->view('templates/includes/sidebar') ?>
            
            <?php echo $contents ?>
