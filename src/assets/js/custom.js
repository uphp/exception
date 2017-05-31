function closeOpen(element){
    if($($(element)).attr("control") == "OPEN"){
        $(element).parent().children().each(function(index, value) {
            if($(value).attr("class") == "panel-body"){
                $(value).attr("style", "display: none");
                $(element).attr("control", "CLOSE");
            }
        });
    } else {
       $(element).parent().children().each(function(index, value) {
            if($(value).attr("class") == "panel-body"){
                $(value).attr("style", "display: block");
                $(element).attr("control", "OPEN");
            }
        });
    }
}