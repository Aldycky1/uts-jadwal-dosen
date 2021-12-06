  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Jam Kuliah</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><?= $data['title']; ?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="<?= base_url; ?>/jamKuliah/updateJamKuliah" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="jam_id" value="<?= $data['jam_kuliah']['jam_id']; ?>">
          <div class="card-body">
            <div class="form-group">
              <label>Waktu Mulai</label>
              <div class="input-group time" id="timepicker-1">
                <input class="form-control" name="jam_mulai" value="<?= $data['jam_kuliah']['jam_mulai']; ?>" />
                <span class="input-group-append input-group-addon">
                  <span class="input-group-text">
                    <i class="fa fa-clock">
                    </i>
                  </span>
                </span>
              </div>
            </div>
            <div class="form-group">
              <label>Waktu Selesai</label>
              <div class="input-group time" id="timepicker-2">
                <input class="form-control" name="jam_selesai" value="<?= $data['jam_kuliah']['jam_selesai']; ?>" />
                <span class="input-group-append input-group-addon">
                  <span class="input-group-text">
                    <i class="fa fa-clock">
                    </i>
                  </span>
                </span>
              </div>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->