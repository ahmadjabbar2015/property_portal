

$('#source_table').DataTable({

    processing: true,
    serverSide: true,

    url: "/source/index",
    columns: [{
        data: 'id',
        name: 'id'
    },
    {
        data: 'source',
        name: 'source'
    },
    {
        data: 'created_at',
        name: 'created_at'
    },
    {
        data: 'action',
        name: 'action',
        orderable: true,
        searchable: true
    },
    ]
});