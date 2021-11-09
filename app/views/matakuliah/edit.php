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
              <select class="form-control" name="semester">
                <option value="I" <?php if ($data['matakuliah']['semester'] == 'I') { ?> selected="selected" <?php } ?>>I</option>
                <option value="II" <?php if ($data['matakuliah']['semester'] == 'II') { ?> selected="selected" <?php } ?>>II</option>
                <option value="III" <?php if ($data['matakuliah']['semester'] == 'III') { ?> selected="selected" <?php } ?>>III</option>
                <option value="IV" <?php if ($data['matakuliah']['semester'] == 'IV') { ?> selected="selected" <?php } ?>>IV</option>
                <option value="V" <?php if ($data['matakuliah']['semester'] == 'V') { ?> selected="selected" <?php } ?>>V</option>
                <option value="VI" <?php if ($data['matakuliah']['semester'] == 'VI') { ?> selected="selected" <?php } ?>>VI</option>
                <option value="VII <?php if ($data['matakuliah']['semester'] == 'VII') { ?> selected=" selected" <?php } ?>">VII</option>
                <option value="VIII" <?php if ($data['matakuliah']['semester'] == 'VIII') { ?> selected="selected" <?php } ?>>VIII</option>
              </select>
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