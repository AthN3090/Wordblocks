

$(window).on("load", function () {
    $('#loadscreen').delay(500).fadeOut("slow");
});

$("#editorback").fadeOut(1);
$(window).on("load", function () {
    $("#pen").click(function () {
        $('#pen').fadeOut(0);
        $("#editorback").fadeIn(300);
        
    });
});
/*
$(window).on("load", function () {
    var edit = document.getElementsByName('edit_blog');
    $(edit).click(function () {
        $("#editorback").fadeIn(300);
    });
});*/
$('#cancel_edit').click(function () {

    $('#editorback').fadeOut(300);
    $('#edit_body').remove();
    CKEDITOR.instances.edit_body.destroy();
});

$('#cancel').click(function () {
    $('#editorback').fadeOut(300);
    $('#pen').fadeIn(100);
    

});