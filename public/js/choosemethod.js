

$("input").change(function(){
    var href=url+"/"+$(this).val();
    $("form").attr("action",href);
    $(".ahref").attr("href",href);
})