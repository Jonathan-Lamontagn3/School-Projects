$(function() {
    
    //autocomplete
    $("#auto").autocomplete({
        source: "index.php?controleur=Genre&action=index",
        minLength: 1
    });                

});



