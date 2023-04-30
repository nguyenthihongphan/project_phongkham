$(document).ready(function(){
    $('#giobatda').timepicker({
        timeFormat: 'H:mm:ss p',
        interval: 60,
        minTime: '07:00',
        maxTime: '15:00',
        defaultTime: '07:00',
        startTime: '07:00',
        dynamic: false,
        dropdown: true,
        scrollbar: true
        });
        $('#gioketthu').timepicker({
        timeFormat: 'H:mm:ss p',
        interval: 60,
        minTime: '11:00',
        maxTime: '23:00',
        defaultTime: '11:00',
        startTime: '11:00',
        dynamic: false,
        dropdown: true,
        scrollbar: true
        });
    });
      

        
        
    
     