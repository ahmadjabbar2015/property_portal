

$('#roletable').DataTable({

    processing: true,
    serverSide: true,

    url: "role/index",
    columns: [{
        data: 'id',
        name: 'id'
    },
    {
        data: 'name',
        name: 'name'
    },

    {
        data: 'action',
        name: 'action',
        orderable: true,
        searchable: true
    },
    ]
});
