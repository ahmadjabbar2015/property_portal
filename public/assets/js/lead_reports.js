

$(document).ready(function () {
    $("#phone_number").select2();
    $("#source_id").select2();
    $("#type_id").select2();
    $("#user_id").select2();

});


// $(function () {
    var table = $('#leadreports_table').DataTable({

        processing: true,
        serverSide: false,
        // url: "{{ route('lead_reports.index') }}",
        ajax: {
            url: "/lead_reports/index",
            data: function (d) {
                d.propertytype_id = propertytype_id
                d.source_id = source_id,
                d.client_contact = client_contact,
                d.first_name = first_name,
                d.start_date = start_date,
                    d.end_date = end_date


            }
        },
        data: {

            'propertytype_id': propertytype_id
        },
        data: {

            'source_id': source_id
        },
        data: {

            'client_contact': client_contact
        },
        data: {

            'first_name': first_name
        },
        columns: [
            
            
            {
            data: 'client_contact',
            name: 'client_contact',
        },
        {
            data: 'client_name',
            name: 'client_name',
        },

        {
            data: 'source',
            name: 'source',
        },

        {
            data: 'type',
            name: 'type',
        },
        {
            data: 'lead_status',
            name: 'lead_status',
        },
        {
            data: 'status',
            name: 'status',
        },

        {
            data: 'first_name',
            name: 'first_name',
        },
        {
            data: 'next_follow_date',
            name: 'next_follow_date',
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
var propertytype_id = null;
$('#type_id').on('change', function () {
    propertytype_id = $(this).find(":selected").val();
    $("#leadreports_table").DataTable().ajax.reload();

});
var source_id = null;
$('#source_id').on('change', function () {
    source_id = $(this).find(":selected").val();
    $("#leadreports_table").DataTable().ajax.reload();

});
var client_contact = null;
$('#phone_number').on('change', function () {
    client_contact = $(this).find(":selected").val();
    $("#leadreports_table").DataTable().ajax.reload();

});
var first_name = null;
$('#user_id').on('change', function () {
    first_name = $(this).find(":selected").val();
    $("#leadreports_table").DataTable().ajax.reload();

});

var start_date = '';
var end_date = '';
function datepicker() {
    var date_range = $('input[name=date_range]').val();
    // alert(date_range);
    var data_split = date_range.split("-");
    start_date = data_split[0];
    end_date = data_split[1];
    $("#leadreports_table").DataTable().ajax.reload();
}
function myFunction() {
    var x = document.getElementById("filter_id");
    if (x.style.display === "none") {

        x.style.display = "block";

    } else {
        x.style.display = "none";
    }


}
$(document).on('click', '.button', function () {

    e.preventDefault();
    refresh();
});