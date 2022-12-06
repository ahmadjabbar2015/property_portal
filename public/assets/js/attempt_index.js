$('#attempt_table').DataTable({

    processing: true,
    serverSide: true,
    url: "{{ route('lead.attempt_index') }}",
    columns: [{
        data: 'id',
        name: 'id',
    },
    {
        data: 'client_name',
        name: 'client_name',
    },
    {
        data: 'client_contact',
        name: 'client_contact',
    },
    {
        data: 'client_mail',
        name: 'client_mail',
    },
    {
        data: 'clinet_location',
        name: 'clinet_location',
    },
    {
        data: 'propertyType',
        name: 'propertyType',
    },
    {
        data: 'area_minimum',
        name: 'area_minimum',
    },
    {
        data: 'area_maximum',
        name: 'area_maximum',
    },
    {
        data: 'source',
        name: 'source',
    },
    {
        data: 'budget_minimum',
        name: 'budget_minimum',
    },
    {
        data: 'budget_maximum',
        name: 'budget_maximum',
    },
    {
        data: 'lead_status',
        name: 'lead_status',
    },
    {
        data: 'class_status',
        name: 'class_status',
    },
    {
        data: 'next_follow_date',
        name: 'next_follow_date',
    },

    {
        data: 'aad_remark',
        name: 'aad_remark',
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
    var regiester_lead = $("#attemp_laeds");
    regiester_lead.validate({
        rules: {
            client_name: {
                required: true
            },
            client_contact: {
                required: true
            },
           
            client_mail: {
                required: true
            },
           
            clinet_location: {
                required: true
            },
           
            propertytype_id: {
                required: true
            },
            area_minimum: {
                required: true
            },
            area_maximum: {
                required: true
            },
            budget_minimum: {
                required: true
            },
            budget_maximum: {
                required: true
            },
        },
        messages: {
            client_name: {
                required: " Name field is required"
            },
            client_contact: {
                required: "Phone Number is required"
            },
           
            client_mail: {
                required: "Email  is required"
            },
            clinet_location: {
                required: "   Location  field  is required"
            },
            propertytype_id: {
                required: "Property Type is required"
            },
            area_minimum: {
                required: "Property  Area is required"
            },
            area_maximum: {
                required: "Property  Area is required"
            },
            budget_minimum: {
                required: "Budget   is required"
            },
            budget_maximum: {
                required: "Budget is required"
            },

        }
    })
})





