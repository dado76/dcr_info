$(document).ready(function(){
   $('table').each(function(){
        if ($(this).text() == 'REFORME') {
            $(this).css('background-color','#F5A9A9');
        }
    });
});


$(document).ready(function(){
   $('table').each(function(){
        if ($(this).text() == 'EN SERVICE') {
            $(this).css('background-color','#CEF6CE');
        }
    });
});

$(document).ready(function(){
   $('table').each(function(){
        if ($(this).text() == 'EN STOCK') {
            $(this).css('background-color','#F6E3CE');
        }
    });
});

$(document).ready(function(){
   $('table').each(function(){
        if ($(this).text() == 'HS') {
            $(this).css('background-color','#F5A9A9');
        }
    });
});
