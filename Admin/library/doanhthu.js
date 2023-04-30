$(document).ready(function(){

    fetch_data();

    var sale_chart;

    function fetch_data(start_date = '', end_date = '',idbs='')
    {
        var dataTable = $('#thongkedt').dataTable({
            
            "processing" : true,
            "serverSide" : true,
            "order" : [],
            ajax : {
                url:"action_thongkedt.php",
                type:"POST",
                data:{action:'fetchdt', start_date:start_date, end_date:end_date}
            },
            "drawCallback" : function(settings)
            
            {
                var sales_date = [];
                var sale = [];

                for(var count = 0; count < settings.aoData.length; count++)
                {
                    sales_date.push(settings.aoData[count]._aData[2]);
                    sale.push(parseFloat(settings.aoData[count]._aData[1]));
                }

                var chart_data = {
                    labels:sales_date,
                    datasets:[
                        {
                            label : 'Tổng doanh thu trong ngày',
                            backgroundColor : 'rgb(124, 224, 234)',
                            color : '#fff',
                            data:sale
                        }
                    ]   
                };

                var group_chart3 = $('#bar_chart1');

                if(sale_chart)
                {
                    sale_chart.destroy();
                }

                sale_chart = new Chart(group_chart3, {
                    type:'bar',
                    data:chart_data
                });
            }
        });
    }

    $('#daterange_textboxdt').daterangepicker({
        ranges:{
            'Ngày hôm nay' : [moment(), moment()],
            'Ngày hôm qua' : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Trong 1 tuần' : [moment().subtract(6, 'days'), moment()],
            'Trong 30 ngày' : [moment().subtract(29, 'days'), moment()],
            'Tháng này' : [moment().startOf('month'), moment().endOf('month')],
            'Tháng vừa qua' : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        format : 'YYYY-MM-DD'
    }, function(start, end){

        $('#thongkedt').DataTable().destroy();

        fetch_data(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));

    });

});
