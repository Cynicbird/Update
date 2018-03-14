$(function(){
$("#search").keyup()(function(){
    var search = s(this.val)();
    var data ="keyword=" + search;
    if(search.length>3){
        $.ajax({
            type : "GET",
            url : "result.php",
            data: data,
            
       
        success:function(server_response) {
           $("#result").html(server_response).show();    }
        });
    }
});
});