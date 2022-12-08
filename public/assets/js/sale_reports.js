$(document).ready(function () {
    $(".property_id").select2();
    $("#tenants_id").select2();
    $("#installments").select2();
    $("#type_id").select2();
});

// $(function (){

    mydataTable = $('#sale_report_table').DataTable({

        processing: true,
        serverSide: true,
        ajax: {
            url: "/sale/report/",
            data: function (d) {
                d.property_id = property_id,
                d.customer_id = customer_id,
                d.installments_id = installments_id,
                d.start_date = start_date,
                d.end_date = end_date
            }
        },

        data: {
            'property_id': property_id


        },
        data: {

            'customer_id': customer_id
        },
        data: {

            'installments_id': installments_id
        },

        columns: [
            {
                data: 'id',
                name: 'id',
            },

            {
                data: 'name',
                name: 'name',
            },
            {
                data: 'first_name',
                name: 'first_name',
            },
            {
                data: 'total_sale_price',
                name: 'total_sale_price',
            },
            {
                data: 'remaing_payment',
                name: 'remaing_payment',
            },
            {
                data: 'frequency_collection',
                name: 'frequency_collection',
            },
            {
                data: 'number_of_years_month',
                name: 'number_of_years_month',
            },
            {
                data: 'payment_per_frequency',
                name: 'payment_per_frequency',
            },

            {
                data: 'due_date',
                name: 'due_date',
            },

            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },
        ]
    });

    // });

    var property_id = null;
    $('#search_property_id').on('change', function () {
        property_id = $(this).find(":selected").val();
        $("#sale_report_table").DataTable().ajax.reload();
    });

    var customer_id = null;
    $('#customer_id').on('change', function () {
        customer_id = $(this).find(":selected").val();
        $("#sale_report_table").DataTable().ajax.reload();
    });


    var installments_id = null;
    $('#installments').on('change', function () {
        installments_id = $(this).find(":selected").val();
        $("#sale_report_table").DataTable().ajax.reload();

    });

    // var leads_id = null;
    // $('#customer_id').on('change', function () {
    //     leads_id = $(this).find(":selected").val();
    //     $("#sale_report_table").DataTable().ajax.reload();

    // });

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
      //  alert(date_range);
        var data_split = date_range.split("-");
           start_date = data_split[0];
           end_date = data_split[1];
        $("#sale_report_table").DataTable().ajax.reload();
     }
    function myFunction() {
        var x = document.getElementById("filter_id");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }



