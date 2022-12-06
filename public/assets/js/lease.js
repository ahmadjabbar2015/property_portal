var table = $('#leases_table').DataTable({

    processing: true,
    serverSide: true,

    url: "{{ route('lease.index') }}",
    columns: [{
        data: 'id',
        name: 'id'
    },
    {
        data: 'name',
        name: 'name'
    },
    {
        data: 'full_name',
        name: 'full_name'
    },
    {
        data: 'title',
        name: 'title'
    },

    {
        data: 'rent',
        name: 'rent'
    },
    {
        data: 'frequency_collection',
        name: 'frequency_collection',
    },
    {
        data: 'lease_start',
        name: 'lease_start'
    },
    {
        data: 'lease_end',
        name: 'lease_end'
    },
    {
        data: 'due_date',
        name: 'due_date'
    },
    {
        data: 'total_payment',
        name: 'total_payment'
    },



    {
        data: 'action',
        name: 'action',
        orderable: true,
        searchable: true
    },
    ]
});


//main div
$("#sale_div").hide();
$("select.main_div_select").change(function () {
    var selectedDiv = $(".main_div_select option:selected").text();

    if (selectedDiv == "Rent") {
        $("#rent_div").show();
        $("#sale_div").hide();

    } else if (selectedDiv == "Sale") {
        $("#rent_div").hide();
        $("#sale_div").show();
    }
});

//property_set
$("#property_id").on('change', function () {
    var property_id = $(this).val();

    let get_rent = $(this).find('option:selected').data('id');
    $('input[name=rent]').val(get_rent);
    $(".property_unit").html("<option disabled value=''>Select An Option</option>");
    // $('#unit').select2();
    $.ajax({
        type: "get",
        url: "/lease/get-property-units/" + property_id,
        dataType: "json",
        success: function (response) {

            // $(".select-unit").html("<option disabled value=''>Select An Option</option>");
            $.each(response, function (indexInArray, propertyunits) {
                $(".property_unit").append("<option value='" + propertyunits.id + "'>" + propertyunits.title + "</option>");
            });
        }
    });

    // $('.source-item').html("");

});

//   $("#getpayments").click(function () {
//     var start_date=document.getElementById("lease_start").value;
//     var end_date=document.getElementById("lease_end").value;
//     var date1=new Date(start_date);
//     var date2=new Date(end_date);
//     var Difference_In_Time = date2.getTime() - date1.getTime();
//     var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
//     var months = Math.floor(Difference_In_Days/30);
//     var renttotal=document.getElementById("rent").value;
//     var total_payment=months*renttotal;
//     $('input[name=total_payment]').val(total_payment);
//   })
$("#frequency_collection").on('change', function () {

    var data_frequency = $(this).find('option:selected').val();
    if (data_frequency == "daily") {
        var start_date = document.getElementById("lease_start").value;
        var end_date = document.getElementById("lease_end").value;
        var date1 = new Date(start_date);
        var date2 = new Date(end_date);
        var Difference_In_Time = date2.getTime() - date1.getTime();
        var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
        console.log(Difference_In_Days);
        $('input[name=get_dmy]').val(Difference_In_Days);
        var renttotal = document.getElementById("rent").value;
        var total_payment = Difference_In_Days * renttotal;
        $('input[name=total_payment]').val(total_payment);

    } else if (data_frequency == "annually") {
        var start_date = document.getElementById("lease_start").value;
        var end_date = document.getElementById("lease_end").value;
        var date1 = new Date(start_date);
        var date2 = new Date(end_date);
        var Difference_In_Time = date2.getTime() - date1.getTime();
        var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
        var years = Math.floor(Difference_In_Days / 365);
        // console.log(years);
        $('input[name=get_dmy]').val(years);
        var renttotal = document.getElementById("rent").value;
        var total_payment = years * renttotal;
        $('input[name=total_payment]').val(total_payment);


    } else {
        var start_date = document.getElementById("lease_start").value;
        var end_date = document.getElementById("lease_end").value;
        var date1 = new Date(start_date);
        var date2 = new Date(end_date);
        var Difference_In_Time = date2.getTime() - date1.getTime();
        var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
        var months = Math.floor(Difference_In_Days / 30);
        // console.log(months);
        $('input[name=get_dmy]').val(months);
        var renttotal = document.getElementById("rent").value;
        var total_payment = months * renttotal;
        $('input[name=total_payment]').val(total_payment);
    }


})


