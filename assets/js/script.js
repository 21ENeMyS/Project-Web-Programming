// const toggle = document.querySelector(".toggle");
// const header = document.querySelector(".button");
// toggle.addEventListener("click", function () {
//   header.classList.toggle("slide");
//   toggle.classList.toggle("active");
// });

$('.second-button').on('click', function () {
  $('.animated-icon2').toggleClass('open');
});

// navbar active
$('.nav-link').on('click', function () {
  $('.nav-link').removeClass('.active');
  $(this).addClass('.active');
});


$('.form-control').on('focus', function () {
  $(this).addClass('focus');
});

$('.form-control').on('focus', function () {
  if ($(this).val() == '') {
    $(this).removeClass('focus');
  }
});


//line
var ctxL = document.getElementById("lineChart1").getContext('2d');
var myLineChart = new Chart(ctxL, {
  type: 'line',
  data: {
    labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October"],
    datasets: [{
      pointBackgroundColor: '#fff',
      backgroundColor: 'transparent',
      borderColor: 'rgba(255, 255, 255)',
      data: [2500, 2550, 5000, 3100, 7000, 5500, 4950, 16000, 10500, 8000],
    }]
  },
  options: {
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        gridLines: {
          display: false,
          color: "transparent",
          zeroLineColor: "transparent"
        },
        ticks: {
          fontColor: "#fff",
        },
      }],
      yAxes: [{
        display: true,
        gridLines: {
          display: true,
          drawBorder: false,
          color: "rgba(255,255,255,.25)",
          zeroLineColor: "rgba(255,255,255,.25)"
        },
        ticks: {
          fontColor: "#fff",
          beginAtZero: true,
          stepSize: 5000
        },
      }],
    }
  }
});

// Minimalist charts
$(function () {
  $('.min-chart#chart-pageviews').easyPieChart({
    barColor: "#3059B0",
    onStep: function (from, to, percent) {
      $(this.el).find('.percent').text(Math.round(percent));
    }
  });
  $('.min-chart#chart-downloads').easyPieChart({
    barColor: "#3059B0",
    onStep: function (from, to, percent) {
      $(this.el).find('.percent').text(Math.round(percent));
    }
  });
  $('.min-chart#chart-sales').easyPieChart({
    barColor: "#3059B0",
    onStep: function (from, to, percent) {
      $(this.el).find('.percent').text(Math.round(percent));
    }
  });
});


$('.form-control').on('keyup',function (e) {
  if (e.whic === 13) {
    
  }
})

// Slug
// https://gist.github.com/codeguy/6684588

function CreateSlug() {
  const kategori = $("#kategori").val();
  $("#slug").val(string_to_slug(kategori));
}

function string_to_slug (str) {
    str = str.replace(/^\s+|\s+$/g, ''); // trim
    str = str.toLowerCase();
  
    // remove accents, swap ñ for n, etc
    var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
    var to   = "aaaaeeeeiiiioooouuuunc------";
    for (var i=0, l=from.length ; i<l ; i++) {
        str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }

    str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
        .replace(/\s+/g, '-') // collapse whitespace and replace by -
        .replace(/-+/g, '-'); // collapse dashes

    return str;
}