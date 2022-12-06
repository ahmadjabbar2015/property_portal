var table = $('#customer_data').DataTable({

    processing: true,
    serverSide: true,
    url: "{{ route('customer.index') }}",
    columns: [{
        data: 'id',
        name: 'id',
    },
    {
        data: 'lead.client_name',
        name: 'lead.client_name',
    },
    {
        data: 'agent.name',
        name: 'agent.name',
    },
    {
        data: 'propertydetail.name',
        name: 'propertydetail.name',
    },
    {
        data: 'property_price',
        name: 'property_price',
    },
    {
        data: 'description',
        name: 'description',
    },
    {
        data: 'date',
        name: 'date'
    },
    {
        data: 'action',
        name: 'action',
        orderable: true,
        searchable: true
    },
    ]
});
$("#property").on('change', function () {
    let rent = $(this).find('option:selected').data('rent');
    $('input[name=property_price]').val(rent);
}) 