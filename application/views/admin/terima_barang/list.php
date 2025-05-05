<!-- ===== Breadcrumb & Header ===== -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                    <li class="breadcrumb-item active">Terima Barang</li>
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
                            <th>No Tanda Terima</th>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th>Barang</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('admin/terima_barang/list_modal') ?>
<?php $this->load->view('templates/includes/footer') ?>
<script>
$(document).ready(function () {
    // Saat modal dibuka, inisialisasi select barang awal
    $('#modal_form').on('shown.bs.modal', function () {
        loadbarang($('.barang-select')); // Updated to call the unified function
    });

    // Tambah baris baru
    $('#addRow').click(function () {
        var newRow = `
            <tr>
                <td style="width: 70%;">
                    <select name="id_barang[]" class="form-control select2 barang-select" required>
                        <option value="">Pilih</option>
                    </select>
                </td>
                <td style="width: 30%;">
                    <input type="number" name="jumlah[]" class="form-control"  value="1" min="1" required>
                </td>
                <td style="white-space: nowrap;">
                    <button type="button" class="btn btn-sm btn-danger removeRow"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
        `;
        $('#table-barang tbody').append(newRow);

        // Re-init Select2
        $('#table-barang tbody tr:last .barang-select').select2();

        // Load ulang data barang ke select baru
        updateSelectOptions();
    });

    // Hapus baris
    $('#table-barang').on('click', '.removeRow', function () {
        $(this).closest('tr').remove();
        updateSelectOptions();
    });

    // Event jika ada select barang yang berubah
    $('#table-barang').on('change', '.barang-select', function () {
        updateSelectOptions();
    });

    // Fungsi untuk load data barang via AJAX (fungsi yang digabungkan)
    function loadbarang(selectElement) {
        $.ajax({
            url: '<?= site_url("terima_barang/get_barang") ?>',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                window.barangData = data; // simpan untuk digunakan ulang
                updateSelectOptions(selectElement); // Isi semua select
            },
            error: function () {
                alert('Gagal memuat data barang');
            }
        });
    }

    // Update semua dropdown barang berdasarkan yang sudah dipilih
    function updateSelectOptions() {
        var selectedValues = [];

        // Ambil semua nilai yang sedang dipilih
        $('.barang-select').each(function () {
            var val = $(this).val();
            if (val) selectedValues.push(val);
        });

        // Hitung total barang tersedia dari data
        var totalBarang = window.barangData ? window.barangData.length : 0;

        // Perbarui semua select
        $('.barang-select').each(function () {
            var currentVal = $(this).val();
            var select = $(this);

            select.empty().append('<option value="">Pilih</option>');

            $.each(window.barangData, function (i, item) {
                if (!selectedValues.includes(item.id_barang) || item.id_barang === currentVal) {
                    select.append(`<option value="${item.id_barang}">${item.nm_barang}</option>`);
                }
            });

            // Kembalikan pilihan yang sebelumnya
            select.val(currentVal).trigger('change.select2');
        });

        // Jika semua barang sudah dipilih, nonaktifkan tombol tambah
        if (selectedValues.length >= totalBarang) {
            $('#addRow').prop('disabled', true).attr('title', 'Semua barang telah dipilih');
        } else {
            $('#addRow').prop('disabled', false).removeAttr('title');
        }
    }
});
</script>




