  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $data['title'] ?></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php foreach ($data['CountDosen'] as $row1) : ?>
                  <h3><?= $row1['jml_dosen'] ?></h3>
                <?php endforeach; ?>
                <p>Total Dosen</p>
              </div>
              <div class="icon">
                <i class="fas fa-chalkboard-teacher"></i>
              </div>
              <a href="<?= base_url; ?>/dosen" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <?php foreach ($data['CountKelas'] as $row2) : ?>
                  <h3><?= $row2['jml_kelas'] ?></h3>
                <?php endforeach; ?>
                <p>Total Kelas</p>
              </div>
              <div class="icon">
                <i class="fas fa-university"></i>
              </div>
              <a href="<?= base_url; ?>/kelas" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php foreach ($data['CountMataKuliah'] as $row3) : ?>
                  <h3><?= $row3['jml_matkul'] ?></h3>
                <?php endforeach; ?>
                <p>Total Mata Kuliah</p>
              </div>
              <div class="icon">
                <i class="fas fa-book"></i>
              </div>
              <a href="<?= base_url; ?>/matakuliah" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <?php foreach ($data['CountRuangan'] as $row4) : ?>
                  <h3><?= $row4['jml_ruangan'] ?></h3>
                <?php endforeach; ?>
                <p>Total Ruangan</p>
              </div>
              <div class="icon">
                <i class="fas fa-map-marker-alt"></i>
              </div>
              <a href="<?= base_url; ?>/ruangan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Hello</h3>
        </div>
        <div class="card-body">
          Dashboard
        </div>
        <!DOCTYPE html>
        <html>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

        <body>
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
                maintainAspectRatio: {
                  boolean: true,
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

        </body>

        </html>

        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->