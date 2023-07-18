require('./bootstrap');


/* const visite = Echo.channel('public.visite.1');

visite.subscribed( () => {
    console.log('subscribed !!!');
}).listen('.visite', (event) => {
    console.log(event); 
});

const refetch = Echo.channel('public.refetch.1');

refetch.subscribed( () => {
    console.log('fullcalendar !!!');
}).listen('.refetch', (event) => { 
    console.log(event); 

    document.addEventListener('DOMContentLoaded', function() { 
        var calendar =  FullCalendar.Calendar(document.getElementById('calendar'));
        
        
        calendar.addEventSource({
            url: 'visites/events', 
        });
        calendar.render();
        calendar.refetchEvents(); 
    });

}); 
 */
/* Echo.channel('public.refetch.1')
            .listen('FullCalendarRefetchEvent', function() { 
            calendar.refetchEvents();
            }); */