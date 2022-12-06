
   var table = $('#tickets').DataTable({

    processing: true,
    serverSide: true,
    url: "/ticket/index",
    columns: [{
            data: 'id',
            name: 'id',
        },


        {
            data: 'first_name',
            name: 'first_name',
        },
        {
            data: 'subject',
            name: 'subject',
        },
        {
            data: 'assign_to',
            name: 'assign_to'
        },
        {
            data: 'priority',
            name: 'priority',
        },
        {
            data: 'status',
            name: 'status'
        },
        {
            data: 'created_at',
            name: 'created_at',
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
        var regiester_inventory=$("#regiester_inventory");
        regiester_inventory.validate({
            rules:{
                property_id :{
                    required: true
                },
                description :{
                    required: true
                },
               
            },
            messages:{
                property_id:{
                    required: "Select property field is required"
                },
                description:{
                    required: "Description  field is required"
                },
                
            }
        })
    })