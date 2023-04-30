$(document).ready(function(){
$('#time').timepicker({
    timeFormat: 'H:mm p',
    interval: 60,
    minTime: '08',
    maxTime: '16:00pm',
    defaultTime: '11',
    startTime: '08:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true
    });

    

    });
        