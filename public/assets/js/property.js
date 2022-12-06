var table = $('#property_table').DataTable({
        
    processing: true,
    serverSide: true,

    url: "{{ route('property.index') }}",
    columns: [{
            data: 'id',
            name: 'id'
        },
        {
            data: 'name',
            name: 'name'
        },
        {
            data: 'address',
            name: 'address'
        },
        
        {
            data: 'propertytype_name',
            name: 'propertytype_name'
        },
        {
            data: 'rent',
            name: 'rent'
        },
        {
            data: 'landlord_name',
            name: 'landlord_name',
        },
        {
            data: 'action',
            name: 'action',
            orderable: true,
            searchable: true
        },
    ]
});
$("#basic").click(function () {
    $("#btn1").show();
    $("#btn2").hide();
    $("#btn3").hide();
    $("#btn4").hide();

});
$("#location").click(function () {
    $("#btn1").hide();
    $("#btn2").show();
    $("#btn3").hide();
    $("#btn4").hide();

});
$("#features").click(function () {
    $("#btn1").hide();
    $("#btn2").hide();
    $("#btn3").show();
    $("#btn4").hide();
});
$("#image").click(function () {
    $("#btn1").hide();
    $("#btn2").hide();
    $("#btn3").hide();
    $("#btn4").show();
});
$(document).ready(function () {
    $('#image').on('click', function () {
        $('#image').css({ backgroundColor: 'blue', color: 'white' });
        $('#location').css({ backgroundColor: '#f8f9fa', color: 'blue' });
        $('#basic').css({ backgroundColor: '#f8f9fa', color: 'blue' });
        $('#features').css({ backgroundColor: '#f8f9fa', color: 'blue' });


    });
    $('#location').on('click', function () {
        $('#location').css({ backgroundColor: 'blue', color: 'white' });
        $('#image').css({ backgroundColor: '#f8f9fa', color: 'blue' });
        $('#basic').css({ backgroundColor: '#f8f9fa', color: 'blue' });
        $('#features').css({ backgroundColor: '#f8f9fa', color: 'blue' });

    });
    $('#basic').on('click', function () {
        $('#basic').css({ backgroundColor: 'blue', color: 'white' });
        $('#location').css({ backgroundColor: '#f8f9fa', color: 'blue' });
        $('#image').css({ backgroundColor: '#f8f9fa', color: 'blue' });
        $('#features').css({ backgroundColor: '#f8f9fa', color: 'blue' });


    });
    $('#features').on('click', function () {
        $('#features').css({ backgroundColor: 'blue', color: 'white' });
        $('#location').css({ backgroundColor: '#f8f9fa', color: 'blue' });
        $('#image').css({ backgroundColor: '#f8f9fa', color: 'blue' });
        $('#basic').css({ backgroundColor: '#f8f9fa', color: 'blue' });
    });
});
$(document).ready(function () {
    $("#btn1").show();
    $("#btn2").hide();
    $("#btn3").hide();
    $("#btn4").hide();


});
//show use
$(document).ready(function (){
    $("#property_type").show();
    $("#room").hide();
    $("#table_property_data").hide();
    $("#galleryimg").hide();
});
$("#overview").click(function () {
    $("#property_type").show();
    $("#room").hide();
    $("#table_property_data").hide();
    $("#galleryimg").hide();
});
$("#amenities").click(function () {
    $("#property_type").hide();
    $("#room").show();
    $("#table_property_data").hide();
    $("#galleryimg").hide();
});
$("#units").click(function () {
    $("#property_type").hide();
    $("#room").hide();
    $("#table_property_data").show();
    $("#galleryimg").hide();
});
$("#gallery").click(function () {
    $("#property_type").hide();
    $("#room").hide();
    $("#table_property_data").hide();
    $("#galleryimg").show();
});
//show end 


$('#form1').on('submit', function (e) {
    e.preventDefault();
   
    $.ajax({
        type: 'POST',
        url: "/property/store",
        data: $('#form1').serialize(),
        success: function (result) {
            console.log(result);
            $("#form2 #basic_property_id").val(result.id);
            $("#form2").show();
        }
    });
    $("#btn1").hide();
    $("#btn2").show();
    $("#btn3").hide();
    $("#btn4").hide();
    $('#location').css({ backgroundColor: 'blue', color: 'white' });
    $('#image').css({ backgroundColor: '#f8f9fa', color: 'blue' });
    $('#basic').css({ backgroundColor: '#f8f9fa', color: 'blue' });
    $('#features').css({ backgroundColor: '#f8f9fa', color: 'blue' });

});






$('#form2').on('submit', function (e) {
    e.preventDefault();
 
    $.ajax({
        type: 'POST',
        url: "property/location/store",
        data: $('#form2').serialize(),
        success: function (result) {
            console.log(result);
            $("#form3 #basic_property_noteid").val(result.property_id);
            $("#form3").show();
        }
    });
    $("#btn1").hide();
    $("#btn2").hide();
    $("#btn3").show();
    $("#btn4").hide();
    $('#features').css({ backgroundColor: 'blue', color: 'white' });
        $('#location').css({ backgroundColor: '#f8f9fa', color: 'blue' });
        $('#image').css({ backgroundColor: '#f8f9fa', color: 'blue' });
        $('#basic').css({ backgroundColor: '#f8f9fa', color: 'blue' });
});
  












$('#form3').on('submit', function (e) {
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: "/property/amenities/store",
        data: $('#form3').serialize(),

        success: function (amenities) {
            console.log(amenities);
            $("#form4 #basic_property_imgid").val(amenities.property_id);
            $("#form4").show();
        }
    });
    $("#btn1").hide();
    $("#btn2").hide();
    $("#btn3").hide();
    $("#btn4").show();
    $('#image').css({ backgroundColor: 'blue', color: 'white' });
        $('#location').css({ backgroundColor: '#f8f9fa', color: 'blue' });
        $('#basic').css({ backgroundColor: '#f8f9fa', color: 'blue' });
        $('#features').css({ backgroundColor: '#f8f9fa', color: 'blue' });
}); 
//form4

// $('#form4').on('submit', function (e) {
//     e.preventDefault();

//     $.ajax({
//         type: 'POST',
//         url: "/property/image/store",
//         data: $('#form4').serialize(),

//         success: function (result) {
//             console.log(result);
           
//         }
//     });
    
   
// }); 

$("#landloard").on('change' , function(){
   
    let id = $(this).find('option:selected').data-deposit();
    // alert(id);
    
    // $('input[name=deposit]').val(id)
;
 })
 


// });


