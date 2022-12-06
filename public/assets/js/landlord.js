// $(function() {

    $('#landlords_data').DataTable({

        processing: true,
        serverSide: true,
        url: "{{ route('landlord.index') }}",
        columns: [{
                data: 'id',
                name: 'id',
            },
            {
                data: 'full_name',
                name: 'full_name',
            },
            {
                data: 'email',
                name: 'email',
            },
            {
                data: 'address',
                name: 'address',
            },
            {
                data: 'identity',
                name: 'identity',
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
        var regiester_landlords=$("#regiester_landlords");
        regiester_landlords.validate({
            rules:{
                full_name :{
                    required: true
                },
                email :{
                    required: true
                },
                number :{
                    required: true
                },
                address :{
                    required: true
                },
            },
            messages:{
                full_name:{
                    required: "Name field is required"
                },
                email:{
                    required: "Email field is required"
                },
                number:{
                    required: "Phone Number field is required"
                },
                address:{
                    required: " Address field  is required"
                },
            }
        })
    })
    
    
