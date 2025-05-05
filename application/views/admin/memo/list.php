<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0);">Master</a>
                    </li>
                    <li class="breadcrumb-item active">memo</li>
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
                            <th>No Memo</th>
                            <th>Tanggal</th>
                            <th>Perihal</th>        
                            <th>Deskripsi</th>        
                            <th>Status</th>        
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

<!-- Modal untuk Tambah / Edit memo -->
<?php $this->load->view('admin/memo/list_modal') ?>

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
                url: "<?= site_url('memo/ajax_list') ?>",
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

    // Fungsi untuk membuka modal Create memo
    function add() {
        save_method = 'add';
        $('#form')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $('#modal_form').modal('show');
        $('.modal-title').text('Create memo').addClass('text-white');
        $('.id_memo').hide();
        $('[name="addno_memo"]').val('').attr('readonly', 'readonly');
        $('[name="addtgl_memo"]').val('');
        $('[name="addperihal"]').val('');

        // Panggil fungsi loadIdMemo saat modal dibuka
        loadIdMemo();

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

    // Fungsi untuk menyimpan data memo
    function save() {
        $('#btnSave').text('Saving...').attr('disabled', true);

        let url = save_method === 'add' ? "<?php echo site_url('memo/insert') ?>" : "<?php echo site_url('memo/update') ?>";

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


    // Fungsi untuk menghapus data memo
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
                    url: "<?= site_url('memo/delete') ?>",
                    type: "POST",
                    data: { id_memo: id },
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

    // Fungsi untuk mengedit data memo
    function update(id_memo) {
        save_method = 'update';
        $('#form')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $('.id_memo').hide();

        $.ajax({
            url: "<?= site_url('memo/get_by_id') ?>/" + id_memo,
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $('[name="id_memo"]').val(data.id_memo);
                $('[name="addno_memo"]').val(data.no_memo).attr('readonly', 'readonly');
                $('[name="addtgl_memo"]').val(data.tgl_memo);
                $('[name="addperihal"]').val(data.perihal);
                $('[name="adddeskripsi"]').val(data.deskripsi);
                $('[name="addstatus"]').val(data.status);
                $('#modal_form').modal('show');
                $('.modal-title').text('Update memo').addClass('text-white');
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

    // Fungsi loadIdMemo untuk memanggil id_memo otomatis dari server
    function loadIdMemo() {
        $.ajax({
            url: '<?= base_url("memo/getIdMemo") ?>',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                $('#addno_memo').val(response.id_memo);
            },
            error: function() {
                Swal.fire('Gagal', 'Gagal mengambil ID Memo!', 'error');
            }
        });
    }
</script>

</body>
</html>
