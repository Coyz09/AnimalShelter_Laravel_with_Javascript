
$(document).ready(function() {
$.ajax({
      type: "GET",
      url: "/api/adopted/all",
      dataType: 'json',
      success: function (data) {
        var xml = new XMLHttpRequest();
        var url = 'http://localhost:8000/api/adopted/all';
        xml.open('GET',url,true);
        xml.send();
        xml.onreadystatechange = function()
        {   
            if(this.readyState == 4 && this.status == 200)
            {
                const datapoints = JSON.parse(this.responseText);
                // console.log(datapoints);
                const labelsmonth = datapoints.map(
                    function(index){
                        return index.DATE;
                    });
                 const count = datapoints.map(
                    function(index){
                        return index.total;
                    });
                console.log(labelsmonth);
            
        
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labelsmonth,
        datasets: [{
            label: 'Adopted Animals',
            data: count,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            //  backgroundColor: 'transparent',
            // borderColor: 'red',

            borderWidth: 10
        }]
    },
    options: {
        scales: {
            x: {
                type: 'time',
                time: {
                    unit: 'day'
                 
               
                 }
            },

            y: {
                beginAtZero: true
               
            }
        }
    }
});

    $.each(data, function(key, value) {
        date = labelsmonth;
        // console.log(date);
    const convertedDates = date.map(date => new Date(date).setHours(0,0,0,0));
    console.log(convertedDates);
    $("#filter").on('click', function(e) {
    e.preventDefault();
        function filterDate()
        {
            const start1 = new Date(document.getElementById('start').value);
            const start = start1.setHours(0,0,0,0);
            const end1 = new Date(document.getElementById('end').value);
            const end = end1.setHours(0,0,0,0);
            
            const filterDates = convertedDates.filter(date => date >= start && date <= end)
            // const convertedHrs = filterDates.map(date => new Date(date));
            // myChart.config.data.labels = convertedHrs;
            myChart.config.data.labels = filterDates;
          
            const startarray = convertedDates.indexOf(filterDates[0])
            const endarray = convertedDates.indexOf(filterDates[filterDates.length -1])
            console.log(endarray);
            const copydatapoints = [...datapoints];

            const totals = copydatapoints.map(
                    function(index){
                        return index.total;
                    });
            totals.splice(endarray + 1, filterDates.length);
            totals.splice(0,startarray);
            console.log( totals)
            myChart.config.data.datasets[0].data = totals;
            myChart.update();
            }
            console.log(filterDate());
    });

      $("#reset").on('click', function(e) {
         e.preventDefault();
          function resetDate()
             {
                myChart.config.data.labels = labelsmonth;
                myChart.config.data.datasets[0].data = count;
                 myChart.update();
             }
             console.log(resetDate());

    });
});
}
}

},
 error: function(){
        console.log('AJAX load did not work');
        alert("error");
      }

});

});

$(document).ready(function() {
$.ajax({
      type: "GET",
      url: "/api/rescued/all",
      dataType: 'json',
      success: function (data) {
        var xml = new XMLHttpRequest();
        var url = 'http://localhost:8000/api/rescued/all';
        xml.open('GET',url,true);
        xml.send();
        xml.onreadystatechange = function()
        {   
            if(this.readyState == 4 && this.status == 200)
            {
                const datapoints = JSON.parse(this.responseText);
                // console.log(datapoints);
                const labelsmonth = datapoints.map(
                    function(index){
                        return index.DATE;
                    });
                 const count = datapoints.map(
                    function(index){
                        return index.total;
                    });
                console.log(labelsmonth);
            
        
    const ctx = document.getElementById('myChart2').getContext('2d');
    const myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: labelsmonth,
        datasets: [{
            label: 'Rescued Animals',
            data: count,
            backgroundColor: [
                
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                 'rgba(255, 99, 132, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            //  backgroundColor: 'transparent',
            // borderColor: 'red',

            borderWidth: 10
        }]
    },
    options: {
        scales: {
            x: {
                type: 'time',
                time: {
                    unit: 'day'
                 
               
                 }
            },

            y: {
                beginAtZero: true
               
            }
        }
    }
});

    $.each(data, function(key, value) {
        date = labelsmonth;
        // console.log(date);
    const convertedDates = date.map(date => new Date(date).setHours(0,0,0,0));
    console.log(convertedDates);
    $("#filter2").on('click', function(e) {
    e.preventDefault();
        function filterDate()
        {
            const start1 = new Date(document.getElementById('start2').value);
            const start = start1.setHours(0,0,0,0);
            const end1 = new Date(document.getElementById('end2').value);
            const end = end1.setHours(0,0,0,0);
            
            const filterDates = convertedDates.filter(date => date >= start && date <= end)
            // const convertedHrs = filterDates.map(date => new Date(date));
            myChart.config.data.labels = filterDates;
          
            const startarray = convertedDates.indexOf(filterDates[0])
            const endarray = convertedDates.indexOf(filterDates[filterDates.length -1])
            console.log(endarray);
            const copydatapoints = [...datapoints];

            const totals = copydatapoints.map(
                    function(index){
                        return index.total;
                    });
            totals.splice(endarray + 1, filterDates.length);
            totals.splice(0,startarray);
            console.log( totals)
            myChart.config.data.datasets[0].data = totals;
            myChart.update();
            }
            console.log(filterDate());
    });


      $("#reset2").on('click', function(e) {
         e.preventDefault();
          function resetDate()
             {
                myChart.config.data.labels = labelsmonth;
                myChart.config.data.datasets[0].data = count;
                 myChart.update();
             }
             console.log(resetDate());

    });
});
}
}

},
 error: function(){
        console.log('AJAX load did not work');
        alert("error");
      }

});

});

$("#datepicker").datepicker( {
    format: "mm-yyyy",
    startView: "months", 
    minViewMode: "months"
});

