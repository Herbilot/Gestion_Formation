// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("ctx");
var myLineChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: _ySexeData,
    datasets: [{
        label: 'Repartition par sexe',
        data: _xSexeData,
        backgroundColor: [
            'rgb(54, 162, 235)',
            'rgb(255, 99, 132)'
        ],
        hoverOffset: 4,
      }],
  },
  options:{
    responsive: true,
    legend: {
      position: 'bottom'
    }
  },
  plugins: {
    datalabels: {
      color: '#fff'
    }
  }
  
});