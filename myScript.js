$(document).ready(function(){
        $(".loading").delay(200).fadeOut(800);
                      $("#loadscreen").delay(200).fadeOut(800);
    $("#textbox").fadeOut(300);


$("#pen").click(function(){
    $("#textbox").fadeIn(300);
    });

    $('#submit_text').click(function(){
       if($('#title').val()!=""){
        $("#textbox").fadeOut(300); 
}
    });
    $('#cancel').click(function(){
        $("#textbox").fadeOut(300); 

    });
    

});
