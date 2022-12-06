var table = $('#inventory_table').DataTable({
        
    processing: true,
    serverSide: true,

    url: "{{ route('inventory.index') }}",
    columns: [{
            data: 'id',
            name: 'id'
        },
        {
            data: 'name',
            name: 'name'
        },
        {
            data:'description',
            name:'description'
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
$(document).ready(function () {
    
    $("#property_units_show").hide();
})
$("#inventor_for").on('change', function () {
    
   
if($(this).find(':selected').val()=='UNIT') 
{
  
        $("#property_units_show").show();
 

  
}else
{
        $("#property_units_show").hide();
}


})


$(function () {
    var regiester_inventory=$("#regiester_inventory");
    regiester_inventory.validate({
        rules:{
            property_id :{
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
            description:{
                required: "Description  field is required"
            },
            
        }
    })
})

