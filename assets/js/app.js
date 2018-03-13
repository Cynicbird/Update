
$(function(){
    $.ajaxSetup({
async: true
});
    var txt = $('#api p').text();
    var auteur;
$.getJSON(txt).done(function (data) {
    console.log(data.articles[0].author);
   auteur = data.articles[0].author
    });
    $.post( "/news/",auteur);
    
});
