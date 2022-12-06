var table = $('#units_data').DataTable({
    processing: true,
    serverSide: true,

    url: "{{ route('propertyunits.index') }}",
    columns: [{
            data: 'id',
            name: 'id'
        },
        {
            data: 'name',
            name: 'name'
        },
        {
            data: 'title',
            name: 'title'
        },
     
        {
            data: 'details',
            name: 'details'
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
        var regiester_propertyunit=$("#regiester_propertyunit");
        regiester_propertyunit.validate({
            rules:{
                property_id :{
                    required: true
                },
                title :{
                    required: true
                },
                commission :{
                    required: true
                },
                details :{
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
                title:{
                    required: "Title field is required"
                },
                commission:{
                    required: "Commission field is required"
                },
                details:{
                    required: " Rent field  is required"
                },
                description:{
                    required: " Description field  is required"
                },
            }
        })
    })
    
    