$("#tenant").on('change', function () {
    let id = $(this).find('option:selected').data('id');
    $('input[name=new_teanants_id]').val(id);
})
//tables

$("#table").hide();

$("#lease_included_bills").click(function () {
    $("#table").show();
    $("#tenants_name").hide();

});
$("#leases_details").click(function () {
    $("#tenants_name").show();
    $("#table").hide();
});


$(function () {
    var regiester_leases = $("#regiester_leases");
    regiester_leases.validate({
        rules: {
            property_id: {
                required: true
            },
            rent: {
                required: true
            },
            advance_payments: {
                required: true
            },
            tenant_id: {
                required: true
            },
            lease_end: {
                required: true
            },
            lease_start: {
                required: true
            },
            due_date: {
                required: true
            },
            frequency_collection: {
                required: true
            },
            total_payment: {
                required: true
            },
        },
        messages: {
            property_id: {
                required: "Select property field is required"
            },
            rent: {
                required: "Rent  field is required"
            },
            advance_payments: {
                required: "Commission field is required"
            },
            tenant_id: {
                required: " Tenants field  is required"
            },
            lease_end: {
                required: " lease end date   is required"
            },
            lease_start: {
                required: " lease start date  is required"
            },
            due_date: {
                required: " Due date field  is required"
            },
            frequency_collection: {
                required: " Select payment frequency"
            },
            total_payment: {
                required: "Total Payment is required"
            }
        }
    })
})
//sale js
$("#propertysale_id").on('change', function () {
    var property_id = $(this).val();

    let get_rent = $(this).find('option:selected').data('id');
    $('input[name=total_sale_price]').val(get_rent);
    $(".property_sale_unit").html("<option disabled value=''>Select An Option</option>");
    // $('#unit').select2();
    $.ajax({
        type: "get",
        url: "/lease/get-property-units/" + property_id,
        dataType: "json",
        success: function (response) {

            // $(".select-unit").html("<option disabled value=''>Select An Option</option>");
            $.each(response, function (indexInArray, propertyunits) {
                $(".property_sale_unit").append("<option value='" + propertyunits.id + "'>" + propertyunits.title + "</option>");
            });
        }
    });

    // $('.source-item').html("");

});
$("#remaing_payment").click(function () {
    let totalpricesale = document.getElementById("total_sale_price").value;
    let advancepricesale = document.getElementById("sale_advance_payment").value;
    let totalremaningprice = Math.abs(totalpricesale - advancepricesale);
    $('input[name=remaing_payment]').val(totalremaningprice);

})

$("#payment_per_frequency").click(function () {

    var data_frequency = document.getElementById("frequency_sale_collection").value;

    if (data_frequency == "monthly") {
        var start_date = document.getElementById("lease_sale_start").value;
        var end_date = document.getElementById("lease_sale_end").value;
        var date1 = new Date(start_date);
        var date2 = new Date(end_date);
        var Difference_In_Time = date2.getTime() - date1.getTime();
        var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
        var months = Math.floor(Difference_In_Days / 30);

        var saletotal = document.getElementById("remaing_payment").value;

        var numofmonth = document.getElementById("no_of_yearmonth").value;

        if (numofmonth == 0) {
            var total_payment = Math.floor(saletotal / months);

            $('input[name=payment_per_frequency]').val(total_payment);

        } else {
            var total_payment = Math.floor(saletotal / numofmonth);

            $('input[name=payment_per_frequency]').val(total_payment);

        }



    } else {

        var start_date = document.getElementById("lease_sale_start").value;
        var end_date = document.getElementById("lease_sale_end").value;
        var date1 = new Date(start_date);
        var date2 = new Date(end_date);
        var Difference_In_Time = date2.getTime() - date1.getTime();
        var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
        var years = Math.floor(Difference_In_Days / 365)
        var saletotal = document.getElementById("remaing_payment").value;

        var numofmonth = document.getElementById("no_of_yearmonth").value;
        if (numofmonth == 0) {
            var total_payment = Math.floor(saletotal / years);

            $('input[name=payment_per_frequency]').val(total_payment);

        } else {
            var total_payment = Math.floor(saletotal / numofmonth);

            $('input[name=payment_per_frequency]').val(total_payment);

        }

    }


})

