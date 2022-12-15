

$('#user_table').DataTable({

    processing: true,
    serverSide: true,

    url: "user/index",
    columns: [{
        data: 'id',
        name: 'id'
    },
    {
        data: 'first_name',
        name: 'first_name'
    },
    {
        data: 'role',
        name: 'role'
    },
    {
        data: 'date',
        name: 'date'
    },
    {
        data: 'email',
        name: 'email'
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
    var user_form = $("#user_form");
    user_form.validate({
        rules: {
            first_name: {
                required: true
            },
            last_name: {
                required: true
            },
            password: {
                required: true
            },
            role_id: {
                required: true
            },
            email: {
                required: true
            },
            gender: {
                required: true
            },
            number: {
                required: true
            }
        },
        messages: {
            first_name: {
                required: "First Name field is required"
            },
            last_name: {
                required: "Last Name  field is required"
            },
            password: {
                required: "Password field is required"
            },
            role_id: {
                required: " Role field  is required"
            },
            email: {
                required: " Email  is required"
            },
            gender: {
                required: "Gender  is required"
            },
            number: {
                required: "Number field  is required"
            }

        }
    })
})
