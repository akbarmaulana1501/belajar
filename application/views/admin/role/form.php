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
                                    <h4 class="page-title"><a href="<?php echo base_url() ?>role" class="btn btn-info waves-effect waves-light width-xs" role="button" aria-disabled="true"><i class="fe-arrow-left"></i> <?php echo $m ?></a></h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card card-border">
                                    <div class="card-header border-primary pb-0">
                                        <h4 class="card-title text-primary mb-0"><?php echo ucwords($this->uri->segment('2')).' '.ucwords($m) ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="<?php echo $action ?>" method="POST">
                                            <div class="form-group">
                                                <label for="userName">Role<span class="text-danger">*</span></label>
                                                <input type="text" name="role" parsley-trigger="change" required
                                                        placeholder="Enter Role" class="form-control col-lg-5" id="role">
                                            </div>
                                            <div class="form-group col-lg-5">
                                                <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                                                    <i class="fe-save"> </i> Save
                                                </button>
                                                <button type="reset" class="btn btn-secondary waves-effect">
                                                    Reset
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>  
                            
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->
