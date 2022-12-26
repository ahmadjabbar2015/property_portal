
function myFunction() {

    var email = document.getElementById("email").value;

    $('#userError').html('')
    $.ajax({
        type: "get",
        url: "/User/email/" + email,
        success: function (response) {
            if (response != 0) {
                $('#userError').html("Already Exists Please Update The  Email");
            }

        }
    });
}


$(function () {
    var bussniess_regiestration_form = $("#bussniess_regiestration_form");
    bussniess_regiestration_form.validate({
        rules: {
            name: {
                required: true
            },
            country: {
                required: true
            },
            state: {
                required: true
            },
            city: {
                required: true
            },
            zip_code: {
                required: true
            },
            first_name: {
                required: true
            },
            email: {
                required: true
            },
            password: {
                required: true
            },
            address: {
                required: true
            }
        },
        messages: {
            name: {
                required: "Bussniess Name is required"
            },
            country: {
                required: "country  is required"
            },
            state: {
                required: "State  is required"
            },
            city: {
                required: " City   is required"
            },
            zip_code: {
                required: "Zip code  is required"
            },
            first_name: {
                required: "Username  is required"
            },
            email: {
                required: "Email is required"
            },
            password: {
                required: "Password is required"
            },
            address: {
                required: "Address  is required"
            }

        }
    })
})

