<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0);">Master</a>
                    </li>
                    <li class="breadcrumb-item active">unitkerja</li>
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
                <table id="table" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%;">

                    <thead>
                        <tr>
                            <th width="2%">No</th>
                            <th class="text-center" width="8%">Action</th>                            
                            <th>Nama</th>
                            <th>Kontak</th>
                        </tr>
                    </thead>

                    <tbody>
                        <!-- Data table rows will be populated here by DataTables -->
                    </tbody>

                </table>
            </div>
            
        </div>
        
    </div>
</div>

<!-- Modal untuk Tambah / Edit unitkerja -->
<?php $this->load->view('admin/unitkerja/list_modal') ?>

<?php $this->load->view('templates/includes/footer') ?>

<script type="text/javascript">
    var save_method;
    var table;

    $(document).ready(function () {
        // Initialize DataTable
        table = $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "<?= site_url('unitkerja/ajax_list') ?>",
                type: "POST"
            },
            columnDefs: [
                {
                    targets: [0, 1],
                    orderable: false
                }
            ]
        });
    });

    // Fungsi untuk membuka modal Create unitkerja
    function add() {
        save_method = 'add';
        $('#form')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $('#modal_form').modal('show');
        $('.modal-title').text('Create unitkerja').addClass('text-white');
        $('.id_unit').hide();
        $('[name="addnm_unit"]').val('');
        $('[name="addkontak"]').val('');
        $('[name="addperihal"]').val('');
    }

    // Fungsi untuk me-reload DataTable
    function reload_table() {
        table.ajax.reload(null, false);
    }


    $('.datepicker').datepicker({
                        autoclose: true,
                        format: "yyyy-mm-dd",
                        todayHighlight: true,
                        orientation: "auto",
                        locale: "id",
                    });

    // Fungsi untuk menyimpan data unitkerja
    function save() {
        $('#btnSave').text('Saving...').attr('disabled', true);

        let url = save_method === 'add' ? "<?php echo site_url('unitkerja/insert') ?>" : "<?php echo site_url('unitkerja/update') ?>";

        $.ajax({
            url: url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data) {
                if (data.status) {
                    $('#modal_form').modal('hide');
                    reload_table();
                    Swal.fire('Berhasil', 'Data berhasil disimpan!', 'success');
                } else {
                    if (data.error_string) {
                        for (let i = 0; i < data.inputerror.length; i++) {
                            $('#' + data.inputerror[i]).addClass('is-invalid');
                            $('#error_' + data.inputerror[i]).html(data.error_string[i]);
                        }
                    } else {
                        Swal.fire('Gagal', data.error || 'Terjadi kesalahan saat menyimpan data', 'error');
                    }
                }
                $('#btnSave').text('Save').attr('disabled', false);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                Swal.fire('Error', 'Terjadi error: ' + errorThrown, 'error');
                $('#btnSave').text('Save').attr('disabled', false);
            }
        });
    }

    $('#form input, #form select, #form textarea').on('input change', function () {
        $(this).removeClass('is-invalid');
        $('#error_' + this.id).html('');
    });


    // Fungsi untuk menghapus data unitkerja
    function deletedata(id) {
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
                $.ajax({
                    url: "<?= site_url('unitkerja/delete') ?>",
                    type: "POST",
                    data: { id_unit: id },
                    dataType: 'json',
                    success: function (response) {
                        if (response.status === true) {
                            reload_table();
                            showToast("Data berhasil dihapus", 'Success', 'success', 'bottom-right');
                        } else {
                            showToast("Data gagal dihapus", 'Error', 'error');
                        }
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                reload_table();
                showToast("Data batal dihapus", 'Note', 'info', 'bottom-left');
            }
        });
    }

    // Fungsi untuk mengedit data unitkerja
    function update(id_unit) {
        save_method = 'update';
        $('#form')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $('.id_unit').hide();

        $.ajax({
            url: "<?= site_url('unitkerja/get_by_id') ?>/" + id_unit,
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $('[name="id_unit"]').val(data.id_unit);
                $('[name="addnm_unit"]').val(data.nm_unit);
                $('[name="addkontak"]').val(data.kontak);
                $('#modal_form').modal('show');
                $('.modal-title').text('Update unitkerja').addClass('text-white');
            },
            error: function () {
                alert('Gagal mengambil data dari server.');
            }
        });
    }

    // Fungsi untuk menampilkan toast
    function showToast(text, heading, icon, position = 'top-right') {
        $.toast({
            text,
            heading,
            icon,
            showHideTransition: 'fade',
            allowToastClose: false,
            hideAfter: 3000,
            stack: 5,
            position,
            textAlign: 'left'
        });
    }
</script>

</body>
</html>
