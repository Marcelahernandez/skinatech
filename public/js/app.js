$("#categoria").change(function(event){
    $.get("subcategories/"+event.target.value+"", function(category){
        $('#subcategoria').empty();
        $.each(category, function(index,value){
            $('#subcategoria').append("<option value='"+value.id+"'>"+value.name+"</option>");
        });
        
    });
});
 function category(){
    var id = $("#categoria").val();
    $.get("subcategories/"+id+"", function(category){
        $('#subcategoria').empty();
        $.each(category, function(index,value){
            $('#subcategoria').append("<option value='"+value.id+"'>"+value.name+"</option>");
        });
        
    });
 }

$(window).on('load',category);
