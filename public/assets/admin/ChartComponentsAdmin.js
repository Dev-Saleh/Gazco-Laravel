
// Start line Chart

  const labels = ["January", "February", "March", "April", "May", "June"];
  const data = {
    labels: labels,
    datasets: [
      {
        label: "الدفعات",
        backgroundColor: "hsl(41, 96%, 40%)",
        borderColor: "hsl(50, 98%, 64%)",
        data: [0, 10, 5, 2, 20, 30, 45],
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
          "rgb(234, 179, 8)",
          "rgb(250, 204, 21)",
          "rgb(253, 224, 71)",
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