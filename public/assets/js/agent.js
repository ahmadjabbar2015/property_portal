var table = $('#agent_data').DataTable({

    processing: true,
    serverSide: true,
    url: "{{ route('agent.index') }}",
    columns: [{
        data: 'id',
        name: 'id',
    },
    {
        data: 'name',
        name: 'name',
    },

    {
        data: 'email',
        name: 'email',
    },

    {
        data: 'number',
        name: 'number',
    },
    {
        data: 'address',
        name: 'address',
    },
    {
        data: 'action',
        name: 'action',
        orderable: true,
        searchable: true
    },
    ]
});
$(function () {
    var regiester_agent = $("#regiester_agent");
    regiester_agent.validate({
        rules: {
            name: {
                required: true
            },
            email: {
                required: true
            },

            address: {
                required: true
            },
            number: {
                required: true
            },
        },
        messages: {
            name: {
                required: " Name field is required"
            },
            email: {
                required: "Email  field is required"
            },

            address: {
                required: " Address field  is required"
            },
            number: {
                required: "Number field is required"
            },
        }
    })
})
