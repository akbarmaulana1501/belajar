<!-- ===== Breadcrumb & Header ===== -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                    <li class="breadcrumb-item active">Insident Report</li>
                </ol>
            </div>
            <?= $TombolCreate ?>
        </div>
    </div>
</div>

<!-- ===== Data Table Section ===== -->
<div class="row">
    <div class="col-12">
        <div class="card card-border">
            <div class="card-header border-primary">
                <h5 class="mb-0">Data Insident Report</h5>
            </div>
            <div class="card-body table-responsive">
                <table id="table" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%;">
                    <thead>
                        <tr>
                            <th width="2%">No</th>
                            <th class="text-center" width="8%">Action</th>
                            <th>Tanggal</th>
                            <th>Identifikasi</th>
                            <th>Solusi</th>
                            <th>Rekomendasi</th>
                            <th>Hasil Perbaikan</th>
                            <th>Teknisi</th>
                            <th>ID Tiket</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- ===== Modal Section (Form insident_report) ===== -->
<?php $this->load->view('admin/insident_report/list_modal') ?>
<?php $this->load->view('templates/includes/footer') ?>

<script type="text/javascript">
    // Cegah input non-numeric di tanggal
    document.getElementById("addtgl_insident").addEventListener("keypress", function (e) {
        const allowedChars = "0123456789/";
        const key = String.fromCharCode(e.which);
        if (!allowedChars.includes(key)) e.preventDefault();
    });

    let save_method, table;
    const pathUrl = "<?= base_url() . $fileName; ?>";

    $(document).ready(function () {
        initDataTable();
        initDatePicker();
        initTeknisi();
        initUnitTiket();
        initFormResetHandler();
    });

    // Init Dropdown
    function initTeknisi(selectedId = null) {
        $.getJSON(`${pathUrl}/get_teknisi`, function(res) {
            let options = '<option value="">Pilih Teknisi</option>';
            res.datas.forEach(teknisi => {
                const selected = (selectedId == teknisi.id_teknisi) ? 'selected' : '';
                options += `<option value="${teknisi.id_teknisi}" ${selected}>${teknisi.nm_teknisi}</option>`;
            });
            $('#addid_teknisi').html(options).trigger('change');
        });
    }

    function initUnitTiket(selectedId = null) {
        $.getJSON(`${pathUrl}/get_tiket`, function(res) {
            let options = '<option value="">Pilih Tiket</option>';
            res.datas.forEach(tiket => {
                const selected = (selectedId == tiket.id_tiket) ? 'selected' : '';
                options += `<option value="${tiket.id_tiket}" ${selected}>${tiket.id_tiket}</option>`;
            });
            $('#addid_tiket').html(options).trigger('change');
        });
    }
    
    // Init DataTable
    function initDataTable() {
        table = $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "<?= site_url('insident_report/ajax_list') ?>",
                type: "POST"
            },
            columnDefs: [{ targets: [0, 1], orderable: false }]
        });
    }

    function initDatePicker() {
        $('.datepicker').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            todayHighlight: true,
            orientation: "auto",
            locale: "id"
        });
    }

    function initFormResetHandler() {
        $('#form input, #form select, #form textarea').on('input change', function () {
            $(this).removeClass('is-invalid');
            $('#error_' + this.id).html('');
        });
    }

    function reload_table() {
        table.ajax.reload(null, false);
    }

    function loadIdinsident_report() {
        $.getJSON('<?= base_url("insident_report/getIdinsident_report") ?>', function(res) {
            $('#addid_insident_report').val(res.id_insident_report);
        }).fail(function() {
            Swal.fire('Gagal', 'Gagal mengambil ID Insident Report!', 'error');
        });
    }

    // Modal Add
    function add() {
        save_method = 'add';
        $('#form')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $('.id_insident_report').hide();

        $('#modal_form').modal('show');
        $('.modal-title').text('Create Insident Report').addClass('text-white');

        $('[name="addid_insident_report"]').val('').prop('readonly', true);
        $('[name="addtgl_insident"]').val('');
        $('[name="addidentifikasi"]').val('');
        $('[name="addsolusi"]').val('');
        $('[name="addrekomendasi"]').val('');
        $('[name="addhasilperbaikan"]').val('');
        $('[name="addid_teknisi"], [name="addid_tiket"], [name="addno_ttb"]').val(null).trigger('change');

        loadIdinsident_report();
        initTeknisi();
        initUnitTiket();    }

    function save() {
        $('#btnSave').text('Saving...').attr('disabled', true);
        const url = save_method === 'add'
            ? "<?= site_url('insident_report/insert') ?>"
            : "<?= site_url('insident_report/update') ?>";

        $.post(url, $('#form').serialize(), function(response) {
            if (response.status) {
                $('#modal_form').modal('hide');
                reload_table();
                Swal.fire('Berhasil', 'Data berhasil disimpan!', 'success');
            } else {
                handleFormErrors(response);
            }
        }, 'json').fail(function(xhr, status, error) {
            Swal.fire('Error', 'Terjadi error: ' + error, 'error');
        }).always(function() {
            $('#btnSave').text('Save').attr('disabled', false);
        });
    }

    function handleFormErrors(data) {
        if (data.inputerror && data.error_string) {
            data.inputerror.forEach((id, i) => {
                $('#' + id).addClass('is-invalid');
                $('#error_' + id).html(data.error_string[i]);
            });
        } else {
            Swal.fire('Gagal', data.error || 'Terjadi kesalahan saat menyimpan data', 'error');
        }
    }

    function update(id) {
        save_method = 'update';
        $('#form')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();

        $.getJSON("<?= site_url('insident_report/get_by_id') ?>/" + id, function(data) {
            $('[name="addid_insident_report"]').val(data.id_insident_report);
            $('[name="addtgl_insident"]').val(data.tgl_insident);
            $('[name="addidentifikasi"]').val(data.identifikasi);
            $('[name="addsolusi"]').val(data.solusi);
            $('[name="addrekomendasi"]').val(data.rekomendasi);
            $('[name="addhasilperbaikan"]').val(data.hasilperbaikan);

            initTeknisi(data.id_teknisi);
            initUnitTiket(data.id_tiket);

            $('#modal_form').modal('show');
            $('.modal-title').text('Update Insident Report').addClass('text-white');
        }).fail(function() {
            Swal.fire('Gagal', 'Gagal mengambil data dari server.', 'error');
        });
    }


    // Fungsi untuk menghapus data teknisi
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
                    url: "<?= site_url('insident_report/delete') ?>",
                    type: "POST",
                    data: { id_insident_report: id },
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

    function showToast(text, heading, icon, position = 'top-right') {
        $.toast({
            text,
            heading,
            icon,
            showHideTransition: 'fade',
            allowToastClose: true,
            hideAfter: 3000,
            stack: 5,
            position,
            textAlign: 'left'
        });
    }
</script>
</body>
</html>
