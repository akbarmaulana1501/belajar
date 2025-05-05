
<script>
var table;
$(document).ready(function() {
    table = $('#table').DataTable({
        "dom": 'Bfrtip', 
        "lengthMenu": [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        "buttons":  [
                        'pageLength',   
                        {
                            extend: 'excel',
                            text: '<i class="fas fa-file-export"></i> Excel Export',
                            exportOptions: {
                                modifier: {
                                        order : 'current',  
                                        page : 'all',    
                                        search : 'none' 
                                }
                            }
                        },
                    ],
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?= site_url('Approve_izin/ajax_list') ?>",
            "type": "POST",
            "data": function ( data ) {
                        data.start_date = $('#start_date').val();
                        data.end_date = $('#end_date').val();
                        data.status = $('#filter_status').val();
                    }
        },

        //Set column definition initialisation properties.
        "columnDefs": [{
                "targets": [-1], //last column
                "orderable": false, //set not orderable
            },
            {
                "targets": [-2], //2 last column (image)
                "orderable": false, //set not orderable
            },
        ],

    });

    $('#btn-filter').click(function() { 
        table.ajax.reload(); 

        var x = document.getElementById("button_reset");
        if ($('#start_date').val() !=='' && $('#end_date').val() !=='') {
            x.style.visibility = 'visible'; //show
         } else if ($('#filter_status').val() !=='') {
             x.style.visibility = 'visible'; //show
         } else if ($('#start_date').val() ==='' && $('#end_date').val() ==='') {
             x.style.visibility = 'hidden'; //hide
         } else if ($('#filter_status').val() ==='') {
             x.style.visibility = 'hidden'; //hide
         } 
    });

    $('#reset').click(function() { 

        $('#start_date').val('');
        $('#end_date').val('');
        $('#filter_status').val('').trigger('change');
         table.ajax.reload();  
    });

    $('#reload').click(function() { 
        table.ajax.reload(); 
    });

    $('#filter').click(function() { 
        var x = document.getElementById("button_reset");
            x.style.visibility = 'hidden'; //hide
        
    });

    //datepicker
    // $('.datepicker').datepicker({ dayNames: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Ming'] });
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "auto",
        locale: "id",
    });

    $('.input-daterange').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "auto",
        locale: "id",
    });


});


function reload_table() {
    $('#start_date').val('');
    $('#end_date').val('');
    $('#filter_status').val('').trigger('change');
    table.ajax.reload(null, false); //reload datatable ajax 
}


function approve(params,paramsDua){
    $.ajax({
        type: "POST",
        url: "<?= base_url("Approve_izin/getDataModal"); ?>",
        data: {
            idp:params,
            idizin:paramsDua
        },
        dataType: "json",
        success: function (res) {
            if(res.status == 1){
                $('#idapp').val(paramsDua);
                $("#idp").val(params);
                $("#nik_app").val(res.data[0].nik);
                $("#nama_app").val(res.data[0].nama);
                $("#unit_level_app").val(res.data[0].nm_unit_level);
                $("#unit_kerja_app").val(res.data[0].nm_unit_kerja);
                $("#unit_organisasi_app").val(res.data[0].nm_unit_organisasi);
                $("#nm_jenis_izin").val(res.data[0].nm_jenis_izin);
                $("#lama_izin").val(res.data[0].lama+" Hari");
                $("#status").val(res.data[0].status);
                $("#catatan_app").val(res.data[0].keterangan);
            }
        },
        complete:function(){
            $("#modal_approve").modal('show');
        }
    });
    return false;
}
$(document).on('hidden.bs.modal', '#modal_approve', function() {
    $('#status').val(null).trigger('change');
});


