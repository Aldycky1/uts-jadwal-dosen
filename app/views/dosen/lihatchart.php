<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Doc 1</title>

  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="<?= base_url ?>/dist/js/normalize.min.css">

  <!-- Load paper.css for happy printing -->
  <link rel="stylesheet" href="<?= base_url ?>/dist/css/paper.css">

  <!-- Chart -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <style type="text/css" media="print">
    @page {
      size: auto;
      /* auto is the initial value */
      margin: 0mm;
      /* this affects the margin in the printer settings */
    }
  </style>
  <style>
    .center {
      margin-right: auto;
      margin-left: auto;
      text-align: center;
    }

    h1 {
      font-size: 16px;
    }

    * {
      font-family: Calibri;
      font-size: 14px;
      -webkit-print-color-adjust: exact;
    }
  </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->

<body class="A4 potrait">

  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  <section class="sheet padding-15mm">
    <h1 class="center" style="text-decoration: underline;margin-top: 20px;"><?= $data['title'] ?></h1>

    <?php $noX = 1; ?>
    <?php foreach ($data['SSatu'] as $rowX) : ?>
    <?php $noX++;
    endforeach; ?>

    <?php $noY = 1; ?>
    <?php foreach ($data['SDua'] as $rowY) : ?>
    <?php $noY++;
    endforeach; ?>

    <?php $noZ = 1; ?>
    <?php foreach ($data['STiga'] as $rowZ) : ?>
    <?php $noZ++;
    endforeach; ?>

    <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

    <script>
      var xValues = ["S1", "S2", "S3"];
      var yValues = [<?= $rowX['jml_S1']; ?>, <?= $rowY['jml_S2']; ?>, <?= $rowZ['jml_S3']; ?>];
      var barColors = ["red", "green", "blue"];

      new Chart("myChart", {
        type: "bar",
        data: {
          labels: xValues,
          datasets: [{
            backgroundColor: barColors,
            data: yValues
          }]
        },
        options: {
          legend: {
            display: false
          },
          title: {
            display: true,
            text: "Jenjang Pendidikan Terakhir Dosen"
          },
          scales: {
            yAxes: [{
              ticks: {
                min: 0
              }
            }]
          }
        }
      });
    </script>
  </section>
  <script type="text/javascript">
    //  window.print();
    //   window.onafterprint = window.close;
  </script>
</body>

</html>