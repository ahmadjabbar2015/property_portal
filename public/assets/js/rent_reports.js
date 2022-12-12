$(document).ready(function () {
    $(".property_id").select2();
    $("#tenants_id").select2();
    $("#installments").select2();
    $("#type_id").select2();
});

// $(function (){

    mydataTable = $('#propertyreports_table').DataTable({

        processing: true,
        serverSide: false,
        ajax: {
            url: "/rentleasereports/",
            data: function (d) {
                d.property_id = property_id,
                d.tenants_id = tenants_id,
                d.installments_id = installments_id,
                d.start_date = start_date,
                d.end_date = end_date
            }
        },

        data: {
            'property_id': property_id


        },
        data: {

            'tenants_id': tenants_id
        },
        data: {

            'installments_id': installments_id
        },
        // data: {

        //     'leads_id': leads_id
        // },


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
                data: 'full_name',
                name: 'full_name',
            },
            {
                data: 'rent',
                name: 'rent',
            },
            {
                data: 'frequency_collection',
                name: 'frequency_collection',
            },
            {
                data: 'lease_start',
                name: 'lease_start',
            },
            {
                data: 'lease_end',
                name: 'lease_end',
            },
            {
                data: 'due_date',
                name: 'due_date',
            },

            {
                data: 'advance_payments',
                name: 'advance_payments',
            },

            {
                data: 'total_payment',
                name: 'total_payment',
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
        $("#propertyreports_table").DataTable().ajax.reload();
    });

    var tenants_id = null;
    $('#tenants_id').on('change', function () {
        tenants_id = $(this).find(":selected").val();
        $("#propertyreports_table").DataTable().ajax.reload();
    });


    var installments_id = null;
    $('#installments').on('change', function () {
        installments_id = $(this).find(":selected").val();
        $("#propertyreports_table").DataTable().ajax.reload();

    });

    // var leads_id = null;
    // $('#customer_id').on('change', function () {
    //     leads_id = $(this).find(":selected").val();
    //     $("#propertyreports_table").DataTable().ajax.reload();

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