$(function () {
    var regiester_sale_leases = $("#regiester_sale_leases");
    regiester_sale_leases.validate({
        rules: {
            property_id: {
                required: true
            },
            total_sale_price: {
                required: true
            },
            sale_advance_payment: {
                required: true
            },
            customer_id: {
                required: true
            },
            remaing_payment: {
                required: true
            },
            lease_end: {
                required: true
            },
            lease_start: {
                required: true
            },
            due_date: {
                required: true
            },
            frequency_collection: {
                required: true
            },
            payment_per_frequency: {
                required: true
            },
        },
        messages: {
            property_id: {
                required: "Select property field is required"
            },
            total_sale_price: {
                required: "Total  Price is required"
            },
            sale_advance_payment: {
                required: "Advance payment  is required"
            },
            customer_id: {
                required: " Tenants field  is required"
            },
            remaing_payment: {
                required: "Remaing Payment is required"
            },
            lease_end: {
                required: " lease end date   is required"
            },
            lease_start: {
                required: " lease start date  is required"
            },
            due_date: {
                required: " Due date field  is required"
            },
            frequency_collection: {
                required: " Select payment frequency"
            },
            payment_per_frequency: {
                required: "Payment month/year is required"
            }
        }
    })
})
var table = $('#sale_leases_table').DataTable({

    processing: true,
    serverSide: true,

    url: "{{ route('lease.saleindex') }}",
    columns: [{
        data: 'id',
        name: 'id'
    },
    {
        data: 'name',
        name: 'name'
    },
    {
        data: 'first_name',
        name: 'first_name'
    },
    {
        data: 'title',
        name: 'title'
    },

    {
        data: 'total_sale_price',
        name: 'total_sale_price'
    },
    {
        data: 'remaing_payment',
        name: 'remaing_payment',
    },
    {
        data: 'frequency_collection',
        name: 'frequency_collection'
    },
    {
        data: 'number_of_years_month',
        name: 'number_of_years_month'
    },
    {
        data: 'payment_per_frequency',
        name: 'payment_per_frequency'
    },
    {
        data: 'due_date',
        name: 'due_date'
    },



    {
        data: 'action',
        name: 'action',
        orderable: true,
        searchable: true
    },
    ]


});
$('.payment_btn').click(function (e) {

    var get_due_date = $(this).closest('tr').find('td input').val();
    var sale_payment = $(this).closest('tr').find('td.payment').text();
    var get_montly_id = $(this).closest('tr').find('td.montly_id').text();
    var get_sale_lease_id = $(this).closest('tr').find('td.get_sale_lease_id').text();
    $('input[name=sale_lease_id]').val(get_sale_lease_id);
    $('input[name=sale_monthly_id]').val(get_montly_id);
    $('input[name=payment]').val(sale_payment);
    $('input[name=due_date]').val(get_due_date);
    const date = new Date();

    let day = date.getDate();
    let month = date.getMonth() + 1;
    let year = date.getFullYear();
    var currentDate = `${year}-${month}-${day}`;

    $('input[name=current_date]').val(currentDate);

})
$('.rent_payment_btn').click(function (e) {

    var get_due_date = $(this).closest('tr').find('td input').val();
    var sale_payment = $(this).closest('tr').find('td.rent_payment').text();
    var get_montly_id = $(this).closest('tr').find('td.rent_id').text();
    var get_sale_lease_id = $(this).closest('tr').find('td.get_rent_lease_id').text();
    $('input[name=rent_lease_id]').val(get_sale_lease_id);
    $('input[name=rent_monthly_id]').val(get_montly_id);
    $('input[name=rent_payment]').val(sale_payment);
    $('input[name=due_date_rent]').val(get_due_date);
    const date = new Date();

    let day = date.getDate();
    let month = date.getMonth() + 1;
    let year = date.getFullYear();
    var currentDate = `${year}-${month}-${day}`;

    $('input[name=rent_current_date]').val(currentDate);

})


