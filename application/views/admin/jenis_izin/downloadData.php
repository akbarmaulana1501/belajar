<table id="table" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Jenis Izin</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<script type="text/javascript">
    var table;

    $(document).ready(function() {
        //datatables
        table = $('#table').DataTable({
            "processing": true, 
            "serverSide": true, 
            "order": [],

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('jenis_izin/downloadDataC')?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [
                { 
                    "targets": [ -1 ], //last column
                    "orderable": false, //set not orderable
                },
            ],

        });
    });
</script>