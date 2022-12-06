

$('#lead_table').DataTable({

    processing: true,
    serverSide: true,

    url: "/lead/index",
    columns: [{
        data: 'id',
        name: 'id'
    },
    {
        data: 'client_name',
        name: 'client_name'
    },
    {
        data: 'client_contact',
        name: 'client_contact'
    },

    {
        data: 'clinet_location',
        name: 'clinet_location'
    },
    {
        data: 'propertyType',
        name: 'propertyType'
    },
    {
        name: 'source',
        data: 'source'

    },
    {
        name: 'status',
        data: 'status'

    },
    {
        name: 'users',
        data: 'users'

    },
    {
        data: 'remark',
        name: 'remark'
    },
    {
        data: 'date',
        name: 'date'
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
    var regiester_lead = $("#regiester_lead");
    regiester_lead.validate({
        rules: {
            client_name: {
                required: true
            },
            client_contact: {
                required: true
            },

            source_id: {
                required: true
            },
            status: {
                required: true
            },
            propertytype_id: {
                required: true
            }
        },
        messages: {
            client_name: {
                required: " Name field is required"
            },
            client_contact: {
                required: "Phone Number is required"
            },

            source_id: {
                required: "Source  is required"
            },
            status: {
                required: "   Select status field  is required"
            },
            propertytype_id: {
                required: "Property Type is required"
            }

        }
    })
})
function myFunction() {
    var contact_number = document.getElementById("client_contact").value;
    $('#userError').html('')
    $.ajax({
        type: "get",
        url: "/lead/checknumber/" + contact_number,
        success: function (response) {
            if (response != 0) {
                $('#userError').html("Already Exists Please Update The Number");
            }

        }
    });
}
//attemp validation
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

            source_id: {
                required: true
            },
            status: {
                required: true
            },
            propertytype_id: {
                required: true
            }
        },
        messages: {
            client_name: {
                required: " Name field is required"
            },
            client_contact: {
                required: "Phone Number is required"
            },

            source_id: {
                required: "Source  is required"
            },
            status: {
                required: "   Select status field  is required"
            },
            propertytype_id: {
                required: "Property Type is required"
            }

        }
    })
})
var input = document.querySelector(".client_contact");
intlTelInput(input, {
    initialCountry: "pk",
});
