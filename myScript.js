   
      $(window).on("load",function(){
        $('#loadscreen').delay(500).fadeOut("slow");
        });



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

