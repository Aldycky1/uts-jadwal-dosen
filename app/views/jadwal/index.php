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
      <div class="row">
        <div class="col-sm-12">
          <?php
          Flasher::Message();
          ?>
        </div>
      </div>
      <!-- Default box -->

      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><?= $data['title'] ?></h3>
          <div class="btn-group float-right"><a href="<?= base_url; ?>/jadwal/tambah" class="btn float-right btn-xs btn btn-primary">Tambah Jadwal</a><a href="<?= base_url; ?>/jadwal/laporan" class="btn float-right btn-xs btn btn-info">Laporan Jadwal</a><a href="<?= base_url; ?>/jadwal/lihatlaporan" class="btn float-right btn-xs btn btn-warning">Lihat Laporan Jadwal</a></div>
        </div>
        <div class="card-body">

          <form action="<?= base_url; ?>/jadwal/cari" method="post">
            <div class="row mb-3">
              <div class="col-lg-6">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="" name="key">
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Cari Data</button>
                    <a class="btn btn-outline-danger" href="<?= base_url; ?>/jadwal">Reset</a>
                  </div>
                </div>

              </div>
            </div>
          </form>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Hari</th>
                <th>Jam</th>
                <th>Smtr</th>
                <th>Kelas</th>
                <th>Matkul</th>
                <th>SKS</th>
                <th>Dosen</th>
                <th>Ruangan</th>
                <th style="width: 150px">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($data['jadwal'] as $row) : ?>
                <tr>
                  <td><?= $no; ?></td>
                  <td><?= $row['hari']; ?></td>
                  <td>
                    <div class="badge badge-warning"><?= $row['jam_mulai']; ?> - <?= $row['jam_selesai']; ?></div>
                  </td>
                  <td>
                    <div class="badge badge-warning"><?= $row['semester']; ?></div>
                  </td>
                  <td>
                    <div class="badge badge-warning"><?= $row['nama_kelas']; ?></div>
                  </td>
                  <td>
                    <div class="badge badge-warning"><?= $row['nama_matakuliah']; ?></div>
                  </td>
                  <td>
                    <div class="badge badge-warning"><?= $row['sks']; ?></div>
                  </td>
                  <td>
                    <div class="badge badge-warning"><?= $row['nama_dosen']; ?></div>
                  </td>
                  <td>
                    <div class="badge badge-warning"><?= $row['ruangan_nama']; ?></div>
                  </td>
                  <td>
                    <a href="<?= base_url; ?>/jadwal/edit/<?= $row['jadwal_id'] ?>" class="badge badge-info">Edit</a> <a href="<?= base_url; ?>/jadwal/hapus/<?= $row['jadwal_id'] ?>" class="badge badge-danger" onclick="return confirm('Hapus data?');">Hapus</a>
                  </td>
                </tr>
              <?php $no++;
              endforeach; ?>
            </tbody>
          </table>
        </div>
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