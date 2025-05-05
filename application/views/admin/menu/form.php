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
                                    <h4 class="page-title"><a href="<?php echo base_url() ?>menu" class="btn btn-info waves-effect waves-light width-xs" role="button" aria-disabled="true"><i class="fe-arrow-left"></i> <?php echo $m ?></a></h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card card-border">
                                    <div class="card-header border-primary pb-0">
                                        <h4 class="card-title text-primary mb-0"><?php echo ucwords($this->uri->segment('2')).' '.$m ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="<?php echo $action ?>" method="POST">
                                            <div class="form-group">
                                                <label for="userName">ID Group<span class="text-danger">*</span></label>
                                                <input type="text" name="id_group" parsley-trigger="change" required
                                                        placeholder="Enter ID Group" class="form-control col-lg-5" id="id_group">
                                            </div>
                                            <div class="form-group">
                                                <label for="userName">Title<span class="text-danger">*</span></label>
                                                <input type="text" name="title" parsley-trigger="change" required
                                                        placeholder="Enter Title" class="form-control col-lg-5" id="title">
                                            </div>
                                            <div class="form-group">
                                                <label for="userName">Ur<span class="text-danger">*</span></label>
                                                <input type="text" name="url" parsley-trigger="change" required
                                                        placeholder="Enter Ur" class="form-control col-lg-5" id="url">
                                            </div>
                                            <div class="form-group">
                                                <label for="userName">Icon<span class="text-danger">*</span></label>
                                                <input type="text" name="icon" parsley-trigger="change" required
                                                        placeholder="Enter Icon" class="form-control col-lg-5" id="icon">
                                            </div>
                                            <div class="form-group">
                                                <label for="userName">Parent<span class="text-danger">*</span></label>
                                                <input type="text" name="is_main_menu" parsley-trigger="change" required
                                                        placeholder="Enter is_main_menu" class="form-control col-lg-5" id="is_main_menu">
                                            </div>
                                            <div class="form-group">
                                                <label for="userName">Active<span class="text-danger">*</span></label>
                                                <input type="text" name="is_aktif" parsley-trigger="change" required
                                                        placeholder="Enter is_aktif" class="form-control col-lg-5" id="is_aktif">
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

<!--                 <script type="text/javascript">
                    $(document).ready(function() {
                        $("#title").on("input", function(e) {
                            $('#msg').hide();
                            if ($('#title').val() == null || $('#title').val() == "") {
                                $('#msg').show();
                                $("#msg").html("title is required field.").css("color", "red");
                            } else {
                                $.ajax({
                                    type: "POST",
                                    url: "http://localhost/sample/menu/get_title",
                                    data: $('#signupform').serialize(),
                                    dataType: "html",
                                    cache: false,
                                    success: function(msg) {
                                        $('#msg').show();
                                        $("#msg").html(msg);
                                    },
                                    error: function(jqXHR, textStatus, errorThrown) {
                                        $('#msg').show();
                                        $("#msg").html(textStatus + " " + errorThrown);
                                    }
                                });
                            }
                        });
                    });
                </script> -->