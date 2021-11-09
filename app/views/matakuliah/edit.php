  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Mata Kuliah</h1>
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
        <form role="form" action="<?= base_url; ?>/matakuliah/updateMataKuliah" method="POST" enctype="multipart/form-data">

          <input type="hidden" name="matakuliah_id" value="<?= $data['matakuliah']['matakuliah_id']; ?>">
          <div class="card-body">
            <div class="form-group">
              <label>Nama MataKuliah</label>
              <input type="text" class="form-control" name="nama_matakuliah" value="<?= $data['matakuliah']['nama_matakuliah']; ?>">
            </div>
            <div class="form-group">
              <label>Semester</label>
              <input type="text" class="form-control" name="semester" value="<?= $data['matakuliah']['semester']; ?>">
            </div>
            <div class="form-group">
              <label>SKS</label>
              <input type="text" class="form-control" name="sks" value="<?= $data['matakuliah']['sks']; ?>">
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