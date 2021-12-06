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
        <form role="form" action="<?= base_url; ?>/jadwal/updateJadwal" method="POST" enctype="multipart/form-data">

          <input type="hidden" name="jadwal_id" value="<?= $data['jadwal']['jadwal_id']; ?>">
          <div class="card-body">
            <div class="form-group">
              <label>Hari</label>
              <select class="form-control" name="hari">
                <option value="Senin" <?php if ($data['jadwal']['hari'] == 'Senin') { ?> selected="selected" <?php } ?>>Senin</option>
                <option value="Selasa" <?php if ($data['jadwal']['hari'] == 'Selasa') { ?> selected="selected" <?php } ?>>Selasa</option>
                <option value="Rabu" <?php if ($data['jadwal']['hari'] == 'Rabu') { ?> selected="selected" <?php } ?>>Rabu</option>
                <option value="Kamis" <?php if ($data['jadwal']['hari'] == 'Kamis') { ?> selected="selected" <?php } ?>>Kamis</option>
                <option value="Jumat" <?php if ($data['jadwal']['hari'] == 'Jumat') { ?> selected="selected" <?php } ?>>Jumat</option>
                <option value="Sabtu" <?php if ($data['jadwal']['hari'] == 'Sabtu') { ?> selected="selected" <?php } ?>>Sabtu</option>
                <option value="Minggu" <?php if ($data['jadwal']['hari'] == 'Minggu') { ?> selected="selected" <?php } ?>>Minggu</option>
              </select>
            </div>
            <div class="form-group">
              <label>Jam</label>
              <select class="form-control" name="jam_id">
                <option value="">Pilih</option>
                <?php foreach ($data['jam_kuliah'] as $row) : ?>
                  <option value="<?= $row['jam_id']; ?>" <?php if ($data['jadwal']['jam_id'] == $row['jam_id']) {
                                                            echo "selected";
                                                          } ?>><?= $row['jam_mulai']; ?> - <?= $row['jam_selesai']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label>Kelas</label>
              <select class="form-control" name="kelas_id">
                <option value="">Pilih</option>
                <?php foreach ($data['kelas'] as $row) : ?>
                  <option value="<?= $row['kelas_id']; ?>" <?php if ($data['jadwal']['kelas_id'] == $row['kelas_id']) {
                                                              echo "selected";
                                                            } ?>><?= $row['nama_kelas']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label>Mata Kuliah</label>
              <select class="form-control" name="matakuliah_id">
                <option value="">Pilih</option>
                <?php foreach ($data['matakuliah'] as $row) : ?>
                  <option value="<?= $row['matakuliah_id']; ?>" <?php if ($data['jadwal']['matakuliah_id'] == $row['matakuliah_id']) {
                                                                  echo "selected";
                                                                } ?>><?= $row['nama_matakuliah']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label>Dosen</label>
              <select class="form-control" name="dosen_id">
                <option value="">Pilih</option>
                <?php foreach ($data['dosen'] as $row) : ?>
                  <option value="<?= $row['dosen_id']; ?>" <?php if ($data['jadwal']['dosen_id'] == $row['dosen_id']) {
                                                              echo "selected";
                                                            } ?>><?= $row['nama_dosen']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label>Ruangan</label>
              <select class="form-control" name="ruangan_id">
                <option value="">Pilih</option>
                <?php foreach ($data['ruangan'] as $row) : ?>
                  <option value="<?= $row['ruangan_id']; ?>" <?php if ($data['jadwal']['ruangan_id'] == $row['ruangan_id']) {
                                                                echo "selected";
                                                              } ?>><?= $row['ruangan_nama']; ?></option>
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