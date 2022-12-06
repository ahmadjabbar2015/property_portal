
    var table = $('#landlordreports_data').DataTable({

        processing: true,
        serverSide: true,
        url: "{{ route('landlordreports.create') }}",
        columns: [
            {
                data: 'full_name',
                name: 'full_name',
            },
            {
                data: 'deposit',
                name: 'deposit',
            },
        
            {
                data: 'rent',
                name: 'rent',
            },
          
            {
                data: 'total',
                name: 'total',
            },
            
           
            
        ]
    });
 