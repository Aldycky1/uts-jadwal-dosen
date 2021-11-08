  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Jadwal</h1>
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
        <form role="form" action="<?= base_url; ?>/jadwal/simpanJadwal" method="POST" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group">
              <label>Hari</label>
              <input type="text" class="form-control" placeholder="masukkan nama jadwal..." name="hari">
            </div>
            <div class="form-group">
              <label>Jam</label>
              <select class="form-control" name="jam_id">
                <option value="">Pilih</option>
                <?php foreach ($data['jam_kuliah'] as $row) : ?>
                  <option value="<?= $row['jam_id']; ?>"><?= $row['jamkuliah']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <!-- <div class="form-group">
              <label>Smtr</label>
              <select class="form-control" name="kelas_id">
                <option value="">Pilih</option>
                <?php foreach ($data['kelas'] as $row) : ?>
                  <option value="<?= $row['kelas_id']; ?>"><?= $row['semester']; ?></option>
                <?php endforeach; ?>
              </select>
            </div> -->
            <div class="form-group">
              <label>Kelas</label>
              <select class="form-control" name="kelas_id">
                <option value="">Pilih</option>
                <?php foreach ($data['kelas'] as $row) : ?>
                  <option value="<?= $row['kelas_id']; ?>"><?= $row['nama_kelas']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label>Matkul</label>
              <select class="form-control" name="matakuliah_id">
                <option value="">Pilih</option>
                <?php foreach ($data['matakuliah'] as $row) : ?>
                  <option value="<?= $row['matakuliah_id']; ?>"><?= $row['nama_matakuliah']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <!-- <div class="form-group">
              <label>SKS</label>
              <select class="form-control" name="matakuliah_id">
                <option value="">Pilih</option>
                <?php foreach ($data['matakuliah'] as $row) : ?>
                  <option value="<?= $row['matakuliah_id']; ?>"><?= $row['sks']; ?></option>
                <?php endforeach; ?>
              </select>
            </div> -->
            <div class="form-group">
              <label>Dosen</label>
              <select class="form-control" name="dosen_id">
                <option value="">Pilih</option>
                <?php foreach ($data['dosen'] as $row) : ?>
                  <option value="<?= $row['dosen_id']; ?>"><?= $row['nama_dosen']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label>Ruangan</label>
              <select class="form-control" name="ruangan_id">
                <option value="">Pilih</option>
                <?php foreach ($data['ruangan'] as $row) : ?>
                  <option value="<?= $row['ruangan_id']; ?>"><?= $row['ruangan_nama']; ?></option>
                <?php endforeach; ?>
              </select>
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