
    
var table = $('#type_data').DataTable({
    processing: true,
    serverSide: true,

    url: "{{ route('property.type') }}",
    columns: [{
            data: 'id',
            name: 'id'
        },
        {
            data: 'type',
            name: 'type'
        },
        {
            data: 'description',
            name: 'description'
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
        var regiester_propertytype=$("#regiester_propertytype");
        regiester_propertytype.validate({
            rules:{
                type :{
                    required: true
                },
                description :{
                    required: true
                },
               
            },
            messages:{
                type:{
                    required: "Type field is required"
                },
                description:{
                    required: "Email field is required"
                },
                
            }
        })
    })
    