function simpan_approve() {
    var Postdata = new FormData(document.getElementById("formApp"));

    Swal.fire({
        title: 'Apakah ingin menyetujui?',
        //text: "Anda tidak akan dapat mengembalikan ini!",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#348cd4',
        cancelButtonColor: '#f7531f',
        confirmButtonText: 'Ya, Setujui!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "<?= base_url("approve_izin/approve") ?>",
                type: "POST",
                data: Postdata,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(respone) {
                    if (respone.status === 1) {
                        $('#modal_approve').modal('hide');
                        reload_table();
                        $.toast({
                            text: "Berhasil disetujui",
                            heading: 'Success',
                            icon: 'success',
                            showHideTransition: 'fade',
                            allowToastClose: false,
                            hideAfter: 3000,
                            stack: 5,
                            position: 'bottom-right',
                            textAlign: 'left',
                            // loader: true, 
                            // bgColor: '#0040e0',
                        });
                    } else {
                        for (var i = 0; i < data.inputerror.length; i++) 
                        {
                            
                            $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); 
                            //select parent twice to select div form-group class and add has-error class
                            
                            $('[name="'+data.inputerror[i]+'"]').next().next().text(data.error_string[i]); 
                            //select span help-block class set text error string
                            
                        }
                    }
                    $('#btnSave').html('<i class="fe-save"> </i> Save'); //change button text
                    $('#btnSave').attr('disabled',false); //set button enable 
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('error');
                    $('#btnSave').text('save'); //change button text
                    $('#btnSave').attr('disabled',false); //set button enable 

                }
            });

        } else if (result.dismiss === swal.DismissReason.cancel) {
            reload_table();
            $.toast({
                text: "Data Batal di Approve",
                heading: 'Note',
                icon: 'info',
                showHideTransition: 'fade',
                allowToastClose: false,
                hideAfter: 3000,
                stack: 5,
                position: 'bottom-left',
            });
        }
    })
}

//button cetak


function cetak(params){
    $.ajax({
        type: "POST",
        url: "<?= base_url("izin/cetak"); ?>",
        data: {
            idp:params
        },
        dataType: "json",
        // success: function (res) {
        //     if(res.status == 1){
        //         $('#idapp').val(params);
        //         $("#idp").val(paramsDua);
        //         $("#nik_app").val(res.data[0].nik);
        //         $("#nama_app").val(res.data[0].nama);
        //         $("#unit_kerja_app").val(res.data[0].nm_unit_kerja);
        //         $("#lama_cuti").val(res.data[0].lama);
        //     }
        // },
        // complete:function(){
        //     window.location.href = base_url("cetak");
        // }
    });
    return false;
}

// var handleDataTableButtons=function(){
//     "use strict";
//     0!==$("#datatable-buttons").length&&$("#datatable-buttons").DataTable({
//         dom:"Bfrtip",
//         buttons:[
//             {extend:"pdf",className:"btn-sm"},],
            
//             responsive:!0})},
            
//             TableManageButtons=function(){
//                 "use strict";
//                 return{init:function(){
//                     handleDataTableButtons()}}}();

//                     $(document).ready(function(){
//                         $("#datatable").dataTable(),
//                         $("#datatable-keytable").DataTable({keys:!0}),
//                         $("#datatable-responsive").DataTable(),
//                         $("#datatable-colvid").DataTable({
//                             dom:'C<"clear">lfrtip',
//                             colVis:{buttonText:"Change columns"}}),
//                             $("#datatable-scroller").DataTable({
//                                 ajax:"../assets/data/scroller-demo.json",
//                                 deferRender:!0,
//                                 scrollY:380,
//                                 scrollCollapse:!0,
//                                 scroller:!0});

//                                 $("#datatable-fixed-header").DataTable({fixedHeader:!0}),
//                                 $("#datatable-fixed-col").DataTable({
//                                     scrollY:"300px",
//                                     scrollX:!0,
//                                     scrollCollapse:!0,
//                                     paging:!1,
//                                     fixedColumns:{
//                                         leftColumns:1,
//                                         rightColumns:1}})}),
                                        
//                                         TableManageButtons.init();


</script>
