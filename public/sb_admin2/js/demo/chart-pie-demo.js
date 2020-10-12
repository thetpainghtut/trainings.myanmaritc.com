// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var presentcount = ctx.dataset.presentcount;
var remaincount = ctx.dataset.remaincount;
var absencecount = ctx.dataset.absencecount;
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Present", "Absence", 'Remain'],
    datasets: [{
      data: [presentcount, absencecount, remaincount],
      backgroundColor: ['#1cc88a', '#FF0000', '#D3D3D3'],
      hoverBackgroundColor: ['#17a673', '#b53737', '#C0C0C0'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
