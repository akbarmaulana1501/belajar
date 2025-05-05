<!-- ===== Breadcrumb & Header ===== -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                    <li class="breadcrumb-item active">Tiket</li>
                </ol>
            </div>
            <?= $TombolCreate ?>
        </div>
    </div>
</div>

<!-- ===== Data Table Section ===== -->
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
                            <th>Tanggal</th>
                            <th>Masalah</th>
                            <th>Status</th>
                            <th>User</th>
                            <th>Unit</th>
                        </tr>
                    </thead>
                    <tbody></tbody> <!-- Data populated via DataTable -->
                </table>
            </div>
        </div>
    </div>
</div>

<!-- ===== Modal Section (Form Tiket) ===== -->
<?php $this->load->view('admin/tiket/list_modal') ?>
<?php $this->load->view('templates/includes/footer') ?>

<script type="text/javascript">
    document.getElementById("addtgl_tiket").addEventListener("keypress", function (e) {
    const allowedChars = "0123456789/";
    const key = String.fromCharCode(e.which);
    if (!allowedChars.includes(key)) {
        e.preventDefault();
    }
});

    let save_method, table;
    const pathUrl = "<?= base_url() . $fileName; ?>";

    $(document).ready(function () {
        initDataTable();
        initDatePicker();
        initUnitDropdown();
        initFormResetHandler();
    });

    // === Init DataTable ===
    function initDataTable() {
        table = $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "<?= site_url('tiket/ajax_list') ?>",
                type: "POST"
            },
            columnDefs: [{ targets: [0, 1], orderable: false }]
        });
    }

    // === Init Datepicker ===
    function initDatePicker() {
        $('.datepicker').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            todayHighlight: true,
            orientation: "auto",
            locale: "id"
        });
    }

    // === Load dropdown unit (default) ===
    function initUnitDropdown() {
        loadUnit();
    }

    // === Reset error styling on input change ===
    function initFormResetHandler() {
        $('#form input, #form select, #form textarea').on('input change', function () {
            $(this).removeClass('is-invalid');
            $('#error_' + this.id).html('');
        });
    }

    // === Load Unit with optional selected ID ===
    function loadUnit(selectedId = null) {
        $.ajax({
            url: `${pathUrl}/get_unit`,
            method: "GET",
            dataType: "json",
            success: function(res) {
                let options = '<option value="">Pilih</option>';
                res.forEach(unit => {
                    const selected = selectedId == unit.id_unit ? 'selected' : '';
                    options += `<option value="${unit.id_unit}" ${selected}>${unit.nm_unit}</option>`;
                });
                $('#addid_unit').html(options).trigger('change');
            }
        });
    }

    // === Open modal to add Tiket ===
    function add() {
        save_method = 'add';
        $('#form')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $('.id_tiket').hide();

        $('#modal_form').modal('show');
        $('.modal-title').text('Create Tiket').addClass('text-white');

        $('[name="addno_tiket"]').val('').attr('readonly', 'readonly');
        $('[name="addtgl_tiket"]').val('');
        $('[name="addperihal"]').val('');

        loadIdtiket();
        loadUnit(); // reset ke kosong
    }

    // === Save Tiket (add/update) ===
    function save() {
        $('#btnSave').text('Saving...').attr('disabled', true);
        const url = save_method === 'add' ? "<?= site_url('tiket/insert') ?>" : "<?= site_url('tiket/update') ?>";

        $.ajax({
            url: url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response.status) {
                    $('#modal_form').modal('hide');
                    reload_table();
                    Swal.fire('Berhasil', 'Data berhasil disimpan!', 'success');
                } else {
                    handleFormErrors(response);
                }
                $('#btnSave').text('Save').attr('disabled', false);
            },
            error: function (xhr, status, error) {
                Swal.fire('Error', 'Terjadi error: ' + error, 'error');
                $('#btnSave').text('Save').attr('disabled', false);
            }
        });
    }

    // === Handle form error responses ===
    function handleFormErrors(data) {
        if (data.error_string) {
            data.inputerror.forEach((id, i) => {
                $('#' + id).addClass('is-invalid');
                $('#error_' + id).html(data.error_string[i]);
            });
        } else {
            Swal.fire('Gagal', data.error || 'Terjadi kesalahan saat menyimpan data', 'error');
        }
    }

    // === Update Tiket ===
    function update(id_tiket) {
        save_method = 'update';
        $('#form')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $('.id_tiket').hide();

        $.ajax({
            url: "<?= site_url('tiket/get_by_id') ?>/" + id_tiket,
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $('[name="id_tiket"]').val(data.id_tiket);
                $('[name="addtgl_tiket"]').val(data.tgl_tiket);
                $('[name="addmasalah"]').val(data.masalah);

                loadUnit(data.id_unit); // load dan pilihkan
                $('#modal_form').modal('show');
                $('.modal-title').text('Update Tiket').addClass('text-white');
            },
            error: function () {
                Swal.fire('Gagal', 'Gagal mengambil data dari server.', 'error');
            }
        });
    }

    // === Reload DataTable ===
    function reload_table() {
        table.ajax.reload(null, false);
    }

    // === Delete Tiket ===
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
                    url: "<?= site_url('tiket/delete') ?>",
                    type: "POST",
                    data: { id_tiket: id },
                    dataType: 'json',
                    success: function (response) {
                        if (response.status) {
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

    // === Load ID Tiket otomatis ===
    function loadIdtiket() {
        $.ajax({
            url: '<?= base_url("tiket/getIdtiket") ?>',
            method: 'GET',
            dataType: 'json',
            success: function(res) {
                $('#addno_tiket').val(res.id_tiket);
            },
            error: function() {
                Swal.fire('Gagal', 'Gagal mengambil ID tiket!', 'error');
            }
        });
    }

    // === Toast Message ===
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
