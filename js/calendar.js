$(document).ready(function() {


/* Ajax Sessao
-----------------------------------------------------------------*/
var url_theme = theme.url;
url_form = url_theme + '/includes/actions/calendar.php';   
    
    //Verifica Se a Pagina é Single 
    if ($('#calendar').hasClass('single-calendar')) {

        var classNames = $('.single-calendar').attr('class');
            classNames =  classNames.split(' ');
       

        var data ='type=sessaoSingle&idPost='+classNames[1];
        
        
        $.ajax({
            url: url_form,
            type: 'POST', // Send post data
            data: data,
            async: false,
            success: function(s){
                json_events = s;
            }
        });

    }else{

        $.ajax({
            url: url_form,
            type: 'POST', // Send post data
            data: 'type=sessao',
            async: false,
            success: function(s){
                json_events = s;
               
            }
        });

    }





/* initialize the calendar
-----------------------------------------------------------------*/

$('#calendar').fullCalendar({

    events: JSON.parse(json_events),
    //events: [{"id":"01","title":"exemplo","start":"2015-10-24T16:00:00+04:00","url":"http://facebook.com.br","allDay":true}],
    utc: true,
    header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
    },
    lang: 'pt-br',
  
    
});



});