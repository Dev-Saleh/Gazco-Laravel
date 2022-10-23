
// Start Bar Chart

    const labelsBarChart = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    ];
    const dataBarChart = {
    labels: labelsBarChart,
    datasets: [
        {
        label: "دفعه",
        backgroundColor: "hsl(160, 84%, 39%)",
        borderColor: "hsl(138, 76%, 97%)",
        data: [15, 10, 5, 2, 20, 30, 45],
        },
    ],
    };

    const configBarChart = {
    type: "bar",
    data: dataBarChart,
    options: {},
    };

    var chartBar = new Chart(
    document.getElementById("chartBar"),
    configBarChart
    );

// End Bar Chart

//-----------------------------------------------------------------

// Start Pie Chart

    const dataPie = {
    labels: ["المواطنين", "الوكلاء", "المراقبين"],
    datasets: [
        {
        label: "My First Dataset",
        data: [300, 50, 100],
        backgroundColor: [
            "rgb(74, 222, 128)",
            "rgb(34, 197, 94)",
            "rgb(134, 239, 172)",
        ],
        hoverOffset: 4,
        },
    ],
    };
    
    const configPie = {
    type: "pie",
    data: dataPie,
    options: {},
    };

    var chartBar = new Chart(document.getElementById("chartPie"), configPie);

// End Pie Chart

// Start line Chart

  const labels = ["January", "February", "March", "April", "May", "June"];
  const data = {
    labels: labels,
    datasets: [
      {
        label: "My First dataset",
        backgroundColor: "hsl(252, 82.9%, 67.8%)",
        borderColor: "hsl(252, 82.9%, 67.8%)",
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
    labels: ["JavaScript", "Python", "Ruby"],
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