<script type="text/javascript">
    document.getElementById("addtgl").addEventListener("keypress", function (e) {
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
        initFormResetHandler();
    });

    function initDataTable() {
        table = $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "<?= site_url('terima_barang/ajax_list') ?>",
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

    // Dropdown insident_report
    function initInsidenReport(selectedId = null) {
        $.getJSON(`${pathUrl}/get_insident_report`, function(res) {
            let options = '<option value="">Pilih ID Insdent Report</option>';

            if (res && Array.isArray(res.datas)) {
                res.datas.forEach(insident_report => {
                    const selected = (selectedId == insident_report.id_insident_report) ? 'selected' : '';
                    options += `<option value="${insident_report.id_insident_report}" ${selected}>${insident_report.id_insident_report}</option>`;
                });
            } else {
                options += '<option value="">tidak tersedia</option>';
            }

            $('#addid_insident_report').html(options).trigger('change');
        }).fail(function() {
            const fallback = '<option value="">Gagal memuat data</option>';
            $('#addid_insident_report').html(fallback).trigger('change');
        });
    }


        // Auto get detail insident_report by dropdown selection
        $('#addid_insident_report').on('change', function () {
            const selectedId = $(this).val();

            if (selectedId) {
                $.getJSON(`${pathUrl}/get_insident_report_by_id/${selectedId}`, function(data) {
                    if (data) {
                        $('#table-insident-report tbody').html(`
                            <tr>
                                <td>${data.tgl_insident || '-'}</td>
                                <td>${data.identifikasi || '-'}</td>
                                <td>${data.solusi || '-'}</td>
                                <td>${data.rekomendasi || '-'}</td>
                                <td>${data.hasilperbaikan || '-'}</td>
                                <td>${data.nm_teknisi || '-'}</td>
                                <td>${data.id_tiket || '-'}</td>
                            </tr>
                        `);
                    }
                }).fail(function() {
                    $('#table-insident-report tbody').html('<tr><td colspan="8">Gagal memuat detail insident report.</td></tr>');
                });
            } else {
                $('#table-insident-report tbody').html('<tr><td colspan="8">Silakan pilih Insident Report terlebih dahulu.</td></tr>');
            }
        });


    function loadbarang(selectedId = null) {
        $.ajax({
            url: `${pathUrl}/get_barang`,
            method: "GET",
            dataType: "json",
            success: function(res) {
                let options = '<option value="">Pilih</option>';
                res.forEach(barang => {
                    const selected = selectedId == barang.id_barang ? 'selected' : '';
                    options += `<option value="${barang.id_barang}" ${selected}>${barang.nm_barang}</option>`;
                });
                $('#addid_barang').html(options).trigger('change');
            },
            error: function() {
                Swal.fire('Gagal', 'Gagal mengambil data barang kerja!', 'error');
            }
        });
    }

    function add() {
        save_method = 'add';
        $('#form')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $('.no_ttb').hide();

        $('#modal_form').modal('show');
        $('.modal-title').text('Create Terima Barang').addClass('text-white');

        $('[name="no_ttb"]').val('');
        $('[name="addtgl"]').val('');
        $('[name="addket"]').val('');

        initInsidenReport()
        loadIdterima_barang();
    }

    function save() {
        $('#btnSave').text('Saving...').attr('disabled', true);

        // Menangkap nilai dari form
        const no_ttb = $('[name="no_ttb"]').val();
        const addtgl = $('[name="addtgl"]').val();
        const addket = $('[name="addket"]').val();
        const addid_insident_report = $('[name="addid_insident_report"]').val();

        // Menangkap barang dan jumlah yang dipilih
        const barangIds = [];
        const jumlahs = [];
        $('#table-barang tbody tr').each(function () {
            const id_barang = $(this).find('.barang-select').val();
            const jumlah = $(this).find('input[name="jumlah[]"]').val();
            
            if (id_barang && jumlah) {
                barangIds.push(id_barang);
                jumlahs.push(jumlah);
            }
        });

        // Siapkan data untuk dikirim
        const data = {
            no_ttb: no_ttb,
            addtgl: addtgl,
            addket: addket,
            addid_insident_report: addid_insident_report,
            barang: barangIds.map((id, index) => ({
                id_barang: id,
                jumlah: jumlahs[index]
            }))
        };

        // Kirim data ke server
        const url = save_method === 'add' ? "<?= site_url('terima_barang/insert') ?>" : "<?= site_url('terima_barang/update') ?>";

        $.ajax({
            url: url,
            type: "POST",
            data: data,
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
            error: function(xhr, status, error) {
                Swal.fire('Error', 'Terjadi error: ' + error, 'error');
                $('#btnSave').text('Save').attr('disabled', false);
            }
        });
    }


   function handleFormErrors(data) {
        // Clear previous error states
        $('#form input, #form select, #form textarea').removeClass('is-invalid');
        $('#form .help-block').html('');

        if (data.error_string) {
            // Handle errors for each field
            data.inputerror.forEach((id, i) => {
                // Highlight the invalid field
                $('#' + id).addClass('is-invalid');
                // Display the corresponding error message
                $('#error_' + id).html(data.error_string[i]);
            });
        } else {
            // If no error strings, show a generic error
            Swal.fire('Gagal', data.error || 'Terjadi kesalahan saat menyimpan data', 'error');
        }

        // Handle errors for dynamic fields (barang) separately if needed
        if (data.inputerror && data.inputerror.includes('barang')) {
            Swal.fire('Gagal', 'Beberapa barang tidak valid atau tidak dipilih dengan benar!', 'error');
        }
    }


    function reload_table() {
        table.ajax.reload(null, false);
    }

    function deletedata(id) {
        Swal.fire({
            title: 'Apa kamu yakin?',
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "<?= site_url('terima_barang/delete') ?>",
                    type: "POST",
                    data: { no_ttb: id },
                    dataType: 'json',
                    success: function (response) {
                        if (response.status) {
                            reload_table();
                            showToast("Data berhasil dihapus", 'Success', 'success');
                        } else {
                            showToast("Data gagal dihapus", 'Error', 'error');
                        }
                    }
                });
            }
        });
    }

    function loadIdterima_barang() {
        $.ajax({
            url: '<?= base_url("terima_barang/getIdterima_barang") ?>',
            method: 'GET',
            dataType: 'json',
            success: function(res) {
                $('#no_ttb').val(res.no_ttb);
            },
            error: function() {
                Swal.fire('Gagal', 'Gagal mengambil ID terima_barang!', 'error');
            }
        });
    }

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

    function terima(id, status) {
        if (status === 'sudah') {
            Swal.fire({
                icon: 'info',
                title: 'Sudah Diterima',
                text: 'Barang ini sudah diterima sebelumnya.',
                confirmButtonText: 'OK'
            });
            return;
        }

        Swal.fire({
            title: 'Konfirmasi Terima Barang',
            text: "Apakah Anda yakin ingin menerima barang ini?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya, Terima',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: '<?= base_url("terima_barang/terima") ?>',
                    type: 'POST',
                    data: { id: id },
                    success: function(response) {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: 'Barang telah diterima.',
                            icon: 'success',
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            reload_table(); // Pastikan ini fungsi DataTables reload
                        });
                    },
                    error: function() {
                        Swal.fire('Gagal', 'Terjadi kesalahan saat memproses.', 'error');
                    }
                });
            }
        });
    }

</script>
