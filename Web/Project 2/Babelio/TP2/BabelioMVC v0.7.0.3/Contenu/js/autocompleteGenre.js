$(function() {
    
    //autocomplete
    $("#auto").autocomplete({
        source: "index.php?action=quelsGenres",
        minLength: 0,
        focus: function( event, ui ){
            $("#auto").val(ui.item.label);
            return false;
        },
        select: function( event, ui ){
            $("#auto").val(ui.item.label);
            return false;
        }
    });                

});



