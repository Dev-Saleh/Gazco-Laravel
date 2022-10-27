
// Start line Chart

  const labels = ["يونيو", "يوليو", "أغسطس", "سبتمبر", "اكتوبر", "نوفمبر"];
  const data = {
    labels: labels,
    datasets: [
      {
        label: "الدفعات",
        backgroundColor: "hsl(252, 82.9%, 67.8%)",
        borderColor: "hsl(252, 82.9%, 67.8%)",
        data: [45, 10, 5, 2, 20, 30, 10],
      },
    ],
  };

  const configLineChart = {
    type: "line",
    data,
    options: {},
  };

  var chartLine = new Chart(
    document.getElementById("chartLine"),
    configLineChart
  );

// End line Chart


// Start Dount Chart 

const dataDoughnut = {
    labels: ["المواطنين", "الوكلاء", "المراقبين"],
    datasets: [
      {
        label: "My First Dataset",
        data: [300, 50, 100],
        backgroundColor: [
          "rgb(133, 105, 241)",
          "rgb(164, 101, 241)",
          "rgb(101, 143, 241)",
        ],
        hoverOffset: 4,
      },
    ],
  };

  const configDoughnut = {
    type: "doughnut",
    data: dataDoughnut,
    options: {},
  };

  var chartBar = new Chart(
    document.getElementById("chartDoughnut"),
    configDoughnut
  );

// End Dount Chart 