  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Pegawai</h1>
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
        <form role="form" action="<?= base_url; ?>/pegawai/updatePegawai" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="nip" value="<?= $data['pegawai']['nip']; ?>">
          <div class="card-body">
            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" placeholder="masukkan nama pegawai..." name="nama" value="<?= $data['pegawai']['nama']; ?>">
            </div>
            <div class="form-group">
              <label>Divisi</label>
              <select class="form-control" name="divisi_id">
                <option value="">Pilih Divisi</option>
                <?php foreach ($data['divisi'] as $row) : ?>
                  <option value="<?= $row['id']; ?>" <?php if ($data['pegawai']['divisi_id'] == $row['id']) {
                                                        echo "selected";
                                                      } ?>><?= $row['nama_divisi']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" class="form-control" placeholder="masukkan alamat pegawai..." name="alamat" value="<?= $data['pegawai']['alamat']; ?>">
            </div>
            <div class="form-group">
              <label>Tanggal Lahir</label>
              <input type="date" class="form-control" placeholder="masukkan tanggal lahir pegawai..." name="tanggal_lahir" value="<?= $data['pegawai']['tanggal_lahir']; ?>">
            </div>
            <div class="form-group">
              <label>No. HP</label>
              <input type="text" class="form-control" placeholder="masukkan nomor hp pegawai..." name="no_hp" value="<?= $data['pegawai']['no_hp']; ?>">
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