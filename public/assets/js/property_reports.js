$(document).ready(function () {
    $(".property_id").select2();
    $("#landlord_id").select2();
    $("#customer_id").select2();
    $("#type_id").select2();

});
// var mydataTable = null;




// $(document).ready(function() {
//     //Purchase & Sell report
//     //Date range as a button
//     if ($('#kt_daterangepicker_4').length == 1) {
//         $('#kt_daterangepicker_4').daterangepicker(dateRangeSettings, function(start, end) {
//             $('#kt_daterangepicker_4 span').html(
//                 start.format(moment_date_format) + ' ~ ' + end.format(moment_date_format)
//             );
//             updatePurchaseSell();
//         });
//         $('#kt_daterangepicker_4').on('cancel.daterangepicker', function(ev, picker) {
//             $('#kt_daterangepicker_4').html(
//                 '<i class="fa fa-calendar"></i> ' + LANG.filter_by_date
//             );
//         });

//     }
// })

$(function () {
    mydataTable = $('#propertyreports_table').DataTable({

        processing: true,
        serverSide: true,
        ajax: {
            url: "/porperty_reports/index",
            data: function (d) {
                d.property_id = property_id,
                d.landlord_id = landlord_id,
                d.propertytype_id = propertytype_id,
                d.leads_id = leads_id,
                d.start_date = start_date,
                d.end_date = end_date
            }
        },

        data: {
            'property_id': property_id


        },
        data: {

            'landlord_id': landlord_id
        },
        data: {

            'propertytype_id': propertytype_id
        },
        data: {

            'leads_id': leads_id
        },


        columns: [
            {
                data: 'name',
                name: 'name',
            },
            {
                data: 'full_name',
                name: 'full_name',
            },
            {
                data: 'type',
                name: 'type',
            },
            {
                data: 'title',
                name: 'title',
            },
            {
                data: 'client_name',
                name: 'client_name',
            },
            {
                data: 'rent',
                name: 'rent	',
            },
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },
        ]
    });

});

var property_id = null;
$('#search_property_id').on('change', function () {
    property_id = $(this).find(":selected").val();
    $("#propertyreports_table").DataTable().ajax.reload();
});

var landlord_id = null;
$('#landlord_id').on('change', function () {
    landlord_id = $(this).find(":selected").val();
    $("#propertyreports_table").DataTable().ajax.reload();

});
var propertytype_id = null;
$('#type_id').on('change', function () {
    propertytype_id = $(this).find(":selected").val();
    $("#propertyreports_table").DataTable().ajax.reload();

});
var leads_id = null;
$('#customer_id').on('change', function () {
    leads_id = $(this).find(":selected").val();
    $("#propertyreports_table").DataTable().ajax.reload();

});

// var date_rang = null;
    // $('.date_range').on('change', function () {
        // alert('date_range');
        // date_rang = $(this).find('input[name="date_range"]').val();
        // var date_range = $('input[name=date_range]').val();
        // var data_split = date_range.split("-");
        // var start_date = data_split[0];
        // var end_date = data_split[1];
        // alert(start_date);

    // });
    var start_date = '';
    var end_date = '';
    function datepicker() {  
        var date_range = $('input[name=date_range]').val();
        alert(date_range);
        var data_split = date_range.split("-");
           start_date = data_split[0];
           end_date = data_split[1];
        $("#propertyreports_table").DataTable().ajax.reload();
     }
function myFunction() {
    var x = document.getElementById("filter_id");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}



